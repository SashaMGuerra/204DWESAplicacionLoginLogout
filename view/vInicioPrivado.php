<?php
/*
 * @author Sasha
 * @since 22/12/2021
 * @version 1.0
 * 
 * Vista del inicio.
 */
?>
<header id="vHeaderInicioPrivado">
    <h2>Aplicación<br>Login-Logout</h2>
    <h1>Inicio</h1>
    <div>
        <h3 onclick="showmenu(this)" id="showmenu">Mi Cuenta</h3>
        <div id="menu">
            <button type="submit" form="formInicio" id="miCuenta" name="miCuenta" value="miCuenta">Ver perfil</button>
            <button type="submit" form="formInicio" id="logout" name="logout" value="logout">Cerrar sesión</button>
        </div>
    </div>
</header>
<main id="vInicioPrivado">
    <div class="bienvenida">Bienvenid@ <span class="user"><?php echo $aVInicioPrivado['descUsuario']; ?></span>, esta es la <?php echo $aVInicioPrivado['numAccesos']; ?>ª vez que se conecta<?php
        if (!empty($aVInicioPrivado['fechaHoraUltimaConexionAnterior'])) {
            ?> y su última conexión fue <?php
            echo date('d/m/Y H:i:s', $aVInicioPrivado['fechaHoraUltimaConexionAnterior']);
        }
        ?>.</div>
    <form method="post" id="formInicio">
        <fieldset class="submit">
            <button type="submit" id="detalle" name="detalle" value="detalle">Detalle</button>
            <button type="submit" id="fallar" name="fallar" value="fallar">Hacer un select fallido</button>
            <button type="submit" id="mtoDepartamentos" name="mtoDepartamentos" value="mtoDepartamentos">Ir a MtoDepartamentos</button>
        </fieldset>
    </form>
</main>