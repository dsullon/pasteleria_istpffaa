<div class="productos contenedor">
    <div class="productos__contenido">
        <?php foreach($productos as $producto): ?>
            <div class="producto">
                <img src="/assets/img/<?php echo $producto->imagen; ?>" 
                    alt="<?php echo $producto->nombre; ?>">
                <h3><?php echo $producto->nombre; ?></h3>
                <p><?php echo $producto->descripcion; ?></p>
                <div class="producto__info">
                    <p class="producto__precio"><?php echo $producto->precio; ?></p>
                    <button title="Agregar producto" data-producto="<?php echo $producto->id; ?>">
                        <i class="fa-solid fa-cart-plus"></i>
                    </button>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>