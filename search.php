<?php get_header(); ?>

<div id="tag">
  <div class="pag page">
  <?php sitio::get_breadcrumb( array( 'sin-relleno','margen-inf-xs' ) ); ?>
  	
  
	  <?php 
	  $x = 0;

	  if ( have_posts() ) :
	  	echo '<div class="widget-post-categories">';
	  		echo '<div class="fila alto-md margen-sup-sm margen-inf">';	

			while ( have_posts() ): the_post();
			global $post;

				echo '<div class="noticia margen-inf-sm">';
					if (has_post_thumbnail( $post->ID )):
				  	echo '<div class="cabecera">';
			          echo '<a href="'.get_permalink( $post->ID ).'">';
			            echo sitio::ead_get_the_post_thumbnail( $post->ID, 'entry-img' );
			          echo '</a>';
				      echo '</div>';
			      endif;
			      echo '<div class="relleno-sup-xs tooltip-demo">';
			        echo '<h4 class="xs sin-margen"><a href="'.get_permalink( $post->ID ).'"><i class="icn icn-noticias margen-der-xs"></i>'.get_the_title( $post->ID ).'</a></h4>';
			        echo '<span class="xs entry-details">Publicado el '.mysql2date( 'd \d\e F\, Y', $post->post_date ).'.';
			        if ( is_user_logged_in() ){
			          echo '<a data-toggle="tooltip" title="Editar" class="xs sin-margen" href="'.get_edit_post_link($post->ID).'">';
			              echo '<span class="icn-stack">';
			                echo '<span class="icn icn-cuadrolleno icn-stack-2x"></span>';
			                echo '<span class="icn icn-lapiz icn-sm icn-stack-1x"></span>';
			              echo '</span>';
			          echo '</a>';
			      	}
			        echo '</span>';
			        $the_excerpt = ( !empty( $post->post_excerpt ) ) ? $post->post_excerpt : smart_substr( $post->post_content, 255 );
			        echo '<p class="xs">'.$the_excerpt.' <a href="'.get_permalink( $post->ID ).'"">[<i class="icn icn-lentes"></i>]</a></p>';
			      echo '</div>';
			    echo '</div>';
				$x++;
				endwhile; 

				// Si es que no hay posts
				else:
					echo '</div>';
					// Imagen
					echo '<div class="alto-sm ocultar-desborde widget-sin-busqueda">';
						echo '<h3 class="blanco condensado">No existen resultados</h3>';
						echo '<p class="blanco italica gruesa">Por favor intente una nueva búsqueda</p>';
				 		echo '<img class="ancho-completo" src="http://farm4.staticflickr.com/3693/coverphoto/44793557@N00_h.jpg">';
					echo '</div>';
					echo '<div class="pag page">';
					echo '<section class="col-md-12">';
			  			echo '<form method="get" class="searchform busqueda-ancha" id="main-search-form">';
			  				echo '<input type="text" class="form-control" name="s" value="'.get_search_query().'" placeholder="Buscar">';
			  				echo '<p>No se encontraron resultados para "'.get_search_query().'". Intente con otro valor</p>';
						echo '</form>';
					echo '</section>';
				endif;
	  
  			echo '</div>';
  		echo '</div>';
  		?>
	
	<?php 
		if ( function_exists( 'wp_pagenavi' ) )
  		wp_pagenavi();
	 ?>
  </div><!-- fin de page -->
</div><!-- fin de tag -->

<?php get_footer(); ?>