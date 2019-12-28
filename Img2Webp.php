<?php 

class Img2Webp{

    public $array_ext;


    /**
     * Prepare array of authorised extensions.
     * 
     * @param array $array_ext array of authorised extensions. 
     * 
     */

    function __construct( array $array_ext = array( 0 => 'png', 1 => 'jpg', 2 => 'jpeg') )
    {
        $this->array_ext = $array_ext; 
    }


    /**
     * Get mime type and extension getimagessize method.
     * 
     * @param string $origine file name & path of original image. 
     * @return bol true if extension valid
     */

    function getInfos( string $origine )
    {
        if(file_exists($origine)){ 
            @$img_infos = getimagesize($origine);
            if
            ( 
                isset($img_infos[0]) && 
                isset($img_infos[0])!==false && 
                isset($img_infos['mime']) 
            )
            {  
                $extension = str_replace ('image/','',$img_infos['mime']);
                if(in_array($extension,$this->array_ext)) 
                { 
                    $this->extension = $extension;
                    return true;
                }
            }
        }
    } 


    /**
     * Get mime type and extension getimagessize method.
     * 
     * @param string $origine file name & path of original image.
     * @param string $destination file name & path for destination image.
     * @return bol true if new webp file is present
     */


    function createWebp( string $origine, string $destination )
    {
        if
        (
            $this->getInfos($origine) === true && 
            in_array($this->extension,$this->array_ext)
        ) 
        { 
            if($this->extension === 'png')
            {
                @$webp = imagewebp(imagecreatefrompng($origine), $destination);
            }
            if
            (
                $this->extension === 'jpg' ||
                $this->extension === 'jpeg'
            )
            { 
                @$webp = imagewebp(imagecreatefromjpeg($origine), $destination);  
            }
            if(file_exists($destination))
            { 
                //unlink($origine); //optional
                return true; 
            }
        }  
    }
}
