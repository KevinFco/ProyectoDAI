<?php

    require_once './php/database.php';

    $order_details = [];
    $r_size = "";
    $r_category = "";
    $pos_array = -1;

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
            "tb_dishes.dish_name_jp",
        ],[
            "id_dish" => $_GET["id"]
        ]);

        //get destination cost total
        $order_cost = ($dish[0]["price"]);
        // Reference: https://medoo.in/api/select
        $registered_sizes = $database->select("tb_servings","*");
        $registered_category = $database->select("tb_categories","*");

        $r_size = $dish[0]["serving_name"];

        $r_category = $dish[0]["category_name"];

        $cart_details = [];

        if (isset($_COOKIE['order'])) {
            /* delete/remove a cookie
            unset($_COOKIE['destinations']);
            setcookie('destinations', '', time() - 3600);*/
            $data = json_decode($_COOKIE['order'], true);
            
            $cart_details = $data;
        }

        $order_details["id"] = $_GET["id"];
        $order_details["name"] = $dish[0]["dish_name"];
        $order_details["size"] = $dish[0]["serving_name"];
        $order_details["category"] = $dish[0]["category_name"];
        $order_details["cost"] = $dish[0]["price"];
        
        //check if this is a booked destionation to update the array
        if(isset($_GET["index"])){
            if($_GET["index"] >= 0){
                $cart_details[$_GET["index"]] = $order_details;
            }
        }else{
            $cart_details[] = $order_details;
        }
        //expire in 1 hour 
        setcookie('order', json_encode($cart_details), time()+72000);
        
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
                ."<h1 class='meal-meal-title'>".$dish[0]["dish_name_jp"]."</h1>"
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

        ?>
    <form action="cart.php" method="post" enctype="multipart/form-data">
        <div class='characteristics-container'>
            <div class='left-container'>
                <section class='order-size-container'>
                    <h3>Order Size</h3>
                    <ul class='meal-char-nav'>
                        <li><input type="button" class='characteristics-btn' value="Personal"></li>
                        <li><input type="button" class='characteristics-btn' value="Family"></li>
                    </ul>
                </section>

                <section class='order-size-container'>
                    <h3>Delivery</h3>
                    <ul class='meal-char-nav'>
                        <li><input type="button" class='characteristics-btn' value="Salon"></li>
                        <li><input type="button" class='characteristics-btn' value="Express"></li>
                        <li><input type="button" class='characteristics-btn' value="To go"></li>
                    </ul>
                </section>
            </div>

            <div class='rigth-container'>
                <?php
                echo "<h2 class='price-title'>".$dish[0]["category_name"]."</h2>";
                    if($dish[0]["featured_dish"]==1){
                        echo "<h2 class='price-title feature-title'>Featured Meal</h2>";
                    }else{
                        echo "<h2 class='price-title no-feature-title'>Featured Meal</h2>";
                    } 
                ?> 
            </div>
        </div>
        
        <div class='order-buy-container'>
            <?php 
                echo "<h2 class='price-title'>".$dish[0]["price"]."円</h2>";
                echo "<input type='hidden' value='".$pos_array."' name='index'>";
            ?>
            <input type="hidden" name="id" value="<?php echo $item[0]["id_dish"]; ?>">
            <input class='buy-btn' type='submit' value='Add to Cart'>
        </div>
        </form>

        
        <?php
            include "./parts/footer.php";
        ?>
    </main>
    <script src="./Js/buttonup.js"></script>
</body>
</html>