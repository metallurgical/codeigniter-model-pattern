<?php

trait ExceptionThrow {

	function InvalidArgExceptionThrow ( $noOfArgs ) {

		$is_are = $noOfArgs > 1 ? 'are' : 'is';
		throw new InvalidArgumentException( $noOfArgs . ' required ' . ( $noOfArgs > 1 ? 'arguments ' : 'argument ' ) . $is_are . ' missing' );

	}
}