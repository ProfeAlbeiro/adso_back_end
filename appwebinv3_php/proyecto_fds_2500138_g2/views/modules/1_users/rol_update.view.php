        <!-- Migas de Pan -->
        <div class="migas row d-flex align-items-center bg-white border-bottom">
            <div class="col p-0">
                <div aria-label="breadcrumb">
                    <ol class="breadcrumb rounded-0 m-0 p-2 bg-white">
                        <li class="breadcrumb-item"><a href="?c=Dashboard">Inicio</a></li>
                        <li class="breadcrumb-item">Módulo Usuarios</li>
                        <li class="breadcrumb-item active" aria-current="page">Actualizar Rol</li>
                    </ol>
                </div>
            </div>
        </div>
        
        <!-- Título -->
        <div class="titulo-contenido row">
            <div class="col p-2 border-bottom d-flex justify-content-center align-items-center">
                <div class="col-6 p-0 d-flex justify-content-start align-items-center">
                    <h5 class="m-0">Actualizar Rol</h5>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center p-0">
                    <a href="?c=Users&a=readRol" class="btn btn-light">Consultar Roles</a>
                </div>
            </div>
        </div>

        <!-- Contenido -->
        <div class="contenido row bg-light p-2">
            <div class="col p-0 bg-light">
                <form id="formRolCreate" name="formRolCreate" class="card p-3 bg-dark text-white d-lg-flex justify-content-center w-100 border rounded p-2 needs-validation" action="?c=Users&a=updateRol" method="post" novalidate>
                    <div class="form-row">                        
                        <div class="form-group col-md-6">
                            <label for="rol_codigo">Cógido Rol</label>
                            <input type="text" id="rol_codigo" name="rol_codigo" class="form-control" placeholder="Código Rol" pattern="[ a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ]{2,50}"
							title="Ingrese Nombre(s) Válido(s)" value="<?php echo $rol->getCodigoRol(); ?>" required>
                        </div>
                         <div class="form-group col-md-6">
                            <label for="rol_nombre">Nombre Rol</label>
                            <input type="text" id="rol_nombre" name="rol_nombre" class="form-control" placeholder="Nombre Rol" pattern="[ a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ]{2,50}"
							title="Ingrese Nombre(s) Válido(s)" value="<?php echo $rol->getNombreRol(); ?>" required>
                        </div>                        
                    </div>
                    <input type="submit" class="btn btn-info mb-2" value="Actualizar">
                    <button type="button" id="submit-user-create-cancel" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                </form>
            </div>
        </div>