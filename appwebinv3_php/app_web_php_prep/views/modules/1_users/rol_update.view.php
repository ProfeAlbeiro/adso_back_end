            <section>
                <h1>Vista para Actualizar Rol</h1>
                <form action="?c=Users&a=updateRol" method="post">
                    <div class="form-header">
                        <h2>ActualizarRol</h2>
                    </div>
                    <div class="form-body">
                       <div class="form-control">
                           <label for="codigoRol">Código Rol</label>
                           <input type="hidden" id="codigoRol" name="codigoRol" value="<?php echo $rol->getCodigoRol() ?>">
                           <input type="number" id="cantRoles" name="cantRoles" value="<?php echo $rol->getCodigoRol() ?>" disabled>
                        </div>                    
                        <div class="form-control">
                            <label for="nombreRol">Nombre Rol</label>
                            <input type="text" id="nombreRol" name="nombreRol" placeholder="Escriba nombre del Rol" value="<?php echo $rol->getNombreRol() ?>">
                        </div>
                    </div>
                    <div class="form-footer">
                        <input type="submit" value="Actualizar">
                    </div>
                </form>
            </section>