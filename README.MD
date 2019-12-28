# Img2Webp
    
A php class to transform a jpg or png file into Webp.

## Required : 

php 7 + mod_GD2 must be installed / 

Used path and files must be configured for r/w

## Example / usage

        require('Img2Webp.php');
        $webp = new Img2Webp();
        $webp->createWebp('test.jpg', 'test.webp');