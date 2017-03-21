<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/models/Model_app.php';

// extend Model app instead of CI_Model
// Dont worry, Model_app is a derived class of CI_Model
class User_model extends Model_app {
    // specify table's name, must be same with database's table
    protected $table = 'users';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    } 

}
