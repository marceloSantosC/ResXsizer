<?php

function VerifyImage(string $inputName){
    $file = isset($_FILES[$inputName]) ? $_FILES[$inputName] : false;

    if(!$file) {
        throw new Exception("A imagem não foi recebida ou contém erros!");
    } 
    if($file["error"]) {
            throw new Exception("Error: ". $file["error"]);
    }

    $config = array(
        "maxSize"=>20000000,
        "extensions"=>array('png', 'jpeg', 'jpg')
    );
    
    $file["extension"] = pathinfo($file["name"], PATHINFO_EXTENSION);
    $file["extension_index"] = array_search($file["extension"], $config["extensions"]);

    if(!in_array($file["extension"], $config["extensions"])) { 
        throw new Exception("Formato inválido! A imagem deve ser jpg, jpeg ou png."); 
    } 
    else {
        if($file["size"] > $config["maxSize"]) { 
            throw new Exception("Erro: A imagem deve ser de no máximo " . $config["maxSize"] . " bytes.");
         }
    }
    
    return $file;
}

?>