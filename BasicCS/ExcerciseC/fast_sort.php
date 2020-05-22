<?php
// A function that sort 11 numbers as fast as possible.
// Estimate how long would it take to execute the function 10 billion times in a normal machine.

//array of 11 numbers -- example
$numbers =  array(3, 4, 5, 6, 6, 2, 90, 67, 34, 23, 45);

//print_r($numbers);


// A function that takes array of eleven number and sort them as fast as possible
// function use insertion sort, it removes each of entries one at a time
// and then insert them into sorted part (initially empty)
//We take an element from unsorted part and compare it with elements in sorted part, moving form right to left.
// the worst case runtime complixity O(n2)
// the best case scenerio is O(n)
function fast_sort($array_of_eleven_numbers)
{
    //insertion sort
    for ($i = 0; $i < count($array_of_eleven_numbers); $i++) {

        //assign element to a variable
        $index = $array_of_eleven_numbers[$i];
        // assgin the iteration index to variable
        $j = $i;
        //perfrom parallel sort
        while ($j > 0 && $array_of_eleven_numbers[$j - 1] > $index) {
            $array_of_eleven_numbers[$j]  = $array_of_eleven_numbers[$j - 1];
            $j--;
        }
        $array_of_eleven_numbers[$j] = $index;
    }
    return $array_of_eleven_numbers;
}

//run the function
print_r(fast_sort($numbers));

/*****************************************************************************
 * PLEASE INCREASE YOUR MAX EXECUTION TIME OF  PHP AND UNCOMMENT THE FOLLOWING CODE TO TEST THE MAX EXECUTION TIME IT WILL TAKE TO RUN THE FUNCTION IN ONE BILLION TIME
 *******************************************************************************/


// lets calculate how long it will take to run this function in one billion time
// My system could not run it despite the fact that  i increase the max execution time to 9999
// Kindly  increase the max execution time between the range of 0 to 9999 seconds before running this program.

//Please if you are ready to run the following code, kindly uncomment.

/*
$one_billion_times = pow(10, 10);

$startTime = microtime(true);

for($i = 0; $i < $one_billion_times; $i++) {
    fast_sort($numbers);
}

echo "execution time is: ". (microtime(true) - $startTime) ." seconds";

*/



