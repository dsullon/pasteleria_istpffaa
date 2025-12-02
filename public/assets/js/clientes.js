(function (){
    const btnRegistrar = document.querySelector('#btnRegistrar');
    if(btnRegistrar){
        btnRegistrar.addEventListener('click', (e)=>{
            e.preventDefault();
            registrarCliente();            
        })
    }

    function registrarCliente(){
        // BUSCAMOS LOS CONTROLES DEL FORMULARIO
        const nombre = document.querySelector('#nombre');
        const email = document.querySelector('#email');
        const telefono = document.querySelector('#telefono');
        const direccion = document.querySelector('#direccion');

        // VALIDAMOS LOS DATOS INGRESADOS
        if(!nombre.value.trim() || !email.value.trim() || !telefono.value.trim() || 
            !direccion.value.trim()){
            Swal.fire("Error", "Debe completar todos los datos.", 'error');
            return;
        }

        const url = 'api/clientes';
        const datos = {
            nombres: nombre.value.trim(),
            email: email.value.trim(),
            telefono: telefono.value.trim(),
            direccion: direccion.value.trim()
        };

        fetch(url, {
            method: 'POST',
            body: JSON.stringify(datos),
            headers: {
                'Content-Type': 'application/json',
            }
        })
        .then(response => response.json())
        .then(resultado => {
            if(!resultado.estado){
                Swal.fire("Error", resultado.mensaje, 'error');
                return;
            }
        })
        .catch(error => {
            //console.log(error);
        })
    }
})();