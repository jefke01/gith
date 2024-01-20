<?php
require "config.php";
function connect(){
    $mysqli = new mysqli(SERVER,USERNAME, PAASSWORD, DATABASE);
    if($mysqli->connect_errno != 0){
        $error = $mysqli->connect_error;
        $error_date = date("F j, Y, g:i a");
        $message = "{$error} | {$error_date} \r\n";
        file_put_contents("db-log.txt", $message, FILE_APPEND);
        return false;
    }else{
        return $mysqli;
    }
}
function registerUser($email,$username,$password,$confirm_password){
    $mysqli = connect();
    $args = func_get_args();

    $args = array_map(function($value){
        return trim($value);
    }, $args);

    foreach($args in $value){
        if(empty($value)){
            return "all fields are required"
        }
    }
    foreach($args in $value) {
        if (preg_match("/([<|>])/", $value)){
            return "<> characters are not allowed"
        }
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        return "email is invalid";
    }

    $stmt = $mysqli->prepare("SELECT email from users WHERE email = ?");
    $stmt->blind_param("s", $email);
    $stmt->execute();
    $resultaat = $stmt->get_result();
    $data = $result->fetch_assoc();
    if ($data != NULL){
        return "Email already exists, please use a different username"
    }

    if(strlen($username) > 50){
        return "Username is to long";
    }

    $stmt = $mysqli->prepare("SELECT username from users WHERE username = ?");
    $stmt->blind_param("s", $username);
    $stmt->execute();
    $resultaat = $stmt->get_result();
    $data = $result->fetch_assoc();
    if ($data != NULL){
        return "Username already exists, please use a different username"
    }

    if(strlen($password) > 50){
        return "Password is to long";
    }

    if($password != $confirm_password){
        return "Passwords don't match"
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO users(username")


}
function loginUser(){}
function logoutUser(){}
function passwdReset(){}
function deleteAccount(){}