<?php

class Messages
{
    public static function setMsg($text, $type){
        if($type == 'error'){
            $_SESSION['errorMsg'] =$text;
        }elseif ($type == 'warning'){
            $_SESSION['warningMsg'] =$text;
        }else{
            $_SESSION['successMsg'] =$text;
        }
    }

    public static function display(){
        if(isset($_SESSION['errorMsg'])){
            echo '<div class="alert alert-danger alert-dismissable">'.$_SESSION['errorMsg'].'</div>';
            unset($_SESSION['errorMsg']);
        }elseif ($_SESSION['warningMsg']){
            echo '<div class="alert alert-warning alert-dismissable">'.$_SESSION['warningMsg'].'</div>';
            unset($_SESSION['warningMsg']);
        }elseif ($_SESSION['successMsg']){
            echo '<div class="alert alert-success alert-dismissable">'.$_SESSION['successMsg'].'</div>';
            unset($_SESSION['successMsg']);
        }
    }

}