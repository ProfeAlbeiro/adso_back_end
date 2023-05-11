<!-- Migas de Pan -->
<div class="row">
<div class="col p-0">
	<div aria-label="breadcrumb">
		<ol class="breadcrumb rounded-0 m-0 p-2">
			<li class="breadcrumb-item"><a href="../0_mains/admin_main.html">Inicio</a></li>
			<li class="breadcrumb-item">Módulo Usuarios</li>
			<li class="breadcrumb-item active" aria-current="page">Actualizar Usuario</li>
		</ol>
	</div>
</div>
</div>
<!-- Título -->
<div class="titulo row">
<div class="col p-2 border-bottom d-flex">
	<div class="col-7 p-0 d-flex justify-content-start align-items-center">
		<h5 class="m-0">Actualizar Usuario</h5>
	</div>
	<div class="col-5 d-flex justify-content-end align-items-center p-0">
		<a href="?c=Users&a=read" class="btn btn-primary">Consultar Usuarios</a>
	</div>				
</div>
</div>
<!-- Área Principal -->
<div class="section-pg row">
<div class="col p-2 bg-light">
	<form action="?c=Users&a=update" method="post" class="card p-3 bg-white d-lg-flex justify-content-center w-100 border rounded p-2">
		<div class="form-row">
			<input type="hidden" name="idUser" id="idUser" class="form-control" value="<?php echo $user->getIdUser(); ?>">
			<div class="form-group col-md-6">
				<label for="doc_identidad">Documento de Identidad</label>			
				<input type="text" class="form-control" name="docIdUser" id="doc_identidad" value="<?php echo $user->getDocIdUser(); ?>">
			</div>
			<div class="form-group col-md-6">
				<label for="correo">E-Mail</label>
				<input type="email" class="form-control" name="emailUser" id="correo" value="<?php echo $user->getEmailUser(); ?>">							
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="nombres">Nombres</label>
				<input type="text" class="form-control" name="nameUser" id="nombres" value="<?php echo $user->getNameUser(); ?>">
			</div>
			<div class="form-group col-md-6">
				<label for="apellidos">Apellidos</label>
				<input type="text" class="form-control" name="lastNameUser" id="apellidos" value="<?php echo $user->getLastNameUser(); ?>">
			</div>
		</div>										
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="contrasena_us">Contraseña</label>
				<input type="password" class="form-control" name="passUser" id="contrasena_us" value="<?php echo $user->getPassUser(); ?>">
			</div>
			<div class="form-group col-md-6">
				<label for="confirmacion">Confirmación</label>
				<input type="password" class="form-control" name="passConfirmUser" id="confirmacion" value="<?php echo $user->getPassUser(); ?>">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="perfil_usuario">Perfil</label>
				<select class="form-control" name="idRol" id="perfil">
		     	<?php 
					for ($i=1; $i <= 4; $i++) { 
						if ($user->getIdRol() == $i) {
							echo '<option value="' . ($i) . '" selected>' . $perfil[$i-1] . '</option>';
						} else {
							echo '<option value="' . ($i) . '">' . $perfil[$i-1] . '</option>';
						}
					}
				?>
			    </select>
			</div>
			<div class="form-group col-md-6">
				<label for="estado">Estado</label>
				<select class="form-control" name="statusUser" id="estado">
		      		<?php 
						for ($i=0; $i <= 1; $i++) { 
							if ($user->getStatusUser() == $i) {
								echo '<option value="' . ($i) . '" selected>' . $estado[$i] . '</option>';
							} else {
								echo '<option value="' . ($i) . '">' . $estado[$i] . '</option>';
							}
						}
					?>
			    </select>
			</div>
		</div>
		<button type="submit" class="btn btn-primary mb-2">Actualizar</button>
		<button type="button" class="btn btn-dark" data-dismiss="modal" id="cerrar">Cerrar</button>						
	</form>
</div>
</div>