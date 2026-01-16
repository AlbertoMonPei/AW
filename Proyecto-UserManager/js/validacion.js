document.addEventListener("DOMContentLoaded", function() {
    
    const form = document.querySelector("form");
    

    if (!form) return; 

    form.addEventListener("submit", function(event) {
        
        let errores = [];

        if (form.nombre) {
            const nombre = form.nombre.value.trim();
            if (nombre.length < 3) {
                errores.push("El nombre debe tener al menos 3 caracteres.");
            }
        }


        if (form.email) {
            const email = form.email.value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                errores.push("Introduce un email válido.");
            }
        }
        
    
        if (form.edad) {
            const edad = form.edad.value.trim();
            if (isNaN(edad) || edad < 1 || edad > 120 || edad === "") {
                errores.push("La edad debe ser un número entre 1 y 120.");
            }
        }
        


        if (errores.length > 0) {
            event.preventDefault();
            alert("Por favor, corrige los siguientes errores:\n\n" + errores.join("\n"));
        }

    });
});