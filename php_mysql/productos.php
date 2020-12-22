<?php
    include('php_mysql/conexion.php');
    
    //Identificamos de qué categoría es la página para saber qué productos mostrar
    //$pagina = str_replace("/G.I.N.A/", "", $_SERVER['REQUEST_URI']);
    $pagina = strpos($_SERVER['REQUEST_URI'], 'ropa.php');
    //$categoria = ($pagina=='ropa.php')? 'Ropa' : 'Equipo_Accesorio';
    $categoria = ($pagina)? 'Ropa' : 'Equipo_Accesorio';

    //Obtenemos el total de registros que hay en la categoría
    $query = "SELECT COUNT(*) AS Registros FROM producto WHERE Categoria = '$categoria'";
    $num_registros = $conexion->query($query)->fetch_assoc();

    //Número aleatorio de 1 a la cantidad de registros para que a algún producto le toque oferta
    $oferta = rand(1,$num_registros["Registros"]);
    $cont = 0;  //contador que ayuda a ubicar el producto a ofertar

    //Obtenemos únicamente los datos que mostraremos de cada producto
    $query = "SELECT Nombre, Descripcion, Precio, Existencia, Imagen FROM producto WHERE Categoria = '$categoria'";
    $resultado = $conexion->query($query);

    while($tupla = $resultado->fetch_assoc()){
        $cont++;  //aumentamos el contador cada vuelta

        //Imprimimos la card que contiene a cada producto y sus datos
        echo '<div class="col col-md-6 col-lg-4  mt-4 mb-4">
                <div class="card h-100" style="border-radius: 0 0 30px 30px; border: 2px solid black;">
                    <img src="' . $tupla["Imagen"] . '" class="card-img-top mr-auto ml-auto" style="width: 340px; height: 340px;" alt="Imagen del producto">
                    <div class="card-body">
                        <div style="height: 120px;">
                            <h5 class="card-title" id="' . $cont . '">' . $tupla["Nombre"] . '</h5>
                            <p class="card-text">' . $tupla["Descripcion"] . '</p>
                        </div>
                        <div class="d-flex">';
        if($cont==$oferta){
            //Si el contador llega al número aleatorio entonces a este producto se le asigna el descuento
            echo '<span><em class="text-success"><b>Oferta:</b></em> <strike>$' . $tupla["Precio"] . '</strike> <b class="text-success">$'
                    . ($tupla["Precio"] * .80) . '</b></span>';  //se aplica 20% de descuento
        }
        else{  //no se aplica descuento a este producto
            echo '<span><em class="text-info"><b>Precio:</b></em> $' . $tupla["Precio"] . '</span>';
        }
                    echo    '<label for="cantidad" class="ml-auto mr-2">Cantidad:</label>
                            <input type="number" id="cantidad' . $cont .'" name="cantidad' . $cont .'" min="1" max="' . $tupla["Existencia"] . '">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-warning btn-block"><small class="text-muted">Añadir al carrito</small></button>
                    </div>
                </div>
            </div>';
    }
?>