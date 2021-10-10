<?php

/**
 * OCDI settings for this theme
 *
 * @link https://ocdi.com/advanced-integration-guide/
 * @package Ger_School
 */


require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
require_once ABSPATH . 'wp-admin/includes/class-language-pack-upgrader.php';
require_once 'class-ger-sch-null-skin.php';


/**
 * OCDI settings
 */
class Ger_Sch_Ocdi {

    /**
     * Constructor. Instantiate the object
     */
    public function __construct() {
        add_action('rest_api_init', [$this, 'add_api']);
        add_action('admin_footer', [$this, 'script']);
        add_filter('ocdi/register_plugins', [$this, 'register_plugins']);
        add_filter('ocdi/import_files', [$this, 'import_files']);
        add_action('ocdi/before_content_import', [$this, 'before_content_import']);
        add_action('ocdi/after_import', [$this, 'after_import']);
        add_action('ocdi/after_import', [$this, 'upgrade_langs']);
    }


    /**
     * Register plugins
     */
    public function register_plugins($plugins) {
        $theme_plugins = [
            [
                'name' => 'WP-Parsidate',
                'slug' => 'wp-parsidate',
                'required' => true,
            ],
            [
                'name' => 'WP Statistics',
                'slug' => 'wp-statistics',
                'required' => true,
            ],
            [
                'name' => 'Contact Form 7',
                'slug' => 'contact-form-7',
                'required' => true,
            ],
            [
                'name' => 'WPS Hide Login',
                'slug' => 'wps-hide-login',
                'required' => false,
            ],
            [
                'name' => 'Yoast SEO',
                'slug' => 'wordpress-seo',
                'required' => false,
            ],
        ];

        return $theme_plugins;
    }


    /**
     * Import content files
     */
    public function import_files() {
        return [
            [
                'import_file_name' => 'Default Demo Import',
                'local_import_file' => trailingslashit(get_template_directory()) . 'ocdi/demo-content.xml',
                'local_import_widget_file' => trailingslashit(get_template_directory()) . 'ocdi/widgets.json',
                'import_preview_image_url' => trailingslashit(get_template_directory()) . 'docs/screenshot.png',
                'preview_url' => 'https://geraked.ir/portfolio/themes/school/',
            ],
        ];
    }


    /**
     * Before content import
     */
    public function before_content_import($selected_import) {
        if ('Default Demo Import' !== $selected_import['import_file_name']) return;

        // Clean old widgets
        $widgets = ['ger_sch_latest_posts', 'ger_sch_latest_comments', 'ger_sch_search', 'ger_sch_lms_login', 'ger_sch_html', 'ger_sch_statistics', 'links'];
        foreach ($widgets as $w) {
            update_option('widget_' . $w, []);
        }
        update_option('sidebars_widgets', []);

        // Reset Customization
        remove_theme_mods();
    }


    /**
     * After import
     */
    public function after_import($selected_import) {
        global $wpdb;

        if ('Default Demo Import' !== $selected_import['import_file_name']) return;

        update_option('posts_per_page', 6);
        update_option('date_format', 'j F Y');
        update_option('time_format', 'H:i');
        update_option('WPLANG', 'fa_IR');
        update_option('start_of_week', 6);
        update_option('timezone_string', 'Asia/Tehran');
        update_option('avatar_default', 'identicon');

        // Enable persian date
        $wpp = get_option('wpp_settings');
        $wpp['persian_date'] = 'enable';
        $wpp['conv_permalinks'] = 'enable';
        $wpp['conv_arabic'] = 'enable';
        $wpp['submenu_move'] = 'enable';
        update_option('wpp_settings', $wpp);

        // Assign menus to their locations.
        $main_menu = get_term_by('name', 'Menu 1', 'nav_menu');
        set_theme_mod(
            'nav_menu_locations',
            [
                'navb-header' => $main_menu->term_id,
            ]
        );

        // Add links
        $links = [
            ['آموزش و پرورش استان فارس', 'http://farsedu.org/'],
            ['پایگاه کتاب‌های درسی', 'http://chap.sch.ir/'],
            ['سازمان سنجش آموزش کشور', 'http://www.sanjesh.org/'],
            ['سامانه فروش و توزیع کتب درسی', 'http://irtextbook.ir/'],
            ['شبکه آموزشی تربیتی رشد', 'https://www.roshd.ir/'],
            ['وزارت آموزش و پرورش', 'http://www.medu.ir/'],
        ];

        foreach ($links as $l) {
            $host = parse_url($l[1], PHP_URL_HOST);
            $row = $wpdb->get_row("SELECT link_id FROM $wpdb->links WHERE link_url LIKE '%$host%'");

            if ($row) continue;

            wp_insert_link([
                'link_name' => $l[0],
                'link_url' => $l[1],
                'link_target' => '_blank',
            ]);
        }
    }


    /**
     * Upgrade languages
     */
    public function upgrade_langs() {
        $lpu = new Language_Pack_Upgrader(new Ger_Sch_Null_Skin());
        return $lpu->bulk_upgrade();
    }


    /**
     * API
     */
    public function add_api() {
        register_rest_route('ger-school', '/upgrade', [
            'methods' => 'GET',
            'callback' => [$this, 'upgrade_langs'],
            'permission_callback' => '__return_true',
        ]);
    }


    /**
     * Request to API to upgrade
     */
    public function request_upgrade() {
        $request = new WP_REST_Request('GET', '/ger-school/upgrade');
        $response = rest_do_request($request);
        $data = $response->get_data();
    }


    /**
     * Admin scripts
     */
    public function script() { ?>
        <script>
            // Upgrade button
            (() => {
                let page = document.querySelector('.appearance_page_one-click-demo-import');
                if (!page) return;

                let btn = document.createElement('button');
                btn.className = 'button  button-hero  button-primary';
                btn.innerHTML = '<?php _e('Upgrade Languages', 'ger-school'); ?>';

                btn.addEventListener('click', () => {
                    btn.disabled = true;
                    fetch('<?php echo site_url('wp-json/ger-school/upgrade'); ?>')
                        .then(response => response.json())
                        .then(data => {
                            btn.disabled = false;
                            console.log(data);
                        });
                });

                page.querySelector('.ocdi__title-container').prepend(btn);
            })();
        </script>
<?php }
}
