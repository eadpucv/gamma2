<!doctype html>
<head>
  <meta charset='UTF-8'/>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title><?php wp_title('|') ?></title>
  <link rel="icon" type="image/x-icon" href="favicon.ico" />
  <?php wp_head(); ?>
</head>

<?php 
    global $_set;
    $settings = $_set->settings;
 ?>
<body <?php body_class(); ?>>
<!-- Menú dropdown -->
<div class="oculto-xs nav-ead relleno-sup-sm">
  <div class='pag sin-relleno borde'>
  	<div class='bloque auto margen-inf-sm en-linea izquierda cf'>
  		<div class='izquierda margen-der-xs logo en-linea'>
      		<span class='bloque izquierda sombra-cabecera-claro-xs relleno-der-xs rojo sans'><a class='lg ead sans' href='<?php bloginfo('url') ?>'>e[ad]</a></span>
  		</div>
  	<div class='izquierda relleno-sup-xs logo en-linea'>
      <!--<span class='sm sans bloque negro'>Escuela de arquitectura y diseño</span>-->
      <!--<span class='xs bloque izquierda sans negro-fundido en-linea'>Pontificia universidad católica de Valparaíso</span>-->
  	</div>
  	</div>
      <ul class="nav nav-pills margen-inf-xs en-linea margen-izq-xs izquierda">
      <?php    /**
      	* Displays a navigation menu
      	* @param array $args Arguments
      	*/
      	$args = array(
      		'theme_location' => 'principal',
      		'container' => '',
      		'menu_class' => 'nav nav-pills margen-inf-xs en-linea margen-izq-xs izquierda',
      	);
      
      	//wp_nav_menu( $args ); ?>
        <li class="dropdown">
          <a href="#" data-toggle="dropdown" role="button" id="drop4" class="dropdown-toggle cond gruesa negro">Escuela<b class="caret"></b></a>
              <ul aria-labelledby="drop4" role="menu" class="dropdown-menu" id="menu1">
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Historia</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Amereida</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Campus</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Cuerpo académico</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Autoridades</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Noticias</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Agenda</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Información de docencia</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Wiki Casiopea</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Prensa</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Contacto</a></li>
              </ul>
        </li>
        <li class="dropdown">
          <a href="#" data-toggle="dropdown" role="button" id="drop5" class="dropdown-toggle cond gruesa negro">Carreras & Postgrados<b class="caret"></b></a>
              <ul aria-labelledby="drop5" role="menu" class="dropdown-menu" id="menu2">
                <li role="presentation"><a href="{{ site.baseurl }}/maquetas/page" tabindex="-1" role="menuitem">Arquitectura</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Diseño gráfico</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Diseño industrial</a></li>
                <li class="divider" role="presentation"></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Magister Nautico & Marítimo</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Magister Ciudad & Territorio</a></li>
              </ul>
        </li>
        <li class="dropdown">
          <a href="#" data-toggle="dropdown" role="button" id="drop5" class="dropdown-toggle cond gruesa negro">Estudiantes<b class="caret"></b></a>
              <ul aria-labelledby="drop5" role="menu" class="dropdown-menu" id="menu3">
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Pregrado</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Postgrado</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Intercambio estudiantil</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Becas y ayudas estudiantiles</a></li>
              </ul>
        </li>
        <li class="dropdown">
          <a href="#" data-toggle="dropdown" role="button" id="drop5" class="dropdown-toggle cond gruesa negro">Admisión<b class="caret"></b></a>
              <ul aria-labelledby="drop5" role="menu" class="dropdown-menu" id="menu3">
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Cuerpo coordinador</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Asuntos estudiantiles</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Estudia en el extranjero</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Servicios e[ad]</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Bolsa de trabajo</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Ex-alumnos</a></li>
              </ul>
        </li>
        <li class="dropdown">
          <a href="#" data-toggle="dropdown" role="button" id="drop5" class="dropdown-toggle cond gruesa negro">Extensión<b class="caret"></b></a>
              <ul aria-labelledby="drop5" role="menu" class="dropdown-menu" id="menu3">
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Archivo histórico J.V.A</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Ediciones e[ad]</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Concursos</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Investigación</a></li>
              </ul>
        </li>
        <li class="dropdown">
          <a href="#" data-toggle="dropdown" role="button" id="drop5" class="dropdown-toggle cond gruesa negro">Amereida<b class="caret"></b></a>
              <ul aria-labelledby="drop5" role="menu" class="dropdown-menu" id="menu3">
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Taller de amereida</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Ciudad abierta</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Travesías</a></li>
                <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Biblioteca Constel</a></li>
              </ul>
        </li>
      </ul>
  </div>
</div>


<!-- Menú responsivo -->
<div class="oculto-lg oculto-md oculto-sm">
  <div class='fondo-negro'>
    <div class='pag menu-movil'>
      <div class='centrado bloque izquierda margen-der-xs logo en-linea'>
        <h1 class='sm linea centrado sans'><a class='sans rojo centrado' href='{{ site.baseurl }}/maquetas/home'>e[ad]</a></h1>
      </div>
      <!--<div class='izquierda ancho-auto relleno-inf-xs logo en-linea'>
        <span class='sm sans bloque blanco'>Escuela de Arquitectura y Diseño</span>
        <span class='xs bloque izquierda sans blanco en-linea'>Pontificia universidad católica de Valparaíso</span>
      </div>-->
      <a href="#menu" class="menu-link rojo derecha"><i class="icn icn-lg icn-menu"></i></a>
    </div>
    <nav id="menu" class='lista-sin-estilo' role="navigation">
      <li><a class='sans blanco'>Escuela</a></li>
        <ul id="menu" class='fondo-blanco' role="navigation">
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>historia</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Amereida</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Campus</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Cuerpo académico</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Autoridades</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Noticias</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Agenda</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Información de docencia</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Wiki Casiopea</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Prensa</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Contacto</a></li>
        </ul>
      <li><a class='sans blanco'>Carreras & postgrados</a>
        <ul id="menu" class='fondo-blanco' role="navigation">
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Arquitectura</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Diseño gráfico</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Diseño industrial</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Magister Náutico & Marítimo</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Magister Ciudad & Territorio</a></li>
        </ul>
      </li>
      <li><a class='sans blanco'>Estudiantes</a>
        <ul id="menu" class='fondo-blanco' role="navigation">
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Pregrado</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Postgrado</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Intercambio estudiantil</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Becas & ayudas estudiantiles</a></li>
        </ul>
      </li>
      <li><a class='sans blanco'>Admisión</a>
        <ul id="menu" class='fondo-blanco' role="navigation">
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Cuerpo coordinador</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Asunto estudiantiles</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Estudia en el extranjero</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Servicios e[ad]</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Bolsa de trabajo</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Ex-alumnos</a></li>
        </ul>
      </li>
      <li><a class='sans blanco'>Extensión</a>
        <ul id="menu" class='fondo-blanco' role="navigation">
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Archivo histórico J.V.A</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Ediciones e[ad]</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Concursos</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Investigación</a></li>
        </ul>
      </li>
      <li><a class='sans blanco'>Amereida</a>
        <ul id="menu" class='fondo-blanco' role="navigation">
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Taller de amereida</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Ciudad abierta</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Travesías</a></li>
          <li><a class='sans blanco' href='{{ site.baseurl }}/pags/tipografia'>Biblioteca Con§tel</a></li>
        </ul>
      </li>
    </nav>
  </div>
</div>