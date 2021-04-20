<?php

/*
  Plugin Name: Eagle Registration
  Plugin URI: not available
  Description: This plugin implements a registration
  Author: Claudio Prandoni
  Author URI: not available
  Version: 1.0
  License: GPL2
  Copyright 2014  Claudio Prandoni

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

function elc_process_register_request() {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $email = $_REQUEST['email'];
	$user = wp_create_user( $username, $password, $email );
    if (is_wp_error($user)){
          echo $user->get_error_code();;
    }
    else{
        echo $user;
    }
    exit();
}

add_action('wp_ajax_elc_process_register_request', 'elc_process_register_request');
add_action('wp_ajax_nopriv_elc_process_register_request', 'elc_process_register_request');
?>