<?php 
/*
	Template name: Portadilla postgrado
*/
get_header(); 
the_post();
?>

<div class="fondo-gris-blanco-trans-xs oculto-sm oculto-xs relleno-sup-xs">
  <div class="pag sin-relleno gutter">
    <div class="fila relleno-sup-xs">
      <div class="col-md-12">
        <div class="bloque ancho-completo">
            <?php sitio::get_breadcrumb(array('sin-relleno', 'margen-sup-sm', 'centrado', 'margen-inf-xs')); ?>
            <h1 class="md rojo condensado gruesa centrado interletraje-xs">—<?php the_title(); ?> —</h1>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="oculto-lg oculto-md">
	<div class="pag sin-relleno gutter">
      <div class="bloque ancho-completo">
        <!-- Breadcrumbs -->
          <?php sitio::get_breadcrumb(array('sin-relleno', 'margen-sup-sm', 'centrado', 'margen-inf-xs')); ?>
          <h1 class="lg rojo condensado gruesa borde relleno-inf-xs inf-lineal-xs"><?php the_title() ?></h1>
      </div>
  </div>
</div>
<?php render::carousel_portadilla('postgrado'); ?>

<div id="portadilla">
<!-- Pag para page (para toda la página) -->
<div class="pag page gutter">
<!-- Breadcrumbs -->
  <!-- Contenido 1/8 -->
  <div class="fila margen-sup-sm">
  	<div class="col-md-9 col-sm-8 col-xs-12">
  		<?php the_content(); ?>
  	</div>
    <aside id="sidebar">
  		<div class="col-md-3 col-sm-4 col-xs-12">
  			<?php dynamic_sidebar( 'sidebar-template' ); ?>
  		</div>
  	</aside>
  </div> <!-- fin de fila-->
</div> <!-- fin de * pag page * -->
</div> <!-- fin de portadilla -->
<?php get_footer(); ?>