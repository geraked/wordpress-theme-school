<?php
require_once('../../../../wp-blog-header.php');
header("HTTP/1.1 200 OK");
header("Status: 200 All rosy");

if (current_user_can('manage_options')) {
    remove_theme_mods();
}

wp_redirect(admin_url('/customize.php?url=' . site_url()));
exit;