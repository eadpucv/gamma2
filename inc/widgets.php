<?php 
    class WP_Widget_docencia extends WP_Widget {
    /** constructor */
    function WP_Widget_docencia() {
        $widget_ops = array('classname' => 'widget-docencia', 'description' => 'Muestra una entrada de la categoría docencia');
        $control_ops = array();
        $this->WP_Widget('widget-docencia', 'Aviso de docencia', $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($instance);
        extract($args);
        $the_post = get_post($ev);
        $the_title = (!empty( $title )) ? $title : 'Información de docencia';
        if (!empty($the_post)):
            echo '<h2 class="xs titulo-seccion margen-sup-md"><i class="icn icn-anuncio icn-light"></i>'.$the_title.'</h2>';
            echo '<div class="pag">';
              echo '<div class="fila">';
                echo '<div class="col-md-3 col-sm-4 borde radio-sup-der-sm radio-inf-der-sm">';
                  echo '<i class="icn icn-lg rojo icn-anuncio icn-light en-linea izquierda"></i>';
                  echo '<div class="h100 tooltip-demo">';
                    echo '<h6 class="xs sin-margen sans rojo gruesa en-linea w60 altas relleno-izq-sm">'.get_the_title( $the_post->ID ).'</h6>';
                    echo '<span class="xs italica margen-izq-sm relleno-inf-xs">'.mysql2date('d \d\e F\, Y', $the_post->post_date).'</span>';
                    if ( is_user_logged_in() ){
                        echo '<a data-toggle="tooltip" title="Editar" class="xs en-linea rojo relleno-sup-xs sin-margen" href="'.get_edit_post_link($the_post->ID).'">';
                          echo '<span><i class="icn icn-lapiz margen-izq-xs margen-sup-xs"></i></span>';
                        echo '</a>';
                    }
                  echo '</div>';
                echo '</div>';
                echo '<div class="col-md-5 col-sm-12 relleno-izq-sm">';
                  echo '<div class="der-lineal-xs">';
                    echo '<p class="xs sans sin-margen justificado">'.smart_substr( $the_post->post_content,255 ).'</p>';
                  echo '</div>';
                echo '</div>';
                echo '<div class="col-md-4 oculto-sm oculto-xs">';
                  echo '<div class="fila">';
                    echo '<span class="centrado"><a href="'.get_permalink( $the_post->ID ).'" class="btn btn-alerta fondo-blanco">Ver información</a></span>';
                  echo '</div>';
                echo '</div>';
              echo '</div>';
            echo '</div>';
        endif;
    }

    function update($new_instance, $old_instance) {
        return $new_instance;
    }
    function get_docencia($sel){
        $pub = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'category_name' => 'docencia'
            ));
        $out = '<p><label>Entrada <select name='.$this->get_field_name('ev').' class="widefat">';
        $out .= '<option value="">Seleccione</option>';
        foreach ($pub->posts as $publication) {
            $class = ($sel == $publication->ID) ? ' selected="selected"' : '';
            $out .= '<option value="'.$publication->ID.'"'.$class.'>'.$publication->post_title.'</option>';
        }
        $out .= '</select></label></p>';

        return $out;
    }
    function form($instance) {
        extract( $instance );
        echo '<p><label for="'.$this->get_field_id('title').'">Titulo: <input type="text" name="'. $this->get_field_name('title') .'" id="'.$this->get_field_id('title').'" value="'.$instance['title'].'" class="widefat" /></label></p>';

        echo $this->get_docencia($ev);
    } 
}

