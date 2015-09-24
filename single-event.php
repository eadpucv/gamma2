<?php 
	get_header();
	the_post();
	global $post;
?>
<div id="single-event">
  <!-- Breadcrumbs -->
  <div class="pag page">
  <?php sitio::get_breadcrumb(array('sin-relleno','margen-inf-sm')); ?>

  <div class="fila">
	<div class="col-md-12">
		<div class="flexbox">
			<div class="col-md-2 col-sm-2 fecha-page">
				<div class="contenido-fecha">
					<p class="dia sin-margen"><?php echo mysql2date('d',$post->event_date); ?></p>
					<span class="mes md centrado sin-relleno"><?php echo mysql2date('F',$post->event_date); ?></span>
				</div>
			</div>
			<!-- fecha para móviles -->
			<div class="col-xs-3 fecha-movil">
				<div class="contenido-fecha">
					<p class="dia sin-margen relleno-sup-xs"><?php echo mysql2date('d',$post->event_date); ?></p>
					<span class="mes xs centrado sin-relleno relleno-inf-xs"><?php echo mysql2date('F',$post->event_date); ?></span>
				</div>
			</div>
			<!-- fin fecha móviles -->
			<div class="col-md-9 col-sm-9 col-xs-12">
			  <div class="fila">
			    <h2 class="entry-title md"><?php the_title(); ?></h2>
				  <span class="entry-details margen-sup-xs">Publicado el <?php echo mysql2date( 'd \d\e F \d\e Y', $post->post_date ); ?></span>
			  </div>
			</div>
		</div>
	</div>
</div>

  <div class="pag sin-relleno cf">
  	<div class="fila cf">
	  	<div class='col-md-9 col-sm-9 col-xs-12 margen-sup'>
	  		<?php the_content(); ?>
	  	</div>
	    <aside id='sidebar'>
	  		<div class='col-md-3 col-sm-3'>
	  			<?php dynamic_sidebar( 'sidebar-event' ); ?>
	  		</div>
	  	</aside>
    </div><!-- fin de fila-->
  </div><!-- fin de pag -->
</div><!-- fin de single-event-->
<?php get_footer(); ?>