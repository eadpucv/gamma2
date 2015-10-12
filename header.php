<!doctype html>
<head>
  <meta charset='UTF-8'/>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title><?php wp_title('|') ?></title>
  <link rel="icon" type="image/x-icon" href="favicon.ico" />
  <?php wp_head(); ?>
</head>

<?php 
    global $_set;
    $settings = $_set->settings;
 ?>
<body <?php body_class(); ?>>
<!-- Menú dropdown -->
<div class="oculto-xs nav-ead">
  <div class="pag sin-relleno borde">
  	<div class="bloque auto margen-inf-sm en-linea izquierda cf">
  		<div class="izquierda margen-der-xs logo en-linea">
      		<span class="bloque izquierda sombra-cabecera-claro-xs relleno-der-xs rojo sans"><a class="lg ead sans" href="<?php bloginfo("url") ?>">e[ad]</a></span>
  		</div>
  	<div class="izquierda relleno-sup-xs logo en-linea">
      <!--<span class='sm sans bloque negro'>Escuela de arquitectura y diseño</span>-->
      <!--<span class='xs bloque izquierda sans negro-fundido en-linea'>Pontificia universidad católica de Valparaíso</span>-->
  	</div>
  	</div>
      <!-- <div class="nav-busqueda-login">
        <a href="#"><i class="icn icn-usuario"></i> <span>"Username"</span></a>
        <input type="text" class="form-control" placeholder="Buscar">
      </div> -->
      <div class="nav-login">
      <?php 
        $current_user = wp_get_current_user();
        $admin_link = ( is_user_logged_in() ) ? admin_url('profile.php') : admin_url();
        $admin_user = ( is_user_logged_in() ) ? '<span>'.$current_user->display_name.'</span>' : '';
       ?>
        <a href="<?php echo $admin_link ?>"><i class="icn icn-usuario"></i> <?php echo $admin_user; ?></a>
      </div>
      <?php 
      	$args = array(
      		'theme_location' => 'principal',
      		'container' => '',
      		'menu_class' => 'nav nav-pills margen-inf-xs en-linea margen-izq-xs izquierda',
          'walker' => new Walker_Nav_Menu_ead()
      	);
      
      	wp_nav_menu( $args ); ?>
        <?php get_search_form(); ?>
  </div>
</div>


<!-- Menú responsivo -->
<div class="oculto-lg oculto-md oculto-sm">
  <div class="fondo-blanco">
    <div class="pag menu-movil">
      <div class="centrado bloque izquierda margen-der-xs logo en-linea">
        <h1 class="sm linea centrado sans"><a class="sans rojo centrado" href="<?php bloginfo('url') ?>">e[ad]</a></h1>
      </div>
      <!--<div class='izquierda ancho-auto relleno-inf-xs logo en-linea'>
        <span class='sm sans bloque blanco'>Escuela de Arquitectura y Diseño</span>
        <span class='xs bloque izquierda sans blanco en-linea'>Pontificia universidad católica de Valparaíso</span>
      </div>-->
      <a href="#menu" class="menu-link rojo derecha"><i class="icn icn-lg icn-menu"></i></a>
    </div>
    <nav id="menu" class="lista-sin-estilo" role="navigation">
    <?php 
        $args = array(
          'theme_location' => 'principal',
          'container' => '',
          'menu_class' => 'menu-movil-categorias',
          'walker' => new Walker_Nav_Menu_ead_mobile()
        );
      
        wp_nav_menu( $args ); ?>
    </nav>
  </div>
</div>