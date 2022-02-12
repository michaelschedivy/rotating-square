<?php

  header('Content-type: image/png');
  $png_image = imagecreate(1000,1000);
  imagecolorallocate($png_image, 255, 255, 255);
  $black = imagecolorallocate($png_image, 0, 0, 0);
  $red = imagecolorallocate($png_image, 255, 0, 0);
  $grey = imagecolorallocate($png_image, 100, 100, 100);
 // Konstanty
  $stred_x=500;
  $stred_y=500;

  
  // Prepocet polarni na kartezske
  function PrepocetPol_X_NaKart($r, $alpha) {
      return $r*cos(-1*$alpha*3.1415/180);
  }
  function PrepocetPol_Y_NaKart($r, $alpha) {
      return $r*sin(-1*$alpha*3.1415/180);
  }
  
  
  
$rotace = $_GET["rotace"];

  $A = array(
  	"x1" => $stred_x,
  	"y1" => $stred_y,
  	"x2" => $stred_x + PrepocetPol_X_NaKart(200, 45+$rotace),
  	"y2" => $stred_x + PrepocetPol_Y_NaKart(200, 45+$rotace)  	
  );
  $B = array(
  	"x1" => $stred_x,
  	"y1" => $stred_y,
  	"x2" => $stred_x + PrepocetPol_X_NaKart(200, 45+90+$rotace),
  	"y2" => $stred_x + PrepocetPol_Y_NaKart(200, 45+90+$rotace)  	
  );
  $C = array(
  	"x1" => $stred_x,
  	"y1" => $stred_y,
  	"x2" => $stred_x + PrepocetPol_X_NaKart(200, 45+90+90+$rotace),
  	"y2" => $stred_x + PrepocetPol_Y_NaKart(200, 45+90+90+$rotace)  	
  );
  $D = array(
  	"x1" => $stred_x,
  	"y1" => $stred_y,
  	"x2" => $stred_x + PrepocetPol_X_NaKart(200, 45+90+90+90+$rotace),
  	"y2" => $stred_x + PrepocetPol_Y_NaKart(200, 45+90+90+90+$rotace)  	
  );
  $D = array(
      "x1" => $stred_x,
      "y1" => $stred_y,
      "x2" => $stred_x + PrepocetPol_X_NaKart(200, 45+90+90+90+$rotace),
      "y2" => $stred_x + PrepocetPol_Y_NaKart(200, 45+90+90+90+$rotace)
  );

  // ImageLine($png_image, x1, y1, x2, y2, color)

  imageline($png_image, $A["x2"], $A["y2"], $B["x2"], $B["y2"], $red);
  imageline($png_image, $B["x2"], $B["y2"], $C["x2"], $C["y2"], $red);  
  imageline($png_image, $C["x2"], $C["y2"], $D["x2"], $D["y2"], $red);  
  imageline($png_image, $D["x2"], $D["y2"], $A["x2"], $A["y2"], $red);  

  //imageline($png_image, 100, 1000-100, 900,1000-100, $black);
//  imageline($png_image, 100, 1000-900, 900,1000-900, $black);

  // Horizontalni cary
   for($i=0; $i<1000; $i=$i+100) {
		imagedashedline($png_image, 0, $i, 1000, $i, $black);

   }
  // Vertikalni cary
   for($i=0; $i<1000; $i=$i+100) {
		imagedashedline($png_image, $i, 0, $i, 1000, $black);

   }

  imagepng($png_image);
  imagedestroy($png_image);
?>