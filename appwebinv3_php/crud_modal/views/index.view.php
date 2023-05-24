<h1 class="text-center" id="modificable">Registro</h1>
<div class="container mt-5">
    <div class="row">
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUser">
                Crear Registro
            </button>
        </div>
        <div class="col-12">
            <table class="table table-sm table-striped table-hover mt-4">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Fecha Nacimiento</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Ocupación</th>
                        <th scope="col">Acciones</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo $user->getUserCode(); ?></td>
                            <td><?php echo $user->getUserId(); ?></td>
                            <td><?php echo $user->getUserName(); ?></td>
                            <td><?php echo $user->getUserLastName(); ?></td>
                            <td><?php echo $user->getUserBirthDate(); ?></td>
                            <td><?php echo $user->getUserPhone(); ?></td>
                            <td><?php echo $user->getUserIdCity(); ?></td>
                            <td><?php echo $user->getUserIdOccupation(); ?></td>
                            <td><a href="?c=Users&a=updateUser&userCode=<?php echo $user->getUserCode(); ?>" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i> Editar</a></td>
                            <td><a href="?c=Users&a=deleteUser&userCode=<?php echo $user->getUserCode(); ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-pen-to-square"></i> Borar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>