        <!-- Migas de Pan -->
        <div class="migas row d-flex align-items-center bg-white border-bottom">
            <div class="col p-0">
                <div aria-label="breadcrumb">
                    <ol class="breadcrumb rounded-0 m-0 p-2 bg-white">
                        <li class="breadcrumb-item"><a href="?c=Dashboard">Inicio</a></li>
                        <li class="breadcrumb-item">Módulo Usuarios</li>
                        <li class="breadcrumb-item active" aria-current="page">Consultar Usuarios</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Título -->
        <div class="titulo-contenido row">
            <div class="col p-2 border-bottom d-flex justify-content-center align-items-center">
                <div class="col-6 p-0 d-flex justify-content-start align-items-center">
                    <h5 class="m-0">Consultar Usuarios</h5>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center p-0">
                    <a href="?c=Users&a=createUser" class="btn btn-light">Crear Usuario</a>
                </div>
            </div>
        </div>

        <!-- Contenido -->
        <div class="contenido row bg-light p-2">
            <div class="cont-tabla col p-0 bg-light">
                <table id="data-tables" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>                            
                            <th>Codigo Rol</th>
                            <th>Nombre Rol</th>
                            <th>Código Usuario</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Correo</th>                            
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo $user->getCodigoRol(); ?></td>
                                <td><?php echo $user->getNombreRol(); ?></td>
                                <td><?php echo $user->getCodigoUser(); ?></td>
                                <td><?php echo $user->getNombresUser(); ?></td>
                                <td><?php echo $user->getApellidosUser(); ?></td>
                                <td><?php echo $user->getCorreoUser(); ?></td>
                                <td class="tabla-acciones">
                                    <a class="tabla-edit" href=""><i class="fas fa-edit"></i></a>
                                    <a class="tabla-delete" href="#" onclick="deleteUser()"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Codigo Rol</th>
                            <th>Nombre Rol</th>
                            <th>Código Usuario</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Correo</th>                            
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>