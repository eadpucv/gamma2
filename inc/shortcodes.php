<?php 
use GutenPress\Forms as Forms;
use GutenPress\Forms\Element as Element;

class getCategoryPosts extends \GutenPress\Model\Shortcode{
	public function setTag(){
		$this->tag = 'entradas';
	}
	public function setFriendlyName(){
		$this->friendly_name = 'Mostrar entradas de una categoría';
	}
	public function setDescription(){
		$this->description = 'Permite mostrar un entradas de una categoría específica';
	}

	public function display($atts, $content){
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$category = (!empty($atts['cat'])) ? $atts['cat'] : 'sin-categoria';
		$publications = new WP_Query(array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'category_name' => $category,
						//'paged' => $paged,
						'posts_per_page' => $atts['total'],
						'orderby' => 'date',
						'order' => 'DESC'
					));
		$x = 0; $y = 1;
		$out = '';
		if ($publications->have_posts()):
			$out .= '<div class="widget-post-categories">';
			$out .= '<div class="fila">';
				while ($publications->have_posts()){ $publications->the_post();
					global $post;
					
					
       				$out .= '<div class="noticia">';
       				if (has_post_thumbnail( $post->ID )) {
	       				$out .= '<div class="cabecera">';
					        $out .= '<a href="'.get_permalink($post->ID).'">';
					        	$out .= sitio::ead_get_the_post_thumbnail( $post->ID, 'entry-img', array( 'class' => 'ancho-maximo' ) );
					        $out .= '</a>';
					      $out .= '</div>';
					}

				        $out .= '<div class="relleno-sup-xs tooltip-demo">';
				        	$out .= '<h3 class="xs sin-margen relleno-inf-xs  sombra-cabecera-claro-xs"><a class="condensado  negro-fundido gruesa" href="'.get_permalink($post->ID).'"><i class="icn icn-noticias margen-der-xs"></i>'.get_the_title( $post->ID ).'</a></h3>';
					        $out .= '<span class="xs entry-details">Publicado el '.mysql2date( 'd \d\e F\, Y', $post->post_date ).'.';
					          $out .= '<a data-toggle="tooltip" href="#" title="Editar" class="xs en-linea sin-margen" href="#">';
					           $out .= '<span class="icn-stack">';
						            $out .= '<span class="icn icn-cuadrolleno icn-stack-2x"></span>';
						            $out .= '<span class="icn icn-lapiz icn-sm icn-stack-1x"></span>';
					          $out .= '</span>';
					          $out .= '</a>';
					        $out .= '</span>';
				        	$the_excerpt = ( !empty( $post->post_excerpt ) ) ? $post->post_excerpt : smart_substr( $post->post_content, 255 );
				        	$out .= '<p class="xs">'.$the_excerpt.' <a href="'.get_permalink( $post->ID ).'">[<i class="icn icn-lentes"></i>]</a></p>';
				      $out .= '</div>';

					$x++; $y++;
					$out .= '</div>';
			}
			$out .= '</div>';
			$out .= '</div>';
       		return $out;
		endif;

	}
	public function termSelect(){
		$terms = get_terms('category');
		$terms_select[] = 'Seleccionar categoria';
		foreach ($terms as $term){
			$terms_select[$term->slug] = $term->name;
		}
		return $terms_select;
	}
	public function configForm(){
		$form = new Forms\MetaboxForm('requisitos-shortcode');
		$form->addElement(
				new Element\Select(
					'Seleccionar Categoria',
					'cat',
					$this->termSelect()
				) )->addElement(
				new Element\InputText(
					'Cantidad de entradas',
					'total',
					array(
						'description' => '0 para mostrar todas las entradas'
						)
				) );
		echo $form;
		exit;
	}
}
\GutenPress\Model\ShortcodeFactory::create('getCategoryPosts');

class TitleParallax extends \GutenPress\Model\Shortcode{
	public function setTag(){
		$this->tag = 'titulo-parallax';
	}
	public function setFriendlyName(){
		$this->friendly_name = 'Título con parallax';
	}
	public function setDescription(){
		$this->description = 'Permite insertar un título acompañado de una imagen de fondo con efecto parallax';
	}

