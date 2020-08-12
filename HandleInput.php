<?php
function HandleInput($input_id){
    $data = $_POST[$input_id];
    $data = $data/100;
    return $data;
}