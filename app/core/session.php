<?php 

  require_once __DIR__ . '/config.php';

  require_once __DIR__ . '/init.php';


  if(isset($_SESSION['loged']) and $_SESSION['loged'] == true){
      
  }else{

      header("Location: login.php");
  }