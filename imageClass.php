<?php 

class Image{

    public function cropImage($originFileName, $croppedImage, $maxWidth, $maxHeight, $imageType){
        if(file_exists($originFileName) && $imageType == "image/jpeg"){
            $originImage = imagecreatefromjpeg($originFileName);
            $originWidth = imagesx($originImage);
            $originHeight = imagesy($originImage);
            if($originHeight > $originWidth){
                //make width equal to max width;
                $ratio = $maxWidth / $originWidth;
                $newWidth = $maxWidth;
                $newHeight = $originHeight * $ratio;
            }else{
                //make height equal to max height
                $ratio = $maxHeight / $originHeight;
                $newHeight = $maxHeight;
                $newWidth = $originWidth * $ratio; 
            }
            if($maxWidth != $maxHeight){
                if($maxHeight > $maxWidth){
                    if($maxHeight > $newHeight){
                        $adjustment = ($maxHeight / $newHeight);
                    }else{
                        $adjustment = ($newHeight / $maxHeight);
                    }
                    $newWidth = $newWidth * $adjustment;
                    $newHeight = $newHeight * $adjustment;
                }else{
                    if($maxWidth > $newWidth){
                        $adjustment = ($maxWidth / $newWidth);
                    }else{
                        $adjustment = ($newWidth / $maxWidth);
                    }
                    $newWidth = $newWidth * $adjustment;
                    $newHeight = $newHeight * $adjustment;
                }
            }
            $newImage = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($newImage, $originImage, 0,0,0,0, $newWidth, $newHeight, $originWidth, $originHeight);
            imagedestroy($originImage);
            //other one
            if($maxWidth != $maxHeight){
                if($maxWidth > $maxHeight){
                    $diff = ($newHeight - $maxHeight);
                    if($diff < 0){
                        $diff = $diff * -1;
                    }
                    $y = round($diff / 2);
                    $x = 0;
                }else{
                    $diff = ($newWidth - $maxWidth);
                    if($diff < 0){
                        $diff = $diff * -1;
                    }
                    $y = round($diff / 2);
                    $x = 0;
                }
            }else{
                if($newHeight > $newWidth){
                    $diff = ($newHeight - $newWidth);
                    $y = round($diff / 2);
                    $x = 0;
                }else{
                    $diff = ($newWidth - $newHeight);
                    $y = round($diff / 2);
                    $x = 0;
                }     
            }
            $newCroppedImage = imagecreatetruecolor($maxWidth, $maxHeight);
            imagecopyresampled($newCroppedImage, $newImage, 0,0,$x,$y, $maxWidth, $maxHeight, $maxWidth, $maxHeight);
            imagedestroy($newImage);
            imagejpeg($newImage, $croppedImage, 90);
            imagedestroy($newCroppedImage);

        }else if(file_exists($originFileName) && $imageType == "image/png"){
            $originImage = imagecreatefrompng($originFileName);
            $originWidth = imagesx($originImage);
            $originHeight = imagesy($originImage);
            if($originHeight > $originWidth){
                //make width equal to max width;
                $ratio = $maxWidth / $originWidth;
                $newWidth = $maxWidth;
                $newHeight = $originHeight * $ratio;
            }else{
                //make height equal to max height
                $ratio = $maxHeight / $originHeight;
                $newHeight = $maxHeight;
                $newWidth = $originWidth * $ratio; 
            }

            //here
            //adjust incase max width and height are different
            if($maxWidth != $maxHeight){
                if($maxHeight > $maxWidth){
                    if($maxHeight > $newHeight){
                        $adjustment = ($maxHeight / $newHeight);
                    }else{
                        $adjustment = ($newHeight / $maxHeight);
                    }
                    $newWidth = $newWidth * $adjustment;
                    $newHeight = $newHeight * $adjustment;
                }else{
                    if($maxWidth > $newWidth){
                        $adjustment = ($maxWidth / $newWidth);
                    }else{
                        $adjustment = ($newWidth / $maxWidth);
                    }
                    $newWidth = $newWidth * $adjustment;
                    $newHeight = $newHeight * $adjustment;
                }
            }
            $newImage = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($newImage, $originImage, 0,0,0,0, $newWidth, $newHeight, $originWidth, $originHeight);
            imagedestroy($originImage);
            if($maxWidth != $maxHeight){
                if($maxWidth > $maxHeight){
                    $diff = ($newHeight - $maxHeight);
                    if($diff < 0){
                        $diff = $diff * -1;
                    }
                    $y = round($diff / 2);
                    $x = 0;
                }else{
                    $diff = ($newWidth - $maxWidth);
                    if($diff < 0){
                        $diff = $diff * -1;
                    }
                    $y = round($diff / 2);
                    $x = 0;
                }
            }else{
                if($newHeight > $newWidth){
                    $diff = ($newHeight - $newWidth);
                    $y = round($diff / 2);
                    $x = 0;
                }else{
                    $diff = ($newWidth - $newHeight);
                    $y = round($diff / 2);
                    $x = 0;
                }     
            }
            $newCroppedImage = imagecreatetruecolor($maxWidth, $maxHeight);
            imagecopyresampled($newCroppedImage, $newImage, 0,0,$x,$y, $maxWidth, $maxHeight, $maxWidth, $maxHeight);
            imagedestroy($newImage);
            imagepng($newImage, $croppedImage, 90);
            imagedestroy($newCroppedImage);
        }else{
            echo "Error on something wtf";
        }
    }
}
?>