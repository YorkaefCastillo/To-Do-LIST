// Asignar eventos de clic a los botones de inicio de sesión y registro
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);
document.getElementById("btn__registrase").addEventListener("click", register);
// Asignar evento de cambio de tamaño de ventana
window.addEventListener("resize", anchopagina);

// Función que ajusta la presentación de elementos según el ancho de la ventana
var contenedor_login_register = document.querySelector(".contenedor__login-register");
var formulari_login = document.querySelector(".formulario__login");
var formulari_register = document.querySelector(".formulario__register");
var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja__trasera_register = document.querySelector(".caja__trasera-register");


function anchopagina(){
    if(window.innerWidth > 850){
        caja_trasera_login.style.display = "block";
        caja__trasera_register.style.display = "block";

    }else{
        caja__trasera_register.style.display = "block";
        caja__trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulari_login.style.display = "block";
        formulari_register.style.display = "none";
        contenedor_login_register.style.left = "0px";
    }
}

// Llamar a anchopagina() para configurar la presentación inicial
anchopagina();

// Función que controla la presentación al iniciar sesión
function iniciarSesion(){

    if(window.innerWidth > 850){
        formulari_register.style.display = "none";
        contenedor_login_register.style.left = "10px";
        formulari_login.style.display = "block";
        caja__trasera_register.style.opacity = "1";
        caja_trasera_login.style.opacity = "0";

    }else{

        formulari_register.style.display = "none";
        contenedor_login_register.style.left = "0px";
        formulari_login.style.display = "block";
        caja__trasera_register.style.display = "block";
        caja_trasera_login.style.display = "none";
        
    }
    
}

// Función que controla la presentación al registrarse
function register(){

   if(window.innerWidth > 850){
    formulari_register.style.display = "block";
    contenedor_login_register.style.left = "410px";
    formulari_login.style.display = "none";
    caja__trasera_register.style.opacity = "0";
    caja_trasera_login.style.opacity = "1";

   }else{

    formulari_register.style.display = "block";
    contenedor_login_register.style.left = "0px";
    formulari_login.style.display = "none";
    caja__trasera_register.style.display = "none";
    caja_trasera_login.style.display = "block";
    caja_trasera_login.style.opacity = "1"
   }
}