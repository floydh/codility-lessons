<?php
/**
Write a function:

function solution($A, $B, $K);

that, given three integers A, B and K, returns the number of integers within the range [A..B] that are divisible by K, i.e.:

{ i : A ≤ i ≤ B, i mod K = 0 }

For example, for A = 6, B = 11 and K = 2, your function should return 3, because there are three numbers divisible by 2 within the range [6..11], namely 6, 8 and 10.

Write an efficient algorithm for the following assumptions:

A and B are integers within the range [0..2,000,000,000];
K is an integer within the range [1..2,000,000,000];
A ≤ B.
*/

$A = 6;
$B = 11;
$K = 2;

function solution($A,$B,$K) {
	if ( ($A == $B) && ($A % $K == 0) ) {
		return 1;
	}
	elseif ( ($A == $B) && ($A % $K != 0) ) {
		return 0;
	}
	else {
		$low_match = '';
		for ( $i = $A, $limit = $A + $K ; $i <= $limit ; $i++ ) {
			if ( !empty($low_match) ) {
				continue;
			}

			if ( $i % $K == 0 ) {
				$low_match = $i;
				continue;
			}
		}

		var_dump($low_match);

		$high_match = '';
		for ( $i = $B, $limit = $B - $K ; $i >= $limit ; $i-- ) {
			if ( !empty($high_match) ) {
				continue;
			}

			if ( $i % $K == 0 ) {
				$high_match = $i;
				continue;
			}
		}

		// formula: An = a + (n-1)d
		// i.e. $high_match = $low_match + (n-1)$K
		$answer = (($high_match - $low_match) / $K) + 1;
		return $answer;
	}

	return 0;

}

var_dump(solution($A,$B,$K));