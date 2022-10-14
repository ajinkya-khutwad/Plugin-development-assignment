<?php
/*
Plugin Name: My First plugin
Plugin URI: http://wordpress1.to/how-to-begin-writing-your-first-wordpress-plugin
Description: This is my first WordPress Plugin
Author: Ajinkya Khutwad
Author URI: http://wordpress1.to
Version: 1.0
*/
$mfwp_options = get_option('mfwp_settings');
require('includes/data-display.php');
require('includes/scripts.php');
require('includes/data-processing.php');
require('includes/admin-page.php');