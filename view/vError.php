<?php
/* 
 * @author Sasha
 * @since 12/01/2022
 * @version 2.1
 * 
 * Vista para mostrado de errores y excepciones.
 */
?>
<header>
    <h1>Aplicación Login-Logout</h1>
    <h2>Error</h2>
</header>
<main id="vError">
    <h3>Ha sucedido el siguiente error:</h3>
    <div>
        <table>
            <tr>
                <th>Error</th>
                <td><?php echo $aVError['error']; ?></td>
            </tr>
            <tr>
                <th>Código</th>
                <td><?php echo $aVError['codigo']; ?></td>
            </tr>
            <tr>
                <th>Archivo</th>
                <td><?php echo $aVError['archivo']; ?></td>
            </tr>
            <tr>
                <th>Línea</th>
                <td><?php echo $aVError['linea']; ?></td>
            </tr>
        </table>
    </div>
    <form method="post">
        <button type="submit" name="cerrar" id="cerrar" value="cerrar">Cerrar y volver al índice</button>
    </form>
</main>