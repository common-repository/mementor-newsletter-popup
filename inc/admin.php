<?php
if (!defined('ABSPATH')) {
	exit;
}
if (!class_exists('mementor_newsletter_popup_admin')) {
  class mementor_newsletter_popup_admin {
    protected static $mementor_newsletter_popup_admin_instance = null;
    public static function mementor_newsletter_popup_admin_instance() {
      if (null == self::$mementor_newsletter_popup_admin_instance) {
        self::$mementor_newsletter_popup_admin_instance = new mementor_newsletter_popup_admin();
      }
      return self::$mementor_newsletter_popup_admin_instance;
    }
    public function __construct() {
      add_action('admin_menu', array($this, 'mementor_newsletter_popup_admin_menu'), 200);
      add_action('admin_menu', array($this, 'mementor_newsletter_popup_settings_menu'), 200);
    }
    public function mementor_newsletter_popup_admin_menu() {
			if (empty($GLOBALS['admin_page_hooks']['mementor'])) {
				add_menu_page(__('Mementor Newsletter Popup', 'mementor_newsletter_popup'), __('Mementor', 'mementor_newsletter_popup'), 'manage_options', 'mementor_newsletter_popup', null, null, 2000);
			}
    }
    public function mementor_newsletter_popup_settings_menu() {
      add_submenu_page('mementor', __('Mementor Newsletter Popup', 'mementor_newsletter_popup'),  __('Newsletter Popup', 'mementor_newsletter_popup') , 'manage_options', 'mementor_newsletter_popup', array($this, 'mementor_newsletter_popup_pretty_admin_page'));
    }
    public function mementor_newsletter_popup_pretty_admin_page() {
      require_once(plugin_dir_path(__FILE__).'/settings.php');
    }
  }
  function mementor_newsletter_popup_admin_instance() {
    return mementor_newsletter_popup_admin::mementor_newsletter_popup_admin_instance();
  }
  mementor_newsletter_popup_admin_instance();
}
