            <section>
                <h1>Vista para Crear Usuario</h1>
                <form action="?c=Users&a=createUser" method="post">
                    <div class="form-header">
                        <h2>CrearUsuario</h2>
                    </div>
                    <div class="form-body">
                        <div class="form-control">
                            <label for="codigoRol">Código Rol</label>
                            <input type="number" id="codigoRol" name="codigoRol">
                        </div>
                        <div class="form-control">
                            <label for="codigoUser">Código Usuario</label>
                            <input type="text" id="codigoUser" name="codigoUser">
                        </div>
                        <div class="form-control">
                            <label for="nombresUser">Nombres Usuario</label>
                            <input type="text" id="nombresUser" name="nombresUser">
                        </div>
                        <div class="form-control">
                            <label for="apellidosUser">Apellidos Usuario</label>
                            <input type="text" id="apellidosUser" name="apellidosUser">
                        </div>
                        <div class="form-control">
                            <label for="correoUser">Correo Usuario</label>
                            <input type="email" id="correoUser" name="correoUser">
                        </div>
                    </div>
                    <div class="form-footer">
                        <input type="submit" value="Enviar">
                    </div>
                </form>
            </section>