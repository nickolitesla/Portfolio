<?php
/*
	N. Fowler
	12/12/2018
	CSC230
	blend.php - blends colors together. 
*/

/*

Background info about HTML/CSS hexadecimal colors

As an example, the color aquamarine is represented by the string "#7FFFD4". Here's how the string 
breaks down:

 - The first character is always "#".

 - The second and third character are the red channel value, represented as a hexadecimal value 
   between 00 and FF. In this example, the red channel value is 127, which in hexadecimal is 7F.

 - The fourth and fifth character are the green channel value, represented the same way. In this 
   example, the green channel value is 255, which in hexadecimal is FF.

 - The sixth and seventh character are the blue channel value, represented the same way. In this 
   example, the blue channel value is 212, which in hexadecimal is D4.


Complete the blendedColor function to solve for the blended color. The blended color should be based 
on average red, green, and blue values.

(This is not actually the best way to blend two hex colors: to do it properly you need gamma 
correction. But we'll leave that for another time!)

*/

startHTML();

//need to blend the colors in the array
showColors(array("#FF6347","#B8860B"));
showColors(array("#E6E6FA", "#FF69B4", "#B0C4DE")); //"#DCB1D9"

endHTML();
  

function showColors ($colors) {
	for ($i = 0; $i < count($colors); $i++)
		colorBox($colors[$i], "Color ".$i);
	colorBox(blendedColor($colors),"Blended");
}


function magic($r, $g, $b){

	//intiatlizing my variables
	$rfinal = 0;
	$gfinal = 0; 
	$bfinal = 0;
	$rgbarr = array();

	//all these foreach's iterate over the rgb in the
	//color and add them and divide them by 2
	//It might be that for items that have 3 colors
	//we would need to divide by 3, meaning we need
	//to divide by count($r) ect. However, the result
	//from /2 seems cleaner.
	foreach($r as $color){
	$rfinal = ($rfinal + $color)/count($r);
	}

	if($rfinal > 255){
		$rfinal = 255;
	}

	foreach($g as $color){
		$gfinal = ($gfinal + $color)/count($r);
	}

	if($gfinal > 255){
		$gfinal = 255;
	}

	foreach($b as $color){
		$bfinal = ($bfinal + $color)/count($r);
	}

	if($bfinal > 255){
		$bfinal = 255;
	}

	//this decimal values to hex values 
	$rdec = dechex($rfinal);
	$gdec = dechex($gfinal);
	$bdec = dechex($bfinal);

	//this puts the hex values back in order
	//and reading to be interpreted by showColors.
	$blendedColor =  '#' . $rdec . $gdec . $bdec;

	return $blendedColor;

}


function blendedColor ($colors) {
	$blendedColor = "#000000";

	//intialize variables
	$r = array();
	$g = array();
	$b = array();


	//gets the hexidecimal value of each color in the array
	//and stores it to the rgb array
	for($i = 0; $i < count($colors); $i++){
		
		//hex values of the color stored in arrays
		$r[$i] = hexdec(substr($colors[$i], 1,2));
		$g[$i] = hexdec(substr($colors[$i], 3,2));	
		$b[$i] = hexdec(substr($colors[$i], 5,2));
	}

	//sets blendedColor to my magic functions return
	$blendedColor = magic($r, $g, $b);

	return $blendedColor;
}


function colorBox ($color, $label = "") {
	if ($label == "")
		$label = $color;
	
	echo '<p>'.$label.' ('.$color.'): <span class="box" style="background-color: '.$color.'"></span></p>'."\n";
}


function startHTML () {
?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Extra Credit</title>
  <style>
  body {font-family: monospace}
  .box { height: 2em; width: 5em; display: inline-block }
  </style>
</head>

<body>
<?php
}

function endHTML () {
?>
</body>
</html>
<?php
}