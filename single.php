<?php 
	get_header();
	get_post();
	global $post;
 ?>
<div class="ocultar-desborde relativo alto-lg">
  <div class="absoluto ancho-completo alto-lg">
    <div class="cf h80 absoluto abs-inf ancho-completo">
    <div id="fondo-publicacion" class="pag sin-relleno ancho-xs">
    </div>
    </div>
  </div>
  <?php 
  	if ( has_post_thumbnail() ):
  		echo get_the_post_thumbnail( $post->ID , 'main-feature', array( 'class' => 'ancho-completo fijo atras mas-atras noticia') );
	endif; ?>
</div>

<div style="background: url("<?php bloginfo('template_directory') ?>/img/ruido-fondo-pyxis.png") repeat center" id="post">
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
	  				<ul class='xs sin-relleno al-frente relleno-inf-sm sin-margen oculto-xs'>
			          
			          <?php
			          		$post_categories = wp_get_post_categories( $post->ID );
			          		if ( count($post_categories) ) {
			          			echo '<li class="sin-estilo sans negro-fundido semi-gruesa relleno-sup-sm sombra-cabecera-claro-xs"><i class="icn icn-marcador relleno-der-xs"></i>Archivado en: ';
			          		}
			          		$x = 0;
			          		$categories_list = '';
			          		foreach ($post_categories as $cat) {
			          			$coma = ( count( $post_categories ) == $x ) ? ', ' : '';
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
			          			$coma = ( count( $post_tag ) == $x ) ? ', ' : '';
			          			$tags_list .= '<a href="'.get_category_link( $tag->term_id ).'" class="sans semi-gruesa">'.$tag->name.'</a>'.$coma;
			          			$x++;
			          		}
			          		echo $tags_list;
			           ?> 
			        </ul>

	  				<?php the_content(); ?>
	  			</div>
	  		</article>
        </div>
      </div>
      <div class="fila">
        <aside id="sidebar">
			<div class="col-md-3 col-sm-3">
			<?php dynamic_sidebar( 'single-right' ); ?>
			     <!-- <h6 class="xs seccion margen-sup">Categorías</h6>
			      <ul class="xs sin-relleno">
			        <li class="sin-estilo"><a href="#">Actualidad</a></li>
			        <li class="sin-estilo"><a href="#">Estudiantes</a></li>
			        <li class="sin-estilo"><a href="#">Carreras</a></li>
			        <li class="sin-estilo"><a href="#">Arquitectura</a></li>
			        <li class="sin-estilo"><a href="#">Diseño Gráfico</a></li>
			        <li class="sin-estilo"><a href="#">Diseño industrial</a></li>
			        <li class="sin-estilo"><a href="#">Estudios avanzados</a></li>
			        <li class="sin-estilo"><a href="#">Concursos</a></li>
			        <li class="sin-estilo"><a href="#">Observación de la semana</a></li>
			        <li class="sin-estilo"><a href="#">Bolsa de trabajo</a></li>
			        <li class="sin-estilo"><a href="#">Investigación</a></li>
			      </ul>
			      <h6 class="xs seccion margen-sup">Carreras</h6>
			      <ul class="xs sin-relleno">
			        <li class="relleno-vertical-xs borde inf-lineal-xs sup-lineal-xs sin-estilo rojo"><a href="#">Arquitectura</a></li>
			        <li class="sin-estilo"><a href="#">Diseño Gráfico</a></li>
			        <li class="sin-estilo"><a href="#">Diseño industrial</a></li>
			      </ul>
			      <h6 class="xs seccion margen-sup">Estudios avanzados</h6>
			      <ul class="xs sin-relleno">
			        <li class="sin-estilo"><a href="#">Magister Náutico y Marítimo</a></li>
			        <li class="sin-estilo"><a href="#">Magister Ciudad y Territorio</a></li>
			      </ul>
			    <h6 class="xs seccion margen-sup"><i class="icn icn-noticias relleno-der-xs"></i>Más Noticias</h6>
			    <ul class="xs sin-relleno">
			      <a href="#">
			      <img src="http://www.ead.pucv.cl/wp-content/uploads/2014/12/P1020763-850x637.jpg">
			      </a>
			      <li class="sin-estilo"><h5 class="xs"><a href="#">Proyecto de rehabilitación urbana: Parque costero para Valparaíso</a></h5></li>
			      <a href="#">
			      <img class="margen-sup-sm" src="http://www.ead.pucv.cl/wp-content/uploads/2014/09/DSC_0675.jpg">
			      </a>
			      <li class="sin-estilo"><h5 class="xs"><a href="#">Escuela de Arquitectura y Diseño celebra a un nuevo grupo de titulados</a></h5></li>
			      <a href="#">
			      <img class="margen-sup-sm" src="http://www.ead.pucv.cl/wp-content/uploads/2014/09/IMG_0131.jpg">
			      </a>
			      <li class="sin-estilo"><h5 class="xs"><a href="#">Construcción en serie de comedores para damnificados del incendio de Valparaíso</a></h5></li>
			    </ul>
			    <h5 class="xs interletraje-xs negro condensado gruesa margen-sup-md altas"><i class="icn icn-noticias relleno-der-xs"></i>Articulos</h5>
			    <ul class="xs sin-relleno">
			      <a href="#">
			      <img src="http://www.ead.pucv.cl/wp-content/uploads/2014/12/corte.jpg">
			      </a>
			      <li class="sin-estilo"><h5 class="xs"><a href="#">Seminario Sustentabilidad en Chile: Experiencias locales para soluciones globales</a></h5></li>
			      <a href="#">
			      <img class="margen-sup-sm" src="http://www.ead.pucv.cl/wp-content/uploads/2014/10/Afiche.jpg">
			      </a>
			      <li class="sin-estilo"><h5 class="xs"><a href="#">Invitación a participar en festival de intervenciones urbanas en Valparaíso</a></h5></li>
			      <a href="#">
			      <img class="margen-sup-sm" src="http://www.ead.pucv.cl/wp-content/uploads/2014/04/DSC_0357.jpg">
			      </a>
			      <li class="sin-estilo"><h5 class="xs"><a href="#">Construcción en serie de comedores para damnificados del incendio de Valparaíso</a></h5></li>
			    </ul>
			    <h6 class="xs seccion margen-sup"><i class="icn icn-twitter relleno-der-xs"></i>Twitter</h6>
			    <a class="twitter-timeline" href="https://twitter.com/eadpucv" data-widget-id="556872650858201090">Tweets por el @eadpucv.</a>
			    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> -->
			</div> <!-- fin de fila -->
		</aside>

      </div>
    </div>
    <div class="pag">
      <div class="fila">
        
        <div class="col-md-6 margen-inf-sm">
		    Aún no hay comentarios en esta publicación
		</div>
		<div class="col-md-6">
		    <form role="form">
		        <div class="form-group">
		        <label for="nombre">Nombre *</label>
		        <input type="text" class="form-control" id="nombre" placeholder="Introduce su nombre" required />
		        </div>
		        <div class="form-group">
		        <label for="correo-electronico">Correo electrónico</label>
		        <input type="email" class="form-control" id="correo-electronico" placeholder="correo electrónico">
		        </div>
		        <div class="form-group">
		        <label>comentario</label>
		        <textarea placeholder="Comenta aquí" required></textarea>
		        </div>
		        <button type="submit" class="btn btn-default">comentar</button>
		    </form>
		</div>

      </div>
    </div>
  </div>
</div>
 <?php get_footer(); ?>