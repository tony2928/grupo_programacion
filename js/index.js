let botones = document.querySelectorAll(".botones");
let button_background = document.getElementById("button-background");
let button_tareas = document.getElementById("boton-tareas");
let boton_active = null
// obtener containers
let container_tareas = document.getElementById("container-tareas");
let container_actividades = document.getElementById("container-actividades");
let container_horario = document.getElementById("container-horario");

botones.forEach((boton, index) => {
    button_tareas.click();
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

function more(page) {
    window.location.href = "./tarea.php?t=" + page;
}

// componer el horario en mobile

console.log("obteniendo dia de la semana")

let fecha = new Date();
let numeroDiaSemana = fecha.getDay();
let diasSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Ssbado"];
let nombreDiaSemana = diasSemana[numeroDiaSemana];

let columnaLunes = document.querySelectorAll((".lunes"));
let columnaMartes = document.querySelectorAll((".martes"));
let columnaMiercoles = document.querySelectorAll((".miercoles"));
let columnaJueves = document.querySelectorAll((".jueves"));
let columnaViernes = document.querySelectorAll((".viernes"));

function horarioMobile() {

    let anchoPantalla = window.innerWidth;
    if (anchoPantalla <= 768) {
        
        for (let i = 0; i < columnaLunes.length; i++) {

            if (nombreDiaSemana == "Lunes") {
                columnaMiercoles[i].remove()
                columnaJueves[i].remove()
                columnaViernes[i].remove()
            }

            if (nombreDiaSemana == "Martes") {
                columnaLunes[i].remove()
                columnaJueves[i].remove()
                columnaViernes[i].remove()
            }

            if (nombreDiaSemana == "Miércoles") {
                columnaLunes[i].remove()
                columnaMartes[i].remove()
                columnaViernes[i].remove()
            }

            if (nombreDiaSemana == "Jueves") {
                columnaLunes[i].remove()
                columnaMartes[i].remove()
                columnaMiercoles[i].remove()
            }

            if (nombreDiaSemana == "Viernes") {
                columnaMartes[i].remove()
                columnaMiercoles[i].remove()
                columnaJueves[i].remove()
            }

            if (nombreDiaSemana == "Sabado" || nombreDiaSemana == "Domingo") {
                columnaMiercoles[i].remove()
                columnaJueves[i].remove()
                columnaViernes[i].remove()
            }

        }
    }
}

window.addEventListener("load", horarioMobile);
window.addEventListener("resize", horarioMobile);