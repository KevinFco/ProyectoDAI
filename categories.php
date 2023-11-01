<?php

    require_once("./php/database.php");

    $items = $database -> select("tb_dishes","*");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <?php
        include "./parts/categories-header.php";
    ?>
    <main>
        
        <!--Barra exploradora-->
        <div class="barra-busqueda">
            <div class="size-comidas">
                <h2 class="meals-container-title">Explore our menu</h2>
                <ul class="nav-size-list porciones-lista">
                    <li><button class="size-porcion">All</button></li>
                    <li><button class="size-porcion">Personal</button></li>
                    <li><button class="size-porcion">Couple</button></li>
                    <li><button class="size-porcion">Family</button></li>
                </ul>
            </div>
            <div class="categories-container">
                <button class="btn-category"><img class="categorie-img" src="./imgs/iconoPostres.svg" alt=""></button>
                <button class="btn-category"><img class="categorie-img" src="./imgs/iconoBebidas.svg" alt=""></button>
                <button class="btn-category"><img class="categorie-img" src="./imgs/iconoComidas.svg" alt=""></button>
                <button class="btn-category"><img class="categorie-img" src="./imgs/iconoEntradas.svg" alt=""></button>
            </div>
        </div>
        <!--Barra exploradora-->
        <div class="category-meals-container">

            <div class="category-food-section-container">
            <?php
            for($i = 0; $i <4 ; $i++){
              echo  "<section class='category-meals'>"
                    ."<button class='like-btn'><img src='./imgs/like.svg' alt='like-btn'></button>"
                    ."<img class='meal-card-img' src='./imgs/ComidaEje.png' alt='Comida'>"
                    ."<div class='price-category-container'>"
                        ."<h4 class='category-meal-title'>Main dish</h4>"
                        ."<div>"
                            ."<img src='./imgs/like1.svg' alt='like-btn'>"
                            ."<span>1000人</span>"
                        ."</div>" 
                    ."</div>"
                    ."<h3 class='food-title'>Sashimi</h3>"
                    ."<p class='meal-info'>Fresh Raw Salmon</p>"
                    ."<a class='btn meal-btn' href='./meal.html'>Read More</a>"
                ."</section>";
            }
            ?> 
            </div>
            <div class="category-food-section-container">
            <?php
            for($i = 0; $i <4 ; $i++){
              echo  "<section class='category-meals'>"
                    ."<button class='like-btn'><img src='./imgs/like.svg' alt='like-btn'></button>"
                    ."<img class='meal-card-img' src='./imgs/ComidaEje.png' alt='Comida'>"
                    ."<div class='price-category-container'>"
                        ."<h4 class='category-meal-title'>Main dish</h4>"
                        ."<div>"
                            ."<img src='./imgs/like1.svg' alt='like-btn'>"
                            ."<span>1000人</span>"
                        ."</div>" 
                    ."</div>"
                    ."<h3 class='food-title'>Sashimi</h3>"
                    ."<p class='meal-info'>Fresh Raw Salmon</p>"
                    ."<a class='btn meal-btn' href='./meal.html'>Read More</a>"
                ."</section>";
            }
            ?> 
            </div>

        <!--Footer-->
        <?php
            include "./parts/footer.php";
        ?>
    </main>
</body>
</html>