<?php 
/*
	Template name: Portadilla postgrado
*/
get_header(); 
the_post();
global $post;
  if ( is_user_logged_in() ){
    echo '<a data-toggle="tooltip" title="Editar" class="edit-absolute" href="'.get_edit_post_link($post->ID).'">';
      echo '<span><i class="icn icn-lapiz icn-sm"></i> Editar</span>';
    echo '</a>';
    echo '<a class="ayuda-absolute" href="http://wiki.ead.pucv.cl/index.php/Manual_de_Publicaci%C3%B3n_en_la_Web_de_la_Escuela_usando_Gamma" target="_blank"><i class="icn icn-libro icn-sm"></i> Ayuda</a>';
  }
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
<?php 
  global $post;
  $the_category = ( !empty( $post->publication_category) ? $post->publication_category : 'postgrado' );
  render::carousel_portadilla($the_category); 
?>

<div id="portadilla">

<!-- Pag para page (para toda la página) -->
<div class="pag page gutter">
  <div class="fila margen-sup-sm">
    <!-- Menú de navegación -->
    <div class="col-md-3 col-sm-4 oculto-xs alto-lg">
        <div id="ejemplo-sticky">
          <ul class="sin-relleno local-nav">
            <!--Links de navegación se agregan por JS-->
          </ul>
        </div>
    </div>
    <!-- Contenido -->
  	<div class="col-md-9 col-sm-8 col-xs-12 relativo" class="scroll-able" data-spy="scroll" data-target="#target_nav">
      <div class="page-contenido">
        <?php the_content(); ?>
      </div>
  	</div>
  </div> <!-- fin de fila-->
</div> <!-- fin de * pag page * -->
</div> <!-- fin de portadilla -->
<?php get_footer(); ?>