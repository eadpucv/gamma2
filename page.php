<?php 
	get_header(); 
	the_post();
	global $post;
?>
<div id="page">
  <div class="pag page">

    <?php sitio::get_breadcrumb(); ?>

	<div class="bloque ancho-completo">
		<h1 class="lg entry-title especifico"><?php the_title() ?></h1>
	</div>
  </div>
  <div class="pag sin-relleno gutter">
    <div class="fila">
      <div class="col-md-3 col-sm-4 oculto-xs alto-lg">

        <div id="ejemplo-sticky">
		  <ul class="sin-relleno local-nav">
		  <!--Links de navegación se agregan por JS-->
		  </ul>
		</div>

      </div>
      <div class="col-md-9 col-sm-8 col-xs-12 relativo" class="scroll-able" data-spy="scroll" data-target="#target_nav">
        
		<article class="h-entry enunciado">
			<div class="e-content p-summary p-name page-contenido">
				<?php the_content(); ?>
			</div>
		</article>

      </div>
    </div> <!-- fin de fila -->
  </div> <!-- fin de pag -->
</div> <!-- fin de page * -->
<?php get_footer(); ?>