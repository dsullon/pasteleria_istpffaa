<h1>Página Categorías</h1>

<?php
    foreach ($categorias as $categoria):
?>
        <p><?php echo $categoria->nombre; ?></p>
<?php
    endforeach;
?>