<?php get_header(); ?>

<div id="portada-informacion">
  <div class="pag page">
  <?php sitio::get_breadcrumb( array( 'sin-relleno','margen-inf-xs' ) ); ?>
  	<div class="bloque ancho-completo">
  		<h1 class="lg entry-title especifico"><?php echo sitio::archive_title() ?></h1>
	</div>
  <?php 
  $x = 0;
  echo '<div class="fila">';	
  while ( have_posts() ): the_post();
  global $post;
  if ($x >= 3) {
  		echo '</div><div class="fila">';
  		$x = 0;
  	}
  	echo '<div class="col-md-4 col-sm-4 col-xs-12 alto-sm auto">';
  		echo '<div class="borde ocultar-desborde alto-sm auto radio-md">';
  			echo '<div class="relleno-sup-xs tooltip-demo">';
  				echo '<h4 class="xs sin-margen"><a href="'.get_permalink( $post->ID ).'"><i class="icn icn-anuncio"></i>'.get_the_title( $post->ID ).'</a></h4>';
  				echo '<span class="xs entry-details">Publicado el '.mysql2date( 'd \d\e F\, Y', $post->post_date ).'.';
  					echo '<a data-toggle="tooltip" href="#" title="Editar" class="xs en-linea sin-margen" href="#">';
  						echo '<span class="icn-stack">';
  							echo '<span class="icn icn-cuadrolleno icn-stack-2x"></span>';
  							echo '<span class="icn icn-lapiz icn-sm icn-stack-1x"></span>';
  						echo '</span>';
  					echo '</a>';
  				echo '</span>';
  				$the_excerpt = ( !empty( $post->post_excerpt ) ) ? $post->post_excerpt : smart_substr( $post->post_content, 255 );
  				echo '<p class="xs">'.$the_excerpt.' <a href="'.get_permalink( $post->ID ).'">[<i class="icn icn-lentes"></i>]</a></p>';
  			echo '</div>';
  		echo '</div>';
  	echo '</div> ';

  	$x++;
  	endwhile;
  	if ( function_exists( 'wp_pagenavi' ) )
  		wp_pagenavi();
  ?>

  </div><!-- fin de page -->
</div><!-- fin de tag -->

<?php get_footer(); ?>