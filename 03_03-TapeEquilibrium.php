<?php
$test = [
    [1,2,3,4,5,6,7,8],
    [100],
    [],
    [-1000,1000],
    [4,8,9,10],
    [12,-1001, 22,58,92],
    [1001,18,24,0,34],
];

function solution($A) {
    if ( empty($A) ) {
        return 0;
    }
    
    $count = count($A);
    
    if ($count == 1) {
        return $A[0];
    }
    
    for ($i=0, $max_position = $count - 1; $i<$max_position; $i++) {
        if (!is_int($A[$i])) {
            return;
        }

        if ($i == 0) {
            $left = $A[0];
            $right = array_sum($A) - $left;
        
            $min = abs($left - $right);
        }
        else {
            $left += $A[$i];
            $right -= $A[$i];

            $min = min([$min, abs($left - $right)]);   
        }
    }

    return $min;
}

// TEST DIFFERENT ARRAY INPUTS for $A
foreach ($test as $A) {
    var_dump(solution($A));
}