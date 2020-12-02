<?php
/*
Frog starts at position 0.
Frog wants to get to position X+1

Leaves fall on the river...
*/

$A = [
	1,
	3,
	1,
	4,
	2,
	3,
	5,
	4
];

$X = 5;

function solution($X, $A) {
	if ( empty($A) ) {
		return -1;
	}

	$limit = count($A);

	if ( $limit < $X ) {
		return -1;
	}

	$leaf_bridge = [];

	for ( $seconds = 0; $seconds < $limit; $seconds++) {
		$leaf = &$A[$seconds];

		if ( !is_int($leaf) || $leaf <= 0 || $leaf > 100000 ) {
			return -1;
		}

		if ( $leaf <= $X ) {
			$leaf_bridge[$leaf] = $leaf;
		}

		if ( $seconds >= ($X - 1) ) {

			$leaf_bridge_count = count($leaf_bridge);

			if ( $leaf_bridge_count == $X ) {
				return $seconds;
			}
		}
	}

	if ( $leaf_bridge_count < $X ) {
		return -1;
	}
}

print solution($X, $A);