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
			$out .= '<div class="fila alto-md">';
				while ($publications->have_posts()){ $publications->the_post();
					global $post;
					
					if ($x >= 2) {
       					$out .= '</div><div class="fila alto-md">'; $x = 0;
       				}
       				$out .= '<div class="col-md-6 col-sm-6 col-xs-12 noticia margen-inf-sm h100">';
       				$out .= '<div class="cabecera">';
				        $out .= '<a href="'.get_permalink($post->ID).'">';
				        	$out .= get_the_post_thumbnail( $post->ID, 'entry-img', array( 'class' => 'ancho-maximo' ) );
				        $out .= '</a>';
				      $out .= '</div>';
				        $out .= '<div class="relleno-sup-xs tooltip-demo">';
				        	$out .= '<h4 class="xs sin-margen relleno-inf-xs  sombra-cabecera-claro-xs"><a class="condensado  negro-fundido gruesa" href="'.get_permalink($post->ID).'"><i class="icn icn-noticias margen-der-xs"></i>'.get_the_title( $post->ID ).'</a></h4>';
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

class TitleWithIcon extends \GutenPress\Model\Shortcode{
	public function setTag(){
		$this->tag = 'titulo-icono';
	}
	public function setFriendlyName(){
		$this->friendly_name = 'Título con icono';
	}
	public function setDescription(){
		$this->description = 'Permite insertar un título acompañado de un ícono';
	}

	public function display($atts, $content){
		$icon = $atts['icon'];
		$title = ( !empty( $atts['title'] ) ) ? $atts['title'] : 'h3';
		$out = '<'.$title.'>';
		if ( !empty( $icon ) ) {
			$out .= '<i class="icn '.$icon.'"></i>';
		}
		$out .= ' '.$content;
		$out .= '</'.$title.'>';
		
       	return $out;
	}
	public function iconSelect(){
		$icons = sitio::get_icons();
		$icons_select[] = 'Seleccionar icono';
		foreach ($icons as $icon){
			$icons_select[$icon] = $icon;
		}
		return $icons_select;
	}
	public function configForm(){
		$form = new Forms\MetaboxForm('requisitos-shortcode');
		$form->addElement(
				new Element\Select(
					'Seleccionar icono',
					'icon',
					$this->iconSelect()
				) )->addElement(
				new Element\Select(
					'Tipo de título',
					'title',
					array(
						'h1' => 'Título H1',
						'h2' => 'Título H2',
						'h3' => 'Título H3',
						'h4' => 'Título H4',
						'h5' => 'Título H5',
						'h6' => 'Título H6',
						),
					array(
						'style' => 'font-family: "Stampa";'
						)
				) )->addElement(
				new Element\Textarea(
					'Contenido',
					'content'
				) );
		echo $form;
		exit;
	}
}
\GutenPress\Model\ShortcodeFactory::create('TitleWithIcon');