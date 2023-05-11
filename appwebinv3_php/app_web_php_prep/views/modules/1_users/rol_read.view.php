            <section>                    
                    <h1>Vista para Consultar Roles</h1>
                    <a href="?c=Users&a=createRol">Crear Rol</a>
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($roles as $rol) : ?>
                            <tr>
                                <td><?php echo $rol->getCodigoRol(); ?></td>
                                <td><?php echo $rol->getNombreRol(); ?></td>
                                <td>
                                    <a href="?c=Users&a=updateRol&idRol=<?php echo $rol->getCodigoRol(); ?>">Actualizar</a>
                                    <a href="?c=Users&a=deleteRol&idRol=<?php echo $rol->getCodigoRol(); ?>">Eliminar</a>
                                </td>
                            </tr>                            
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <th>Código</th>
                            <th>Nombre</th>                            
                            <th>Acciones</th>
                        </tfoot>
                    </table>
            </section>