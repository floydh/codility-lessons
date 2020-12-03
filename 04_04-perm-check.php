<?php
/**
A non-empty array A consisting of N integers is given.

A permutation is a sequence containing each element from 1 to N once, and only once.

For example, array A such that:

    A[0] = 4
    A[1] = 1
    A[2] = 3
    A[3] = 2
is a permutation, but array A such that:

    A[0] = 4
    A[1] = 1
    A[2] = 3
is not a permutation, because value 2 is missing.

The goal is to check whether array A is a permutation.

Write a function:

function solution($A);

that, given an array A, returns 1 if array A is a permutation and 0 if it is not.

For example, given array A such that:

    A[0] = 4
    A[1] = 1
    A[2] = 3
    A[3] = 2
the function should return 1.

Given array A such that:

    A[0] = 4
    A[1] = 1
    A[2] = 3
the function should return 0.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [1..100,000];
each element of array A is an integer within the range [1..1,000,000,000].
*/

$tests = [
	// ['4','1','3','2'],
	// ['4','1','3'],
	[1,2],
	[1,1],
	[2,3],
	[2,1],
	[2,2]
];

function solution($A) {

	if ( !is_array($A) || empty($A) ) {
		return 0;
	}

	$max = max($A);
	$max_range = 1000000000;
	
	if ( $max > $max_range ) {
		return 0;
	}

	$min = min($A);
	$min_range = 1;

	if ( $min < $min_range ) {
		return 0;
	}

	if ( $min != 1 ) {
		return 0;
	}

	$count = count($A);

	/*if ( $count > 100000 ) {
		return 0;
	}*/

	/*if ( $count == 2 ) {
		return 0;
	}*/

	if ( $count == 2 && $A[0] == $A[1] ) {
		return 0;
	}

	$working_array = [];

	for ( $i=0, $limit=$count; $i < $limit; $i++ ) {
		if ( !isset($working_array[$A[$i]]) ) {

    		$working_array[$A[$i]] = $A[$i];

    	}
    	else {
    		// found duplicate, non permutation
    		return 0;
    	}
	}

	for ( $i=1, $limit=count($working_array); $i < $limit; $i++ ) {
		if ( !isset($working_array[$i]) ) {
			return 0;
		}
	}

	return 1;

}

foreach ( $tests as $A ) {
	var_dump(solution($A));
}
