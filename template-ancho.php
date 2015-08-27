<?php 
/*
	Template name: Plantilla Ancha parallax
*/
	get_header(); 
	the_post();
	global $post;
?>
<div id="page-full">
  <?php the_content(); ?>
</div> <!-- fin de page * -->
<?php get_footer(); ?>