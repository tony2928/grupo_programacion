let botones = document.querySelectorAll(".botones");
let button_background = document.getElementById("button-background");
let boton_active = null 

botones.forEach((boton, index) => {
    boton.addEventListener("click", () => {
/*        
        //añadir clase active
        boton.classList.add("active");
        boton_active = boton;
*/        
        // obtener el id del boton
        let id = boton.getAttribute("id");
        
        if (id == "boton-tareas") {
            if (button_background.classList.contains("btn-bgr-center")) {
                button_background.classList.remove("btn-bgr-center");
            }
            if (button_background.classList.contains("btn-bgr-right")) {
                button_background.classList.remove("btn-bgr-right");
            }
        }

        if (id == "boton-actividades") {
            if (button_background.classList.contains("btn-bgr-right")) {
                button_background.classList.remove("btn-bgr-right");
            }   
            button_background.classList.add("btn-bgr-center");
        }

        if (id == "boton-horario") {
            console.log("horario");
            if (button_background.classList.contains("btn-bgr-center")) {
                button_background.classList.remove("btn-bgr-center");
            }
            button_background.classList.add("btn-bgr-right");
        }
        
/*        

        botones.forEach((boton2, index) => {
            if (boton2 != boton_active) {
                boton2.classList.remove("active");
            }
        });

*/        
        
    });
    });