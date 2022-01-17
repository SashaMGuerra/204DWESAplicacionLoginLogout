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
            <button type="submit" id="miCuenta" name="miCuenta" value="miCuenta">Ver perfil</button>
            <button type="submit" id="mtoDepartamentos" name="mtoDepartamentos" value="mtoDepartamentos">Ir a MtoDepartamentos</button>
            <button type="submit" id="logout" name="logout" value="logout">Cerrar sesión</button>
        </fieldset>
    </form>
</main>