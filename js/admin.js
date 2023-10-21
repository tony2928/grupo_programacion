let checkboxFecha = document.getElementById("checkbox-fecha");

checkboxFecha.addEventListener("click", () => {
    if (checkboxFecha.checked) {
        document.getElementById("fecha").disabled = false;
        document.getElementById("fecha").value = "";
        console.log("checked");
    } else {
        document.getElementById("fecha").disabled = true;
        document.getElementById("fecha").value = "Sin fecha de entrega";
        console.log("unchecked");
    }
});