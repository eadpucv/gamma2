<?php
    $features = sitio::get_features();
 ?>
<!-- carrusel-index WP-->
<div id='carrusel-index'>
  <!-- Carrousel -->
  <div data-ride="carousel" class="carousel slide" id="carousel-home">
    <?php if ( count($features) ): ?>
    <ol class="carousel-indicators">
        <?php $x = 0; 
            foreach ( $features as $feature ): 
                $class_active = ( $x == 0 ) ? ' class="active"' : ''; // si es el primer punto tendrá la clase active
                echo '<li data-slide-to="'. $x .'" data-target="#carousel-home"'.$class_active.'></li>';
                $x++;
            endforeach; 
        ?>
    </ol>

    <div class="carousel-inner">
      <!-- item (la clase 'car-sm' corresponde al height de visibilidad) -->
      <?php 
            $x = 0;
            foreach ($features as $feature): 
                $class_active = ( $x == 0 ) ? 'active' : ''; //si es el primer slide, tendrá la clase active
        ?>
          <div class="item <?php echo $class_active ?> car-sm">
            <?php echo get_the_post_thumbnail( $feature->ID, 'main-feature' ); ?>
            <div class='pag sin-relleno'>
              <div class='col-md-4 col-sm-6 oculto-xs'>
                  <!-- enlace -->
                  <a href="<?php echo $feature->feature_url ?>">
                    <div>
                      <h2><i class='icn icn-noticias'></i> <?php echo get_the_title($feature->ID) ?></h2>
                      <?php 
                        if ( !empty( $feature->post_excerpt ) ) {
                            echo apply_filters( 'the_content', $feature->post_excerpt );
                        }
                       ?>
                       <?php 
                          /* No hay autor por el momento
                          <!-- autor de noticia -->
                          <span class='xs'><i class='icn icn-usuario'></i>Francesca Cambiaso</span>*/
                      ?>
                    </div>
                  </a>
              </div>
              <!-- móviles -->
              <div class='oculto-lg oculto-md oculto-sm col-xs-12'>
                <!-- enlace -->
                <a href="<?php echo $feature->feature_url ?>">
                  <div>
                    <!-- título de noticia-->
                    <h5 class='sm'><i class='icn icn-noticias'></i> <?php echo get_the_title($feature->ID) ?></h5>
                  </div>
                </a>
              </div><!-- fin de móvil -->
            </div><!-- fin de pag -->
          </div><!-- fin de item -->

        <?php $x++; endforeach; ?>
    </div> <!-- fin de carousel inner -->
        <!-- botones adelante y atrás -->
        <a data-slide="prev" data-target='#carousel-home' href="#carousel-2" class="left carousel-control">
          <span class="icn icn-navizquierda"></span>
        </a>
        <a data-slide="next" data-target='#carousel-home' href="#carousel-2" class="right carousel-control">
          <span class="icn icn-nav"></span>
        </a>
  </div>
  <?php endif; ?>
</div><!-- fin de carrusel-index -->