<?php

/*
*
* Plugin Name: Ex Employee list
* Plugin URI: https://nextevoit.com/
* Description: "Ex Employee List" empowers your WordPress site with a customizable employee directory. Effortlessly display team members, add custom fields, and use shortcodes for seamless integration. Elevate your organization's online presence with this user-friendly plugin, presenting your team professionally.
* Version: 1.0.0
* Requires at least: 5.2
* Requires PHP: 7.2
* Author: Execute Rajib
* Author URI: https://executerajib.com/
* License: GPL-2.0-only
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: ex-employee-list
*
*/

defined('ABSPATH') or die('No access permission to direct folder or file');
define('PLUGIN_DIR', WP_PLUGIN_DIR."/ex-employee-list/");
define('PLUGIN_URL', WP_PLUGIN_URL."/ex-employee-list/");
define('PLUGIN_FILE', WP_PLUGIN_DIR."/ex-employee-list/ex-employee-list.php");
// Require Main Class file 
require_once plugin_dir_path( __FILE__ ). "/classes/class-employee-list.php";


$Employee = new ClassEmployeeList();
