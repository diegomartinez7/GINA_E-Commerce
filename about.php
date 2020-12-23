<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G.I.N.A</title>

    <link rel="stylesheet" href="css/estilos.css">
    <!-- Bootstrap -->
    <link rel="shortcut icon" href="img/icono.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/fa821c9639.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include('navbar.php');
    ?>

    <div class="container margen-pagina-completa">
        <div class="text-center">
            <img src="img/logo.png" alt="GINA" id="logo" class="w-50">
        </div>
        <div class="jumbotron mt-5 text-justify">
            <h2 class="text-info mb-3">¿Quiénes somos?</h2>
            <p class="h5">Somos un grupo de directivos técnicos que decidieron dedicarse a no sólo entrenar leyendas, sino también equiparlas y llevarlas a cada enfrentamiento con lo mejor de lo mejor.</p>

            <h2 class="text-center text-info m-5">Información sobre la empresa</h2>
            <h2 class="text-info mb-3">Visión</h2>
            <p class="h5">Estamos preparándonos para los años venideros, pues cada vez se hace más común observar nuevas formas de competir, surgen nuevos deportes y se integran muchos más atlétas provenientes de cada uno de los distintos países que existen en el mundo. Pensamos en apoyar a las grandes ligas y ser quien provee las herramientas necesarias para mantener el equilibrio, desempeño y fortaleza de los deportistas.</p>
            <h2 class="text-info mb-3 mt-3">Misión</h2>
            <p class="h5">Como empresa nuestra misión es conseguir que cada persona que aspira a ser un gran atleta pueda acceder a los medios para conseguirlo, empezando por proveer la vestimenta adecuada a cada disciplina y el equipo que se requiere para protegerlos durante cada etapa. Además de brindar la accesibilidad que permita a nuestros clientes continuar con su preparación.</p>
            <h2 class="text-info mb-3 mt-3">Objetivo</h2>
            <p class="h5">Tenemos varios objetivos en mente:</p>
            <ul class="h5">
                <li>Ser la compañía asociada a eventos deportivos de gran calibre</li>
                <li>Crecer a nivel internacional, avanzando a través de cada deporte</li>
                <li>Apoyar e identificar talentos potenciales</li>
                <li>Aumentar ventas y producción de artículos de nuestra marca personalizada</li>
                <li>Convertirnos en un participante activo en la comunidad deportiva</li>
            </ul>
            <p class="h5">En general apostamos a ser una compañía de gran nivel, alto rendimiento y amigable en el aspecto social, cultural y ambiental.</p>
        </div>
        <div class="jumbotron mt-5 text-justify pt-3 pb-2">
            <h2 class="mb-4 text-center text-info">Testimonio de uno de nuestros deportistas afiliados</h2>
            <div class="d-flex">
                <div class="text-center">
                    <img src="img/michael_phelps.jpg" alt="Michael Phelps">
                    <p class="text-muted">-Michael Phelps, el medallista olímpico más condecorado de la historia.</p>
                </div>
                <div class="p-5">
                    <p class="h4"><em>"Si eres un amante de la acción, te gusta dar lo mejor de ti en cualquier competencia y te esfuerzas día con día para perfeccionarte, entonces no dudes que G.I.N.A es el lugar, sí, el lugar para comenzar tu propia historia en el mundo de los deportes. Ellos apoyarán y prestarán atención a tu habilidad y pondrán a tu disposición los mejores productos con los que los grandes deportistas sacan a relucir lo mejor de ellos: su talento.</em></p>
                    <p class="h4"><em>Recuerda, tú pones la técnica, habilidad y talento, y G.I.N.A todo lo demás."</em></p>
                </div>
            </div>
        </div>
    </div>

    <?php
        include('footer.php');
    ?>
</body>
</html>