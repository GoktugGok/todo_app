<?php

const BASEDIR = '/opt/lampp/htdocs/çalışmalar/TodoApp';
const URL = 'http://localhost/çalışmalar/TodoApp/';
const DEV_MODE = true;

try{
    $db = new PDO('mysql:host=localhost;dbname=todoapp','root','');
}catch(PDOException $e){
    echo $e->getMessage();
}