class WP_Widget_events extends WP_Widget {
    /** constructor */
    function WP_Widget_events() {
        $widget_ops = array('classname' => 'widget-events', 'description' => 'Muestra un listado de eventos activos (los que pasaron irán desapareciendo)');
        $control_ops = array();
        $this->WP_Widget('widget-events', 'Listado de Eventos', $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($instance);
        extract($args);
        $num_events = ( !empty( $events ) ) ? $events : 4;
        $event_list = sitio::get_events($num_events);
        $the_title = (!empty( $title )) ? $title : 'Eventos';

        if (!empty($event_list)):
            echo '<h2 class="xs titulo-seccion margen-inf-sm margen-sup"><i class="icn icn-calendario icn-light"></i>'.$the_title.'</h2>';

            echo '<div class="pag">';
            echo '<div class="fila">';
            foreach ($event_list as $event):
                  echo '<div class="col-md-6 col-sm-6 col-xs-12 evento margen-inf-sm">';
                    echo '<div class="fila">';
                      echo '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">';
                        echo '<div class="fecha"><span class="sm">'.mysql2date('d M',$event->event_date).'</span></div>';
                      echo '</div>';
                      echo '<div class="col-lg-10 col-md-10 col-sm-12 contenido tooltip-demo">';
                        echo '<h5 class="xs sin-margen relleno-inf-xs"><a href="'.get_permalink($event->ID).'">'.get_the_title($event->ID).'</a></h5>';
                        echo '<span class="xs entry-details">Publicado el '.mysql2date('d \d\e F\, Y',$event->event_date).'.</span>';
                        if ( is_user_logged_in() ){
                            echo '<a data-toggle="tooltip" href="'.get_edit_post_link($event->ID).'" title="Editar" class="xs en-linea sin-margen">';
                              echo '<span><i class="icn icn-lapiz icn-sm"></i></span>';
                            echo '</a>';
                        } 
                        $the_excerpt = ( !empty( $event->post_excerpt ) ) ?  $event->post_excerpt : smart_substr( $event->post_content, 255 );
                        echo '<p class="xs">'.$the_excerpt.' <a class="" href="'.get_permalink($event->iD).'">[<i class="icn icn-lentes"></i>]</a></p>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';

            endforeach;
                echo '</div>';
              echo '</div>';
        endif;
    }

    function update($new_instance, $old_instance) {
        return $new_instance;
    }
    function form($instance) {
        extract( $instance );
        echo '<p><label for="'.$this->get_field_id('title').'">Titulo: <input type="text" name="'. $this->get_field_name('title') .'" id="'.$this->get_field_id('title').'" value="'.$instance['title'].'" class="widefat" /></label></p>';
        echo '<p><label for="'.$this->get_field_id('events').'">Eventos a mostrar: <input type="text" name="'. $this->get_field_name('events') .'" id="'.$this->get_field_id('events').'" value="'.$instance['events'].'" class="widefat" /></label></p>';
    } 
}

class WP_Widget_news extends WP_Widget {
    /** constructor */
    function WP_Widget_news() {
        $widget_ops = array('classname' => 'widget-news', 'description' => 'Muestra un listado de entradas de una categoría');
        $control_ops = array();
        $this->WP_Widget('widget-news', 'Listado de Entradas por categoría', $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($instance);
        extract($args);
        $num = ( !empty( $num_posts ) ) ? $num_posts : 4;
        $post_list = sitio::get_posts_by_category($category,$num);
        $the_title = (!empty( $title )) ? $title : 'Entradas';
        $link_category = get_category_link( $category );
        if (!empty($post_list)):
            echo '<h2 class="xs titulo-seccion margen-inf-md">';
                echo '<a href="'.$link_category.'"><i class="icn icn-noticias icn-light"></i> '.$the_title.'</a>';
            echo '</h2>';
            echo '<div class="pag sin-relleno gutter margen-sup-sm">';
                $x = 0;
                foreach ($post_list as $entry):
                    if ($x == 0) { echo '<div class="fila">'; }
                    $x++;
                    if ($x == 4) { echo '</div><div class="fila">'; $x = 1; }
                        echo '<div class="col-md-4 col-sm-6 col-xs-12 noticia">';
                            echo '<div class="cabecera">';
                                echo '<a href="'.get_permalink( $entry->ID ).'">';
                                    echo sitio::ead_get_the_post_thumbnail( $entry->ID, 'entry-img' );
                                echo '</a>';
                            echo '</div>';
                            //<!-- Título, fecha de publicación, reseña de noticia -->
                            echo '<h4 class="xs sin-margen"><a href="'.get_permalink( $entry->ID ).'">'.get_the_title( $entry->ID ).'</a></h4>';
                            echo '<div class="xs entry-details">Publicado el '.mysql2date('d \d\e F\, Y',$entry->post_date).'.';
                            if ( is_user_logged_in() ){
                                echo '<a data-toggle="tooltip" href="#" title="Editar" class="xs sin-margen" href="'.get_edit_post_link($entry->ID).'">';
                                    echo '<span class="icn-stack">';
                                        echo '<span class="icn icn-cuadrolleno icn-stack-2x"></span>';
                                        echo '<span class="icn icn-lapiz icn-sm icn-stack-1x"></span>';
                                    echo '</span>';
                                echo '</a>';
                            }
                            echo '</div>';
                            $the_excerpt = ( !empty( $entry->post_excerpt ) ) ? $entry->post_excerpt : smart_substr( $entry->post_content, 255 );
                            echo '<p class="xs">'.$the_excerpt.' <a href="'.get_permalink($entry->ID).'">[<i class="icn icn-lentes"></i>]</a></p>';
                        echo '</div>';
                endforeach;
                echo '</div>';
            echo '</div>';
        endif;
    }

    function update($new_instance, $old_instance) {
        return $new_instance;
    }
    function form($instance) {
        extract( $instance );
        echo '<p><label for="'.$this->get_field_id('title').'">Titulo: <input type="text" name="'. $this->get_field_name('title') .'" id="'.$this->get_field_id('title').'" value="'.$instance['title'].'" class="widefat" /></label></p>';
        echo '<p><label for="'.$this->get_field_id('num_posts').'">Entradas a mostrar: <input type="text" name="'. $this->get_field_name('num_posts') .'" id="'.$this->get_field_id('num_posts').'" value="'.$instance['num_posts'].'" class="widefat" /></label></p>';
        echo '<p><label>Categoría</label>';
        wp_dropdown_categories(array(
                'selected' => $category,
                'value_field' => 'slug',
                'name' => $this->get_field_name('category'),
                'class' => 'widefat'
            ));
        echo '</p>';
    } 
}
class WP_Widget_news_thumb extends WP_Widget {
    /** constructor */
    function WP_Widget_news_thumb() {
        $widget_ops = array('classname' => 'widget-news-thumb', 'description' => 'Muestra un listado de entradas de una categoría con su imagen destacada');
        $control_ops = array();
        $this->WP_Widget('widget-news-thumb', 'Entradas por categoría con imagen', $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($instance);
        extract($args);
        $num = ( !empty( $num_posts ) ) ? $num_posts : 4;
        $post_list = sitio::get_posts_by_category($category,$num);
        $the_title = (!empty( $title )) ? $title : 'Entradas';
        $link_category = get_category_link( $category );
        if (!empty($post_list)):
            echo '<h6 class="xs seccion margen-sup">'.$the_title.'</h6>';
            echo '<ul class="xs sin-relleno">';
                $x = 0;
                foreach ($post_list as $entry):
                    echo '<li class="sin-estilo">';
                        echo '<a href="'.get_permalink( $entry->ID ).'">';
                            echo sitio::ead_get_the_post_thumbnail( $entry->ID, 'entry-img' );
                        echo '</a>';
                        //<!-- Título, fecha de publicación, reseña de noticia -->
                        echo '<h5 class="xs"><a href="'.get_permalink( $entry->ID ).'">'.get_the_title( $entry->ID ).'</a></h5>';
                        
                        echo '</li>';
                endforeach;
            echo '</ul>';
        endif;
    }

    function update($new_instance, $old_instance) {
        return $new_instance;
    }
    function form($instance) {
        extract( $instance );
        echo '<p><label for="'.$this->get_field_id('title').'">Titulo: <input type="text" name="'. $this->get_field_name('title') .'" id="'.$this->get_field_id('title').'" value="'.$instance['title'].'" class="widefat" /></label></p>';
        echo '<p><label for="'.$this->get_field_id('num_posts').'">Entradas a mostrar: <input type="text" name="'. $this->get_field_name('num_posts') .'" id="'.$this->get_field_id('num_posts').'" value="'.$instance['num_posts'].'" class="widefat" /></label></p>';
        echo '<p><label>Categoría</label>';
        wp_dropdown_categories(array(
                'selected' => $category,
                'value_field' => 'slug',
                'name' => $this->get_field_name('category'),
                'class' => 'widefat'
            ));
        echo '</p>';
    } 
}

class WP_Widget_twitter extends WP_Widget {
    /** constructor */
    function WP_Widget_twitter() {
        $widget_ops = array('classname' => 'widget-twitter', 'description' => 'Muestra un timeline de twitter de la escuela, no se puede cambiar');
        $control_ops = array();
        $this->WP_Widget('widget-twitter', 'Timeline de Twitter e[ad]', $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        echo '<h6 class="xs seccion margen-sup"><i class="icn icn-twitter relleno-der-xs"></i>Twitter</h6>';
        echo '<a class="twitter-timeline" href="https://twitter.com/eadpucv" data-widget-id="556872650858201090">Tweets por el @eadpucv.</a>';
        echo '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
    }

    function update($new_instance, $old_instance) {
        return $new_instance;
    }
    function form($instance) {
        extract( $instance );
        echo '<p>Este widget no tiene opciones configurables</p>';
    } 
}

class WP_Widget_posts extends WP_Widget {
    /** constructor */
    function WP_Widget_posts() {
        $widget_ops = array('classname' => 'widget-posts', 'description' => 'Muestra un listado de las últimas entradas');
        $control_ops = array();
        $this->WP_Widget('widget-posts', 'Últimas entradas', $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($instance);
        extract($args);
        $num = ( !empty( $num_posts ) ) ? $num_posts : 6;
        $post_list = sitio::get_posts_by_category(null,$num_posts);
        $the_title = (!empty( $title )) ? $title : 'Publicaciones';

        if ( !empty( $post_list ) ):
           echo '<h2 class="xs titulo-seccion margen-vertical-sm"><i class="icn icn-lapiz icn-light"></i>'.$the_title.'</h2>';
            echo '<div class="pag">';
              echo '<div class="fila">';
                foreach ( $post_list as $the_post ):
                    $categories = wp_get_post_categories( $the_post->ID );
                    $the_category = get_category($categories[0]);
                    echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 publicacion">';
                    if ( count( $categories ) ):
                          echo '<a class="categoria" href="'.get_category_link($the_category->term_id).'">';
                            echo '<i class="icn icn-archivo"></i><h6 class="xs">'.$the_category->name.'</h6>';
                          echo '</a>';
                    endif;
                      echo '<div class="auto margen-inf-sm tooltip-demo">';
                        echo '<h5 class="xs sin-margen relleno-inf-xs"><a href="'.get_permalink($the_post->ID).'">'.get_the_title($the_post->ID).'</a></h5>';
                        echo '<span class="xs entry-details">Publicado el '.mysql2date('d \d\e F\, Y',$the_post->post_date).'.</span>';
                        if ( is_user_logged_in() ){
                          echo '<a data-toggle="tooltip" title="Editar" class="xs en-linea sin-margen" href="'.get_edit_post_link($the_post->ID).'">';
                            echo '<span><i class="icn icn-lapiz icn-sm"></i></span>';
                          echo '</a>';
                        }
                        $the_excerpt = ( !empty( $the_post->post_excerpt ) ) ? $the_post->post_excerpt : smart_substr( $the_post->post_content, 255 );
                        echo '<p class="xs margen-sup-xs">'.$the_excerpt.' <a class=" href="'.get_permalink( $the_post->ID ).'">[<i class="icn icn-lentes"></i>]</a></p>';
                      echo '</div>';
                    echo '</div>';
                endforeach;
                 echo '</div>';
            echo '</div>';
        endif;
    }

    function update($new_instance, $old_instance) {
        return $new_instance;
    }
    function form($instance) {
        extract( $instance );
        echo '<p><label for="'.$this->get_field_id('title').'">Titulo: <input type="text" name="'. $this->get_field_name('title') .'" id="'.$this->get_field_id('title').'" value="'.$instance['title'].'" class="widefat" /></label></p>';
        echo '<p><label for="'.$this->get_field_id('num_posts').'">Entradas a mostrar: <input type="text" name="'. $this->get_field_name('num_posts') .'" id="'.$this->get_field_id('num_posts').'" value="'.$instance['num_posts'].'" class="widefat" /></label></p>';
    } 
}

class WP_Widget_school_links extends WP_Widget {
    /** constructor */
    function WP_Widget_school_links() {
        $widget_ops = array('classname' => 'widget-links', 'description' => 'Muestra un texto acompañado de links a páginas');
        $control_ops = array();
        $this->WP_Widget('widget-links', 'Escuela & enlaces', $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($instance);
        extract($args);
        if (!empty( $num )):
            echo '<h2 class="xs titulo-seccion margen-vertical-md oculto-xs"><i class="icn icn-cruzdelsur icn-light"></i>'.$title.'</h2>';
            //<!-- Carrousel ancho completo-->
            echo '<div class="margen-inf-lg oculto-xs cf">';
              echo '<div data-ride="carousel" class="carousel slide" id="carousel-enlaces">';
                echo '<div class="carousel-inner">';
                for ( $i = 0; $i < $num; $i++ ) {
                      //<!-- item (la clase "car-xs" corresponde al height de visibilidad) -->
                        $current_title = $link_title[$i];
                        $current_content = $link_content[$i];
                        $current_image = wp_get_attachment_image( $attachment_id[$i], 'landscape-medium', 0, array( 'class' => 'ocultar-desborde ancho-completo') );
                        $current_pages = ${"pages_".$i};
                        $class_active = ( $i == 0 ) ? ' active' : '';
                      echo '<div class="item'.$class_active.' car-xs escuela-y-enlaces">';
                        echo '<div class="pag sin-relleno">';
                          echo '<div class="fila">';
                            echo '<div class="col-md-4 col-sm-12 oculto-xs">';
                              echo '<h5 class="sm condensado gruesa negro margen-inf-sm">'.$current_title.'</h5>';
                              echo '<p class="serif italica sin-margen relleno-inf-sm">'.$current_content.'</p>';
                                echo '<div class="grupo-botones oculto-sm margen-sup-xs">';
                                    foreach ($current_pages as $the_page) {
                                        echo '<a href="'.get_permalink($the_page).'" class="btn btn-alerta">'.get_the_title($the_page).'</a>';
                                  }
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="col-md-8 col-sm-12 oculto-xs">';
                              echo '<div class="ocultar-desborde alto-md sombra borde radio-md">';
                              echo $current_image;
                            echo '</div>';
                            echo '</div>';
                          echo '</div>';
                        echo '</div>';
                      echo '</div>';
              }
                echo '</div>';
                //<!-- botones adelante y atrás -->
                echo '<a data-slide="prev" data-target="#carousel-enlaces" href="#carousel-2" class="left carousel-control">';
                  echo '<span class="icn icn-navizquierda"></span>';
                echo '</a>';
                echo '<a data-slide="next" data-target="#carousel-enlaces" href="#carousel-2" class="right carousel-control">';
                  echo '<span class="icn icn-nav"></span>';
                echo '</a>';
              echo '</div>';
            echo '</div>';
        endif;
    }

    function update($new_instance, $old_instance) {
        return $new_instance;
    }
    function form($instance) {
        extract( $instance );
        $pages_list = new WP_Query(array(
                        'post_type' =>  array('page'),
                        'posts_per_page' => -1,
                        'post_status' => 'publish'
                    ));
        echo '<p><label for="'.$this->get_field_id('title').'">Titulo: <input type="text" name="'. $this->get_field_name('title') .'" id="'.$this->get_field_id('title').'" value="'.$instance['title'].'" class="widefat" /></label></p>';
        echo '<p><label for="'.$this->get_field_id('num').'">Enlaces a mostrar: <input type="text" name="'. $this->get_field_name('num') .'" id="'.$this->get_field_id('num').'" value="'.$instance['num'].'" class="widefat" /></label></p>';
        if ( !empty( $num ) ) {
            echo '<hr>';
            echo '<h3>Enlaces</h3>';
            echo '<hr>';
            for ( $x = 0; $x < $num; $x++ ) {
                echo '<h4>Enlace '.($x+1).'</h4>';
                echo '<p><label for="'.$this->get_field_id('link_title_'.$x).'">Título enlace '.($x+1).': <input type="text" name="'. $this->get_field_name('link_title][') .'" id="'.$this->get_field_id('link_title_'.$x).'" value="'.$link_title[$x].'" class="widefat" /></label></p>';
                echo '<p><label for="'.$this->get_field_id('link_content_'.$x).'">Contenido enlace '.($x+1).': <textarea name="'. $this->get_field_name('link_content][') .'" id="'.$this->get_field_id('link_content_'.$x).'" class="widefat">'.$link_content[$x].'</textarea></label></p>';
                  echo '<p>';
                    $img_selected = '';
                    if (!empty($instance['attachment_id'])) {
                        $img_selected = '<img src="'.wp_get_attachment_thumb_url( $attachment_id[$x] ).'" width="150">';
                    }
                 
                    echo '<div>'. $img_selected.'</div>';
                    echo '<a href="#" id="'. $this->get_field_id('attach_button_'.$x).'" onClick="bindEventWidgetImage(this.id);return false;" data-targetid="'.$this->get_field_id('attachment_id_'.$x).'" data-button-text="Seleccionar" data-uploader-title="selecciona la imagen del widget" class="button widget_custom_media_upload">Subir una imagen</a>';
                    echo '<input type="hidden" id="'. $this->get_field_id('attachment_id_'.$x).'" name="'.$this->get_field_name('attachment_id][').'" value="'. $attachment_id[$x].'"';
                echo '</p>';

                 
                echo '<p><label>Páginas </p>';
                echo '<div style="height: 150px;overflow:auto;border:1px solid #C0C0C0;">';
                $y = 0;
                foreach ($pages_list->posts as $page) {
                    $var_page = ${"pages_".$x};
                    $current_pages = ( !is_array( $var_page ) ) ? array() : $var_page;

                    $class = ( in_array($page->ID, $current_pages )) ? ' checked="checked"' : '';
                    echo' <label><input type="checkbox" name="'.$this->get_field_name('pages_'.$x).'[]" value="'.$page->ID.'"'.$class.'>'.$page->post_title.'</label><br>';
                    $y++;
                }
                echo '</div>';
                echo '<hr>';
            }
        }
        
    } 
}

class WP_ead_Nav_Menu_Widget extends WP_Widget {

