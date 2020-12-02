<?php
/**
A non-empty array A consisting of N integers is given. The array contains an odd number of elements, and each element of the array can be paired with another element that has the same value, except for one element that is left unpaired.

For example, in array A such that:

  A[0] = 9  A[1] = 3  A[2] = 9
  A[3] = 3  A[4] = 9  A[5] = 7
  A[6] = 9
the elements at indexes 0 and 2 have value 9,
the elements at indexes 1 and 3 have value 3,
the elements at indexes 4 and 6 have value 9,
the element at index 5 has value 7 and is unpaired.
Write a function:

function solution($A);

that, given an array A consisting of N integers fulfilling the above conditions, returns the value of the unpaired element.

For example, given array A such that:

  A[0] = 9  A[1] = 3  A[2] = 9
  A[3] = 3  A[4] = 9  A[5] = 7
  A[6] = 9
the function should return 7, as explained in the example above.

Write an efficient algorithm for the following assumptions:

N is an odd integer within the range [1..1,000,000];
each element of array A is an integer within the range [1..1,000,000,000];
all but one of the values in A occur an even number of times.
*/

$A = [9,8,7,6,2,6,7,8,9];

function solution($A) {

	// Check that $A is an array and not empty
	if(empty($A)) {
		return;
	}

	if (!is_array($A)) {
		return;
	}


	// Initialize vars
	$max_array_size_allowed = 1000000;
	$max_value_size_allowed = 1000000;
	$A_size = count($A);
	$oddball = false;

	// Check that the length of the array is less than 1,000,000
	if ( $A_size > $max_array_size_allowed) {
		return;
	}

	// Validate individual array values
	for( $i = 0; $i < $A_size; $i++) {

		// Check if value not empty
		if ( empty($A[$i]) ) {
		
			return;

		}
			
		// Check if value is an integer
		if ( !is_int($A[$i]) ) {

			return false;

		}

		// Check that existing integer value is less than max allowed
		if ( $A[$i] > $max_value_size_allowed ) {

			return;

		}

	}

	// Get the total count of each unique value in the array
	$values_count = array_count_values($A);

	// Loop through the unique values to find an odd number of occurances
	foreach ($values_count as $key => $value) {

		// The oddball is not divisible by 2
		if ($value % 2 !== 0) {

			// store the $key ($key = oddbal, $value = occurances of oddball)
			$oddball = $key;

		}

	}

	// return the oddball or false if none found
	return (!empty($oddball) ? $oddball : false);

}

var_dump(solution($A));