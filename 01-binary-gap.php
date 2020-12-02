<?php
/*
A binary gap within a positive integer N is any maximal sequence of consecutive zeros that is surrounded by ones at both ends in the binary representation of N.

For example, number 9 has binary representation 1001 and contains a binary gap of length 2. The number 529 has binary representation 1000010001 and contains two binary gaps: one of length 4 and one of length 3. The number 20 has binary representation 10100 and contains one binary gap of length 1. The number 15 has binary representation 1111 and has no binary gaps. The number 32 has binary representation 100000 and has no binary gaps.

Write a function:

function solution($N);

that, given a positive integer N, returns the length of its longest binary gap. The function should return 0 if N doesn't contain a binary gap.

For example, given N = 1041 the function should return 5, because N has binary representation 10000010001 and so its longest binary gap is of length 5. Given N = 32 the function should return 0, because N has binary representation '100000' and thus no binary gaps.

Write an efficient algorithm for the following assumptions:

N is an integer within the range [1..2,147,483,647].

----TEST CASES----
$N = 9;
$N = 12.2;
$N = (-4);
$N = 'string';
$N = false;
$N = null;
$N = '';
$N = true;
*/

function solution($N) {
	$largest_allowed_integer_value = 2147483647;
	$n_is_ok = ( is_int($N) && $N <= $largest_allowed_integer_value) ? true : false;


	if ( $n_is_ok ) {

		$binary_string_n = decbin($N);
		$binary_n_char_count = strlen($binary_string_n);
		$binary_arr_n = str_split($binary_string_n);
		$gap = 0;
		$maxGap = 0;

		for ( $i = 0; $i < $binary_n_char_count; $i++ ) {

			if ($binary_arr_n[$i] == 1) {

				if ( $gap > $maxGap ) {

					$maxGap = $gap;

				}

				$gap = 0;

			}
			else {
				
				$gap++;

			}

		}

		return $maxGap;
	}
	else {

		return 0;

	}

}

echo solution($N);
