<?php
require 'php/database.php';


if(isset($_SESSION['username'])){
    echo "bok";
}
else{
    if(isset($_POST['username'])){
        if(password_verify($_POST['password'], )){
            $_SESSION['username'] = $_POST['username'];
        }
        
    }
}


?>