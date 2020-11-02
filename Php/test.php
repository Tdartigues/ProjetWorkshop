<?php include_once '../Php/headerAccueil.php'?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>

<link rel="stylesheet" href="../Css/cssClassique.css">

<div class="carouselle">

    <script>
        $(document).ready(function(){
            $('.carousel').carousel({
                fullWidth: true,
                indicators: true
            });
        });
    </script>


    <div class="carousel carousel-slider">
        <a class="carousel-item" href="#one!"><img src="../Image/festival.PNG"></a>
        <a class="carousel-item" href="#two!"><img src="../Image/teletpc.PNG"></a>
        <a class="carousel-item" href="#three!"><img src="../Image/baseball.PNG"></a>
        <a class="carousel-item" href="#four!"><img src="../Image/alpinisme.PNG"></a>
    </div>

</div>




