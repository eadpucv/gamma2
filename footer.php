<?php 
    global $_set;
    $settings = $_set->settings;
 ?>
<footer class="fondo-negro"> 
  <div class="fondo-negro-fundido">
  <div class="pag">
    <div class="fila">
      <div class="col-md-4 col-sm-5 col-xs-12">
        <h6 class="sin-margen"><a href="#" class="ahuesado sans">Escuela de Arquitectura y Diseño</a></h6>
        <h6 class="xs fino sans blanco">Pontificia Universidad Católica de Valparaíso</h6>
        <h6><a href="#" class="ahuesado sans fino"><i class="icn icn-light icn-email margen-der-xs"></i>Contacto</a></h6>
        <p class="xs sans blanco sin-margen">Matta 12, Recreo, Viña del Mar, Chile.</p>
        <p class="xs sans blanco sin-margen">Cód. Postal: 2580129, Casilla 4170 V2 Valparaíso.</p>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <p class="xs fino sans gris sin-margen">1998 - 2014 | <a href="#" class="sans blanco">Suscripción (RSS)</a> | <a href="#" class="sans blanco">Cómo Suscribirse</a> | <a href="#" class="sans blanco">Colofón</a> | Optimizado para <a href="#" class="sans blanco">Firefox</a>.</p>
        <p class="xs fino sans gris relleno-inf-xs sin-margen relleno-inf-sm">e[ad] de la Escuela de Arquitectura y Diseño PUCV está licenciado bajo <a href="#" class="sans blanco">Creative Commons Atribución-No Comercial-Licenciar Igual 2.0 Chile License</a>.</p>
      </div>
      <div class="col-md-4 col-sm-3 col-xs-12">
      <?php if ( !empty($settings['facebook_url'] ) ): ?>
            <a class="en-linea derecha responsive-izquierda" href="<?php echo $settings['facebook_url'] ?>">
             <span class="icn-stack">
              <span class="icn icn-cuadrolleno icn-stack-2x"></span>
              <span class="icn icn-facebook icn-stack-1x blanco"></span>
            </span>
            </a>
        <?php endif; ?>
        <?php if ( !empty($settings['twitter_username'] ) ): ?>
            <a class="en-linea derecha responsive-izquierda" href="https://twitter.com/<?php echo str_replace('@','',$settings['twitter_username']) ?>">
            <span class="icn-stack">
              <span class="icn icn-cuadrolleno icn-stack-2x"></span>
              <span class="icn icn-twitter icn-stack-1x blanco"></span>
            </span>
            </a>
        <?php endif; ?>
        <?php if ( !empty($settings['flickr_url'] ) ): ?>
            <a class="en-linea derecha responsive-izquierda" href="<?php echo $settings['flickr_url'] ?>">
            <span class="icn-stack">
              <span class="icn icn-cuadrolleno icn-stack-2x"></span>
              <span class="icn icn-flickr icn-stack-1x blanco"></span>
            </span>
            </a>
        <?php endif; ?>
        <?php if ( !empty($settings['soundcloud_url'] ) ): ?>
            <a class="en-linea derecha responsive-izquierda" href="<?php echo $settings['soundcloud_url'] ?>">
            <span class="icn-stack">
              <span class="icn icn-cuadrolleno icn-stack-2x"></span>
              <span class="icn icn-soundcloud icn-stack-1x blanco"></span>
            </span>
            </a>
        <?php endif; ?>
        <?php if ( !empty($settings['vimeo_username'] ) ): ?>
            <a class="en-linea derecha responsive-izquierda" href="https://vimeo.com/<?php echo $settings['vimeo_username'] ?>">
            <span class="icn-stack">
              <span class="icn icn-cuadrolleno icn-stack-2x"></span>
              <span class="icn icn-vimeo icn-stack-1x blanco"></span>
            </span>
            </a>
        <?php endif; ?>
        <p class="relleno-sup texto-derecha bloque derecha responsive-izquierda ancho-completo italica bloque xs fino serif blanco sin-margen">Diseñado con librería digital de estilos</p>
        <div class="logo-pyxis ancho-completo margen-sup-xs">
        <a class="sin-relleno bloque derecha responsive-izquierda texto-derecha" href="http://eadpucv.github.io/pyxis/">
          <h6 class="gruesa sans rojo sin-margen relleno-izq-xs relleno-inf-xs no-responsivo">
            <img class="margen-der-xs" src='<?php bloginfo('template_directory') ?>/img/pyxis-logo-sm.png'>Pyxis<span class="fino blanco sans relleno-izq-xs">framework</span>
          </h6>
        </a>
        </div>
      </div>
    </div>
  </div>
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>