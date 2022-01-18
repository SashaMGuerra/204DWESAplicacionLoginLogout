/* 
 * @author Sasha
 * @version v2.2
 * @description Funciones de la vista de inicio privado.
 */

function showmenu(buttonh3){
    let menu = document.getElementById("menu");
    if(buttonh3.innerHTML == 'Mi Cuenta'){
        buttonh3.innerHTML = 'Cerrar menú';
        menu.style.display = 'flex';
    }
    else{
        buttonh3.innerHTML = 'Mi Cuenta';
        menu.style.display = 'none';
    }
}


