        <!-- Migas de Pan -->
        <div class="migas row d-flex align-items-center bg-white border-bottom">
            <div class="col p-0">
                <div aria-label="breadcrumb">
                    <ol class="breadcrumb rounded-0 m-0 p-2 bg-white">
                        <li class="breadcrumb-item"><a href="?c=Dashboard">Inicio</a></li>
                        <li class="breadcrumb-item">Módulo Usuarios</li>
                        <li class="breadcrumb-item active" aria-current="page">Crear Usuario</li>
                    </ol>
                </div>
            </div>
        </div>
        
        <!-- Título -->
        <div class="titulo-contenido row">
            <div class="col p-2 border-bottom d-flex justify-content-center align-items-center">
                <div class="col-6 p-0 d-flex justify-content-start align-items-center">
                    <h5 class="m-0">Crear Usuario</h5>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center p-0">
                    <a href="?c=Users&a=readUser" class="btn btn-light">Consultar Usuarios</a>
                </div>
            </div>
        </div>

        <!-- Contenido -->
        <div class="contenido row bg-light p-2">
            <div class="col p-0 bg-light">
                <form action="?c=Users&a=createUser" method="post" id="formUserCreate" name="formUserCreate" class="card p-3 bg-dark text-white d-lg-flex justify-content-center w-100 border rounded p-2 needs-validation"  novalidate>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="user_perfil">Perfil</label>
                            <select name="rol_codigo" class="form-control class-perfil" id="user_perfil" 
							title="Ingrese Un Perfil Válido" required>                                
                                <option value="2">usuario</option>
                                <option value="3">cliente</option>
                                <option value="4">empleado</option>
                                <option value="1">administrador</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="user_codigo">Código Usuario</label>
                            <input name="user_codigo" type="text" class="form-control" id="user_codigo" placeholder="Nombres" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="user_nombres">Nombres</label>
                            <input name="user_nombres" type="text" class="form-control" id="user_nombres" placeholder="Nombres" pattern="[ a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ]{2,50}"
							title="Ingrese Nombre(s) Válido(s)" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="user_apellidos">Apellidos</label>
                            <input name="user_apellidos" type="text" class="form-control" id="user_apellidos" placeholder="Apellidos" pattern="[ a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ]{2,50}"
							title="Ingrese Apellidos(s) Válido(s)" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="user_correo">Correo</label>
                            <input name="user_correo" type="email" class="form-control" id="user_correo" placeholder="usuario@correo.com" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}"
							title="Ingrese un correo válido" required>
                        </div>                                                
                        <div id="contrasena_us_group" class="form-group col-md-6">
                            <label for="user_contrasena">Contraseña</label>
                            <input name="user_pass" type="password" class="form-control" id="user_contrasena" placeholder="Entre 5 y 8 caracteres"
                            pattern="[A-Za-z0-9]{5,8}" title="Entre 5 y 8 caracteres">
                        </div>
                        <div id="confirmacion_group" class="form-group col-md-6">
                            <label for="user_confirmacion">Confirmación</label>
                            <input name="user_confirm" type="password" class="form-control" id="user_confirmacion" placeholder="Confirmar contraseña" pattern="[A-Za-z0-9]{5,8}" title="Entre 5 y 8 caracteres">
                        </div>
                        <div id="estado_group" class="form-group col-md-6">
                            <label for="user_estado">Estado</label>
                            <select name="user_estado" class="form-control" id="user_estado">
                                <option value="otro"></option>
                                <option value="0">inactivo</option>
                                <option value="1">activo</option>
                            </select>
                        </div>                        
                    </div>
                    <input type="submit" class="btn btn-info mb-2" value="Enviar">
                    <button type="button" id="submit-user-create-cancel" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                </form>
            </div>
        </div>