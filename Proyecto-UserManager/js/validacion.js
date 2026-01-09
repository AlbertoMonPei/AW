
document.addEventListener("submit", function(event){
    const form = document.querySelector("form");

    if (!form) return; //No hay formulario en esta página

    form.addEventListener("submit", function(event){
        const nombre = form.nombre.value.trim();
        const email = form.email.value.trim();
        const edad = form.edad.value.trim();
        const rol = form.rol.value;

        let errores =[];

        if(nombre.length <3){
            errores.push("El nombre debe tener al menos 3 caracteres.");
        } //Comprueba que el dato tiene más de 3 caracteres

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(!emailRegex.test(email)){
            errores.push("Introduce un email válido")
        } //comprueba que se sigue el formato correo @
        
        if(isNaN(edad) || edad <1 || edad >120){
            errores.push("La edad debe ser un número entre 1 y 120")
        } //comprueba que la edad NO es menor que 1 ni mayor que 120
        
        if(rol !=="user" && rol!=="admin"){
            errores.push("Selecciona un rol válido.");
        } //comprueba que se ha seleccionado un rol, sino devuelve un error

        if(errores.length > 0){
            event.preventDefault(); //Evita que se envíe el formulario
            alert("Por favor, corrige los siguientes errores:\n" + errores.join("\n"));
        }

    });
});