<?php 
	get_header();
	the_post();
	global $post;
 ?>
 <?php if ( has_term( 'docencia','category' ) ): ?>
 	<div class="alto-xs ocultar-desborde">
 		<?php 
 			global $_set;
 			$settings = $_set->settings;
 			if ( !empty( $settings['docencia_imagen'] ) ) {
 				$size = 'full';
				$src = current( wp_get_attachment_image_src( $settings['docencia_imagen'], $size ) );
			} else {
				$src = 'https://c1.staticflickr.com/1/53/162453548_31f4f8ba99_b.jpg';
			}
 		 ?>
	  <img class="ancho-completo" src="<?php echo $src ?>">
	</div>
	<div class="pag sin-relleno gutter">
		<?php sitio::get_breadcrumb( array('sin-relleno', 'margen-sup-sm', 'margen-inf-xs') ); ?>
		<h2 class="entry-title md"><?php the_title() ?></h2>
		<span class="entry-details">Publicado el <?php echo mysql2date( 'd \d\e F \d\e\l Y', $post->post_date ); ?></span>
	</div>
	<div class="pag page">
	<div class="fila margen-sup">
		<div class='col-md-9 col-sm-9 col-xs-12'>
			<?php the_content(); ?>
		</div>
		<aside id="sidebar">
  			<div class="col-md-3 col-sm-3 ddd">
  			<?php dynamic_sidebar( 'single-right' ); ?>			
  			</div>
  		</aside>
	</div>
</div>
 <?php else: ?>
 	<?php if ( has_post_thumbnail( ) ): ?>
	<div class="ocultar-desborde relativo alto-lg">
	  <div class="absoluto ancho-completo alto-lg">
	    <div class="cf h80 absoluto abs-inf ancho-completo">
	    <div id="fondo-publicacion" class="pag sin-relleno ancho-xs">
	    </div>
	    </div>
	  </div>
	  <?php echo sitio::ead_get_the_post_thumbnail( $post->ID , 'main-feature', array( 'class' => 'ancho-completo fijo atras mas-atras noticia') ); ?>
	</div>
	<?php endif; ?>
	<div id="post">
  <div class="al-frente cf margen-especial relleno-especial">
    <div class="pag cf">
	
        <?php sitio::get_breadcrumb(); ?>

       <h3 class="lg entry-title"><?php the_title(); ?></h3>
		<aside class="entry-details">
			<ul class="sm sin-relleno al-frente sin-margen">
				<li class="sm sin-estilo negro-fundido italica sombra-cabecera-claro-xs">Publicado el <?php echo mysql2date( 'd \d\e F \d\e\l Y', $post->post_date ); ?>.</li>
			</ul>
		</aside>

      <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="fila">
	       <article class="h-entry margen-sup-xs">
	  			<div class="e-content p-sumary p-name">
	  				<ul class="xs sin-relleno al-frente relleno-inf-sm sin-margen oculto-xs">
			          
			          <?php
			          		$post_categories = get_the_category( $post->ID );
			          		if ( count($post_categories) ) {
			          			echo '<li class="sin-estilo sans negro-fundido semi-gruesa relleno-sup-sm sombra-cabecera-claro-xs"><i class="icn icn-marcador relleno-der-xs"></i>Archivado en: ';
			          		}
			          		$x = 0;
			          		$categories_list = '';
			          		foreach ($post_categories as $cat) {
			          			$coma = ( count( $post_categories ) != $x+1 ) ? ', ' : '';
			          			$categories_list .= '<a href="'.get_category_link( $cat->term_id ).'" class="sans semi-gruesa">'.$cat->name.'</a>'.$coma;
			          			$x++;

			          		}
			          		echo $categories_list;
			           ?> 
			          <?php
			          		$post_tags = wp_get_post_tags( $post->ID );
			          		if ( count($post_tags) ) {
			          			echo '<li class="sin-estilo sans negro-fundido semi-gruesa sombra-cabecera-claro-xs"><i class="icn icn-etiqueta relleno-der-xs"></i>Palabras clave: ';
			          		}
			          		$x = 0;
			          		$tags_list = '';
			          		foreach ($post_tags as $tag) {
			          			$coma = ( count( $post_tags ) != $x+1 ) ? ', ' : '';
			          			$tags_list .= '<a href="'.get_category_link( $tag->term_id ).'" class="sans semi-gruesa">'.$tag->name.'</a>'.$coma;
			          			$x++;
			          		}
			          		echo $tags_list;
			           ?> 
			        </ul>
	  				<?php 
	  					echo apply_filters( 'the_content', $post->post_content );
	  					?>
	  			</div>
	  		</article>
        </div>
      </div>
      <div class="fila">
        <aside id="sidebar">
			<div class="col-md-3 col-sm-3">
			<?php dynamic_sidebar( 'single-right' ); ?>
			</div> <!-- fin de fila -->
		</aside>

      </div>
    </div>
    <div class="pag">
      <div class="fila">
        <?php comments_template(); ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>


 <?php get_footer(); ?>