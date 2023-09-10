let botones = document.querySelectorAll(".botones");
let button_background = document.getElementById("button-background");
let boton_active = null 
// obtener containers
let container_tareas = document.getElementById("container-tareas");
let container_actividades = document.getElementById("container-actividades");
let container_horario = document.getElementById("container-horario");


botones.forEach((boton, index) => {
    boton.addEventListener("click", () => {
        
        //añadir clase active
        boton.classList.add("active");
        boton_active = boton;
        
        // obtener el id del boton
        let id = boton.getAttribute("id");
        
        if (id == "boton-tareas") {
            if (button_background.classList.contains("btn-bgr-center")) {
                button_background.classList.remove("btn-bgr-center");
            }
            if (button_background.classList.contains("btn-bgr-right")) {
                button_background.classList.remove("btn-bgr-right");
            }
            container_tareas.classList.add("container-activo");
            if (container_actividades.classList.contains("container-activo")) {
                container_actividades.classList.remove("container-activo");
            }
            if (container_horario.classList.contains("container-activo")) {
                container_horario.classList.remove("container-activo");
            }
        }

        if (id == "boton-actividades") {
            if (button_background.classList.contains("btn-bgr-right")) {
                button_background.classList.remove("btn-bgr-right");
            }   
            button_background.classList.add("btn-bgr-center");
            if (container_tareas.classList.contains("container-activo")) {
                container_tareas.classList.remove("container-activo");
            }
            container_actividades.classList.add("container-activo");
            if (container_horario.classList.contains("container-activo")) {
                container_horario.classList.remove("container-activo");
            }
        }

        if (id == "boton-horario") {
            if (button_background.classList.contains("btn-bgr-center")) {
                button_background.classList.remove("btn-bgr-center");
            }
            button_background.classList.add("btn-bgr-right");
            if (container_tareas.classList.contains("container-activo")) {
                container_tareas.classList.remove("container-activo");
            }
            if (container_actividades.classList.contains("container-activo")) {
                container_actividades.classList.remove("container-activo");
            }
            container_horario.classList.add("container-activo");
        }
               

        botones.forEach((boton2, index) => {
            if (boton2 != boton_active) {
                boton2.classList.remove("active");
            }
        });
      
        
    });
    });