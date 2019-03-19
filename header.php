<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#a61206">

    <?php wp_head();?>
</head>
<!--Afegim classes Extres al Body per tal de poder especialitzar més les consultes CSS-->
<body <?php body_class() ?>>
<header class="encabezado-sitio" style="background-image: url(<?php echo get_theme_mod('my-job-foto');?>">
    <div class="contenedor">
    <div class="menu-principal">
        <div class="mobile-menu">
            <a href="#" class="mobile"> <i class="fas fa-bars"></i>Menú </a>
        </div>
        <div class="contenedor navegacion">
        <!--<div class="logo">
            <a href="<?php /*echo esc_url(home_url('/'));*/?>">
                <p>LOGO</p>
            </a>
        </div>--><!--logo-->
        <span class="clear"></span>
            <?php 
                $args =array(
                    'theme_location' => 'header-menu',
                    'container'=>'nav',
                    'container_class' => 'menu-sitio'
                );
                wp_nav_menu($args);
            ?>
         </div>
    </div>
  </div>
</header>