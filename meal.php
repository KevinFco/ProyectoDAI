<?php

    require_once './php/database.php';

    if ($_GET){

        $dish = $database -> select("tb_dishes",[
            "[>]tb_categories"=>["id_category" => "id_category"],
            "[>]tb_servings"=>["id_serving" => "id_serving"],
        ],[
            "tb_categories.category_name",
            "tb_servings.serving_name",
            "tb_dishes.dish_img",
            "tb_dishes.dish_name",
            "tb_dishes.description",
            "tb_dishes.featured_dish",
            "tb_dishes.price",
        ],[
            "id_dish" => $_GET["id"]
        ]);

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oyakodon</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <header class="hero-category-container">
        <div class="hero-section-container">
            <?php
                include "./parts/navigator.php";
            ?>
        </div>
    </header>
    <main>
    <?php 
        
    
       echo "<div class='meal-meal-title-container'>"
            ."<div class='meal-names-container'>"
                ."<button class='btn-meal-like'><img src='./imgs/btnlike 1.svg' alt=''></button>"
                ."<h1 class='meal-meal-title'>親子丼</h1>"
                ."<h2 class='meal-title-two'>".$dish[0]["dish_name"]."</h2>"
            ."</div>"
            ."<div class='meal-info-container'>"
                ."<div class='info-container'>"
                    ."<img class='meal-img-category' src='./imgs/iconoComidas 2.svg' alt='categorie-maindish'>"
                    ."<div class='text-container'>"
                        ."<h2 class='meal-title-two'>".$dish[0]["dish_name"]."</h2>"
                        ."<p class='info-text'>".$dish[0]["description"].".</p>"
                    ."</div>"
                ."</div>"
            ."</div>"
        ."</div>"

        ."<div class='characteristics-container'>"
            ."<div class='left-container'>"
                ."<section class='order-size-container'>"
                    ."<h3>Order Size</h3>"
                    ."<ul class='meal-char-nav'>"
                        ."<li><button class='characteristics-btn'>Personal</button></li>"
                        ."<li><button class='characteristics-btn'>Family</button></li>"
                    ."</ul>"
                ."</section>"

                ."<section class='order-size-container'>"
                    ."<h3>Delivery</h3>"
                    ."<ul class='meal-char-nav'>"
                        ."<li><button class='characteristics-btn'>Salon</button></li>"
                        ."<li><button class='characteristics-btn'>Express</button></li>"
                        ."<li><button class='characteristics-btn'>To go</button></li>"
                    ."</ul>"
                ."</section>"
            ."</div>"

            ."<div class='rigth-container'>"
                ."<h2 class='price-title'>".$dish[0]["category_name"]."</h2>";
                if($dish[0]["featured_dish"]==1){
                    echo "<h2 class='price-title feature-title'>Featured Meal</h2>";
                }else{
                    echo "<h2 class='price-title no-feature-title'>Featured Meal</h2>";
                } 
            echo "</div>"
        ."</div>"
        
        ."<div class='order-buy-container'>"
            ."<h2 class='price-title'>".$dish[0]["price"]."円</h2>"
            ."<button class='buy-btn'>Add to Cart</button>"
        ."</div>";

        ?>
        <?php
            include "./parts/footer.php";
        ?>
    </main>
</body>
</html>