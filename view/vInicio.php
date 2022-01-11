<?php
/*
 * @author Sasha
 * @since 22/12/2021
 * @version 1.0
 * 
 * Vista del inicio.
 */
?>
<header>
    <h1>Aplicación Login-Logout</h1>
    <h2>Inicio</h2>
</header>
<main id="vInicio">
    <div class="bienvenida">Bienvenid@ <span class="user"><?php echo $sDescUsuario ?></span>, esta es la <?php echo $iNumConexiones ?>ª vez que se conecta<?php
        if (!empty($_SESSION['usuarioDAW204AppLoginLogout']->getFechaHoraUltimaConexionAnterior())) {
            ?> y su última conexión fue <?php
        echo date('d/m/Y H:i:s',$_SESSION['usuarioDAW204AppLoginLogout']->getFechaHoraUltimaConexionAnterior());
        }
        ?>.</div>
    <form method="post">
        <fieldset class="submit">
            <button type="submit" id="logout" name="logout" value="logout">Cerrar sesión</button>
        </fieldset>
    </form>
</main>