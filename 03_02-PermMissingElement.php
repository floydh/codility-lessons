<?php
/**
An array A consisting of N different integers is given. The array contains integers in the range [1..(N + 1)], which means that exactly one element is missing.

Your goal is to find that missing element.

Write a function:

function solution($A);

that, given an array A, returns the value of the missing element.

For example, given array A such that:

  A[0] = 2
  A[1] = 3
  A[2] = 1
  A[3] = 5
the function should return 4, as it is the missing element.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [0..100,000];
the elements of A are all distinct;
each element of array A is an integer within the range [1..(N + 1)].
*/

$A = [2,3,1,5];

function solution($A) {
    // check array is not empty
    if ( empty($A) ) return;
    
    // Check array count is less than 100000
    $A_count = count($A);
    $max_array_size_allowed = 100000;
    $max_array_value_allowed = $max_array_size_allowed + 1;
    
    if ( $A_count > $max_array_size_allowed ) return;
    
    // Check that all values are integers and under the legal limit
    for ( $i=0; $i<$A_count;$i++ ) {
        if ( !is_int($A[$i]) || ($A[$i] > $max_array_value_allowed) ) {
            return;
        }
    }
    
    // Check for all distinct values
    $values_count = array_count_values($A);
    
    foreach ( $values_count as $num ) {
        if ($num > 1) {
            // Found a duplicate value, return it!
            return;
        }
    }
    
    // Sort the array in ascending order to prepare for counting
    asort($A);
    
    // initialize a tmp array for re-indexing prior to looping
    $tmp_arr = [];
    
    foreach ($A as $v) {
        $tmp_arr[] = $v;
    }
    
    $A = $tmp_arr;
    unset($tmp_arr);
    
    // Find the index that doesn't match (the value + 1)
    for ( $i=0; $i<$A; $i++ ) {
        if ( $A[$i] != ($i + 1) ) {
            return ($i + 1);
        }
    }
}

var_dump(solution($A));