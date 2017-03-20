<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/traits/BaseQueryBuilder.php';

class Model_app extends CI_Model {

    use BaseQueryBuilder;
    /**
     * Table's name inside databsae for each model
     * @var [type]
     */
    protected $table;
    /**
     * Where and Like collection availables
     * @var [type]
     */
    private $whereCollection = [ 
            'where',
            'or_where', 
            'where_in', 
            'or_where_in', 
            'where_not_in', 
            'or_where_not_in',
            'like',
            'like_before',
            'like_after',
            'or_like',
            'or_like_before',
            'or_like_after',
            'not_like',
            'not_like_before',
            'not_like_after',
            'or_not_like',
            'or_not_like_before',
            'or_not_like_after',
            'having',
            'or_having',
        ];    
    /**
     * [insert insert data into table - any type of table]
     * @param  [type] $arrayData [data value received from controller(column and value already)]
     * @param  [type] $table     [name of table to insert the data]
     * @return [type]            [description]
     * ========================================
     * Example :
     *      $arrayData = [ 'name' => 'emi', 'phone' => 234234234 ]
     *      $table = 'users';
     *      $this->model_app->insert( $arrayData, table );
     */
    function insert ( $arrayData, $table = false ) {

        if ( !$table )
            $this->db->insert( $this->table, $arrayData );
        else{
            $this->db->insert( $table, $arrayData );
        }
        
        if ( $this->db->affected_rows() > 0 ) {
            return $this->db->insert_id();

        } else {
            $flag = false;
            return $flag;
        }       
        
    }
    /**
     * [insert data into table batch by batch - any type of table]
     * @param  [type] $arrayData [multi array]
     * @param  [type] $table     [name of table to insert the data]
     * @return [type]            [description]
     * ==========================================
     * Data example :
     *     $arrayData = array(
     *           array(
     *                   'title' => 'My title',
     *                   'name' => 'My Name',
     *                   'date' => 'My date'
     *           ),
     *           array(
     *                   'title' => 'Another title',
     *                   'name' => 'Another Name',
     *                   'date' => 'Another date'
     *           )
     *     );
     *
     *     $table = 'users';
     *     $this->model_app->insert_batch( $arrayData, $table )
     *   
     */
    function insert_batch ( $arrayData, $table = false ) {

        if ( !$table )
            $insert = $this->db->insert_batch( $this->table, $arrayData );
        else
            $insert = $this->db->insert_batch( $table, $arrayData );
        
        if ( $insert > 0 ) {
            $flag = TRUE;
        }
        else {
            $flag = FALSE;
        }

        return $flag;     
        
    }

