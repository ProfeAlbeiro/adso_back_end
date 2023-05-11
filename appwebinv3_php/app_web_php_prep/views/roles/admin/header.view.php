<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="assets/css/styles_dashboard.css">
</head>
<body>
    <div class="container">
        <nav>
            <a href="?c=Dashboard">Principal</a>
            <a href="?c=Logout">Cerrar Sesión</a>
        </nav>        
        <main>
            <aside>
                <div class="modulos">
                    <h1>Módulo Usuarios</h1>
                    <a href="?c=Users&a=createRol">Crear Rol</a>
                    <a href="?c=Users&a=createUser">Crear Usuario</a>
                    <a href="?c=Users&a=readRol">Consultar Roles</a>
                </div>
                <div class="modulos">
                    <h1>Módulo Principal</h1>
                    <a href="?c=Errors">Crear funcionalidad</a>
                </div>
                <div class="modulos">
                    <h1>Módulo Reportes</h1>
                    <a href="?c=Errors">Crear Reporte</a>
                </div>
            </aside>