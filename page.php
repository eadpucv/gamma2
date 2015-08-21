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
		  <ul class="sin-relleno">
		    <li class="sin-estilo active"><a href="#uno"><h6 class="xs active">Estudiar diseño en la e[ad]<i class="icn icn-usuariomas"></i></h6></a></li>
		    <li class="sin-estilo"><a href="#dos"><h6 class="xs">Programa de estudios<i class="icn icn-libro"></i></h6></a></li>
		    <li class="sin-estilo"><a href="#tres"><h6 class="xs">Malla curricular<i class="icn icn-biblioteca"></i></h6></a></li>
		    <li class="sin-estilo"><a href="#cuatro"><h6 class="xs">Admisión<i class="icn icn-ingresar"></i></h6></a></li>
		    <li class="sin-estilo"><a href="#cinco"><h6 class="xs">Concepción del diseñador<i class="icn icn-acto"></i></h6></a></li>
		    <li class="sin-estilo"><a href="#seis"><h6 class="xs">Perfil de egreso<i class="icn icn-perfil"></i></h6></a></li>
		    <li class="sin-estilo"><a href="#siete"><h6 class="xs">Competencias fundamentales<i class="icn icn-engranaje icn-spin"></i></h6></a></li>
		    <li class="sin-estilo"><a href="#ocho"><h6 class="xs">Objetivos educacionales<i class="icn icn-lentes"></i></h6></a></li>
		    <li class="sin-estilo"><a href="nueve"><h6 class="xs">Profesores<i class="icn icn-usuarios"></i></h6></a></li>
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