    public function __construct() {
        $widget_ops = array( 'description' => __('Add a custom menu to your sidebar.') );
        parent::__construct( 'nav_menu', __('Custom Menu'), $widget_ops );
    }

    public function widget($args, $instance) {
        // Get menu
        $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

        if ( !$nav_menu )
            return;

        /** This filter is documented in wp-includes/default-widgets.php */
        $instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        $args['before_title'] = '<h6 class="xs seccion margen-sup">';
        $args['after_title'] = '</h6>';

        echo $args['before_widget'];

        if ( !empty($instance['title']) )
            echo $args['before_title'] . $instance['title'] . $args['after_title'];

        $nav_menu_args = array(
            'fallback_cb' => '',
            'menu'        => $nav_menu
        );

        /**
         * Filter the arguments for the Custom Menu widget.
         *
         * @since 4.2.0
         *
         * @param array    $nav_menu_args {
         *     An array of arguments passed to wp_nav_menu() to retrieve a custom menu.
         *
         *     @type callback|bool $fallback_cb Callback to fire if the menu doesn't exist. Default empty.
         *     @type mixed         $menu        Menu ID, slug, or name.
         * }
         * @param stdClass $nav_menu      Nav menu object for the current menu.
         * @param array    $args          Display arguments for the current widget.
         */
        wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args ) );

