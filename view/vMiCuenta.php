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
    <h2>Mi cuenta</h2>
</header>
<main id="vMiCuenta">
    <form method="post">
        <fieldset class="main">
            <div class="input">
                <label for='usuario'>Nombre de usuario</label>
                <input type='text' name='usuario' id='usuario' value="<?php echo $aVMiCuenta['usuario'] ?>" disabled/>
            </div>
            <div class="input">
                <label class="obligatorio" for='descripcion'>Nombre y apellidos</label>
                <input class="obligatorio" type='text' name='descripcion' id='descripcion' value="<?php echo $aVMiCuenta['descripcion'] ?? '' ?>"/>
                <div class="error"><?php echo $aErrores['descripcion'] ?></div>
            </div>
            <div class="input">
                <label for='numConexiones'>Número de conexiones</label>
                <input type='text' name='numConexiones' id='numConexiones' value="<?php echo $aVMiCuenta['numConexiones'] ?>" disabled/>
            </div>
            <div class="input">
                <label for='fechaHoraUltimaConexion'>Fecha-hora de última conexión</label>
                <input type='text' name='fechaHoraUltimaConexion' id='fechaHoraUltimaConexion' value="<?php echo $aVMiCuenta['fechaHoraUltimaConexion'] ?>" disabled/>
            </div>
            <div class="input">
                <label for='perfil'>Perfil de usuario</label>
                <input type='text' name='perfil' id='perfil' value="<?php echo $aVMiCuenta['perfil'] ?>" disabled/>
            </div>
            <div class="input">
                <div>Contraseña</div>
                <button type="submit" name="cambiarPassword" value="cambiarPassword">Cambiar contraseña</button>
            </div>
        </fieldset>
        <fieldset class="submit">
            <button type="submit" name='aceptar' value='aceptar'>Efectuar cambios</button>
            <button type="submit" name='cancelar' value='cancelar'>Cancelar</button>
        </fieldset>
        <fieldset class="eliminar">
            <button class="peligro" type="submit" name='eliminarCuenta' value='eliminarCuenta'>Eliminar cuenta</button>
        </fieldset>
    </form>
</main>