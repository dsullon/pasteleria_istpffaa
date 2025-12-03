(function(){
    const btnAgregarCarrito = document.querySelectorAll('.agregar-carrito');
    btnAgregarCarrito.forEach(btn => {
        btn.addEventListener('click', (e)=>{
            e.preventDefault();
            let nombreProducto = btn.dataset.productonombre;
            let idProducto = btn.dataset.productoid;
            alert('Producto ' + nombreProducto + ' ha sido agregado');
        })
    })
})();