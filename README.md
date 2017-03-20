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
2. [insert_batch](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#b-insert_batch-arraydata-table-)
3. [delete](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#c-delete-where-table-)
4. [clear](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#d-clear-table-)
5. [truncate](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#e-truncate-table-)
6. [get_last_data](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#f-get_last_data-fieldtoorder--where-fieldtoselect-table-)
7. [get_all_rows](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#g-get_all_rows--where-fields-table-join-orderby-groupby-limit---)
8. [get_specified_row](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#h-get_specified_row--where-fields-table-join-orderby-groupby-limit--)
9. [update](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#i-update-columntoupdate-usingcondition--tabletoupdate--)
10. [update_batch](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#j-update_batch-columntoupdate-usingcondition--tabletoupdate--)
11. [replace](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#k-replace-data--table--)
12. [max](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#l-max-fields--where-table-join--)
13. [min](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#m-min-fields--where-table-join--)
14. [avg](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#n-avg-fields--where-table-join--)
16. [sum](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#o-sum-fields--where-table-join--)
17. [count](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#p-count--where-table-join--)
18. [where](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#q-where-arrvalue--table-join--)
19. [or_where](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#r-or_where-arrvalue--table-join--)
20. [having](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#s-having-arrvalue--table-join--)
21. [or_having](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#t-or_having-arrvalue--table-join--)
22. [where_in](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#u-where_in-arrvalue--table-join--)
23. [or_where_in](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#v-or_where_in-arrvalue--table-join--)
24. [where_not_in](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#w-where_not_in-arrvalue--table-join--)
25. [or_where_not_in](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#x-or_where_not_in-arrvalue--table-join--)
26. [like](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#y-like-arrvalue--table-join--)
27. [like_before](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#z-like_before-arrvalue--table-join--)
28. [like_after](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#aa-like_after-arrvalue--table-join--)
29. [or_like](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#ab-or_like-arrvalue--table-join--)
30. [or_like_before](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#ac-or_like_before-arrvalue--table-join--)
31. [or_like_after](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#ad-or_like_after-arrvalue--table-join--)
32. [not_like](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#ae-not_like-arrvalue--table-join--)
33. [not_like_before](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#af-not_like_before-arrvalue--table-join--)
34. [not_like_after](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#ag-not_like_after-arrvalue--table-join--)
35. [or_not_like](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#ah-or_not_like-arrvalue--table-join--)
36. [or_not_like_before](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#ai-or_not_like_before-arrvalue--table-join--)
37. [or_not_like_after](https://github.com/metallurgical/codeigniter-model-pattern/blob/master/README.md#aj-or_not_like_after-arrvalue--table-join--)
38. Will coming more soon...

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

### f) get_last_data( $fieldToOrder [, $where, $fieldToSelect, $table] )
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
$this->user_model->get_last_data( $fieldToOrder );

 -----------------------or---------------------------------
 
// get the last data and select only name, email column desc by id 
$table ='users_contact';
$fieldToOrder = 'id';
$fieldToSelect = 'name, email';
$this->user_model->get_last_data( $fieldToOrder, $field, $table );

 -----------------------or---------------------------------
 
// get the last data using condition column desc by id 
$fieldToOrder = 'id';
$where = ['email' => 'norlihazmey89@gmail.com' ];
$this->user_model->get_last_data( $fieldToOrder, $where );
```

### g) get_all_rows( [ $where, $fields, $table, $join, $orderBy, $groupBy, $limit  ] )
Get data more than one rows from database's table. This method accept various sql keyword to perform any database operation. You can either use all where, join, like, family etc that exist on codeigniter's quiry builder.

 **Parameters**
 
 1. `$where` = array OPTIONAL. Perform various where condition on single query. Availables where condition can be used are:
    - where :
      - `array( 'where' => [ 'id !=' => 1, 'email =' => 'emi@emi.com' ] )`
    - where_in
      - `array( 'where_in' => [ 'id'=> [1, 2], 'email' => ['emi@emi.com'] ] )`
    - or_where_in
      - `array( 'or_where_in' => [ 'id'=> [1, 2], 'email' => ['emi@emi.com'] ] )`
    - where_not_in
      - `array( 'where_not_in' => [ 'id'=> [1, 2], 'email' => ['emi@emi.com'] ] )`
    - or_where_not_in
      - `array( 'or_where_not_in' => [ 'id'=> [1, 2], 'email' => ['emi@emi.com'] ] )`
    - or_where
      - `array( 'or_where' => [ 'id !=' => 1, 'email =' => 'emi@emi.com' ] )`
    - having
      - `array( 'having' => [ 'id !=' => 1, 'email =' => 'emi@emi.com' ] )`
    - or_having
      - `array( 'or_having' => [ 'id !=' => 1, 'email =' => 'emi@emi.com' ] )`
    - like
      - `array( 'like' => [ 'name' => 'emi', 'email' => 'emi@emi.com' ] )`
    - like_before
      - `array( 'like_before' => [ 'name' => 'emi', 'email' => 'emi@emi.com' ] )`
    - like_after
      - `array( 'like_after' => [ 'name' => 'emi', 'email' => 'emi@emi.com' ] )`
    - or_like
      - `array( 'or_like' => [ 'name' => 'emi', 'email' => 'emi@emi.com' ] )`
    - or_like_before
      - `array( 'or_like_before' => [ 'name' => 'emi', 'email' => 'emi@emi.com' ] )`
    - or_like_after
      - `array( 'or_like_after' => [ 'name' => 'emi', 'email' => 'emi@emi.com' ] )`
    - not_like
      - `array( 'not_like' => [ 'name' => 'emi', 'email' => 'emi@emi.com' ] )`
    - not_like_before
      - `array( 'not_like_before' => [ 'name' => 'emi', 'email' => 'emi@emi.com' ] )`
    - not_like_after
      - `array( 'not_like_after' => [ 'name' => 'emi', 'email' => 'emi@emi.com' ] )`
    - or_not_like
      - `array( 'or_not_like' => [ 'name' => 'emi', 'email' => 'emi@emi.com' ] )`
    - or_not_like_before
      - `array( 'or_not_like_before' => [ 'name' => 'emi', 'email' => 'emi@emi.com' ] )`
    - or_not_like_after
      - `array( 'or_not_like_after' => [ 'name' => 'emi', 'email' => 'emi@emi.com' ] )`
    
 2. `$fields` = string|array OPTIONAL. sql string or key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL.  key value paired array. Available join can be used are :
    - left
      - `array('left' => [ 'users_groups' => 'users.id = users_groups.user_id',...more ] )`
    - right
      - `array('right' => [ 'users_groups' => 'users.id = users_groups.user_id',...more ] )`
    - left outer
      - `array('left outer' => [ 'users_groups' => 'users.id = users_groups.user_id',...more ] )`
    - right outer
      - `array('right outer' => [ 'users_groups' => 'users.id = users_groups.user_id',...more ] )`
    - join
      - `array('join' => [ 'users_groups' => 'users.id = users_groups.user_id',...more ] )`
    - outer
      - `array('outer' => [ 'users_groups' => 'users.id = users_groups.user_id',...more ] )`
    - inner
      - `array('inner' => [ 'users_groups' => 'users.id = users_groups.user_id',...more ] )`
 4. `$orderBy` = string|array OPTIONAL. Which columns need to make ordering
 5. `$groupBy` = string|array OPTIOANL. Which columns need grouping
 6. `$limit` = string|array OPTIOANL. Set the limit or offset result set

**Return**

Array collection. Collection of dataset coming/fetching from database's table with one or more rows are returned

```Php
// Example 1 : Using 1st parameter = WHERE and LIKE condition
// Availables where condition can be used is, where, where_in, or_where_in, where_not_in, or_where_not_in,or_where, having, or_having, like, like_before, like_after, or_like, or_like_before, or_like_after, not_like, not_like_before, not_like_after, or_not_like, or_not_like_before, or_not_like_after
      
     $where = array(
            'where' => array('id !=' => 1, 'email =' => 'emi@emi.com' ),
            //'where_in' => array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] ),
            //'or_where_in' => array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] ),
            //'where_not_in' => array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] ),
            //'or_where_not_in' => array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] ),       
            //'or_where' => array('id !=' => 1, 'email =' => 'emi@emi.com' ),
            //'having' => array('id !=' => 1, 'email =' => 'emi@emi.com' ),
            //'or_having' => array('id !=' => 1, 'email =' => 'emi@emi.com' ),
            //'like' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
            //'like_before' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
            //'like_after' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
            //'or_like' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
            //'or_like_before' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
            //'or_like_after' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
            //'not_like' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
            //'not_like_before' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
            //'not_like_after' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
            //'or_not_like' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
            //'or_not_like_before' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
            //'or_not_like_after' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
          );
     $this->seat_model->get_all_rows($where); // without specified table name or
     $table = "users";
     $this->model_app->get_all_rows($where, false, $table);
      
-----------------------or---------------------------------


// Example 2 : Using 2nd paramter = Select all fields or certain fields
      $fields = 'name, email'; // using string or
      $fields = array( 'name','email'); // using index array if not provided, then select * is presumed
      $this->model_app->get_all_rows( false, $fields );
      
-----------------------or---------------------------------


// Example 3 : Using 3rd parameter = table name
      $this->seat_model->get_all_rows(); // this will select all the data inside user model's table if table did not provided OR
      $table = "users";
      $this->model_app->get_all_rows( false, false, $table);
     
-----------------------or---------------------------------


// Example 4 : Using 4th parameter = join single or multiple
// Available join are inner, left, right, left outer, right outer, join, outer, inner
       $join = array(
              // single table on particular join
                'join' => array( 'users_groups' => 'users.id = users_groups.user_id' ),
                'inner' => array( 'users_groups' => 'users.id = users_groups.user_id'),
                'left' => array( 'users_groups' => 'users.id = users_groups.user_id' ),
                'right' => array( 'users_groups' => 'users.id = users_groups.user_id'),
                'outer' => array( 'users_groups' => 'users.id = users_groups.user_id' ),
                'left outer' => array( 'users_groups' => 'users.id = users_groups.user_id'),
                'right outer' => array( 'users_groups' => 'users.id = users_groups.user_id' ),
             // multiple table on particular join
                 'join' => array( 
                             'groups' => 'users_groups.user_id = groups.id',
                             'users_groups' => 'users.id = users_groups.user_id' 
                         ),
                'inner' => array( 
                             'groups' => 'users_groups.user_id = groups.id',
                             'users_groups' => 'users.id = users_groups.user_id' 
                         ),
                'left' => array( 
                             'groups' => 'users_groups.user_id = groups.id',
                             'users_groups' => 'users.id = users_groups.user_id' 
                         ),
                'right' => array( 
                             'groups' => 'users_groups.user_id = groups.id',
                             'users_groups' => 'users.id = users_groups.user_id' 
                         ),
                'outer' => array( 
                             'groups' => 'users_groups.user_id = groups.id',
                             'users_groups' => 'users.id = users_groups.user_id' 
                         ),
                'left outer' => array( 
                             'groups' => 'users_groups.user_id = groups.id',
                             'users_groups' => 'users.id = users_groups.user_id' 
                         ),
                'right outer' => array( 
                             'groups' => 'users_groups.user_id = groups.id',
                             'users_groups' => 'users.id = users_groups.user_id' 
                         ),
                         
     );
     
-----------------------or---------------------------------


// Example 5 : Using 5th parameter = Order by result
      $orderBy = 'name asc, id desc'; // or 
      $orderBy = array( 'name' => 'asc', 'id' => 'desc' );
      $this->model_app->get_all_rows( false, false, false, false, $orderBy );
     
-----------------------or---------------------------------


// Example 6 : Using 6th parameter = group by result
      $groupBy = 'name'; // or $groupBy = array( 'name', 'id' );
      $this->model_app->get_all_rows( false, false, false, false, false, $groupBy );
     
-----------------------or---------------------------------


// Example 7 : Using 7th parameter = limit the result
     $limit = '20'; // limit only
     $limit = [10 => 20]; // limit and offset, key is a limit, values is an offset
     $this->model_app->get_all_rows( false, false, false, false, false, false, $limit );
```

### h) get_specified_row( [ $where, $fields, $table, $join, $orderBy, $groupBy, $limit ] )

Get ONLY one rows from database's table. This method accept various sql keyword to perform any database operation. You can either use all where, join, like, family etc that exist on codeigniter's quiry builder. 

 **Parameters**
 
 - All parameters inside @get_all_rows() method are availables here.

**Return**

Array key-valued paired which only returned single row data only. This method identical with **get_all_rows()** method except this method only returned one row data only.


### i) update( $columnToUpdate, $usingCondition [, $tableToUpdate ] )
Update data inside database's table

 **Parameters**
 
 1. `$columnToUpdate` = array REQUIRED. Key-value paired array.
 2. `$usingCondition` = string|array REQUIRED. sql string or key-value paired array.
 3. `$tableToUpdate` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.

**Return**

Return 1 if success, 2 if no delete occured, 3 if delete operation can't be done.

```Php
$columnToUpdate = array(
	array(
		'title' => 'My title',
		'name' => 'My Name',
		'date' => 'My date'
	)
);

$usingCondition = ['id' => 1'];
$this->user_model->update( $columnToUpdate, $usingCondition );
```


### j) update_batch( $columnToUpdate, $usingCondition [, $tableToUpdate ] )
Update data inside database's table

 **Parameters**
 
 1. `$columnToUpdate` = array REQUIRED. Key-value paired array.
 2. `$usingCondition` = string REQUIRED. 
 3. `$tableToUpdate` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.

**Return**

Return TRUE success, FALSE otherwise.

```Php
$columnToUpdate = array(
	array(
		'id' => '1', // will act as primary key
		'name' => 'My Name',
		'date' => 'My date'
	),
    array(
		'id' => '2', // will act as primary key
		'name' => 'My Name',
		'date' => 'My date'
	)
);

$usingCondition = 'id';
$this->user_model->update( $columnToUpdate, $usingCondition );
```

### k) replace( $data [, $table ] )
Replacing existing data into the new one. Usually used when mixed with DELETE and INSERT query at the same time.

 **Parameters**
 
 1. `$data` = array REQUIRED. Key-value paired array.
 3. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.

**Return**

Return TRUE success, FALSE otherwise.

```Php
// this will find the data with an ID 1, and replacing existing content with new provided content
$data = array(
	array(
		'id' => '1', // will act as primary key
		'name' => 'My Name',
		'date' => 'My date'
	)
);
$this->user_model->replace( $data );
```

### l) max( $fields [, $where, $table, $join ] )
Get maximun value from certain field/column

 **Parameters**
 
 1. `$fields` = string REQUIRED. Field/column's name
 2. `$where` = string|array OPTIONAL. Key-value paired array.
 3. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 4. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return single row result array, EMPTY otherwise

```Php
// without condition
$fields = 'quantity';
$result = $this->user_model->max( $fields );

-----------------------or------------------------

// with condition
$fields = 'quantity';
$where = ['age' => 50];
$result = $this->user_model->max( $fields, $where );

-----------------------or------------------------

// with table's name
$fields = 'quantity';
$where = ['age' => 50];
$table = 'users_contact';
$result = $this->user_model->max( $fields, $where, $table );
```

### m) min( $fields [, $where, $table, $join ] )
Get minumun value from certain field/column

 **Parameters**
 
 1. `$fields` = string REQUIRED. Field/column's name
 2. `$where` = string|array OPTIONAL. Key-value paired array.
 3. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 4. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return single row result array, EMPTY otherwise

```Php
// without condition
$fields = 'quantity';
$result = $this->user_model->min( $fields );

-----------------------or------------------------

// with condition
$fields = 'quantity';
$where = ['age' => 50];
$result = $this->user_model->min( $fields, $where );

-----------------------or------------------------

// with table's name
$fields = 'quantity';
$where = ['age' => 50];
$table = 'users_contact';
$result = $this->user_model->min( $fields, $where, $table );
```

### n) avg( $fields [, $where, $table, $join ] )
Get average value from certain field/column

 **Parameters**
 
 1. `$fields` = string REQUIRED. Field/column's name
 2. `$where` = string|array OPTIONAL. Key-value paired array.
 3. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 4. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return single row result array, EMPTY otherwise

```Php
// without condition
$fields = 'quantity';
$result = $this->user_model->avg( $fields );

-----------------------or------------------------

// with condition
$fields = 'quantity';
$where = ['age' => 50];
$result = $this->user_model->avg( $fields, $where );

-----------------------or------------------------

// with table's name
$fields = 'quantity';
$where = ['age' => 50];
$table = 'users_contact';
$result = $this->user_model->avg( $fields, $where, $table );
```

### o) sum( $fields [, $where, $table, $join ] )
Get sum of value from certain field/column

 **Parameters**
 
 1. `$fields` = string REQUIRED. Field/column's name
 2. `$where` = string|array OPTIONAL. Key-value paired array.
 3. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 4. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return single row result array, EMPTY otherwise

```Php
// without condition
$fields = 'quantity';
$result = $this->user_model->sum( $fields );

-----------------------or------------------------

// with condition
$fields = 'quantity';
$where = ['age' => 50];
$result = $this->user_model->sum( $fields, $where );

-----------------------or------------------------

// with table's name
$fields = 'quantity';
$where = ['age' => 50];
$table = 'users_contact';
$result = $this->user_model->sum( $fields, $where, $table );
```

### p) count( [ $where, $table, $join ] )
Get average value from certain field/column

 **Parameters** 
 
 1. `$where` = string|array OPTIONAL. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return integet number. 0 if no data found, 1 or > if found.

```Php
// without condition
$this->model_app->count();

-----------------------or------------------------

// with condition
$where = array('id' => 1);
$this->model_app->count( $where );

-----------------------or------------------------

// with table's name
$where = array('id' => 1);
$table = 'groups';
$this->model_app->count( $where, $table );
```

### q) where( $arrValue [, $table, $join ] )
Get result set of data with AND condition

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array('id !=' => 1, 'email =' => 'emi@emi.com' );
$this->user_model->where( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array('id !=' => 1, 'email =' => 'emi@emi.com' );
$table = 'users';
$this->user_model->where( $arrValue, $table );
```

### r) or_where( $arrValue [, $table, $join ] )
Get result set of data with OR condition

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array('id !=' => 1, 'email =' => 'emi@emi.com' );
$this->user_model->or_where( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array('id !=' => 1, 'email =' => 'emi@emi.com' );
$table = 'users';
$this->user_model->or_where( $arrValue, $table );
```

### s) having( $arrValue [, $table, $join ] )
Get result set of data with AND condition using having. Identical to @where method

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array('id !=' => 1, 'email =' => 'emi@emi.com' );
$this->user_model->having( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array('id !=' => 1, 'email =' => 'emi@emi.com' );
$table = 'users';
$this->user_model->having( $arrValue, $table );
```

### t) or_having( $arrValue [, $table, $join ] )
Get result set of data with OR condition using having. Identical to @or_where method

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array('id !=' => 1, 'email =' => 'emi@emi.com' );
$this->user_model->or_having( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array('id !=' => 1, 'email =' => 'emi@emi.com' );
$table = 'users';
$this->user_model->or_having( $arrValue, $table );
```

### u) where_in( $arrValue [, $table, $join ] )
Get result set of data with AND condition using where in which accept an array as value.

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] );
$this->user_model->or_having( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] );
$table = 'users';
$this->user_model->or_having( $arrValue, $table );
```

### v) or_where_in( $arrValue [, $table, $join ] )
Get result set of data with OR condition using where in which accept an array as value.

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] );
$this->user_model->or_where_in( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] );
$table = 'users';
$this->user_model->or_where_in( $arrValue, $table );
```

### w) where_not_in( $arrValue [, $table, $join ] )
Get result set of data with AND condition using where not in which accept an array as value.

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] );
$this->user_model->where_not_in( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] );
$table = 'users';
$this->user_model->where_not_in( $arrValue, $table );
```

### x) or_where_not_in( $arrValue [, $table, $join ] )
Get result set of data with OR condition using where not in which accept an array as value.

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] );
$this->user_model->or_where_not_in( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] );
$table = 'users';
$this->user_model->or_where_not_in( $arrValue, $table );
```


### y) like( $arrValue [, $table, $join ] )
Get result set of data with AND condition using like clause with placing % both left and right.

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$this->user_model->or_where_not_in( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$table = 'users';
$this->user_model->or_where_not_in( $arrValue, $table );
```

### z) like_before( $arrValue [, $table, $join ] )
Get result set of data with AND condition using like clause with placing % only left side.

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$this->user_model->like_before( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$table = 'users';
$this->user_model->like_before( $arrValue, $table );
```

### aa) like_after( $arrValue [, $table, $join ] )
Get result set of data with AND condition using like clause with placing % only right side.

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$this->user_model->like_after( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$table = 'users';
$this->user_model->like_after( $arrValue, $table );
```

### ab) or_like( $arrValue [, $table, $join ] )
Get result set of data with OR condition using like clause with placing % both left and right.

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$this->user_model->or_like( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$table = 'users';
$this->user_model->or_like( $arrValue, $table );
```

### ac) or_like_before( $arrValue [, $table, $join ] )
Get result set of data with OR condition using like clause with placing % only left side.

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$this->user_model->or_like_before( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$table = 'users';
$this->user_model->or_like_before( $arrValue, $table );
```

### ad) or_like_after( $arrValue [, $table, $join ] )
Get result set of data with OR condition using like clause with placing % only right side.

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$this->user_model->or_like_after( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$table = 'users';
$this->user_model->or_like_after( $arrValue, $table );
```

### ae) not_like( $arrValue [, $table, $join ] )
Get result set of data with AND condition using not like clause with placing % both left and right.

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$this->user_model->not_like( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$table = 'users';
$this->user_model->not_like( $arrValue, $table );
```

### af) not_like_before( $arrValue [, $table, $join ] )
Get result set of data with AND condition using not like clause with placing % only left side.

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$this->user_model->not_like_before( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$table = 'users';
$this->user_model->not_like_before( $arrValue, $table );
```

### ag) not_like_after( $arrValue [, $table, $join ] )
Get result set of data with AND condition using not like clause with placing % only right side.

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$this->user_model->not_like_after( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$table = 'users';
$this->user_model->not_like_after( $arrValue, $table );
```

### ah) or_not_like( $arrValue [, $table, $join ] )
Get result set of data with OR condition using not like clause with placing % both left and right.

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$this->user_model->or_not_like( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$table = 'users';
$this->user_model->or_not_like( $arrValue, $table );
```

### ai) or_not_like_before( $arrValue [, $table, $join ] )
Get result set of data with OR condition using not like clause with placing % only left side.

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$this->user_model->or_not_like_before( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$table = 'users';
$this->user_model->or_not_like_before( $arrValue, $table );
```

### aj) or_not_like_after( $arrValue [, $table, $join ] )
Get result set of data with OR condition using not like clause with placing % only right side.

 **Parameters** 
 
 1. `$arrValue` = string|array REQUIRED. Key-value paired array.
 2. `$table` = string OPTIONAL. Table's name. If you didn't specified, it'll look at `$table` property defined inside the class's model as default.
 3. `$join` = array OPTIONAL. Implementation could be found on @get_all_rows and @get_specified_row method. The implementation are completely same.

**Return**

Return array collection of data with more than single rows, EMPTY otherwise

```Php
// without table
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$this->user_model->or_not_like_after( $arrValue );

-----------------------or------------------------

// with table's name
$arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
$table = 'users';
$this->user_model->or_not_like_after( $arrValue, $table );
```














