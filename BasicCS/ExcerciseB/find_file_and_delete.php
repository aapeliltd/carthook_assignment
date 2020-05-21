<?php


// Specify the root of your path.
$root = "C:/wamp/www/aapeli/";


// using regular expression in preg_grep function
// explanation: 
// ^ == start of the word
// ^0aH == any files that start with 0aH
// preg_grep takes regrex filter and the path(to be filtered)
$files = preg_grep('~^0aH~', scandir($root));

// dump the files to if expression above is th returning files as expected.
//print_r($files);

// once the file wanted have gotten, the rest is simple
// iterate them and delete them one after the other, in PHP, unlink function is used to delete file

//since we are dealing with files, anything can happen, eg file may be open somewhere else etc
// in this regards it will be better if we wrapped the deleting operation in try and catch block

try {
    foreach ($files as $file) { // iterate files

        // file path by concatenating the root and the file.
        $file_path = $root . $file;

        // Just to be sured, we need to check if there is file
        // to avoid file not found error
        if (is_file($file_path)) {

            //delete the file
            unlink($file_path);
        }
    }
    //If we got here, it means the operation was successful, it will be nice if we output a nice message to user.
    echo "The files with prefix of '0aH' have been deleted successfully. ";
} catch (Exception $e) {
    // if we are in development mode, we may append exception to see what went wrong
    echo "Something went wrong, could you please try again " . $e; //append the exception but in the production, we will remove it.
} 
