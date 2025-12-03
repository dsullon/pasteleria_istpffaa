<div class="productos contenedor">
    <div class="productos__contenido">
        <?php foreach($productos as $producto): ?>
            <div class="producto">
                <img src="/assets/img/<?php echo $producto->imagen; ?>" 
                    alt="<?php echo $producto->nombre; ?>">
                <div class="producto__descripcion">
                    <h3><?php echo $producto->nombre; ?></h3>
                    <p><?php echo $producto->descripcion; ?></p>
                </div>
                <div class="producto__info">
                    <span class="producto__precio"><?php echo $producto->precio; ?></span>
                    <button class="agregar-carrito" title="Agregar producto" 
                        data-productoid="<?php echo $producto->id; ?>"
                        data-productonombre="<?php echo $producto->nombre; ?>"
                        >
                        <i class="fa-solid fa-cart-plus"></i>
                    </button>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>

<?php $script = '<script src="/assets/js/carrito.js"></script>'; ?>