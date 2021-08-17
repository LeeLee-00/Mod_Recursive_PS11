#!/usr/bin/php -d display_errors
<?php
error_reporting(E_ALL);
//above causes php to send errors to the console, instead of hiding them.

/**
 * The Division Algorithm
 */

 /* Lee J noel
 Discrete Math
 Problem Set 11

/**
 * This method implements the division algorithm, using a while loop, 
 * but only returns the remainder.
 * 
 * It takes as input $a as an integer  
 * and d as a positive integers, computes a/d
 */
function modwhile(int $a, int $d) {
	if ($d < 1) {
		throw new InvalidArgumentException('divisionAlg requires divisor be positive.  Input was: ' . $d);
	} 
	$r = $a; //this will become the remainder
	
	/*
	 * This handles negatives.
	 */
	while ($r < 0) {
		$r = $r + $d;
		//print( "r: " .  $r ); //debug code
	}
	
	while ($d <= $r) {
		$r = $r - $d;
		//print( "r: " .  $r ); //debug code
	}
	return $r;
}

/**
 * @TODO Write a recursive version of the above function.
 */

function modrecursive(int $a, int $d) {
	
	//Your code here
	if($d < 1) {	
		throw new InvalidArgumentException('divisionAlg requires divisor be positive. Input was:'.$d);
	}
	$r = $a;	// becomes the remainder
	while ($r < 0) {	// handles the negatives
		$r = $r + $d;
	}
	if($r < $d) {	
		return $r;
	}
	else {
		$The_results = modrecursive($r-$d,$d);	// used the third while loop from the code function above
	}
	return $The_results;		// returns the results
}
	
	
/**
 * The following code tests your function  Please do not modify it.
 */
//Handles positives, with remainder
if (modwhile(15,4) == modrecursive(15,4)) {
	print( "Handles Positives with Remainder : \033[0;32mPASSED\033[0m\n\n" );
} else { 
	print( "Handles Posatives with Remainder : \033[0;31mFAILED\033[0m\n\n" );	
}
//Handles positives, no remainder
if (modwhile(15,5) == modrecursive(15,5)) {
	print( "Handles Positives without Remainder : \033[0;32mPASSED\033[0m\n\n" );
} else { 
	print( "Handles Positives without Remainder : \033[0;31mFAILED\033[0m\n\n" );	
}
//Handles Negatives, with remainder
if (modwhile(-27,6) == modrecursive(-27,6)) {
	print( "Handles Negatives with Remainder : \033[0;32mPASSED\033[0m\n\n" );
} else { 
	print( "Handles Negatives with Remainder : \033[0;31mFAILED\033[0m\n\n" );	
}
//Handles Negatives, without remainder
if (modwhile(-27,3) == modrecursive(-27,3)) {
	print( "Handles Negatives without Remainder : \033[0;32mPASSED\033[0m\n\n" );
} else { 
	print( "Handles Negatives without Remainder : \033[0;31mFAILED\033[0m\n\n" );	
}
