<?php
session_start();
include "includes/funciones.php";
$_SESSION['clave'] = generarClaveAleatoria();
$_SESSION['numJugada'] = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <script defer src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
    <div class="overlay"></div>
    <header class="pt-5 pb-3">
        <h1 class="text-warning py-3 px-5 border border-warning border-4 rounded-pill">Juego del MasterMind</h1>
    </header>
    <section class="py-3">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item bg-transparent">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="btn btn-warning collapsed text-warning fs-3 h-50 rounded bg-transparent border-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Secuencia&nbsp;&nbsp;<i class="bi bi-chevron-down"></i></i></button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body text-warning fs-4"><?php mostrarClave(); ?></div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-3 w-50 text-warning" id="formulario">
        <form id="form" method="post" class="d-flex justify-content-center">
            <input type="number" name="num1" placeholder="Nº 1" min="0" max="9" class="border border-2 border-warning rounded-start bg-transparent px-2 py-1 text-warning w-25">
            <input type="number" name="num2" placeholder="Nº 2" min="0" max="9" class="ms-1 border border-2 border-warning rounded-0 bg-transparent px-2 py-1 text-warning w-25">
            <input type="number" name="num3" placeholder="Nº 3" min="0" max="9" class="ms-1 border border-2 border-warning rounded-0 bg-transparent px-2 py-1 text-warning w-25">
            <input type="number" name="num4" placeholder="Nº 4" min="0" max="9" class="ms-1 border border-2 border-warning rounded-end bg-transparent px-2 py-1 text-warning w-25">
            <input id="enviar" type="button" name="enviar" value="Comprobar secuencia" class="border border-2 border-warning rounded bg-transparent text-warning ms-2 px-2 py-1 fs-5 w-50">
        </form>
        <p class="pt-2">* Introduce bien los datos o no podrás enviar nada</p>
    </section>
    <section id="resultado" class="text-warning fs-4"></section>
    <script>
        $("#enviar").click(function(){
            $.ajax({
                url: "includes/datos.php",
                type: "post",
                data: $("#form").serialize(),
                success: function(resultado){
                        $("#resultado").append(resultado)
                        let pos = $(".pos").text()
                        let i = pos.split("")
                        let p = i[i.length-1]
                        if (p == 4) {
                            //$("#form").css("visibility", "hidden")
                            $("#form").remove()
                            $("#formulario").find("p").remove()
                            $("#formulario").append("<h2>HAS ACERTADO</h2><i class='bi bi-trophy-fill'></i>")
                        }
                    }
            })
        })
    </script>
</body>
</html>