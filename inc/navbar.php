<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de inventario</title>
    <link rel="stylesheet" href="./css/bulma.min.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>

    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
                <img src="./img/logo.png" width="90" height="35">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
                data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                    <!-- <a class="navbar-item">
                        Home
                    </a>

                    <a class="navbar-item">
                        Documentation
                    </a> -->
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">Usuarios</a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item">Nuevo</a>
                        <a class="navbar-item">Listar</a>
                        <a class="navbar-item">Buscar</a>
                    </div>
                </div>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">Categorias</a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item">Nuevo</a>
                        <a class="navbar-item">Listar</a>
                        <a class="navbar-item">Buscar</a>
                    </div>
                </div>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">Productos</a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item">Nuevo</a>
                        <a class="navbar-item">Listar</a>
                        <a class="navbar-item">Por categoria</a>
                        <a class="navbar-item">Buscar</a>
                    </div>
                </div>

            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-primary is-rounded">
                            Mi cuenta
                        </a>
                        <a class="button is-link is-rounded">
                            Salir
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>