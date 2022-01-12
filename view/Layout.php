<?php
/**
 * @author Sasha
 * @since 22/12/2021
 * @version 1.0
 * 
 * Layout, base de las vistas.
 * Contiene el head con el estilo básico, título y metas. También footer.
 */
?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta charset="UTF-8">
        <title>IMG - App Login-Logout</title>
        <link href="webroot/css/layout.css" rel="stylesheet" type="text/css"/>
        <link href="webroot/css/vInicioPublico.css" rel="stylesheet" type="text/css"/>
        <link href="webroot/css/vLogin.css" rel="stylesheet" type="text/css"/>
        <link href="webroot/css/vInicioPrivado.css" rel="stylesheet" type="text/css"/>
        <link href="webroot/css/vRegistro.css" rel="stylesheet" type="text/css"/>
        <link href="webroot/css/vDetalle.css" rel="stylesheet" type="text/css"/>
        <link href="webroot/css/vWIP.css" rel="stylesheet" type="text/css"/>
        <link href="webroot/css/vError.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php require_once $aVistas[$_SESSION['paginaEnCurso']]; // Requiere la vista indicada en la variable de página. ?>
        <footer>
            <hr/>
            <div class="info">
                <a href="https://github.com/SashaMGuerra/204DWESAplicacionLoginLogout"><img src="webroot/media/img/github_logo_white.png" alt="repositorio"></a>
                <div>© 2021-2022 Isabel Martínez Guerra — IES Los Sauces (Benavente, Zamora) — Modificado el 21/12/2021.</div>
            </div>
        </footer>
    </body>
</html>
