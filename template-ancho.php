<?php 
/*
	Template name: Plantilla Ancha parallax
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
<div id="page-full">
  <?php the_content(); ?>
</div> <!-- fin de page * -->
<?php get_footer(); ?>