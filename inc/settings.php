<?php
if (!defined('ABSPATH')) {
  exit;
}
?>
<div class="mementor-wrapper">
  <div class="mementor-container">
    <div class="row">
      <div class="col-sm-12">
        <h1><?php _e('Newsletter Popup', 'mementor_newsletter_popup'); ?></h1>
      </div>
    </div>
    <?php
			if (isset($_POST['mementor_newsletter_popup_nonce']) || wp_verify_nonce(isset($_POST['mementor_newsletter_popup_nonce']), 'mementor_newsletter_popup_nonce')) {
        $mementor_newsletter_popup_msg = false;
        // Headline
		    if (isset($_POST['mementor_newsletter_popup_title'])) {
	        $mementor_newsletter_popup_title = sanitize_text_field($_POST['mementor_newsletter_popup_title']);
	        update_option('mementor_newsletter_popup_title', $mementor_newsletter_popup_title);
	        $mementor_newsletter_popup_msg = true;
		    }
        // Content
		    if (isset($_POST['mementor_newsletter_popup_content'])) {
          $mementor_newsletter_popup_content = base64_encode($_POST['mementor_newsletter_popup_content']);
          update_option('mementor_newsletter_popup_content', $mementor_newsletter_popup_content);
          $mementor_newsletter_popup_msg = true;
		    }
		    // Image
		    if (isset($_POST['mementor_newsletter_popup_image'])) {
	        $mementor_newsletter_popup_image  = sanitize_text_field($_POST['mementor_newsletter_popup_image']);
	        update_option('mementor_newsletter_popup_image', $mementor_newsletter_popup_image);
	        $mementor_newsletter_popup_msg = true;
		    }
		    // Form action
		    if (isset($_POST['mementor_newsletter_popup_form_action'])) {
          $mementor_newsletter_popup_form_action = sanitize_text_field($_POST['mementor_newsletter_popup_form_action']);
          update_option('mementor_newsletter_popup_form_action', $mementor_newsletter_popup_form_action);
          $mementor_newsletter_popup_msg = true;
		    }
		    // Firstname
		    if (isset($_POST['mementor_newsletter_popup_firstname'])) {
          $mementor_newsletter_popup_firstname = sanitize_text_field($_POST['mementor_newsletter_popup_firstname']);
          update_option('mementor_newsletter_popup_firstname', $mementor_newsletter_popup_firstname);
          $mementor_newsletter_popup_msg = true;
		    }
		    // Lastname
		    if (isset($_POST['mementor_newsletter_popup_lastname'])) {
          $mementor_newsletter_popup_lastname = sanitize_text_field($_POST['mementor_newsletter_popup_lastname']);
          update_option('mementor_newsletter_popup_lastname', $mementor_newsletter_popup_lastname);
          $mementor_newsletter_popup_msg = true;
		    }
		    // Email
		    if (isset($_POST['mementor_newsletter_popup_email'])) {
          $mementor_newsletter_popup_email = sanitize_text_field($_POST['mementor_newsletter_popup_email']);
          update_option('mementor_newsletter_popup_email', $mementor_newsletter_popup_email);
          $mementor_newsletter_popup_msg = true;
		    }
		    // Button color
		    if (isset($_POST['mementor_newsletter_popup_button_color'])) {
          $mementor_newsletter_popup_button_color = sanitize_text_field($_POST['mementor_newsletter_popup_button_color']);
          update_option('mementor_newsletter_popup_button_color', $mementor_newsletter_popup_button_color);
          $mementor_newsletter_popup_msg = true;
		    }
        // Link color
		    if (isset($_POST['mementor_newsletter_popup_link_color'])) {
          $mementor_newsletter_popup_link_color = sanitize_text_field($_POST['mementor_newsletter_popup_link_color']);
          update_option('mementor_newsletter_popup_link_color', $mementor_newsletter_popup_link_color);
          $mementor_newsletter_popup_msg = true;
		    }
        // Link background
		    if (isset($_POST['mementor_newsletter_popup_link_background'])) {
          $mementor_newsletter_popup_link_background = sanitize_text_field($_POST['mementor_newsletter_popup_link_background']);
          update_option('mementor_newsletter_popup_link_background', $mementor_newsletter_popup_link_background);
          $mementor_newsletter_popup_msg = true;
		    }
		    // Footnote
		    if (isset($_POST['mementor_newsletter_popup_footnote'])) {
          $mementor_newsletter_popup_footnote = base64_encode($_POST['mementor_newsletter_popup_footnote']);
          update_option('mementor_newsletter_popup_footnote', $mementor_newsletter_popup_footnote);
          $mementor_newsletter_popup_msg = true;
		    }
		    // Messages
		    if (isset($mementor_newsletter_popup_msg) && !empty($mementor_newsletter_popup_msg)) {
          echo '<div class="alert alert-success">'.__('Settings was successfully saved', 'mementor_newsletter_popup').'</div>';
		    } else {
          echo '<div class="alert alert-warning">'.__('Oh snap! We had some trouble saving your settings', 'mementor_newsletter_popup').'</div>';
		    }
			}
    ?>
    <form method="post">
      <div class="row">
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-3">
              <label><?php _e('Headline', 'mementor_newsletter_popup'); ?></label>
            </div>
            <div class="col-sm-9">
              <input class="form-control" value="<?php echo get_option('mementor_newsletter_popup_title'); ?>" name="mementor_newsletter_popup_title" type="text" placeholder="<?php _e('Headline', 'mementor_newsletter_popup'); ?>" />
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label><?php _e('Content', 'mementor_newsletter_popup'); ?></label>
            </div>
            <div class="col-sm-9">
              <textarea class="form-control" name="mementor_newsletter_popup_content" rows="5" placeholder="<?php _e('Why should the visitor sign up for your newsletter?', 'mementor_newsletter_popup'); ?>"><?php echo stripslashes(base64_decode(get_option('mementor_newsletter_popup_content'))); ?></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label><?php _e('Image', 'mementor_newsletter_popup'); ?></label>
            </div>
            <div class="col-sm-9">
              <div class="file-upload">
                <input class="form-control" type="text" value="<?php echo get_option('mementor_newsletter_popup_image'); ?>" name="mementor_newsletter_popup_image" placeholder="<?php _e('No file selected', 'mementor_newsletter_popup'); ?>" />
                <button class="add"><i class="icon-plus3"></i></button>
                <button class="remove"><i class="icon-minus3"></i></button>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label><?php _e('Form URL', 'mementor_newsletter_popup'); ?></label>
            </div>
            <div class="col-sm-9">
              <input class="form-control" value="<?php echo get_option('mementor_newsletter_popup_form_action'); ?>" name="mementor_newsletter_popup_form_action" type="text" placeholder="<?php _e('Form action', 'mementor_newsletter_popup'); ?>" />
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label><?php _e('Firstname input name', 'mementor_newsletter_popup'); ?></label>
            </div>
            <div class="col-sm-9">
              <input class="form-control" value="<?php echo (get_option('mementor_newsletter_popup_firstname')) ? get_option('mementor_newsletter_popup_firstname') : 'FNAME'; ?>" name="mementor_newsletter_popup_firstname" type="text" placeholder="<?php _e('Firstname', 'mementor_newsletter_popup'); ?>" />
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label><?php _e('Lastname input name', 'mementor_newsletter_popup'); ?></label>
            </div>
            <div class="col-sm-9">
              <input class="form-control" value="<?php echo (get_option('mementor_newsletter_popup_lastname')) ? get_option('mementor_newsletter_popup_lastname') : 'LNAME'; ?>" name="mementor_newsletter_popup_lastname" type="text" placeholder="<?php _e('Lastname', 'mementor_newsletter_popup'); ?>" />
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label><?php _e('Email input name', 'mementor_newsletter_popup'); ?></label>
            </div>
            <div class="col-sm-9">
              <input class="form-control" value="<?php echo (get_option('mementor_newsletter_popup_email')) ? get_option('mementor_newsletter_popup_email') : 'EMAIL'; ?>" name="mementor_newsletter_popup_email" type="text" placeholder="<?php _e('E-mail', 'mementor_newsletter_popup'); ?>" />
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label><?php _e('Button color', 'mementor_newsletter_popup'); ?></label>
            </div>
            <div class="col-sm-9">
              <input class="form-control" value="<?php echo get_option('mementor_newsletter_popup_button_color'); ?>" name="mementor_newsletter_popup_button_color" type="text" placeholder="#000000" />
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label><?php _e('Link color', 'mementor_newsletter_popup'); ?></label>
            </div>
            <div class="col-sm-9">
              <input class="form-control" value="<?php echo get_option('mementor_newsletter_popup_link_color'); ?>" name="mementor_newsletter_popup_link_color" type="text" placeholder="#000000" />
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label><?php _e('Link background', 'mementor_newsletter_popup'); ?></label>
            </div>
            <div class="col-sm-9">
              <input class="form-control" value="<?php echo get_option('mementor_newsletter_popup_link_background'); ?>" name="mementor_newsletter_popup_link_background" type="text" placeholder="rgba(255, 255, 255, 0)" />
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label><?php _e('Footnote', 'mementor_newsletter_popup'); ?></label>
            </div>
            <div class="col-sm-9">
              <textarea class="form-control" name="mementor_newsletter_popup_footnote" rows="5" placeholder="Please tell the visitor about your privacy policy."><?php echo stripslashes(base64_decode(get_option('mementor_newsletter_popup_footnote'))); ?></textarea>
            </div>
          </div>
          <?php wp_nonce_field('mementor_newsletter_popup_nonce', 'mementor_newsletter_popup_nonce'); ?>
          <div class="row">
            <div class="col-sm-12">
              <input type="submit" name="mementor_newsletter_popup_submit" class="button" value="<?php _e('Save Changes', 'mementor_newsletter_popup'); ?>" />
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="preview">
            <div class="mementor-newsletter-popup">
              <div class="newsletter-container">
                <div class="newsletter-row">
                  <div class="media" style="background-image: url(<?php echo get_option('mementor_newsletter_popup_image'); ?>);">
                    <a class="no-thank-you" <?php echo (get_option('mementor_newsletter_popup_link_color')) ? 'style="background-color:'.get_option('mementor_newsletter_popup_link_background').';color: '.get_option('mementor_newsletter_popup_link_color').'"' : ''; ?>><?php _e("Please don't ask me again", 'mementor_newsletter_popup'); ?></a>
                  </div>
                  <div class="form-content">
                    <h2><?php echo (get_option('mementor_newsletter_popup_title')) ? get_option('mementor_newsletter_popup_title') : __('Preview', 'mementor_newsletter_popup'); ?></h2>
                    <p><?php echo (get_option('mementor_newsletter_popup_content')) ? stripslashes(base64_decode(get_option('mementor_newsletter_popup_content'))) : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'; ?></p>
                    <input name="<?php echo get_option('mementor_newsletter_popup_email'); ?>" type="email" placeholder="<?php _e("E-mail", 'mementor_newsletter_popup'); ?>" />
                    <input name="<?php echo get_option('mementor_newsletter_popup_firstname'); ?>" type="text" placeholder="<?php _e("Firstname", 'mementor_newsletter_popup'); ?>" />
                    <input name="<?php echo get_option('mementor_newsletter_popup_lastname'); ?>" type="text" placeholder="<?php _e("Lastname", 'mementor_newsletter_popup'); ?>" />
                    <input type="submit" value="<? _e('Yes please!', 'mementor_newsletter_popup'); ?>" disabled <?php echo (get_option('mementor_newsletter_popup_button_color')) ? 'style="background-color: '.get_option('mementor_newsletter_popup_button_color').'"' : ''; ?>/>
                    <?php echo (get_option('mementor_newsletter_popup_footnote')) ? '<small>'.stripslashes(base64_decode(get_option('mementor_newsletter_popup_footnote'))).'</small>' : ''; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
