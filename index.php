<?php
/*
Plugin Name: Meet The Ipsums
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: The penultimate Lorem Ipsum Shortcode Generator
Version: 1.0
Author: John Hartley
Author URI: http://www.johnbhartley.com
License: GPL2
*/

function mti_standard_ipsum( $atts ) {
	extract( shortcode_atts( array(
		'p' => '5'
	), $atts ) );

	return "foo = {$p}";
}
add_shortcode( 'lorem', 'mti_standard_ipsum' );


// NEEDS WORK
// Fillerama Ipsum integrator
function mti_fillerama_ipsum( $atts ) {
	extract( shortcode_atts( array(
		'ipsum' => 'starwars',
		'count' => '5',
		'p'		=> '3'
	), $atts ) );

	$count 	= "{$count}";
	$ipsum 	= "{$ipsum}";
	$p 		= "{$p}";
	$tcount = $p*$count;
	$json = "http://api.chrisvalleskey.com/fillerama/get.php?count=".$tcount."&format=json&show=".$ipsum;

	$json_string =    file_get_contents($json);
	$parsed_json = json_decode($json_string, true);
	
	echo '<ol>';
	foreach($parsed_json as $key) {
		$i = 1;
		while($i <= $tcount) {
			echo '<li>'.$key[$i]['quote']. '</li>';
			$i++;
		}   // etc
		
	}
	echo '</ol>';

}
add_shortcode( 'fillerama', 'mti_fillerama_ipsum' );

// ZOMBIE IPSUM
function mti_zombie_ipsum( $atts ) {
	extract( shortcode_atts( array(
		'p' => '5'
	), $atts ) );

	$p = "{$p}";

	// include the array of text
	include_once('ipsums/zombie.php');

	// shuffle them zombies
	shuffle($zombarray);

	// grab $p amount of <p>
	$zombarray = array_slice($zombarray, 0, $p);
	
	// line up and output the zeds
	foreach($zombarray as $brain) {
		echo $brain;
	}
}
add_shortcode( 'zombie', 'mti_zombie_ipsum' );

// CAT IPSUM
function mti_kitty_ipsum( $atts ) {
	extract( shortcode_atts( array(
		'p' => '5'
	), $atts ) );

	$p = "{$p}";

	// include the array of text
	include_once('ipsums/kitty.php');

	// shuffle them zombies
	shuffle($kittycats);

	// grab $p amount of <p>
	$kittycats = array_slice($kittycats, 0, $p);
	
	// line up and output the zeds
	foreach($kittycats as $meow) {
		echo $meow;
	}


}
add_shortcode( 'kitty', 'mti_kitty_ipsum' );

// BACON IPSUM
function mti_bacon_ipsum( $atts ) {
	extract( shortcode_atts( array(
		'p' => '3',
		'type' => 'all-meat'
	), $atts ) );

	$p = "{$p}";
	$type = "{$type}";
	$bacon = 'http://baconipsum.com/api/?type='.$type.'&paras='.$p;
	
	// get the contents of the json file
	$strip = file_get_contents($bacon);
	
	// read the json as an array
	$strip = json_decode($strip, true);
		
	// line up and output the bacon
	foreach($strip as $delicious) {
		echo '<p>'.$delicious.'</p>';
	}

}
add_shortcode( 'bacon', 'mti_bacon_ipsum' );


// Lorem Ipsum



// Coffee Ipsum
// http://coffeeipsum.com/

// Bluth Ipsum
// http://bluthipsum.com/



// Veggie Ipsum
// http://veggieipsum.com/




// Corporate Ipsum
// view-source:http://www.cipsum.com/



// TV Ipsum
// http://tvipsum.com/?paragraphs=5


// NEEDS WORK
// Hipster Ipsum
// http://hipsterjesus.com/api/?paras=5&type=hipster-latin&html=true

function mti_hipster_ipsum( $atts ) {
	extract( shortcode_atts( array(
		'p' => '4',
		'type' => 'hipster-latin'
	), $atts ) );
	
	$mustache = 'http://hipsterjesus.com/api/?paras='.$p.'&type='.$type.'&html=true';
	
	// get the contents of the json file
	$skinny_jeans = file_get_contents($mustache);

	$typewriter = json_decode($skinny_jeans, true);
	
	// line up and output the bacon
	$original_hipster = '';
	foreach($typewriter as $unique) {
		$original_hipster .= '<p>'.$unique.'</p>';
	}
	return $original_hipster;
}
add_shortcode( 'hipster', 'mti_hipster_ipsum' );




