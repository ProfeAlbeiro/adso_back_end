            <section>
                <h1>Vista para Crear Rol</h1>
                <form action="?c=Users&a=createRol" method="post">
                    <div class="form-header">
                        <h2>CrearRol</h2>
                    </div>
                    <div class="form-body">
                        <div class="form-control">
                            <label for="codigoRol">Código Rol</label>
                            <input type="hidden" id="codigoRol" name="codigoRol" value ="<?php echo $tRols ?>">
                            <input type="number" id="cantRoles" name="cantRoles" value ="<?php echo $tRols ?>" disabled>
                        </div>
                        <div class="form-control">
                            <label for="nombreRol">Nombre Rol</label>
                            <input type="text" id="nombreRol" name="nombreRol">
                        </div>
                    </div>
                    <div class="form-footer">
                        <input type="submit" value="Enviar">
                    </div>
                </form>
            </section>