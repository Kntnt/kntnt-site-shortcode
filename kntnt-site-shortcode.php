<?php

/**
 * Plugin main file.
 *
 * @wordpress-plugin
 * Plugin Name:       Kntnt Site Shortcodes
 * Plugin URI:        https://github.com/TBarregren/kntnt-site-shortcode
 * Description:       Provides shortcodes that ouput the title, tagline, URL and WordPress URL of the site.
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.se/
 * License:           GPLv3
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       kntnt-site
 * Domain Path:       /languages
 */

namespace Kntnt\Site_Shortcode;

defined( 'WPINC' ) && new Plugin();

final class Plugin {

  public function __construct() {
    load_plugin_textdomain( 'kntnt-site-shortcode', false, 'languages' );
    add_action( 'plugins_loaded', [ $this, 'run' ] );
  }
  
  public function run() {
    add_shortcode('site-title', [$this, 'site_title']);
    add_shortcode('site-tagline', [$this, 'site_tagline']);
    add_shortcode('site-url', [$this, 'site_url']);
    add_shortcode('site-wp-url', [$this, 'site_wp_url']);
  }
  
  public function site_title($atts, $content, $tag) {
    return get_option('blogname');
  }

  public function site_tagline($atts, $content, $tag) {
    return get_option('blogdescription');
  }

  public function site_url($atts, $content, $tag) {
    return home_url();
  }

  public function site_wp_url($atts, $content, $tag) {
    return site_url();
  }

}

