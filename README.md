# Intro

This is a repositories pattern for Codeigniter's Model. All the reuseable function are availables inside both base and extended model classes which can call directly from extended model for particular database's table without re-writing the same logic for querying. 


# Requirements

 - **PHP 5.6** and **above** ( no backward compatibility as the code were used `...args` )
 - **Codeigniter** — For best outcome, used the latest and stable version

# Installation

Installion are quite easy as following :

 1. Download latest release from `release` tab.
 2. After extracting the archive, it should have 2 folders inside `applications` which are `models` and `traits`
 3. Copy all the files inside `models` folder and paste it in your project's `models` folder.
 4. Create `traits` folder inside `application` folder from your project directory.
 5. Copy the files inside `traits` folder from downloaded directory and pasted it in your project's `traits` folder.
 6. Finish!

# First Setup

Must be noted that, reuseable code already defined and created inside main model file which is extended from `CI_Model` directly. In order to make its code usable in newly created model's file, we must extend and take advantages of it. The rules is simple :

1. When creating new model's file, just extend the base model. Let's create `User_model.php` file inside `models` folder :

```Php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// requiring base class
require APPPATH.'/models/Model_app.php';

// extend the base class
class User_model extends Model_app {

	// create protected property, this mainly used for
    // table operation. So, be sure to put database table's name
    // for each model
    protected $table = 'users';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    } 
    
    // at here you can write your own query as usual
    // for completed built-in query had made and availables 
    // for you to use it, see #available_function below

}
```

2. Finish!. Simple enough right?


# Availables Function/Options