    /**
     * [delete delete all type of table]
     * Can used to delete data inside multiple table
     * @param  [type] $table [name of table]
     * @param  [type] $where [condition to applied]
     * @return [type]        [description]
     * =====================================
     * Single : 
     *     $where = array('id' => 1);
     *     $table = 'users';
     *     $this->model_app->delete( $where, $table )
     *
     * Multiple :
     *     $where = array('id' => 1);
     *     $table = array('users','users_booking','users_history');
     *     $this->model_app->delete( $where, $table )
     */
    public function delete ( $where, $table = false ) {

        if ( !$table )
            $this->db->delete( $this->table );
        else{
            $this->db->delete( $table );
        }

        $this->db->where( $where );
        
        if ( $this->db->affected_rows() > 0) {
            // delete && no error
            $a = 1; 
        } 
        else if ( $this->db->affected_rows() == 0 ) {
            // not delete && no error
            $a = 2;            
        }
        else {
            // not delete && have error
            $a = 3;
        }

        return $a;
    }
    /**
     * Delete all data from a table using empty keyword
     * @param  boolean $table [description]
     * @return [type]         [description]
     * ========================================
     * Example :
     *      $table ='users';
     *      $this->model_app->clear( $table );
     */     
    function clear ( $table = false ) {

        if ( !$table )
            $query = $this->db->empty_table( $this->table );
        else{
            $query = $this->db->empty_table( $table );
        }

        if ( $query )
            return TRUE;
        else
            return FALSE;

    }
    /**
     * Delete all data from a table using truncate keyword
     * @param  boolean $table [description]
     * @return [type]         [description]
     * ========================================
     * Example :
     *      $table ='users';
     *      $this->model_app->truncate( $table );
     */
    function truncate ( $table = false ) {

        if ( !$table )
            $query = $this->db->truncate( $this->table );
        else{
            $query = $this->db->truncate( $table );
        }

        if ( $query )
            return TRUE;
        else
            return FALSE;
        
    }
    /**
     * Get last data insert after insert into database
     * @param  [type]  $uniqueField [description]
     * @param  boolean $fields      [description]
     * @param  boolean $table       [description]
     * @return [type]               [description]
     * ========================================
     * Example :
     *      $table ='users';
     *      $fieldToOrder = 'id';
     *      $fieldToSelect = 'name, email';
     *      $this->model_app->getLastData( $fieldToOrder, $field, $table );
     */     
    function getLastData( $fieldToOrder, $where = false, $fieldToSelect = false, $table = false ) {

        if ( $fieldToSelect ) {
             $column = $fieldToSelect;
        }
        else {
            $column = '*' ;
        }

        $this->db->select( $column );

        if ( $where ) {
            $this->db->where( $where );
        }

        if ( !$table )
            $this->db->from( $this->table );
        else{
            $this->db->from( $table );
        }        
        
        $this->db->order_by( $fieldToOrder ,'desc');
        $this->db->limit( 1 );
        $query = $this->db->get();
        return $query->row_array();

    }
    /**
     * [get_all_rows description]
     * @param  array $where   [Where condition]
     * @param  string|array $fields  [select * or certain column]
     * @param  string|array $table   [table's name]
     * @param  array $join    [using join statement]
     * @param  string|array $orderBy [order by the result]
     * @param  array $groupBy [group by the result]
     * @param  string|array $limit   [limit the result]
     * @return [collection]           [return array collection of data]
     * =================================================     
     * Example 1 : Using 1st parameter = WHERE and LIKE condition
     *     Availables where condition can be used is, where, where_in, or_where_in, where_not_in, or_where_not_in,or_where, having, or_having, like, like_before, like_after, or_like, or_like_before, or_like_after, not_like, not_like_before, not_like_after, or_not_like, or_not_like_before, or_not_like_after
     * 
     *     $where = array(
     *       'where' => array('id !=' => 1, 'email =' => 'emi@emi.com' ),
     *       //'where_in' => array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] ),
     *       //'or_where_in' => array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] ),
     *       //'where_not_in' => array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] ),
     *       //'or_where_not_in' => array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] ),       
     *       //'or_where' => array('id !=' => 1, 'email =' => 'emi@emi.com' ),
     *       //'having' => array('id !=' => 1, 'email =' => 'emi@emi.com' ),
     *       //'or_having' => array('id !=' => 1, 'email =' => 'emi@emi.com' ),
     *       //'like' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'like_before' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'like_after' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'or_like' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'or_like_before' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'or_like_after' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'not_like' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'not_like_before' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'not_like_after' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'or_not_like' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'or_not_like_before' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'or_not_like_after' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *     );
     *     $this->seat_model->get_all_rows($where); --> without specified table name or
     *     $table = "users";
     *     $this->model_app->get_all_rows($where, false, $table);
     * 
     * ===================================================
     * Example 2 : Using 2nd paramter = Select all fields or certain fields
     *     $fields = 'name, email'; -- using string or
     *     $fields = array( 'name','email'); -- using index array
     *     if not provided, then select * is presumed
     *     $this->model_app->get_all_rows( false, $fields );
     * 
     *==================================================== 
     * Example 3 : Using 3rd parameter = table name
     *     $this->seat_model->get_all_rows(); --> this will select all the data inside user model's table if table did not provided OR
     *     $table = "users";
     *     $this->model_app->get_all_rows( false, false, $table);
     *
     * ==================================================
     * Example 4 : Using 4th parameter = join single or multiple
     *     Available join are inner, left, right, left outer, right outer, join, outer, inner
     *     $join = array(
     *         // single table on particular join
     *           'join' => array( 'users_groups' => 'users.id = users_groups.user_id' ),
     *           'inner' => array( 'users_groups' => 'users.id = users_groups.user_id'),
     *           'left' => array( 'users_groups' => 'users.id = users_groups.user_id' ),
     *           'right' => array( 'users_groups' => 'users.id = users_groups.user_id'),
     *           'outer' => array( 'users_groups' => 'users.id = users_groups.user_id' ),
     *           'left outer' => array( 'users_groups' => 'users.id = users_groups.user_id'),
     *           'right outer' => array( 'users_groups' => 'users.id = users_groups.user_id' ),
     *        // multiple table on particular join
     *            'join' => array( 
     *                        'groups' => 'users_groups.user_id = groups.id',
     *                        'users_groups' => 'users.id = users_groups.user_id' 
     *                    ),
     *           'inner' => array( 
     *                        'groups' => 'users_groups.user_id = groups.id',
     *                        'users_groups' => 'users.id = users_groups.user_id' 
     *                    ),
     *           'left' => array( 
     *                        'groups' => 'users_groups.user_id = groups.id',
     *                        'users_groups' => 'users.id = users_groups.user_id' 
     *                    ),
     *           'right' => array( 
     *                        'groups' => 'users_groups.user_id = groups.id',
     *                        'users_groups' => 'users.id = users_groups.user_id' 
     *                    ),
     *           'outer' => array( 
     *                        'groups' => 'users_groups.user_id = groups.id',
     *                        'users_groups' => 'users.id = users_groups.user_id' 
     *                    ),
     *           'left outer' => array( 
     *                        'groups' => 'users_groups.user_id = groups.id',
     *                        'users_groups' => 'users.id = users_groups.user_id' 
     *                    ),
     *           'right outer' => array( 
     *                        'groups' => 'users_groups.user_id = groups.id',
     *                        'users_groups' => 'users.id = users_groups.user_id' 
     *                    ),
     *                    
     *       );
     *
     * ================================================
     * Example 5 : Using 5th parameter = Order by result
     *     $orderBy = 'name asc, id desc'; or 
     *     $orderBy = array( 'name' => 'asc', 'id' => 'desc' );
     *     $this->model_app->get_all_rows( false, false, false, false, $orderBy );
     *
     * ================================================
     * Example 6 : Using 6th parameter = group by result
     *     $groupBy = 'name'; or $groupBy = array( 'name', 'id' );
     *     $this->model_app->get_all_rows( false, false, false, false, false, $groupBy );
     *
     * ================================================
     * Example 7 : Using 7th parameter = limit the result
     *     $limit = '20'; limit only
     *     $limit = [10 => 20]; limit and offset, key is a limit, values is an offset
     *     $this->model_app->get_all_rows( false, false, false, false, false, false, $limit );
     */    
    function get_all_rows( ...$args ) {
           
        $query = call_user_func_array( array( $this, 'complexQueries'), $args );
        return $query->result_array(); 
           
    }
    // source
    // http://stackoverflow.com/questions/173400/how-to-check-if-php-array-is-associative-or-sequential
    function isAssoc ( $arr ) {
        return array_keys($arr) !== range(0, count($arr) - 1);
    }
    /**
     * [get_all_rows description]
     * @param  array $where   [Where condition]
     * @param  string|array $fields  [select * or certain column]
     * @param  string|array $table   [table's name]
     * @param  array $join    [using join statement]
     * @param  string|array $orderBy [order by the result]
     * @param  array $groupBy [group by the result]
     * @param  string|array $limit   [limit the result]
     * @return [collection]           [return array collection of data]
     * =================================================     
     * Example 1 : Using 1st parameter = WHERE and LIKE condition
     *     Availables where condition can be used is, where, where_in, or_where_in, where_not_in, or_where_not_in,or_where, having, or_having, like, like_before, like_after, or_like, or_like_before, or_like_after, not_like, not_like_before, not_like_after, or_not_like, or_not_like_before, or_not_like_after
     * 
     *     $where = array(
     *       'where' => array('id !=' => 1, 'email =' => 'emi@emi.com' ),
     *       //'where_in' => array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] ),
     *       //'or_where_in' => array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] ),
     *       //'where_not_in' => array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] ),
     *       //'or_where_not_in' => array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] ),       
     *       //'or_where' => array('id !=' => 1, 'email =' => 'emi@emi.com' ),
     *       //'having' => array('id !=' => 1, 'email =' => 'emi@emi.com' ),
     *       //'or_having' => array('id !=' => 1, 'email =' => 'emi@emi.com' ),
     *       //'like' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'like_before' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'like_after' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'or_like' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'or_like_before' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'or_like_after' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'not_like' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'not_like_before' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'not_like_after' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'or_not_like' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'or_not_like_before' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *       //'or_not_like_after' => array('name' => 'emi', 'email' => 'emi@emi.com' ),
     *     );
     *     $this->seat_model->get_all_rows($where); --> without specified table name or
     *     $table = "users";
     *     $this->model_app->get_all_rows($where, false, $table);
     * 
     * ===================================================
     * Example 2 : Using 2nd paramter = Select all fields or certain fields
     *     $fields = 'name, email'; -- using string or
     *     $fields = array( 'name','email'); -- using index array
     *     if not provided, then select * is presumed
     *     $this->model_app->get_all_rows( false, $fields );
     * 
     *==================================================== 
     * Example 3 : Using 3rd parameter = table name
     *     $this->seat_model->get_all_rows(); --> this will select all the data inside user model's table if table did not provided OR
     *     $table = "users";
     *     $this->model_app->get_all_rows( false, false, $table);
     *
     * ==================================================
     * Example 4 : Using 4th parameter = join single or multiple
     *     Available join are inner, left, right, left outer, right outer, join, outer, inner
     *     $join = array(
     *         // single table on particular join
     *           'join' => array( 'users_groups' => 'users.id = users_groups.user_id' ),
     *           'inner' => array( 'users_groups' => 'users.id = users_groups.user_id'),
     *           'left' => array( 'users_groups' => 'users.id = users_groups.user_id' ),
     *           'right' => array( 'users_groups' => 'users.id = users_groups.user_id'),
     *           'outer' => array( 'users_groups' => 'users.id = users_groups.user_id' ),
     *           'left outer' => array( 'users_groups' => 'users.id = users_groups.user_id'),
     *           'right outer' => array( 'users_groups' => 'users.id = users_groups.user_id' ),
     *        // multiple table on particular join
     *            'join' => array( 
     *                        'groups' => 'users_groups.user_id = groups.id',
     *                        'users_groups' => 'users.id = users_groups.user_id' 
     *                    ),
     *           'inner' => array( 
     *                        'groups' => 'users_groups.user_id = groups.id',
     *                        'users_groups' => 'users.id = users_groups.user_id' 
     *                    ),
     *           'left' => array( 
     *                        'groups' => 'users_groups.user_id = groups.id',
     *                        'users_groups' => 'users.id = users_groups.user_id' 
     *                    ),
     *           'right' => array( 
     *                        'groups' => 'users_groups.user_id = groups.id',
     *                        'users_groups' => 'users.id = users_groups.user_id' 
     *                    ),
     *           'outer' => array( 
     *                        'groups' => 'users_groups.user_id = groups.id',
     *                        'users_groups' => 'users.id = users_groups.user_id' 
     *                    ),
     *           'left outer' => array( 
     *                        'groups' => 'users_groups.user_id = groups.id',
     *                        'users_groups' => 'users.id = users_groups.user_id' 
     *                    ),
     *           'right outer' => array( 
     *                        'groups' => 'users_groups.user_id = groups.id',
     *                        'users_groups' => 'users.id = users_groups.user_id' 
     *                    ),
     *                    
     *       );
     *
     * ================================================
     * Example 5 : Using 5th parameter = Order by result
     *     $orderBy = 'name asc, id desc'; or 
     *     $orderBy = array( 'name' => 'asc', 'id' => 'desc' );
     *     $this->model_app->get_all_rows( false, false, false, false, $orderBy );
     *
     * ================================================
     * Example 6 : Using 6th parameter = group by result
     *     $groupBy = 'name'; or $groupBy = array( 'name', 'id' );
     *     $this->model_app->get_all_rows( false, false, false, false, false, $groupBy );
     *
     * ================================================
     * Example 7 : Using 7th parameter = limit the result
     *     $limit = '20'; limit only
     *     $limit = [10 => 20]; limit and offset, key is a limit, values is an offset
     *     $this->model_app->get_all_rows( false, false, false, false, false, false, $limit );
     */    
    function get_specified_row( ...$args ) {
        
        $query = call_user_func_array( array( $this, 'complexQueries'), $args );
        return $query->row_array(); 
           
    }

