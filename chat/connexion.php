<?php
function  connexion(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database="chat";
    
    $conn = mysqli_connect($servername, $username, $password,$database);
    
    if (!$conn){
        die("La connexion a échoué: ".mysqli_connect_error());
    }
    
    return $conn;
}

function execute($link,$query){
    $result=mysqli_query($link,$query);
    if(mysqli_errno($link)){
        exit(mysqli_error($link));
    }
    return $result;
}

function escape($link,$data){
    if(is_string($data)){
        return mysqli_real_escape_string($link,$data);
    }
    if(is_array($data)){
        foreach ($data as $key=>$val){
            $data[$key]=escape($link,$val);
        }
    }
    return $data;
    //mysqli_real_escape_string($link,$data);
}

function skip($url,$message){
    $html=<<<A
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<meta http-equiv="refresh" content="3;URL={$url}" />
<title>Sauter </title>
<link rel="stylesheet" type="text/css" href="../assets/css/remind.css" />
</head>
<body>
<div class="notice">{$message} <a href="{$url}">Sauter automatiquement après 3 secondes!</a></div>
</body>
</html>
A;
    echo $html;
    exit();
}

function is_login($link){
    if(isset($_COOKIE['chat']['nom']) && isset($_COOKIE['chat']['pass'])){
        echo $_COOKIE['chat']['nom'];
        $query="SELECT * FROM utilisateur WHERE NomdeUtilisateur='{$_COOKIE['chat']['nom']}' and MotdePasse='{$_COOKIE['chat']['pass']}' ";
        $result=execute($link,$query);
        if(mysqli_num_rows($result)==1){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
?>