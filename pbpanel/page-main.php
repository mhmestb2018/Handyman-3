<?php get_template_part('pbpanel/header'); ?>

<div class="pbpanel-column">
	<?php if (isset($_POST["update_options"])) { ?>
		<?php
			foreach ($_POST as $key => $value) {
                if ($key != 'update_options') {
					update_option($key, esc_html($value));
				}
            }
		?>
		<div class="pbpanel-box pbpanel-updated"><?php echo __('Settings saved', 'tradesman'); ?></div>		
	<?php } ?>
	<div class="pbpanel-box">
		<h2><?php echo __('Main', 'tradesman'); ?></h2>
	</div>
	<div class="pbpanel-box">
		<form action="" method="post" enctype="multipart/form-data">
		<?php /*
        <p>
			<label><?php echo __('Infinite scroll', 'tradesman'); ?></label>
			<span class="helptext"><?php echo __('Click to enable or disable infinite scroll', 'tradesman'); ?></span>
			<label class="radio" for="pbpanel_infinite_scroll_enable"><input type="radio" <?php if (get_option('pbpanel_infinite_scroll') == 1) { ?> checked="checked" <?php } ?> value="1" id="pbpanel_infinite_scroll_enable" name="pbpanel_infinite_scroll"><span class="mark"><?php echo __('Enable', 'tradesman'); ?></span></label>
			<label class="radio" for="pbpanel_infinite_scroll_disable"><input type="radio" <?php if (get_option('pbpanel_infinite_scroll') == 2) { ?> checked="checked" <?php } ?> value="2" id="pbpanel_infinite_scroll_disable" name="pbpanel_infinite_scroll"><span class="mark"><?php echo __('Disable', 'tradesman'); ?></span></label>
		</p>
		<hr>
		<p>
			<label><?php echo __('Links To Posts In Same Category', 'tradesman'); ?></label>
			<span class="helptext"><?php echo __('Displays links to the previous/next post within the same category as the current post.', 'tradesman'); ?></span>
			<label class="radio" for="pbpanel_posts_in_same_cat_enable"><input type="radio" <?php if (get_option('pbpanel_posts_in_same_cat') == 1) { ?> checked="checked" <?php } ?> value="1" id="pbpanel_posts_in_same_cat_enable" name="pbpanel_posts_in_same_cat"><span class="mark"><?php echo __('Enable', 'tradesman'); ?></span></label>
			<label class="radio" for="pbpanel_posts_in_same_cat_disable"><input type="radio" <?php if (get_option('pbpanel_posts_in_same_cat') == 2) { ?> checked="checked" <?php } ?> value="2" id="pbpanel_posts_in_same_cat_disable" name="pbpanel_posts_in_same_cat"><span class="mark"><?php echo __('Disable', 'tradesman'); ?></span></label>
		</p>
		<hr>
		<p>
			<label for="pbpanel_header_code"><?php echo __('Header Code', 'tradesman'); ?></label>
			<span class="helptext"><?php echo __('Add code to the head of your blog', 'tradesman'); ?></span>
			<textarea name="pbpanel_header_code" id="pbpanel_header_code"><?php echo stripslashes_deep(get_option('pbpanel_header_code')); ?></textarea>
		</p>
		<p>
			<label for="pbpanel_google_code"><?php echo __('Google Analytics Code', 'tradesman'); ?></label>
			<span class="helptext"><?php echo __('Paste your Google Analytics tracking code here', 'tradesman'); ?></span>
			<textarea name="pbpanel_google_code" id="pbpanel_google_code"><?php echo stripslashes_deep(get_option('pbpanel_google_code')); ?></textarea>
		</p>
        */ ?>
		<p>
			<label for="pbpanel_footer_showlinks"><?php echo __('Phone Number', 'tradesman'); ?></label>
			<span class="helptext"><?php echo __('The phone number appears in the header of the website across all pages', 'tradesman'); ?></span>
			<input type="text" name="pbpanel_footer_showlinks" id="pbpanel_footer_showlinks" value="<?php echo stripslashes_deep(get_option('tradesman_phone_number')); ?>">
		</p>
            <p>
                <label for="pbpanel_footer_showlinks"><?php echo __('Cell Phone Number', 'tradesman'); ?></label>
                <span class="helptext"><?php echo __('The cell phone number appears in the header of the website across all pages', 'tradesman'); ?></span>
                <input type="text" name="pbpanel_footer_showlinks" id="pbpanel_footer_showlinks" value="<?php echo stripslashes_deep(get_option('tradesman_cell_phone_number')); ?>">
            </p>
		<p>
			<label for="pbpanel_footer_copyright"><?php echo __('Footer text', 'tradesman'); ?></label>
			<span class="helptext"><?php echo __('Enter footer text ex. copyright description', 'tradesman'); ?><br><?php echo __('Default:', 'tradesman'); ?> <?php echo __('Copyright', 'tradesman'); ?> &copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?></span>
			<input type="text" name="pbpanel_footer_copyright" id="pbpanel_footer_copyright"  value="<?php echo stripslashes_deep(get_option('pbpanel_footer_copyright')); ?>">
		</p>
		<p><input type="submit" name="update_options" value="<?php echo __('Save settings', 'tradesman'); ?>" class="pbpanel-button pbpanel-button-color-1"></p>
		</form>
	</div>
</div>

<?php get_template_part('pbpanel/footer'); ?>