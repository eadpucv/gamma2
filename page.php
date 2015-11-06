<?php 
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
		<div class="paginas-hijas">
			<?php wp_list_pages(array(
							'child_of' => $post->ID,
							'show_date' => '',
							'title_li' => 'Ver más'
							));
				 ?>
		</div>
      </div>
    </div> <!-- fin de fila -->
  </div> <!-- fin de pag -->
</div> <!-- fin de page * -->
<?php get_footer(); ?>