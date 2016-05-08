<?php
/*==============================================================================
Plugin Name: utopia51/Kill Generator Metatag in WordPress Page Header
Author: David Pankhurst
Version: 1.00
Author URI: http://ActiveBlogging.com/
Description: Removes the generator metatag showing the WordPress version from your theme
Plugin URI: http://activeblogging.com/info/wordpress-plugin-how-to-kill-version-generator-metatag
==============================================================================*/
static $utopia51_once=0;
if ($utopia51_once++<1)
  remove_action('wp_head','wp_generator');
//------------------------------------------------------------------------------
?>