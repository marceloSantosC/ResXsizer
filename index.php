<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReXsizer</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <p>A imagem deve ser do tipo PNG, JPG, JPEG e ter no máximo 20mb.</p>
        <label for="iptUploadImg">Selecione uma imagem para redimensionar</label>
        <input type="file" id="iptUploadImg" name="iptUploadImg" required><br>

        <label for="iptRang">Selecione em quantos % a imagem deve ser redimensionada</label>
        <input type="number" name="iptRange" id="iptRange" min="1" max="200" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

<?php
require_once("config.php");

if(isset($_FILES["iptUploadImg"])) {
    HandleImage("iptUploadImg", 0.50);
}




?>