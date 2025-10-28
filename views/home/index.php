<div class="categorias contenedor">
    <div class="categorias__contenido">
        <?php foreach($categorias as $categoria): ?>
            <div class="categoria">
                <img src="/assets/img/categorias/<?php echo $categoria->imagen ?>" 
                alt="<?php echo $categoria->nombre; ?>">
                <h3><?php echo $categoria->nombre; ?></h3>
                <div class="overlay">
                    <p><?php echo $categoria->descripcion; ?></p>
                    <a href="#">Ver más</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>