<?php
require_once("config.php");
function HandleImage(string $inputName, $percentage){
    $file = VerifyImage($inputName);
    $fileextension = $file["extension"];
    $extension = $file["extension_index"];
    $directory = "temp_imgs/";
    $fileName =  "temp-img-".time().rand(1, 200).".$fileextension";
    move_uploaded_file($file["tmp_name"], $fileName);

    $new_FileName = ResizeImage($fileName, $directory, $extension, $percentage);
    unlink($fileName);

    return $new_FileName;
}