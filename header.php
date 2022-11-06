<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title><?php wp_title( '-', true, 'right' ); ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link class="favicon" rel="favicon" href="<?php bloginfo('template_url')?>/images/favicon.png" type="image/png">
  </head>
<?php wp_head();?>
<body>
<div class="sub-menu">
  <div class="wrapper">
	  
	   <?php if (!function_exists('dynamic_sidebar')|| !dynamic_sidebar('Search')): endif;?>
  </div>
</div>
<header class="header">
  <div class="wrapper">
      <div class="header__content">
        <img class="header__logo" src="<?php bloginfo('template_url')?>/images/dibujo-digital.png" alt="" />
        <a class="logo-title" href="#">EasyDraw</a>
        
        <input type="checkbox" id="menu-btn" class="menu-btn">
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
        <ul class="menu">
        <?php wp_nav_menu(
          array(
              'container' => false,
              'items_wrap' => '<li class="menu-item"> %3$s </li>',
              'theme_location' => "top_menu"
          ));?>
        </ul>
      </div>
  </div>
</header>
 