// Pommie Ipsum
// http://www.pommyipsum.com/text.php/?selection=10
function mti_pommie_ipsum( $atts ) {
	extract( shortcode_atts( array(
		'p' => '3',
	), $atts ) );

	$cricket = 'http://www.pommyipsum.com/text.php/?selection='.$p;
	
	// get the contents of the json file
	$bedford = file_get_contents($cricket);
	return $bedford;
}
add_shortcode( 'pommie', 'mti_pommie_ipsum' );



// Cheese Ipsum
// ipsums/cheese.php



// Gangsta Ipsum
// http://lorizzle.nl/?feed=1

// Samuel L Ipsum
// http://slipsum.com/ipsum/


// Hairy Ipsum
// http://hairylipsum.com/

// Cupcake Ipsum
// http://cupcakeipsum.com/#/paragraphs/5/length/medium/with_love/false/start_with_cupcake/false/seed/

// Sagan Ipsum
// http://saganipsum.com/?p=4&latin=1



// Skate Ipsum
// http://skateipsum.com/get/3/1/JSON

function mti_skater_ipsum( $atts ) {
	extract( shortcode_atts( array(
		'p' => '3',
	), $atts ) );

	$tony_hawk = 'http://skateipsum.com/get/'.$p.'/0/JSON';
	
	// get the contents of the json file
	$burnquist = file_get_contents($tony_hawk);
	
	// read the json as an array
	$big_air = json_decode($burnquist, true);
	
	$skateboard = '';

	// line up and output the bacon
	foreach($big_air as $sweet) {
		$skateboard .= '<p>'.$sweet.'</p>';
	}

	return $skateboard;

}
add_shortcode( 'skater', 'mti_skater_ipsum' );

// Pirate Ipsum
// http://pirateipsum.me/index.php

// Beer Ipsum
// http://beeripsum.com/?paragraphs=5

// Tuna Ipsum
// http://tunaipsum.com/?paragraphs=7

// Dungeons and Dragons Ipsum
// http://www.dndipsum.com/make/



// Sheen Ipsum
//http://vaticanassass.in/index.php?elem=p&nbr=9&sent=1

// Metaphor Ipsum

function mti_metaphor_ipsum( $atts ) {
	extract( shortcode_atts( array(
		'p' => '3',
		's' => '5'
	), $atts ) );

	$simile = 'http://metaphorpsum.com/paragraphs/'.$p.'/'.$s.'/?p=true';
	
	// get the contents of the json file
	$likeas = file_get_contents($simile);
	echo $likeas;
}
add_shortcode( 'metaphor', 'mti_metaphor_ipsum' );



// NEEDS WORK
// Alien Ipsum

function mti_alien_ipsum( $atts ) {
	extract( shortcode_atts( array(
		'p' => '3',
		's' => '5'
	), $atts ) );

	$w = $p*$s+20;

	$riley = 'http://ancientalienipsum.com/wp-content/themes/twentyeleven/ajax_words.php/?number_of_words='.$w;

	// get the contents of the json file
	$flamethrower = file_get_contents($riley);
	$popeggs = wordwrap($flamethrower, 200, "</p><p>");
	echo '<p>'.$popeggs.'</p>';
}
add_shortcode( 'alien', 'mti_alien_ipsum' );




// Cajun Ipsum ipsums/cajun.php






// Batman Ipsum
function mti_batman_ipsum( $atts ) {
	extract( shortcode_atts( array(
		'p' => '5'
	), $atts ) );

	// include the array of text
	include_once('ipsums/batman.php');

	// shuffle them zombies
	shuffle($bruce_wayne);

	// grab $p amount of <p>
	$bruce_waynes = array_slice($bruce_wayne, 0, $p);
	
	// line up and output the zeds
	foreach($bruce_waynes as $batman) {
		echo $batman;
	}


}
add_shortcode( 'batman', 'mti_batman_ipsum' );