	public function display($atts, $content){
		$image = $atts['img'];
		$title = $atts['title'];
		$subtitle = $atts['subtitle'];
		$image_style = ( !empty( $image ) ) ? ' style="background: url('.current( wp_get_attachment_image_src( $atts['img'], 'full' ) ).') no-repeat fixed 100% 0%; height: 46vw;"' : '';
		$out = '<div id="parallax-'.sanitize_title_with_dashes( remove_accents( $title ) ).'" class="parallax-image relativo oculto-xs"'.$image_style.'>';
			if ( !empty( $title ) ) {
				$out .= '<h1 class="lg entry-title">'.$title.'</h1>';
			}
			if ( !empty( $subtitle ) ) {
				$out .= '<h4 class="xs subtitulo">'.$subtitle.'</h4>';
			}
		$out .= '</div>';
		
       	return $out;
	}
	public function configForm(){
		wp_enqueue_media();
		$form = new Forms\MetaboxForm('parallax-title-shortcode');
		$form->addElement(
				new Element\WPImageSc(
					'Imagen',
					'img',
					array(
						)
				) )->addElement(
				new Element\InputText(
					'Título',
					'title'
				) )->addElement(
				new Element\InputText(
					'Sub Título',
					'subtitle'
				) );
		echo $form;
		exit;
	}
}
\GutenPress\Model\ShortcodeFactory::create('TitleParallax');

class CiteParallax extends \GutenPress\Model\Shortcode{
	public function setTag(){
		$this->tag = 'cita-parallax';
	}
	public function setFriendlyName(){
		$this->friendly_name = 'Cita con parallax';
	}
	public function setDescription(){
		$this->description = 'Permite insertar una cita acompañada de una imagen de fondo con efecto parallax';
	}

	public function display($atts, $content){
		$image = $atts['img'];
		$cite = $content;
		$firma = $atts['ref'];
		$style = $atts['style'];

		$image_style = ( !empty( $image ) ) ? ' style="background: url('.current( wp_get_attachment_image_src( $atts['img'], 'full' ) ).') no-repeat fixed 100% 0%; height: 46vw;"' : '';
		switch ($style) {
			case 1:
				$cite_classes = array('wp-caption-text', 'sin-borde',  'derecha oculto-sm');
				$ref_classes = array('sm', 'wp-caption-text', 'sin-borde', 'referencia');
			break;
			case 2:
				$cite_classes = array('wp-caption-text', 'sin-borde oculto-sm');
				$ref_classes = array('sm', 'wp-caption-text', 'sin-borde', 'referencia', 'derecha');
			break;
			case 3:
				$cite_classes = array('wp-caption-text', 'sin-borde', 'derecha', 'oculto-sm');
				$ref_classes = array('sm', 'wp-caption-text', 'sin-borde', 'referencia', 'oculto-sm');
			break;
			case 4:
				$cite_classes = array('wp-caption-text', 'sin-borde', 'oculto-sm');
				$ref_classes = array('sm', 'wp-caption-text', 'sin-borde', 'referencia', 'oculto-sm');
			break;
		}
		$out = '<div id="parallax-'.sanitize_title_with_dashes( remove_accents( $ref ) ).'" class="parallax-image relativo oculto-xs"'.$image_style.'>';
			$out .= '<div class="pag">';
				$out .= '<span class="'.implode(' ',$cite_classes).'">'.$cite;
				if ( ( $style == 1) || ( $style == 2 ) ) {
					$out .= '</span>';
				}
				$out .= '<span class="'.implode(' ',$ref_classes).'">'.$firma.'</span>';
				if ( ( $style == 3 ) || ( $style == 4 ) ) {
					$out .= '</span>';	
				}
			$out .= '</div>';
		$out .= '</div>';
		
       	return $out;
	}
	public function configForm(){
		wp_enqueue_media();
		$form = new Forms\MetaboxForm('parallax-cite-shortcode');
		$form->addElement(
				new Element\WPImageSc(
					'Imagen',
					'img',
					array(
						)
				) )->addElement(
				new Element\Textarea(
					'Cita',
					'content',
					array(
						'id' => 'gutenpress-shortcode-content'
						)
				) )->addElement(
				new Element\InputText(
					'Referencia',
					'ref'
				) )->addElement(
				new Element\Select(
					'Estilo',
					'style',
					array(
						'' => 'Seleccione un estilo',
						'1' => 'Cita derecha + firma Izquierda',
						'2' => 'Cita izquierda + firma Derecha',
						'3' => 'Cita + firma a la Derecha',
						'4' => 'Cita + firma a la Izquierda',
						)
				) );
		echo $form;
		exit;
	}
}
\GutenPress\Model\ShortcodeFactory::create('CiteParallax');