    function complexQueries ( $where = false, $fields = false, $table = false, $join = false, $orderBy = false, $groupBy = false, $limit = false ) {

        if ( $fields ) {
            $this->db->select( $fields );
        } else {
            $this->db->select( '*' );
        }
        
        if ( !$table )
            $this->db->from( $this->table );
        else {
            $this->db->from( $table );
        } 

        if ( $where ){

           foreach( $where as $key => $value ) {

                if ( in_array( $key, $this->whereCollection ) ) {                        
                    // this will output 
                    // where, where_in, etc........
                    // and autmatically instance of query
                    // inside the BaseQueryBuilderTrait                 
                    $this->{ 'db' . ucfirst( $key ) }( $value );
                }

            }       
        }
       
        if ( $orderBy ) {

            if ( is_array( $orderBy ) ) {
                foreach ( $orderBy as $key => $value ) {
                   $this->db->order_by( $key, $value );
                }
            }
            else
                $this->db->order_by( $orderBy ); 
        }
       
        if ( $groupBy ){
            
            if ( is_array( $groupBy ) ) {
                foreach ( $groupBy as $key => $value ) {
                   $this->db->group_by( $value );
                }
            }
            else
                $this->db->group_by( $groupBy );  
        
        }

        if ( $limit ){
            
            if ( is_array( $limit ) ) {
                foreach ( $limit as $key => $value ) {
                   $this->db->limit( $key, $value );
                }
            }
            else
                $this->db->limit( $limit );  
        
        }

        if ( $join ) {

            foreach( $join as $key => $value ) {
    
                if ( $key == 'left' )
                    $position = 'left';
                elseif ( $key == 'right' )
                    $position = 'right';
                elseif ( $key == 'outer' )
                    $position = 'outer';
                elseif ( $key == 'inner' )
                    $position = 'inner';
                elseif ( $key == 'left outer' )
                    $position = 'left outer';
                elseif ( $key == 'right outer' )
                    $position = 'right outer';
                else
                    $position = 'none';

                foreach( $value as $key2 => $value2 ) {

                    if ( $position == 'none' )                        
                        $this->db->join( $key2, $value2 );
                    else
                        $this->db->join( $key2, $value2, $position );
                }
                
            }
        }
              
        $query = $this->db->get();

        return $query;

    }
    /**
     * [update_data update datas in any tables you want]
     * @param  [array] $columnToUpdate [what column you want to update = array value]
     * @param  [string] $tableToUpdate  [what table you want to update]
     * @param  [array] $usingCondition [using condition or not]
     * @return [type]                 [description]
     * ==========================================
     * Data example :
     * $columnToUpdate = array(
     *           array(
     *                   'title' => 'My title',
     *                   'name' => 'My Name',
     *                   'date' => 'My date'
     *           )
     *   );
     */ 
    function update ( $columnToUpdate, $usingCondition, $tableToUpdate =  false )
    {
        
        $this->db->where( $usingCondition );

        if ( !$tableToUpdate )
            $this->db->update( $this->table, $columnToUpdate );
        else {
            $this->db->update( $table, $columnToUpdate );
        }       

        if ( $this->db->affected_rows() > 0) {
            // update && no error
            $a = 1; 
        } 
        else if ( $this->db->affected_rows() == 0 ) {
            // not update && no error
            $a = 2;            
        }
        else {
            // not update && have error
            $a = 3;
        }

        return $a;  

    }
    /**
     * [update_data update datas in any tables you want]
     * @param  [array] $columnToUpdate [what column you want to update = array value]
     * @param  [string] $tableToUpdate  [what table you want to update]
     * @param  [string] $usingCondition [using condition or not]
     * @return [type]                 [description]
     * ==========================================
     * Data example :
     * $columnToUpdate = array(
     *           array(
     *                   'id' => '1', // this is primary key which sql qill use in where
     *                   'name' => 'My Name',
     *                   'date' => 'My date'
     *           ),
     *           array(
     *                   'id' => '2', // this is primary key which sql qill use in where
     *                   'name' => 'Another Name',
     *                   'date' => 'Another date'
     *           )
     *   );
     */    
    function update_batch ( $columnToUpdate, $usingCondition, $tableToUpdate =  false ) {  

        if ( !$tableToUpdate )
            $update = $this->db->update_batch( $this->table, $columnToUpdate, $usingCondition );
        else {
            $update = $this->db->update_batch( $table, $columnToUpdate, $usingCondition );
        }       

        if ( $update > 0 ) {
           $test = TRUE;
        }
        else {
            $test = FALSE;
        }

        return $test;     

    }
    /**
     * Replace the existing data with new data
     * Usually used with combination delete + insert
     * @param  [array]  $data  [date to insert]
     * @param  string $table [table's name]
     * @return [type]         [description]
     * ======================================
     * Example :
     * $data = array(
     *   'id' => '1', // primary key
     *   'name'  => 'My Name',
     *   'date'  => 'My date'
     *  );
     *
     * $this->model_app->replace( $data, $tableName );
     */ 
    function replace ( $data, $table = false ) {

        if ( !$table )
            $query = $this->db->replace( $this->table, $data); 
        else {
            $query = $this->db->replace( $table, $data ); 
        }

        if ( $query )
            return TRUE;
        else
            return FALSE;

    }
    /**
     * Select maximun data
     * @param  [string]  $fields [fields's for finding max]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * ======================================
     * Example :
     *     $fields = 'quantity';
     *     $table = 'booking';
     *     $result = $this->model_app->min( $fields, $table );
     */
    function max ( $fields, $table = false ) {

        $this->db->select_max( $fields );

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->row_array();

    }
    /**
     * Select minimun data
     * @param  [string]  $fields [fields's for finding min]
     * @param  string    $table  [table's name]
     * @return [type]          [description]
     * ======================================
     * Example :
     *     $fields = 'quantity';
     *     $table = 'booking';
     *     $result = $this->model_app->min( $fields, $table );
     */
    function min ( $fields, $table = false ) {

        $this->db->select_min( $fields );

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->row_array();

    }
    /**
     * Select average data
     * @param  [string]  $fields [fields's for finding average]
     * @param  string    $table  [table's name]
     * @return [type]          [description]
     * ======================================
     * Example :
     *     $fields = 'quantity';
     *     $table = 'booking';
     *     $result = $this->model_app->avg( $fields, $table );
     */
    function avg ( $fields, $table = false ) {

        $this->db->select_avg( $fields );

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->row_array();

    }
    /**
     * Select sum of data
     * @param  [string]  $fields [fields's for finding sum]
     * @param  string    $table  [table's name]
     * @return [type]          [description]
     * ======================================
     * Example :
     *     $fields = 'quantity';
     *     $table = 'booking';
     *     $result = $this->model_app->sum( $fields, $table );
     */
    function sum ( $fields, $table = false ) {

        $this->db->select_sum( $fields );

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->row_array();

    }
    /**
     * Counts the data using condition, return num rows of data being search
     * @param  [array]  $where [array key value pair for each columns and value]
     * @param  string $table [table's name]
     * @return [type]         [description]
     * ====================================
     * Example :
     *     $where = array('id' => 1);
     *     $table = 'groups';
     *     $this->model_app->count( $where, $table );
     */
    function count ( $where = false, $table = false ) {

        if ( $where )
            $this->db->where( $where );

        if ( !$table )
            $this->db->from( $this->table ); 
        else
            $this->db->from( $table ); 

        return $this->db->count_all_results(); // Produces an integer, like 17

    }
    /**
     * select where data with AND clause/condition
     * @param  [string]  $arrValue [column's name]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array('id !=' => 1, 'email =' => 'emi@emi.com' );
     *     $table = 'users';
     *     $this->model_app->where( $arrValue, $table );
     */
    function where ( $arrValue, $table = false ) {
         
        $this->db->where( $arrValue );

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * select where data with OR clause/condition
     * @param  [string]  $arrValue [column's name]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array('id !=' => 1, 'email =' => 'emi@emi.com' );
     *     $table = 'users';
     *     $this->model_app->or_where( $arrValue, $table );
     */
    function or_where ( $arrValue, $table = false ) {
         
        $this->db->or_where( $arrValue );

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * select having data with AND clause/condition
     * @param  [string]  $arrValue [column's name]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array('id !=' => 1, 'email =' => 'emi@emi.com' );
     *     $table = 'users';
     *     $this->model_app->having( $arrValue, $table );
     */
    function having ( $arrValue, $table = false ) {
         
        $this->db->having( $arrValue );

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * select having data with OR clause/condition
     * @param  [string]  $arrValue [column's name]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array('id !=' => 1, 'email =' => 'emi@emi.com' );
     *     $table = 'users';
     *     $this->model_app->or_having( $arrValue, $table );
     */
    function or_having ( $arrValue, $table = false ) {
         
        $this->db->or_having( $arrValue );

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * select where in data with AND clause/condition
     * @param  [string]  $arrValue [column's name]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] );
     *     $table = 'users';
     *     $this->model_app->where_in( $arrValue, $table );
     */
    function where_in ( $arrValue, $table = false ) {        

        foreach( $arrValue as $key => $value ) {    
            $this->db->where_in( $key, $value );
        }

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * select where in data with OR clause/condition
     * @param  [string]  $arrValue [column's name]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] );
     *     $table = 'users';
     *     $this->model_app->or_where_in( $arrValue, $table );
     */
    function or_where_in ( $arrValue, $table = false ) {        

        foreach( $arrValue as $key => $value ) {    
            $this->db->or_where_in( $key, $value );
        }

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * select where NOT in data with AND clause/condition
     * @param  [string]  $arrValue [column's name]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] );
     *     $table = 'users';
     *     $this->model_app->where_not_in( $arrValue, $table );
     */
    function where_not_in ( $arrValue, $table = false ) {        

        foreach( $arrValue as $key => $value ) {    
            $this->db->where_not_in( $key, $value );
        }

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * select where NOT in data with OR clause/condition
     * @param  [string]  $arrValue [column's name]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array( 'id'=> [1, 2], 'email' => ['admin@admin.com'] );
     *     $table = 'users';
     *     $this->model_app->or_where_not_in( $arrValue, $table );
     */
    function or_where_not_in ( $arrValue, $table = false ) {        

        foreach( $arrValue as $key => $value ) {    
            $this->db->or_where_not_in( $key, $value );
        }

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * Select data using like condition with AND
     * %% will placed both left and right
     * @param  [array]  $fields [column to search | key-value pair array]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
     *     $table = 'users';
     *     $this->model_app->like( $arrValue, $table );
     */
    function like ( $arrValue, $table = false ) {        

        foreach( $arrValue as $key => $value ) {    
            $this->db->like( $key, $value );
        }

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * Select data using like condition with AND
     * % will placed left only
     * @param  [array]  $fields [column to search]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
     *     $table = 'users';
     *     $this->model_app->like_before( $arrValue, $table );
     */
    function like_before ( $arrValue, $table = false ) {        

        foreach( $arrValue as $key => $value ) {    
            $this->db->like( $key, $value, 'before' );
        }

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * Select data using like condition with AND
     * % will placed right only
     * @param  [array]  $fields [column to search]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
     *     $table = 'users';
     *     $this->model_app->like_after( $arrValue, $table );
     */
    function like_after ( $arrValue, $table = false ) {        

        foreach( $arrValue as $key => $value ) {    
            $this->db->like( $key, $value, 'after' );
        }

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * Select data using like condition with OR
     * %% will placed both left and right
     * @param  [array]  $fields [column to search | key-value pair array]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
     *     $table = 'users';
     *     $this->model_app->or_like( $arrValue, $table );
     */
    function or_like ( $arrValue, $table = false ) {        

        foreach( $arrValue as $key => $value ) {    
            $this->db->or_like( $key, $value );
        }

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * Select data using like condition with OR
     * % will placed left only
     * @param  [array]  $fields [column to search]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
     *     $table = 'users';
     *     $this->model_app->or_like_before( $arrValue, $table );
     */
    function or_like_before ( $arrValue, $table = false ) {        

        foreach( $arrValue as $key => $value ) {    
            $this->db->or_like( $key, $value, 'before' );
        }

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * Select data using like condition with OR
     * % will placed right only
     * @param  [array]  $fields [column to search]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
     *     $table = 'users';
     *     $this->model_app->or_like_after( $arrValue, $table );
     */
    function or_like_after ( $arrValue, $table = false ) {        

        foreach( $arrValue as $key => $value ) {    
            $this->db->or_like( $key, $value, 'after' );
        }

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * Select data using not like condition with AND
     * %% will placed both left and right
     * @param  [array]  $fields [column to search | key-value pair array]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
     *     $table = 'users';
     *     $this->model_app->not_like( $arrValue, $table );
     */
    function not_like ( $arrValue, $table = false ) {        

        foreach( $arrValue as $key => $value ) {    
            $this->db->not_like( $key, $value );
        }

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * Select data using not like condition with AND
     * % will placed left only
     * @param  [array]  $fields [column to search]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
     *     $table = 'users';
     *     $this->model_app->not_like_before( $arrValue, $table );
     */
    function not_like_before ( $arrValue, $table = false ) {        

        foreach( $arrValue as $key => $value ) {    
            $this->db->not_like( $key, $value, 'before' );
        }

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * Select data using not like condition with AND
     * % will placed right only
     * @param  [array]  $fields [column to search]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
     *     $table = 'users';
     *     $this->model_app->not_like_after( $arrValue, $table );
     */
    function not_like_after ( $arrValue, $table = false ) {        

        foreach( $arrValue as $key => $value ) {    
            $this->db->not_like( $key, $value, 'after' );
        }

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * Select data using not like condition with OR
     * %% will placed both left and right
     * @param  [array]  $fields [column to search | key-value pair array]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
     *     $table = 'users';
     *     $this->model_app->or_not_like( $arrValue, $table );
     */
    function or_not_like ( $arrValue, $table = false ) {        

        foreach( $arrValue as $key => $value ) {    
            $this->db->or_not_like( $key, $value );
        }

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * Select data using not like condition with OR
     * % will placed left only
     * @param  [array]  $fields [column to search]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
     *     $table = 'users';
     *     $this->model_app->or_not_like_before( $arrValue, $table );
     */
    function or_not_like_before ( $arrValue, $table = false ) {        

        foreach( $arrValue as $key => $value ) {    
            $this->db->or_not_like( $key, $value, 'before' );
        }

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    /**
     * Select data using not like condition with OR
     * % will placed right only
     * @param  [array]  $fields [column to search]
     * @param  string $table  [table's name]
     * @return [type]          [description]
     * =====================================
     * Example : 
     *     $arrValue = array('name' => 'emi', 'email' => 'emi@emi.com' );
     *     $table = 'users';
     *     $this->model_app->or_not_like_after( $arrValue, $table );
     */
    function or_not_like_after ( $arrValue, $table = false ) {        

        foreach( $arrValue as $key => $value ) {    
            $this->db->or_not_like( $key, $value, 'after' );
        }

        if ( !$table )
            $query = $this->db->get( $this->table ); 
        else {
            $query = $this->db->get( $table ); 
        }
        
        return $query->result_array();
    }
    

    /**
     * [display_message display flash message data in view part]
     * @param  [string] $messageType [what type of message you want to display]
     * @param  [string] $urlToGo     [url you want to redirect after making the process ==> if using current url just use current_url()]
     * @return [type]              [description]
     * currently only 3 types of message can appear on page (save, record, error) ->can change the if else to add another type of message
     */
    function display_message( $messageType, $urlToGo =  false )
    {
        /**
         * usage :
         * calling this method in controller of course
         * example : display_message("save","jobs/index/add")
         * 1st parameter $messageType is compulsary : accept value insert,update,delete,error,email
         * 2nd paramter $urlToGo is optional : default direction will be given if not specified
         * @var [type]
         */
        if( $messageType == "add" ) {
             $this->session->set_flashdata( 'add', lang( 'common_alert_success' ) );
        }
        else if( $messageType == "update" ) {
             $this->session->set_flashdata( 'update', 'Data was successfully saved' );
        }
        else if( $messageType == "error" ) {
             $this->session->set_flashdata( 'error', 'There in an errors during processing, please try again.' );
        }
        else if( $messageType == "delete" ) {
             $this->session->set_flashdata( 'delete', lang( 'common_alert_delete' ) );
        }
        else if( $messageType == "user_exist" ) {
             $this->session->set_flashdata( 'user_exist', lang( 'common_alert_user_exist' ) );
        }
        else if( $messageType == "register_success" ) {
             $this->session->set_flashdata( 'register_success', 'Sucessfully registered with the account number. You may login now using your Email address.' );
        }
        else if( $messageType == "register_failed" ) {
             $this->session->set_flashdata( 'register_failed', 'There in an errors during processing, please try again.' );
        }
        else if( $messageType == "register_failed_email" ) {
             $this->session->set_flashdata( 'register_failed_email', 'The email used already existed in our database. Please use another email address.' );
        }
        else if( $messageType == "login_error" ) {
             $this->session->set_flashdata( 'login_error', 'Cannot login. Either email or password was wrong' );
        } 

        if($urlToGo == false) {
             $url = current_url();
        }
        else {
             $url = $urlToGo;
        }
            
        return redirect($url);
    }

}
