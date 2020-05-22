<?php

// sort ten thousands powers
// estimate how long it will take on machine to run

function sort_ten_thousands_power()
{
    $max_times = 10000;
    $store_powers = [];
    for ($i = 0; $i < $max_times; $i++) {
        $base = rand(1, 100);
        $power = rand(101, 10000);
        $base_raise_to_power = pow($base, $power);
        array_push($store_powers, $base_raise_to_power);
    }
    //store powers have beed filled, then, lets sort it
    $sorted_array =  sort_store_powers($store_powers);
    return $sorted_array;
}

function sort_store_powers($arr)
{
    //insertion sort
    for ($i = 0; $i < count($arr); $i++) {

        //assign element to a variable
        $index = $arr[$i];
        // assgin the iteration index to variable
        $j = $i;
        //perfrom parallel sort
        while ($j > 0 && $arr[$j - 1] > $index) {
            $array_of_eleven_numbers[$j]  = $arr[$j - 1];
            $j--;
        }
        $array_of_eleven_numbers[$j] = $index;
    }
    return $array_of_eleven_numbers;
}

$startTime = microtime(true);

print_r(sort_ten_thousands_power());

// the estimate time in my machine is : 0.07900 seconds.

echo "the estimate time is: " . (microtime(true) - $startTime) . " seconds";