        echo $args['after_widget'];
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        if ( ! empty( $new_instance['title'] ) ) {
            $instance['title'] = strip_tags( stripslashes($new_instance['title']) );
        }
        if ( ! empty( $new_instance['nav_menu'] ) ) {
            $instance['nav_menu'] = (int) $new_instance['nav_menu'];
        }
        return $instance;
    }

    public function form( $instance ) {
        $title = isset( $instance['title'] ) ? $instance['title'] : '';
        $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

        // Get menus
        $menus = wp_get_nav_menus();

        // If no menus exists, direct the user to go and create some.
        if ( !$menus ) {
            echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
            return;
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
            <select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
                <option value="0"><?php _e( '&mdash; Select &mdash;' ) ?></option>
        <?php
            foreach ( $menus as $menu ) {
                echo '<option value="' . $menu->term_id . '"'
                    . selected( $nav_menu, $menu->term_id, false )
                    . '>'. esc_html( $menu->name ) . '</option>';
            }
        ?>
            </select>
        </p>
        <?php
    }
}

// register WP_Widgets
add_action('widgets_init', 'register_widgets');
add_action('init', 'register_widgets');
function register_widgets(){
    register_widget('WP_Widget_news');
    register_widget('WP_Widget_docencia');
    register_widget('WP_Widget_events');
    register_widget('WP_Widget_school_links');
    register_widget('WP_Widget_posts');
    register_widget( 'WP_ead_Nav_Menu_Widget' );
    register_widget( 'WP_Widget_news_thumb' );
    register_widget( 'WP_Widget_twitter' );

    unregister_widget( 'WP_Widget_Pages' );
    unregister_widget( 'WP_Widget_Links' );
    unregister_widget( 'WP_Widget_Archives' );
    unregister_widget( 'WP_Widget_Meta' );
    unregister_widget( 'WP_Widget_Calendar' );
    unregister_widget( 'WP_Widget_Categories' );
    unregister_widget( 'WP_Widget_Recent_Posts' );
    unregister_widget( 'WP_Widget_Recent_Comments' );

    unregister_widget( 'WP_Nav_Menu_Widget' );
}