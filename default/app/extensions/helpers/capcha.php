<?php

/**
*  por: Gerardo Belot
*
* fecha: 28/04/2014
**/

/**
**
** Simplemente implementamos este el controlador deseado, la variable con el seguro de captcha se guarda
** en variables de sesion, solo las comparamos con un if(session::get("rand"))
** Para visualizar solo agregamos  <?php print Html::img("simpletext.jpg"); ?>
**
**/

/*

<div class="span12">
    <hr />
    <?php print Form::open("test") ?>
        <hr />
        <p> valor </p>
        <p><?php Print Form::text("rands"); ?>
        <p><?php print Form::submit('enviar') ?>
    <?php print Form::close() ?>
    <?php print Html::img("simpletext.jpg"); ?>
</div>    
*/


class capcha {

    public static function create_image() 
    { 
        $md5_hash = md5(rand(0,999)); 
        //We don't need a 32 character long string so we trim it down to 6
        $security_code = substr($md5_hash, 15, 6); 
        //Set the session to store the security code
        Session::set("rand", $security_code);
        //Set the image width and height 
        $width = 120; 
        $height = 25;  

        //Create the image resource 
        $image = ImageCreate($width, $height);  

        //We are making three colors, white, black and gray 
        $white = ImageColorAllocate($image, 255, 255, 255); 
        $black = ImageColorAllocate($image, 0, 0, 0); 
        $grey = ImageColorAllocate($image, 204, 204, 204); 

        //Make the background black 
        ImageFill($image, 0, 0, $black); 

        //Add randomly generated string in white to the image
        ImageString($image, 5, 40, 5, $security_code, $white); 

        //Throw in some lines to make it a little bit harder for any bots to break 
        ImageRectangle($image,0,0,$width-1,$height-1,$grey); 
        imageline($image, 0, $height/2, $width, $height/2, $grey); 
        imageline($image, $width/2, 0, $width/2, $height, $grey); 

        $path = "/home/ajax/www/kumbia/default/public/img/simpletext.jpg";
        ImageJpeg($image, $path); 
        //Free up resources
        ImageDestroy($image); 
    } 

}
