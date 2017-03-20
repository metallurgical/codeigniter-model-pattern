<?php

trait BaseQueryBuilder {
	/**
	 * And Having Condition
	 * @param  [type]  $arrValue [array value]
	 * @param  boolean $query    [false as default]
	 * @return [type]            [description]
	 */
	public function dbHaving ( $arrValue ) {
		
		return $this->db->having( $arrValue );
	}
	/**
	 * Or Having Condition
	 * @param  [type]  $arrValue [array value]
	 * @param  boolean $query    [false as default]
	 * @return [type]            [description]
	 */
	public function dbOr_having ( $arrValue ) {
		
		return $this->db->or_having( $arrValue );
	}	
	/**
	 * Where Condition
	 * @param  [type]  $arrValue [array value]
	 * @param  boolean $query    [false as default]
	 * @return [type]            [description]
	 */
	public function dbWhere ( $arrValue ) {
		
		return $this->db->where( $arrValue );
	}
	/**
	 * Or where Condition
	 * @param  [type]  $arrValue [array value]
	 * @param  boolean $query    [false as default]
	 * @return [type]            [description]
	 */
	public function dbOr_where ( $arrValue ) {
		return $this->db->or_where( $arrValue );		
	}
	/**
	 * Where In Condition
	 * @param  [type]  $arrValue [array value]
	 * @param  boolean $query    [false as default]
	 * @return [type]            [description]
	 */
	public function dbWhere_in ( $arrValue ) {

		$query = $this->db;
		foreach( $arrValue as $key => $value ) {	
			$query->where_in( $key, $value );
		}

		return $query;
		
	}
	/**
	 * Where or In Condition
	 * @param  [type]  $arrValue [array value]
	 * @param  boolean $query    [false as default]
	 * @return [type]            [description]
	 */
	public function dbOr_where_in ( $arrValue ) {

		$query = $this->db;
		foreach( $arrValue as $key => $value ) {	
			$query->or_where_in( $key, $value );
		}

		return $query;
		
	}
	/**
	 * And Where not In Condition
	 * @param  [type]  $arrValue [array value]
	 * @param  boolean $query    [false as default]
	 * @return [type]            [description]
	 */
	public function dbWhere_not_in ( $arrValue ) {

		$query = $this->db;
		foreach( $arrValue as $key => $value ) {	
			$query->where_not_in( $key, $value );
		}

		return $query;
		
	}
	/**
	 * Or Where not In Condition
	 * @param  [type]  $arrValue [array value]
	 * @param  boolean $query    [false as default]
	 * @return [type]            [description]
	 */
	public function dbOr_where_not_in ( $arrValue ) {

		$query = $this->db;
		foreach( $arrValue as $key => $value ) {	
			$query->or_where_not_in( $key, $value );
		}

		return $query;
		
	}

	public function dbLike ( $arrValue ) {

		$query = $this->db;
		foreach( $arrValue as $key => $value ) {	
			$query->like( $key, $value );
		}

		return $query;

	}

	public function dbLike_before ( $arrValue ) {

		$query = $this->db;
		foreach( $arrValue as $key => $value ) {	
			$query->like( $key, $value, 'before' );
		}

		return $query;

	}

	public function dbLike_after ( $arrValue ) {

		$query = $this->db;
		foreach( $arrValue as $key => $value ) {	
			$query->like( $key, $value, 'after' );
		}

		return $query;

	}

	public function dbOr_like ( $arrValue ) {

		$query = $this->db;
		foreach( $arrValue as $key => $value ) {	
			$query->or_like( $key, $value );
		}

		return $query;

	}

	public function dbOr_like_before ( $arrValue ) {

		$query = $this->db;
		foreach( $arrValue as $key => $value ) {	
			$query->or_like( $key, $value, 'before' );
		}

		return $query;

	}

	public function dbOr_like_after ( $arrValue ) {

		$query = $this->db;
		foreach( $arrValue as $key => $value ) {	
			$query->or_like( $key, $value, 'after' );
		}

		return $query;

	}

	public function dbNot_like ( $arrValue ) {

		$query = $this->db;
		foreach( $arrValue as $key => $value ) {	
			$query->not_like( $key, $value );
		}

		return $query;

	}

	public function dbNot_like_before ( $arrValue ) {

		$query = $this->db;
		foreach( $arrValue as $key => $value ) {	
			$query->not_like( $key, $value, 'before' );
		}

		return $query;

	}

	public function dbNot_like_after ( $arrValue ) {

		$query = $this->db;
		foreach( $arrValue as $key => $value ) {	
			$query->not_like( $key, $value, 'after' );
		}

		return $query;

	}

	public function dbOr_not_like ( $arrValue ) {

		$query = $this->db;
		foreach( $arrValue as $key => $value ) {	
			$query->or_not_like( $key, $value );
		}

		return $query;

	}

	public function dbOr_not_like_before ( $arrValue ) {

		$query = $this->db;
		foreach( $arrValue as $key => $value ) {	
			$query->or_not_like( $key, $value, 'before' );
		}

		return $query;

	}

	public function dbOr_not_like_after ( $arrValue ) {

		$query = $this->db;
		foreach( $arrValue as $key => $value ) {	
			$query->or_not_like( $key, $value, 'after' );
		}

		return $query;

	}
	
	
	
}
