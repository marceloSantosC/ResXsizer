<?php

function ResizeImage(string $filePath, $directory, int $extension, $percentage){
    list($old_width, $old_height) = getimagesize($filePath);
    $new_width = $percentage * $old_width;
    $new_height = $percentage * $old_height;
    
    $new_image = imagecreatetruecolor($new_width, $new_height);
    $old_image = NULL;
    $new_path = NULL;

    if($extension === 0) {
        $old_image = imagecreatefrompng($filePath);
        imagecopyresampled($new_image, $old_image, 0, 0, 0,
            0, $new_width, $new_height, $old_width, $old_height);

        $new_path = "resized-img-" . time() . rand(1, 200) . ".png";

        imagepng($new_image, $new_path);
    }  
    else if ($extension === 1 || $extension === 2) {
        $old_image = imagecreatefromjpeg($filePath);
        imagecopyresampled($new_image, $old_image, 0, 0, 0,
        0, $new_width, $new_height, $old_width, $old_height);

        $img_extension = $extension === 1 ? ".jpeg" : ".jpg";
        $new_path =  $directory . "resized-img-" . time() . rand(1, 200) . $img_extension;

        imagejpeg($new_image, $new_path);
    }

    imagedestroy($old_image);
    imagedestroy($new_image);

    return $new_path;
}
?>