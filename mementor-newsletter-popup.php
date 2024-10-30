<?php
/**
* Plugin Name: Mementor Newsletter Popup
* Plugin URI: https://www.mementor.no/
* Description: A simple and responsive newsletter popup. This plugin will get you up and running with a nice looking popup within minutes. Allows your visitor to signup to services like Mailchimp or any other newsletter service.
* Version: 1.0.6
* Author: Mementor AS
* Author URI: https://www.mementor.no/
* Text Domain: mementor_newsletter_popup
* Domain Path: /lang/
*/
if (!defined('ABSPATH')) {
  exit;
}
if (!class_exists('mementor_newsletter_popup_main')) {
  class mementor_newsletter_popup_main {
    public $mementor_newsletter_popup_version = '1.0.6';
    protected static $mementor_newsletter_popup_instance = null;
    public static function mementor_newsletter_popup_main_instance() {
      if (null == self::$mementor_newsletter_popup_instance) {
        self::$mementor_newsletter_popup_instance = new mementor_newsletter_popup_main();
      }
      return self::$mementor_newsletter_popup_instance;
    }
    public function __construct() {
      $this->mementor_newsletter_popup_language();
      add_action('admin_head', array($this, 'mementor_newsletter_popup_admin_script_files'));
      add_action('admin_head', array($this, 'mementor_newsletter_popup_admin_script_files'));
      add_action('wp_enqueue_scripts', array($this, 'mementor_newsletter_popup_script_files'));
      add_action('wp_footer', array($this, 'mementor_newsletter_popup_html'));
      $this->mementor_newsletter_popup_includes();
  	}
    public function mementor_newsletter_popup_language() {
      load_plugin_textdomain('mementor_newsletter_popup', false, basename(dirname(__FILE__)).'/lang');
    }

    public function mementor_newsletter_popup_includes() {
      require_once(dirname(__FILE__).'/inc/admin.php');
    }
    public function mementor_newsletter_popup_admin_script_files() {
      if (!wp_style_is('mementor_settings', $list = 'enqueued')) {
        wp_enqueue_style('mementor_settings', untrailingslashit(plugins_url('/', __FILE__)).'/assets/css/settings.css', false, $this->mementor_newsletter_popup_version);
      }
      wp_enqueue_style('mementor_newsletter_popup_admin', untrailingslashit(plugins_url('/', __FILE__)).'/assets/css/admin.css', false, $this->mementor_newsletter_popup_version);
      wp_enqueue_style('mementor_newsletter_popup_style', untrailingslashit(plugins_url('/', __FILE__)).'/assets/css/style.css', false, $this->mementor_newsletter_popup_version);
      wp_enqueue_script('mementor_newsletter_popup_admin', untrailingslashit(plugins_url('/', __FILE__)).'/assets/js/admin.js', array('jquery'), $this->mementor_newsletter_popup_version, true);
      wp_enqueue_media();
    }
    public function mementor_newsletter_popup_script_files() {
      wp_enqueue_style('mementor_newsletter_popup_style', untrailingslashit(plugins_url('/', __FILE__)).'/assets/css/style.css', false, $this->mementor_newsletter_popup_version);
      wp_enqueue_script('mementor_newsletter_popup_main', untrailingslashit(plugins_url('/', __FILE__)).'/assets/js/main.js', array('jquery'), $this->mementor_newsletter_popup_version, true);
      wp_enqueue_media();
    }
    public function mementor_newsletter_popup_html() {
      $html = '<div class="mementor-newsletter-popup">
        <div class="newsletter-container">
          <div class="newsletter-row">
            <div class="media" style="background-image: url('.get_option('mementor_newsletter_popup_image').');">
              <a class="no-thank-you"';
                $html .= (get_option('mementor_newsletter_popup_link_color')) ? 'style="background-color:'.get_option('mementor_newsletter_popup_link_background').';color:'.get_option('mementor_newsletter_popup_link_color').'"' : "";
                $html .= '>'.__("Please don't ask me again", 'mementor_newsletter_popup').'</a>
            </div>
            <div class="form-content">
              <h2>';
              $html .= (get_option('mementor_newsletter_popup_title')) ? get_option('mementor_newsletter_popup_title') : __('Preview', 'mementor_newsletter_popup');
              $html .= '</h2>
              <p>';
              $html .= (get_option('mementor_newsletter_popup_content')) ? stripslashes(base64_decode(get_option('mementor_newsletter_popup_content'))) : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
              $html .= '</p>
              <form method="post" action="'.get_option('mementor_newsletter_popup_form_action').'">
                <input name="'.get_option('mementor_newsletter_popup_email').'" type="email" placeholder="'.__("E-mail", 'mementor_newsletter_popup').'" />
                <input name="'.get_option('mementor_newsletter_popup_firstname').'" type="text" placeholder="'.__("Firstname", 'mementor_newsletter_popup').'" />
                <input name="'.get_option('mementor_newsletter_popup_lastname').'" type="text" placeholder="'.__("Lastname", 'mementor_newsletter_popup').'" />
                <input type="submit" value="'.__('Yes please!', 'mementor_newsletter_popup').'"';
                $html .= (get_option('mementor_newsletter_popup_button_color')) ? ' style="background-color: '.get_option('mementor_newsletter_popup_button_color').'"' : '';
                $html .= ' />';
                $html .= (get_option('mementor_newsletter_popup_footnote')) ? '<small>'.stripslashes(base64_decode(get_option('mementor_newsletter_popup_footnote'))).'</small>' : '';
              $html .= '</form>
              <a class="no-thank-you mobile-only"';
                $html .= (get_option('mementor_newsletter_popup_link_color')) ? 'style="background-color:'.get_option('mementor_newsletter_popup_link_background').';color:'.get_option('mementor_newsletter_popup_link_color').'"' : "";
                $html .= '>'.__("Please don't ask me again", 'mementor_newsletter_popup').'</a>
            </div>
          </div>
        </div>
      </div>';
      echo $html;
    }
  }
  function mementor_newsletter_popup_main_instance() {
  	return mementor_newsletter_popup_main::mementor_newsletter_popup_main_instance();
  }
  mementor_newsletter_popup_main_instance();
}
