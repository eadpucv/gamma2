(function(){
	tinymce.PluginManager.add('custom_button_parallax_content', function( editor, url ) {
		editor.addButton( 'custom_button_parallax_content', {
            text: '',
            icon: 'icn icn-imagen',
            title: 'Contenido Parallax',
            onclick : function(){
            	selected = tinyMCE.activeEditor.selection.getContent();
            	if ( selected ) {
            		content = '[contenido-parallax]'+selected+'[/contenido-parallax]';
            	} else {
            		content = '[contenido-parallax][/contenido-parallax]';
            	}
            	tinyMCE.activeEditor.selection.setContent(content);
            }
           });
	});
})();