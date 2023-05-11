<!-- Migas de Pan -->
<div class="row">
	<div class="col p-0">
		<div aria-label="breadcrumb">
			<ol class="breadcrumb rounded-0 m-0 p-2">
				<li class="breadcrumb-item"><a href="?c=Dashboard">Inicio</a></li>
				<li class="breadcrumb-item">Módulo Usuarios</li>
				<li class="breadcrumb-item active" aria-current="page">Consultar Usuarios</li>
			</ol>
		</div>
	</div>
</div>
<!-- Título -->
<div class="titulo row">
	<div class="col p-2  border-bottom d-flex">
		<div class="col-7 p-0 d-flex justify-content-start align-items-center">
			<h5 class="m-0">Consultar Usuarios</h5>
		</div>
		<div class="col-5 d-flex justify-content-end align-items-center p-0">
			<a href="?c=Users&a=create" class="btn btn-primary">Crear Usuario</a>
		</div>
	</div>
</div>
<!-- Área Principal -->
<div class="section-pg row">
	<div class="col p-2 bg-light d-lg-flex justify-content-center">
		<table id="tbl_consultar" class="table table-striped table-bordered table-responsive text-center">
			<thead class="fondo">
				<tr>
					<th scope="col">Itm</th>
					<th scope="col">D.I.</th>
					<th scope="col">E-Mail</th>
					<th scope="col">Nombres</th>
					<th scope="col">Apellidos</th>
					<th scope="col">Contraseña</th>
					<th scope="col">Perfil</th>
					<th scope="col">Estado</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user) : ?>
				<tr>
					<th class="font-weight-normal"><?php echo $user->getIdUser(); ?></th>
					<td><?php echo $user->getDocIdUser(); ?></td>
					<td><?php echo $user->getEmailUser(); ?></td>
					<td><?php echo $user->getNameUser(); ?></td>
					<td><?php echo $user->getLastNameUser(); ?></td>
					<td><?php echo $user->getPassUser(); ?></td>
					<td><?php echo $user->getIdRol(); ?></td>
					<td><?php echo $user->getStatusUser(); ?></td>
					<td class="d-flex flex-row pt-2 justify-content-center">
						<a href="?c=Users&a=update&idUser=<?php echo $user->getIdUser() ?>" class="btn btn-info btn-sm mx-1"><i class="fas fa-pencil-alt"></i></a>
						<a href="?c=Users&a=delete&idUser=<?php echo $user->getIdUser() ?>" class="btn btn-danger btn-sm mx-1"><i class="fas fa-trash-alt"></i></a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>				
	</div>
</div>