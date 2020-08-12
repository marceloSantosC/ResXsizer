<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReXsizer</title>
    <script>
        function setLink(link){
            console.log(link);
            a = document.getElementById("linkDownload");
            a.href = link;
            a.style = "display: inline;"

        }
    </script>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <p>A imagem deve ser do tipo PNG, JPG ou JPEG e ter no máximo 20mb.</p>
        <label for="iptUploadImg">Selecione uma imagem</label>
        <input type="file" id="iptUploadImg" name="iptUploadImg" required>
        </br>

        <label for="iptRang">Em quantos % do tamanho original a imagem deve ser redimensionada</label>
        <input formaction="HandleInput.php" type="number" name="iptRange" id="iptRange" min="1" max="200" required>
        <button type="submit">Enviar</button>
    </form>
    <a href="" download="" id="linkDownload" style="display:none;">Baixar</a>
</body>
</html>

<?php
require_once("config.php");

$percentage = NULL;
if(isset($_POST["iptRange"])) {
    $percentage = HandleInput("iptRange");
} 
if(isset($_FILES["iptUploadImg"])) {
    $new_path = '' . HandleImage("iptUploadImg", $percentage);
    echo 
    "<script>
        window.onload = () => { setLink('$new_path'); };
    </script>";
}

?>