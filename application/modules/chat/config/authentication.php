<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * User table
 *
 * This table should contain the username and password fields specified below. It can contain any other fields, such as "first_name"
 */
$config['authentication']['user_table'] = 'users';


/**
 * User identifier field
 *
 * This field will usually be "id" or "user_id" but you could use something like "username"
 */
$config['authentication']['identifier_field'] = 'id';


/**
 * Username field
 *
 * This field can be named what ever you like, an example would be "email"
 */
$config['authentication']['username_field'] = 'uname';

/**
 * Email field
 *
 * This field can be named what ever you like, an example would be "email"
 */
$config['authentication']['email_field'] = 'uname';


/**
 * Password field
 */
$config['authentication']['password_field'] = 'pword';


/* End of file authentication.php */
/* Location: ./application/config/authentication.php */