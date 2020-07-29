<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
 
if ( post_password_required() ) { ?>
<p class="nocomments">برای نمایش دیدگاه ها رمز را وارد نمایید .</p>
<?php
return;
}
?>

<?php if ( have_comments() ) : ?>
<h3 class="section-title"><?php comments_number('صفر دیدگاه', 'یک دیدگاه', '% دیدگاه' );?></h3>
 
<ol class="commentlist">
<?php wp_list_comments('avatar_size=64'); ?>
</ol>


<?php else : // this is displayed if there are no comments so far ?>
 
<?php if ('open' == $post->comment_status) : ?>
<!-- If comments are open, but there are no comments. -->
 
<?php else : // comments are closed ?>
<!-- If comments are closed. -->
<!--<p class="nocomments">امکان ارسال دیدگاه وجود ندارد.</p>-->
 
<?php endif; ?>
<?php endif; ?>
 
<?php if ('open' == $post->comment_status) : ?>

<small><?php cancel_comment_reply_link(); ?></small>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>شما باید به ناحه کاربری خد <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> وارد شوید </p> تا بتوانید دیدگاهی ارسال کنید .
<?php else : ?>


<div class="well">
	<h4><?php comment_form_title( 'افزودن دیدگاه', 'پاسخی به %s بدهید !' ); ?></h4>
	
	<form  role="form" method="post" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php">
		
		<?php if ( $user_ID ) : ?>
		 
		<p>وارد شده با نام <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">خروج &raquo;</a></p>
		 
		<?php else : ?>					
		<div class="form-group">
			
				<input type="text" class="form-control" id="author" name="author" placeholder="نام و نام خانوادگی" value="<?php echo $comment_author; ?>" <?php if ($req) echo "aria-required='true'"; ?>>

		</div>
		<div class="form-group">

				<input type="email" class="form-control" id="email" name="email" placeholder="پست الکترونیک" value="<?php echo $comment_author_email; ?>" <?php if ($req) echo "aria-required='true'"; ?>>

		</div>
		<div class="form-group">

				<input type="text" class="form-control" id="url" name="url" placeholder="وب سایت" value="<?php echo $comment_author_url; ?>">

		</div>					
		<?php endif; ?>					
		<div class="form-group">

				<textarea class="form-control" rows="4" name="comment" id="comment-form"></textarea>

		</div>

		
		<div class="form-group">

				<input id="submit" name="submit" type="submit" value="ارسال" class="btn btn-primary">
		<?php comment_id_fields(); ?>
		<?php do_action('comment_form', $post->ID); ?>							

		</div>

	</form>
	<?php endif; // If registration required and not logged in ?>

	 
	<?php endif; // if you delete this the sky will fall on your head ?>
	
</div>