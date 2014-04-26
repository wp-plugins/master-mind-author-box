<?php

/*
  Plugin Name: Author Box
  Plugin URI: http://wordpress.org/support/profile/viky081/
  Description: Add the author box like adding the author information on each category and post.
  Version: 1.0
  Author: viky081
  Author URI: http://wordpress.org/support/profile/viky081
 */

require_once('inc/admin.php');

class AvatarManager {

    public function __construct() {
        if (isset($_POST["reset_font"])) {
            add_action('admin_init', array($this, 'avatar_manager_font_settings_reset_options'));
        }
        if (isset($_POST["reset_general"])) {
            add_action('admin_init', array($this, 'avatar_manager_general_settings_reset_options'));
        }
    }

    public static function register_setting_avatar_manager() {
        /* Register General Settings */
        register_setting('avatar_manager', 'avatarmanager_on');
        register_setting('avatar_manager', 'author_caption_message');
        register_setting('avatar_manager', 'enable_avatar');
        register_setting('avatar_manager', 'display_contact_info');
        register_setting('avatar_manager', 'author_box_width');
        register_setting('avatar_manager', 'author_box_height');
        register_setting('avatar_manager', 'author_box_bg');
        register_setting('avatar_manager', 'contact_info_caption');
        register_setting('avatar_manager', 'author_box_position');
        register_setting('avatar_manager', 'author_box_info_position');
        register_setting('author_box_font_settings', 'font_default');
        register_setting('author_box_font_settings', 'font_family');
        register_setting('author_box_font_settings', 'font_size');
        register_setting('author_box_font_settings', 'font_style');
        register_setting('author_box_font_settings', 'font_weight');
        register_setting('author_box_font_settings', 'font_color');
        register_setting('author_box_font_settings', 'link_color');
        register_setting('avatar_manager', 'display_options');
        register_setting('avatar_manager', 'avatar_image_width');
        register_setting('avatar_manager', 'avatar_image_height');
    }

    public static function add_avatar_manager_menu() {
        add_options_page('Author Box', 'Author Box', 'manage_options', 'author_box', 'avatar_manager_admin_pages');
    }

    public static function avatar_manager_general_settings_reset_options() {
        delete_option('avatarmanager_on');
        delete_option('author_caption_message');
        delete_option('enable_avatar');
        delete_option('display_contact_info');
        delete_option('author_box_width');
        delete_option('author_box_height');
        delete_option('author_box_bg');
        delete_option('contact_info_caption');
        delete_option('avatar_image_width');
        delete_option('avatar_image_height');
        delete_option('display_options');
        delete_option('author_box_position');
        add_option('author_box_position', '1');
        add_option('contact_info_caption', 'Contact Info');
        delete_option('author_box_info_position');
        add_option('avatar_image_width', '15');
        add_option('avatar_image_height', '15');
        add_option('author_box_info_position', '1');
        add_option('author_caption_message', 'written by');
        add_option('enable_avatar', '1');
        add_option('display_options', '2');
        add_option('display_contact_info', '1');
        add_option('author_box_width', '150');
        add_option('author_box_height', '150');
        add_option('author_box_bg', 'fff');
    }

    public static function avatar_manager_font_settings_reset_options() {
        delete_option('font_family');
        delete_option('font_style');
        delete_option('font_weight');
        delete_option('font_size');
        delete_option('font_color');
        delete_option('link_color');
        delete_option('font_default');
        add_option('link_color', 'FF143C');
        add_option('font_default', '1');
        add_option('font_style', 'normal');
        add_option('font_weight', 'normal');
        add_option('font_family', 'Times New Roman');
        add_option('font_color', '3b5996');
        add_option('font_size', '14');
    }

    public static function author_box_main($content) {
        ob_start();
        if (get_option('avatarmanager_on') != '1') {
            if (!is_home()) {
                if (is_single()) {
                    include('inc/authorbox-include.php');
                } else if (!is_category()) {
                    include('inc/authorbox-include.php');
                }
            }
            $newboxcontent = ob_get_clean();
            if (get_option('display_options') == '1') {
                return $newboxcontent . $content;
            }
            if (get_option('display_options') == '2') {
                return $content . $newboxcontent;
            }
            //this is to output the page title and content for a 'page for posts' page as set under  'settings' - 'reading'
        }
    }

    public static function author_box_main_function($content) {
        ob_start();
        if (get_option('avatarmanager_on') != '1') {
            if (!is_single()) {
                include('inc/authorbox-include.php');
            } else if (is_category()) {
                include('inc/authorbox-include.php');
            }
            $newboxcontent = ob_get_clean();
            if (get_option('display_options') == '1') {
                return $newboxcontent . $content;
            }
            if (get_option('display_options') == '2') {
                return $content . $newboxcontent;
            }
            //this is to output the page title and content for a 'page for posts' page as set under  'settings' - 'reading'
        }
    }

}

new AvatarManager();
add_action('admin_init', array('AvatarManager', 'register_setting_avatar_manager'));
add_filter('the_content', array('AvatarManager', 'author_box_main'));
add_filter('the_excerpt', array('AvatarManager', 'author_box_main_function'));
register_activation_hook(__FILE__, array('AvatarManager', 'avatar_manager_general_settings_reset_options'));
register_activation_hook(__FILE__, array('AvatarManager', 'avatar_manager_font_settings_reset_options'));
add_action('admin_menu', array('AvatarManager', 'add_avatar_manager_menu'));
?>