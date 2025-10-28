<div class="categorias contenedor">
    <div class="categorias__contenido">
        <?php foreach($categorias as $categoria): ?>
            <div class="servicio">
                <img src="/assets/img/categorias/<?php echo $categoria->imagen ?>" 
                alt="<?php echo $categoria->nombre; ?>">
                <h3><?php echo $categoria->nombre; ?></h3>
                <p><?php echo $categoria->descripcion; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>