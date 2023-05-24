<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css" rel="stylesheet">
    <title>CRUD USUARIOS</title>
</head>

<body>
    <div class="container-fluid mt-5">
        <main>
            <!-- Modal: Registrar Usuario -->
            <div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Usuario</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="?c=Users&a=createUser" method="post">
                                <div class="mb-3">                                    
                                    <input type="hidden" class="form-control" name="userCode" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Cédula</label>
                                    <input type="text" class="form-control" name="userId" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nombres</label>
                                    <input type="text" class="form-control" name="userName" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" name="userLastName" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Fecha Nacimiento</label>
                                    <input type="date" class="form-control" name="userBirthDate" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Ciudad</label>
                                    <select name="userIdCity" class="form-select" aria-label="Default select example">
                                        <?php foreach ($cities as $city) : ?>
                                            <option value="<?php echo $city->getIdCity() ?>"><?php echo $city->getNameCity() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Ocupación</label>
                                    <select name="userIdOccupation" class="form-select" aria-label="Default select example">
                                        <?php foreach ($occupations as $occupation) : ?>
                                            <option value="<?php echo $occupation->getIdOccupation() ?>"><?php echo $occupation->getNameOccupation() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Telefono</label>
                                    <input type="text" class="form-control" name="userPhone" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal: Editar Usuario -->
            <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Usuario</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="?c=Users&a=updateUser" method="post">
                                <div class="mb-3">                                    
                                    <input type="hidden" class="form-control" name="userCode" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user->getUserCode() ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Cédula</label>
                                    <input type="text" class="form-control" name="userId" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user->getUserId() ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nombres</label>
                                    <input type="text" class="form-control" name="userName" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user->getUserName() ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" name="userLastName" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user->getUserLastName() ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Fecha Nacimiento</label>
                                    <input type="date" class="form-control" name="userBirthDate" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user->getUserBirthDate() ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Ciudad</label>
                                    <select name="userIdCity" class="form-select" aria-label="Default select example">
                                        <?php foreach ($cities as $city) : ?>
                                            <?php if ($city->getIdCity() == $user->getUserIdCity()) : ?>
                                                <option selected="selected" value="<?php echo $city->getIdCity() ?>"><?php echo $city->getNameCity() ?></option>
                                            <?php else : ?>
                                                <option value="<?php echo $city->getIdCity() ?>"><?php echo $city->getNameCity() ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Ocupación</label>
                                    <select name="userIdOccupation" class="form-select" aria-label="Default select example">
                                        <?php foreach ($occupations as $occupation) : ?>
                                            <?php if ($occupation->getIdOccupation() == $user->getUserIdOccupation()) : ?>
                                                <option selected="selected" value="<?php echo $occupation->getIdOccupation() ?>"><?php echo $occupation->getNameOccupation() ?></option>
                                            <?php else : ?>
                                                <option value="<?php echo $occupation->getIdOccupation() ?>"><?php echo $occupation->getNameOccupation() ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Telefono</label>
                                    <input type="text" class="form-control" name="userPhone" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user->getUserPhone() ?>">
                                </div>

                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>