<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('Please do not load this page directly. Thanks!');

if (post_password_required()) { ?>
    <p class="nocomments"><?php _e('Enter the password.', 'ger-school'); ?></p>
<?php
    return;
}

$user_ID = get_current_user_id();
?>

<?php if (have_comments()) : ?>
    <h3 class="section-title"><?php comments_number(false, __('1 Comment', 'ger-school'), __('% Comments', 'ger-school')); ?></h3>
    <ol class="commentlist">
        <?php wp_list_comments('avatar_size=64'); ?>
    </ol>
<?php else : ?>
    <!-- this is displayed if there are no comments so far -->
    <?php if ('open' == $post->comment_status) : ?>
        <!-- If comments are open, but there are no comments. -->
    <?php else : ?>
        <!-- If comments are closed. -->
        <!-- <p class="nocomments"></p> -->
    <?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

    <small><?php cancel_comment_reply_link(); ?></small>

    <?php if (get_option('comment_registration') && !$user_ID) : ?>
        <p>
            <?php _e('You must Log in to send a comment.', 'ger-school'); ?>
            <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"> <?php _e('Login', 'ger-school'); ?></a>
        </p>
    <?php else : ?>
        <div class="well">
            <h4><?php comment_form_title(__('Add Comment', 'ger-school'), __('Reply to %s', 'ger-school')); ?></h4>

            <form role="form" method="post" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php">
                <?php if ($user_ID) : ?>
                    <p><?php _e('Logged in with name', 'ger-school'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e('Logout', 'ger-school'); ?> &raquo;</a></p>
                <?php else : ?>
                    <div class="form-group">
                        <input type="text" class="form-control" id="author" name="author" placeholder="<?php _e('First Name & Last Name', 'ger-school'); ?>" value="<?php echo $comment_author; ?>" <?php if ($req) echo "aria-required='true'"; ?>>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="<?php _e('Email', 'ger-school'); ?>" value="<?php echo $comment_author_email; ?>" <?php if ($req) echo "aria-required='true'"; ?>>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="<?php _e('Website', 'ger-school'); ?>" value="<?php echo $comment_author_url; ?>">
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <textarea class="form-control" rows="4" name="comment" id="comment-form"></textarea>
                </div>
                <div class="form-group">
                    <input id="submit" name="submit" type="submit" value="<?php _e('Submit', 'ger-school'); ?>" class="btn btn-primary">
                    <?php comment_id_fields(); ?>
                    <?php do_action('comment_form', $post->ID); ?>
                </div>
            </form>

        </div>
    <?php endif; ?>

<?php endif; ?>