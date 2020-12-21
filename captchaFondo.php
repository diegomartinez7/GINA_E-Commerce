<?php
    session_start();

    function randomText($length) {
        $key="";
        $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
        for($i=0;$i<$length; $i++){
            $key .= $pattern{rand(0,35)};
        }
        return $key;
    }

    $image = imagecreatetruecolor(200, 50);
 
    imageantialias($image, true);
 
    $colors = [];
 
    $red = rand(125, 175);
    $green = rand(125, 175);
    $blue = rand(125, 175);

    for($i = 0; $i < 5; $i++) {
        $colors[] = imagecolorallocate($image, $red - 20*$i, $green - 20*$i, $blue - 20*$i);
    }
 
    imagefill($image, 0, 0, $colors[0]);
 
    for($i = 0; $i < 10; $i++) {
        imagesetthickness($image, rand(2, 10));
        $rect_color = $colors[rand(1, 4)];
        imagerectangle($image, rand(-10, 190), rand(-10, 10), rand(-10, 190), rand(40, 60), $rect_color);
    }

    $black = imagecolorallocate($image, 0, 0, 0);
    $white = imagecolorallocate($image, 255, 255, 255);
    $textcolors = [$black, $white];
 
    $fonts = dirname(__FILE__).'\fonts\ALGER.ttf';
 
    $string_length = 6;
    $captcha = randomText(6);

    $_SESSION['captcha_text'] = $captcha; // esta variable es la que se debe verificar en el inicio de sesión
 
    for($i = 0; $i < $string_length; $i++) {
    $letter_space = 170/$string_length;
      $initial = 15;
   
    imagettftext($image, 20, rand(-15, 15), $initial + $i*$letter_space, rand(20, 40), $textcolors[rand(0, 1)], $fonts, $captcha[$i]);
    }
 
    header('Content-type: image/png');
    imagepng($image);
    imagedestroy($image);

?>