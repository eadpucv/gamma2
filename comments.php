<div class="col-md-6 margen-inf-sm">
<?php 
	if ( have_comments() ) {
		wp_list_comments();
	} else {
		echo "Aún no hay comentarios en esta publicación";
	}
 ?>
    
</div>
<div class="col-md-6">
	<?php comment_form(); ?>
    <!-- <form role="form">
        <div class="form-group">
        <label for="nombre">Nombre *</label>
        <input type="text" class="form-control" id="nombre" placeholder="Introduce su nombre" required />
        </div>
        <div class="form-group">
        <label for="correo-electronico">Correo electrónico</label>
        <input type="email" class="form-control" id="correo-electronico" placeholder="correo electrónico">
        </div>
        <div class="form-group">
        <label>comentario</label>
        <textarea placeholder="Comenta aquí" required></textarea>
        </div>
        <button type="submit" class="btn btn-default">comentar</button>
    </form> -->
</div>