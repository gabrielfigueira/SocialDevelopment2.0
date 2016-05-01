<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social</title>
    <link rel="stylesheet" href="<?php echo HOME_URL; ?>Views/layout/css/foundation.css">
    <link rel="stylesheet" href="<?php echo HOME_URL; ?>Views/layout/css/app.css">
    <link rel="stylesheet" href="<?php echo HOME_URL; ?>Views/layout/css/foundation-icons.css" />
    <link rel="stylesheet" href="<?php echo HOME_URL; ?>Views/layout/css/style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'>
    <style type="text/css">
      .img{
        height: 150px;
        width: 150px;
        padding: 10px;
        -moz-border-radius: 35px;
        border-radius: 35px;
        margin-left: 30px;
        } 
    </style>   
  </head>
  <body>



      <?php  if ( ! isset( $_SESSION['usuario'] ) ) { ?>

      <?php } else { ?>
        <div class="contain-to-grid sticky-large">
 <div class="top-bar sticky-large" data-topbar role="navigation" data-options="sticky_on: large">    
          <div class="top-bar-left">
              <ul class="menu">
                  <li class="menu-text"><a href="<?php echo HOME_URL . 'home' ?>">Social</a></li>
                  <li><a href="<?php echo HOME_URL . 'timeline' ?>"> Linha do Tempo</a></li>
              </ul>   
          </div>
          <div class="top-bar-right">
              <ul class="dropdown menu" data-dropdown-menu>      
                  <li>
                      <a href="#"><i class="fi-align-justify large"></i></a>
                      <ul class="menu vertical">
                      <?php $user = $_SESSION['usuario']['id'] ?>
                   <input type="hidden" value="<?php echo $user?>">
                    <?php if ($_SESSION['usuario']['foto_perfil'] == '') { ?>
                      <a style="color: black;" href="<?php echo HOME_URL . "user/form?id=$user" ?>"> <img class="img" src="/SocialDevelopment/Views/layout/imgs/user_sem_foto.jpg"></a>
                       <?php } else { ?>
                      <a style="color: black;" href="<?php echo HOME_URL . "user/form?id=$user" ?>"> <img class="img" src="public/<?php echo $_SESSION['usuario']['foto_perfil'] ?>"></a>
                       <?php } ?>
                                                                
                          <li><a href="#"><i class="fi-torso"> --<?php echo $_SESSION['usuario']['nome'] ?></i></a></li>                          
                          <li><a href="<?php echo HOME_URL . 'user/logout' ?>"><i class="fi-power">Sair</i></a></li>           
                      </ul>
                  </li>      
              </ul>
          </div>
      </div>
      </div> 
      <?php } ?>
