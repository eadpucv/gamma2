(function() {
    tinymce.PluginManager.add('custom_button_ead', function( editor, url ) {
    	//esta lista de iconos tal vez puede ser obtenida de mejor manera para que esté siempre actualizada 
    	var iconList = [
    		'icn-abierto',
			'icn-acto',
			'icn-admin',
			'icn-alarma',
			'icn-ampolleta',
			'icn-anuncio',
			'icn-archivo',
			'icn-asterisco',
			'icn-aviso',
			'icn-biblioteca',
			'icn-bower',
			'icn-calendario',
			'icn-camara',
			'icn-caron',
			'icn-caronabajo',
			'icn-caronarriba',
			'icn-caronizquierda',
			'icn-casiopea',
			'icn-cerrado',
			'icn-ciclo',
			'icn-circulo',
			'icn-circulolleno',
			'icn-clip',
			'icn-codigo',
			'icn-compartir',
			'icn-constel',
			'icn-corazon',
			'icn-cruzdelsur',
			'icn-cuadro',
			'icn-cuadrolleno',
			'icn-descargar',
			'icn-documento',
			'icn-email',
			'icn-engranaje',
			'icn-enlace',
			'icn-enlacehorizontal',
			'icn-equis',
			'icn-ese',
			'icn-estorninos',
			'icn-estrella',
			'icn-etiqueta',
			'icn-facebook',
			'icn-flecha',
			'icn-flechaabajo',
			'icn-flechaarriba',
			'icn-flechaizquierda',
			'icn-flickr',
			'icn-grafico',
			'icn-hedera',
			'icn-hogar',
			'icn-imagen',
			'icn-impresora',
			'icn-ingresar',
			'icn-jekyll',
			'icn-lapiz',
			'icn-lentes',
			'icn-less',
			'icn-libro',
			'icn-lupa',
			'icn-lupamas',
			'icn-lupamenos',
			'icn-mano',
			'icn-manoabajo',
			'icn-manoarriba',
			'icn-manoizquierda',
			'icn-mapa',
			'icn-mapamas',
			'icn-marcador',
			'icn-mas',
			'icn-menos',
			'icn-menu',
			'icn-movil',
			'icn-nav',
			'icn-navabajo',
			'icn-navarriba',
			'icn-navizquierda',
			'icn-noticias',
			'icn-ojo',
			'icn-ordenhorizontal',
			'icn-ordenvertical',
			'icn-palabra',
			'icn-parlante',
			'icn-parrafo',
			'icn-pc',
			'icn-perfil',
			'icn-prohibir',
			'icn-rama',
			'icn-refrescar',
			'icn-reloj',
			'icn-rss',
			'icn-salir',
			'icn-sitemap',
			'icn-soundcloud',
			'icn-stampa',
			'icn-subir',
			'icn-tablet',
			'icn-tiempo',
			'icn-trabajo',
			'icn-travesia',
			'icn-twitter',
			'icn-usuario',
			'icn-usuariomas',
			'icn-usuariomenos',
			'icn-usuarios',
			'icn-vimeo',
			'icn-vineta',
			'icn-visto',
			'icn-youtube'
    	];

    	var gridHtml = '<table role="presentation" cellspacing="0" class="mce-stampa"><tbody>';

		var width = 25;
		var height = Math.ceil(iconList.length / width);
		for (y = 0; y < height; y++) {
			gridHtml += '<tr>';

			for (x = 0; x < width; x++) {
				var index = y * width + x;
				if (index < iconList.length) {
					var chr = iconList[index];

					gridHtml += '<td title="' + chr[1] + '"><div tabindex="-1" title="' + chr[1] + '" role="button" style="">' +
						'<a href="#'+chr+'" class="stampa-icon"><i class="icn '+chr + '"></i></a></div></td>';
				} else {
					gridHtml += '<td />';
				}
			}

			gridHtml += '</tr>';
		}

		gridHtml += '</tbody></table>';

        editor.addButton( 'custom_button_ead', {
            text: '',
            type: 'menubutton',
            icon: 'icn icn-stampa',
            title : 'Insertar Stampa',
            menu: [ {
            	text: 'Insertar ícono',
            	onclick: function() {
            		 win = editor.windowManager.open({
		                title: 'Insertar icono Stampa',
		                body: [
		                    {
		                    	type: 'container', 
		                    	html: gridHtml,
		                    	style: 'font-family: "Stampa"',
		                    	onclick: function(e) {
									var target = e.target;
									var classbutton = jQuery(e.target).parent().attr('href').replace('#','');
									editor.insertContent('[icn icono=' + classbutton + ']');
									if (!e.ctrlKey) {
										win.close();
									}
								},
		                    }
		                ],
		                onsubmit: function(e) {
		                    // por el momento no hacemos nada al hacer submit
		                }
		            });
            	}
            }, 
            {
	            text: 'Insertar título + icono',
	            onclick: function(){
	            	win = editor.windowManager.open({
		                title: 'Insertar título + ícono Stampa',
		                body: [
		                    {
		                    	type: 'container', 
		                    	html: gridHtml,
		                    	style: 'font-family: "Stampa"',
		                    	onclick: function(e) {
									var target = e.target;
									var classbutton = jQuery(e.target).parent().attr('href').replace('#','');
									jQuery('.selected-icon-stampa').html('<i class="icn '+ classbutton +'"></i>');
									jQuery('.selected-icon-stampa').data('icon',classbutton);
									
								}
							},
							{
								type: 'listbox',
								label: 'Tipo de título',
								name: 'h',
								values : [
									{ text: 'Título H1', value: 'h1' },
									{ text: 'Título H2', value: 'h2' },
									{ text: 'Título H3', value: 'h3' },
									{ text: 'Título H4', value: 'h4' },
									{ text: 'Título H5', value: 'h5' },
									{ text: 'Título H6', value: 'h6' }
								] 
							},
							{
								type: 'textbox',
								label: 'Título',
								name: 'title'
							},
							{
								type: 'container',
								label: 'Ícono seleccionado: ',
								style: 'font-family: "Stampa"',
								html: '<div class="selected-icon-stampa"></div>'
							}
		                    
		                ],
		                onsubmit: function(e) {
		                	var icon = jQuery('.selected-icon-stampa').data('icon');
		                	if (icon != undefined) {
		                    	var shortcode = '[titulo icn='+icon+' h='+e.data.h+']'+e.data.title+'[/titulo]';
		                    	editor.insertContent(shortcode);
		                	}
		                }
		            });
				}
            }]

        });
	});
})();