<?php
/**
Write a function:

function solution($A);

that, given an array A of N integers, returns the smallest positive integer (greater than 0) that does not occur in A.

For example, given A = [1, 3, 6, 4, 1, 2], the function should return 5.

Given A = [1, 2, 3], the function should return 4.

Given A = [−1, −3], the function should return 1.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [1..100,000];
each element of array A is an integer within the range [−1,000,000..1,000,000].
*/

$test = [
	[-1000001,1,2,3,4,5,7],
	[1000001,1,2,3,4,5,7],
	1,
	[3,3],
	[2,2,3],
	[1,3,6,4,1,2],
	[-1,-3],
	[1,2,3],
	[200,201,202,204,205],
	[1],
	[1,2,3],
	[-9,-8,-6,-5,-4,-3,-2,-1,0,1,2,4],
	[4,5,6,7,8,9,10,12],
];

function solution($A) {
	if ( !is_array($A) ) {
		return 1;
	}

	$max = max($A);
	$max_range = 1000000;

	if ( $max < 1 ) {
		return 1;
	}

	if ( $max > $max_range ) {
		return 1;
	}

	$min = min($A);
	$min_range = -1000000;

	if ( $min < $min_range ) {
		return 1;
	}

	$working_array = [];

    for ( $i=0, $limit = count($A); $i < $limit; $i++ ) {

    	// This should keep only one copy of only positive integers
    	if ( $A[$i] > 0 && !isset($working_array[$A[$i]]) ) {

    		$working_array[$A[$i]] = $A[$i];

    	}

    }

    $first = min($working_array);

    if ( $first != 1 ) {
    	return 1;
    }

    $count = count($working_array);

    if ( $count == 1 && $working_array[$first] == 1 ) {
    	
    	return 2;

    }

    if ( $count == 1 && $working_array[$first] != 1 ) {
    	
    	return 1;

    }

    for ( $i=$first, $limit=($first + $count); $i < $limit; $i++ ) {
    	
    	if ( array_key_exists($i, $working_array) === false ) {

    		return $i;

    	}

    }

    return ( $max + 1 > $max_range ) ? 1 : ($max + 1);
}

foreach ($test as $A) {
	var_dump(solution($A));
}