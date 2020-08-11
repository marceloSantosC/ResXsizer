<?php
require_once("config.php");
function HandleImage(string $inputName, $percentage){
    $file = VerifyImage($inputName);
    $fileextension = $file["extension"];
    $extension = $file["extension_index"];
    $fileName = "temp-img-".time().rand(1, 200).".$fileextension";
    
    move_uploaded_file($file["tmp_name"], $file["name"]);

    rename($file["name"], $fileName);

    $new_FileName = ResizeImage($fileName, $extension, $percentage);
    unlink($fileName);

    return $new_FileName;
}