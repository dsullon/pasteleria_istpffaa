<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--NORMALIZE.CSS-->
    <link rel="stylesheet" href="assets/css/normalize.css">

    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />   

    <link rel="stylesheet" href="assets/css/app.css">

    <title>Document</title>
</head>
<body>
    <div class="layout">
        <header>
            <div class="header__top">
                <div class="header__top__contenido contenedor">
                    <div class="header__top__contacto">
                        <a href="tel:+51987654321">
                            <i class="fa-solid fa-phone"></i>
                            (+51) 987654321
                        </a>
                        <a href="mailto:informes@granmolino.pe">
                            <i class="fa-solid fa-envelope"></i>
                            informes@granmolino.pe
                        </a>
                    </div>
                    <div class="header__top__redes">
                        <a href="#">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a href="#">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header__nav">
                <div class="header__nav__contenido contenedor">
                    <img class="logo" src="assets/img/logo.png" alt="Logo pastelería">
                    <nav class="nav-principal">
                        <a href="/">Inicio</a>
                        <a href="/nosotros">Nosotros</a>
                        <a href="/productos">Productos</a>
                        <a href="/locales">Locales</a>
                        <a href="/contacto">Contacto</a>
                    </nav>
                </div>
            </div>
        </header>
        <main>
            <?php
                echo $contenidoVista;
            ?> 
        </main>
        <footer>
    
        </footer>
    </div>
       
</body>
</html>