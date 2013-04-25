<?php	
// clean up the input
if ( empty($_POST['name']) )
	fatal_error('Error: No text specified.');

$text = $_POST['name'];
$text = strtoupper($text);
$text = substr($text,0,10);
//$text = html_entity_decode($_POST['name']);

if ( empty($text) )
	fatal_error('Error: Text not properly formatted.');

// customizable variables
$font_file 		= '/usr/share/fonts/truetype/msttcorefonts/ariblk.ttf';
$font_size  	= 30; // font size in pts
$font_color 	= '#EBEBEC';
$image_file 	= 'cocacola.png';

// x and y for the bottom right of the text
// so it expands like right aligned text

//$x_finalpos 	= abs($box[2] - $box[0]);
$box = @imagettfbbox($font_size,0,$font_file,$text);
$x_finalpos1 	= ( (404 - $box[2]) / 2 );
$x_finalpos		= (404 - $x_finalpos1) - 15; 
$y_finalpos 	= 110;

$mime_type 			= 'image/png';
$extension 			= '.png';
$s_end_buffer_size 	= 4096;

// check for GD support
if ( !function_exists('ImageCreate') )
	fatal_error('Error: Server does not support PHP image generation');

// check font availability;
if ( !is_readable($font_file) )
	fatal_error('Error: The server is missing the specified font.');

// create and measure the text
$font_rgb = hex_to_rgb($font_color);
$text_width = abs($box[2] - $box[0]);
$text_height = abs($box[5] - $box[3]);
$image =  @imagecreatefrompng($image_file);
if ( !$image || !$box )
	fatal_error('Error: The server could not create this image.');

// allocate colors and measure final text position
$font_color = imagecolorallocate($image,$font_rgb['red'], $font_rgb['green'], $font_rgb['blue']);
$image_width = imagesx($image);
$put_text_x = $image_width - $text_width - ($image_width - $x_finalpos);
$put_text_y = $y_finalpos;

// Write the text
imagettftext($image, $font_size, 0, $put_text_x,  $put_text_y, $font_color, $font_file, $text);
//header('Content-type: '.$mime_type);
$novo_nome = substr(md5(date("Y-m-d H-i-s")),0,5);
imagepng($image,'img/imagem_'.$novo_nome.'.png');
imagedestroy($image);
//header('Location:img/imagem_'.$novo_nome.'.png');
echo '<img src="http://lucasmoreira.com.br/gera-lata/img/imagem_'.$novo_nome.'.png" height="226" width="404" />';
exit;

/*
	attempt to create an image containing the error message given. 
	if this works, the image is sent to the browser. if not, an error
	is logged, and passed back to the browser as a 500 code instead.
*/
function fatal_error($message) {
	// send an image
	if ( function_exists('ImageCreate') ) {
		$width = imagefontwidth(5) * strlen($message) + 10;
		$height = imagefontheight(5) + 10;

		if ( $image = imagecreate($width,$height) ) {
			$background = imagecolorallocate($image,255,255,255);
			$text_color = imagecolorallocate($image,0,0,0);
			imagestring($image,5,5,5,$message,$text_color);
			header('Content-type: image/png');
			imagepng($image);
			imagedestroy($image);
			exit;
		}
	}

	// send 500 code
	header("HTTP/1.0 500 Internal Server Error") ;
	print($message) ;
	exit ;
}

/* 
decode an HTML hex-code into an array of R,G, and B values.
accepts these formats: (case insensitive) #ffffff, ffffff, #fff, fff 
*/    
function hex_to_rgb($hex) {
	// remove '#'
	if ( substr($hex, 0, 1) == '#' )
		$hex = substr($hex,1);

	// expand short form ('fff') color to long form ('ffffff')
	if ( strlen($hex) == 3 )
		$hex = substr($hex,0,1).substr($hex,0,1).substr($hex,1,1).substr($hex,1,1).substr($hex,2,1).substr($hex,2,1);

	if ( strlen($hex) != 6 )
		fatal_error('Error: Invalid color "'.$hex.'"');

	// convert from hexidecimal number systems
	$rgb['red'] = hexdec(substr($hex,0,2));
	$rgb['green'] = hexdec(substr($hex,2,2));
	$rgb['blue'] = hexdec(substr($hex,4,2));
	return $rgb;
}

?>
