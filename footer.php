<?php 
    global $_set;
    $settings = $_set->settings;
 ?>
<footer class="fondo-negro"> 
  <div class="pag">
    <div class="fila linea-inferior">
      <div class="col-md-8 col-sm-5 col-xs-12">
        <h6 class="sin-margen"><a href="<?php bloginfo('url') ?>" class="ahuesado sans">Escuela de Arquitectura y Diseño</a></h6>
        <h6 class="xs fino sans blanco">Pontificia Universidad Católica de Valparaíso</h6>
      </div>
      <div class="col-md-4">
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
      </div>
    </div>
    <div class="fila">
      <div class="col-md-4">
        <?php if ( !empty( $settings['page_contact'] ) ): ?>
          <h6><a href="<?php echo get_permalink($settings['page_contact']) ?>" class="ahuesado sans fino"><i class="icn icn-light icn-email margen-der-xs"></i>Contacto</a></h6>
        <?php endif; ?>
        <?php if ( !empty( $settings['address'] ) ): ?>
          <?php echo apply_filters( 'the_content', $settings['address'] ); ?>
        <?php else: ?>
          <p class="xs sans blanco sin-margen">Matta 12, Recreo, Viña del Mar, Chile.</p>
          <p class="xs sans blanco sin-margen">Cód. Postal: 2580129, Casilla 4170 V2 Valparaíso.</p>
      <?php endif; ?>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
        
        <p class="xs fino sans gris relleno-inf-xs sin-margen relleno-inf-sm">e[ad] de la Escuela de Arquitectura y Diseño PUCV está licenciado bajo 
        <?php $cc = ( !empty( $settings['text_cc'] ) ? $settings['text_cc'] : 'Creative Commons Atribución-No Comercial-Licenciar Igual 2.0 Chile License' ) ?>
        <a href="<?php echo $settings['url_cc'] ?>" class="sans blanco"><?php echo $cc ?></a>. 1998 - 2015 | <a href="<?php bloginfo('rss_url') ?>" class="sans blanco">Suscripción (RSS)</a> 
  
        <?php if ( !empty( $settings['page_suscripcion'] ) ): ?>
          | <a href="<?php echo get_permalink( $settings['page_suscripcion'] ) ?>" class="sans blanco">Cómo Suscribirse</a> 
        <?php endif; ?>
        <?php if ( !empty( $settings['page_colofon'] ) ): ?>
          | <a href="<?php echo get_permalink( $settings['page_colofon'] ) ?>" class="sans blanco">Colofón</a> 
        <?php endif; ?>
        | Optimizado para <a href="http://www.mozilla.com" class="sans blanco">Firefox</a>.</p>
      </div>
      <div class="col-md-4 col-sm-3 col-xs-12">
        
        <div class="diseno-pyxis">
          <p>Diseñado con librería digital de estilos</p>
          <a class="" href="http://eadpucv.github.io/pyxis/">
            <img class="margen-der-xs" src='<?php bloginfo('template_directory') ?>/img/pyxis-logo-sm.png'>
            <h6 class="gruesa sans rojo">Pyxis<span class="fino blanco sans relleno-izq-xs">framework</span>
            </h6>
          </a>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>