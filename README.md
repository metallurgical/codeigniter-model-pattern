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

1. [insert](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#1-insert)
2. [insert_batch]()
3. [delete]()
4. [clear]()
5. [truncate]()
6. [getLastData]()
7. [get_all_rows]()
8. [get_specified_row]()
9. [update]()
10. [update_batch]()
11. [replace]()
12. [max]()
13. [min]()
14. [avg]()
16. [sum]()
17. [count]()
18. [where]()
19. [or_where]()
20. [having]()
21. [or_having]()
22. [where_in]()
23. [or_where_in]()
24. [where_not_in]()
25. [or_where_not_in]()
26. [like]()
27. [like_before]()
28. [like_after]()
29. [or_like]()
30. [or_like_before]()
31. [or_like_after]()
32. [not_like]()
33. [not_like_before]()
34. [not_like_after]()
35. [or_not_like]()
36. [or_not_like_before]()
37. [or_not_like_after]()
38. [display_message]()
48. Will coming more soon...

# Usage Example

We'll used extended/child class instead of calling base class directly. In this case is our `User_model.php`. This is only an example, you can have your own model that extend the base class.

### a) insert( $arrayData [,$table] )
Insert data into table

 **Parameters**
 
 1. `$arrayData` = array REQUIRED. Key(column's name) value(column's value) paired array
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.

**Return**

If success will return last inserted ID, FALSE otherwise 

```Php
// insert into users table without specify table's name
$arrayData = [ 'name' => 'norlihazmey', 'email' => 'norlihazmey89@gmail.com' ];
$result = $this->user_model->insert( $arrayData );

 -----------------------or---------------------------------
 
// insert into users table with table's name
$arrayData = [ 'name' => 'norlihazmey', 'email' => 'norlihazmey89@gmail.com' ];
$table = 'users_contact';
$result = $this->user_model->insert( $arrayData, $table );
```


### b) insert_batch( $arrayData [,$table] )
Insert data into table batch by batch

 **Parameters**
 
 1. `$arrayData` = array REQUIRED. Collection of Key(column's name) value(column's value) paired array
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.

**Return**

If success will return TRUE, FALSE otherwise 

```Php
// insert into users table without specify table's name
$arrayData = array(
  array(
  	'name' => 'Norlihazmey',
  	'email' => 'norlihazmey89@gmail.com'
  ),
  array(
  	'name' => 'Metallurgical',
  	'email' => 'norlihazmey89@yahoo.com'
  )
);
$result = $this->user_model->insert_batch( $arrayData );

 -----------------------or---------------------------------
 
// insert into users table with table's name
$table = 'users_contact';
$result = $this->user_model->insert_batch( $arrayData, $table );
```


### c) delete( $where [,$table] )
Delete data from table either single or multiple table

 **Parameters**
 
 1. `$where` = array REQUIRED. Key(column's name) value(column's value) paired array
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.

**Return**

Return 1 if success, 2 if no delete occured, 3 if delete operation can't be done.

```Php
// Single deleted 
$where = array('id' => 1);
$this->user_model->delete( $where )

 -----------------------or---------------------------------
 
// multiple deleted 
$where = array('id' => 1);
$table = array('users','users_booking','users_history');
$this->user_model->delete( $where, $table )
```

### d) clear( [$table] )
Will empty the data inside database's table. Same like @truncate method except this use DELETE keyword

 **Parameters**
 
 1. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.

**Return**

If success return TRUE, FALSE otherwise

```Php
// empty without table's name
$this->user_model->clear();

 -----------------------or---------------------------------
 
// empty with table's name
$table ='users_contact';
$this->user_model->clear( $table );
```

### e) truncate( [$table] )
Will empty the data inside database's table. Same like @clear method except this use TRUNCATE keyword

 **Parameters**
 
 1. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.

**Return**

If success return TRUE, FALSE otherwise

```Php
// empty without table's name
$this->user_model->truncate();

 -----------------------or---------------------------------
 
// empty with table's name
$table ='users_contact';
$this->user_model->truncate( $table );
```

### f) getLastData( $fieldToOrder [, $where, $fieldToSelect, $table] )
Get the last data from table

 **Parameters**
 
 1. `$fieldToOrder` = string REQUIRED. Which columns to make ordering.
 2. `$where` = string|array OPTIONAL. sql string or key-value paired array.
 2. `$fieldToSelect` = string|array OPTIONAL. Columns to select. Select all column if not specified.
 3. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.

**Return**

Single array key-value paired if found, EMPTY otherwise

```Php
// get the last data and include all column desc by id 
$fieldToOrder = 'id';
$this->model_app->getLastData( $fieldToOrder );

 -----------------------or---------------------------------
 
// get the last data and select only name, email column desc by id 
$table ='users_contact';
$fieldToOrder = 'id';
$fieldToSelect = 'name, email';
$this->model_app->getLastData( $fieldToOrder, $field, $table );

 -----------------------or---------------------------------
 
// get the last data using condition column desc by id 
$fieldToOrder = 'id';
$where = ['email' => 'norlihazmey89@gmail.com' ];
$this->model_app->getLastData( $fieldToOrder, $where );
```

### g) get_all_rows( [ $where, $fields, $table, $join, $orderBy, $groupBy, $limit  ] )
Get data more than one rows from database's table. This method accept various sql keyword to perform any database operation. You can either use all where, join, like, family etc that exist on codeigniter's quiry builder.

 **Parameters**
 
 1. `$fieldToOrder` = string REQUIRED. Which columns to make ordering.
 2. `$where` = string|array OPTIONAL. sql string or key-value paired array.
 2. `$fieldToSelect` = string|array OPTIONAL. Columns to select. Select all column if not specified.
 3. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.

**Return**

Single array key-value paired if found, EMPTY otherwise

```Php
// get the last data and include all column desc by id 
$fieldToOrder = 'id';
$this->model_app->getLastData( $fieldToOrder );

 -----------------------or---------------------------------
 
// get the last data and select only name, email column desc by id 
$table ='users_contact';
$fieldToOrder = 'id';
$fieldToSelect = 'name, email';
$this->model_app->getLastData( $fieldToOrder, $field, $table );

 -----------------------or---------------------------------
 
// get the last data using condition column desc by id 
$fieldToOrder = 'id';
$where = ['email' => 'norlihazmey89@gmail.com' ];
$this->model_app->getLastData( $fieldToOrder, $where );
```

















