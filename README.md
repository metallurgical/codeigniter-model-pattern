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

1. [insert]()
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

## 1. insert
