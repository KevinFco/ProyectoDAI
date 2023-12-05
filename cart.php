<?php
    require_once './php/database.php';

    $details = [];
    $r_size = "";
    $r_category = "";
    $updateCookie = false;

    $registered_sizes = $database->select("tb_servings","*");
    $registered_category = $database->select("tb_categories","*");


    $data = json_decode($_COOKIE['order'], true);
        
    if(isset($_GET["order"]) && $_GET["order"] >= 0 && $data != null){
       array_splice($data, $_GET["order"], 1);
        $updateCookie = true;
    }
        

    $order_details = $data;
    
    if($updateCookie) setcookie('order', json_encode($order_details), time()+72000);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <header>
        <div class="hero-section-container">
            <?php 
                include './parts/navigator.php';
            ?>
        </div>
    </header>

    <div class="order-container">
        <h2 class="order-title">Order</h2>

        <?php 
        $total=0;
            if($order_details == null || empty($order_details)){
                echo "<p>You need to visit a meal on the menu first.</p>";
            }else{
                foreach($order_details as $index=>$order){
                    echo "<section class='order-meal'>"
                            ."<div>"
                                . "<h3>Meal: ".$order["name"]."</h3>"
                                . "<p>Serving: ".$order["size"]."</p>"
                                . "<p>Category: ".$order["category"]."</p>"
                                . "<span>Price: ".$order["cost"]."円</span>"
                            ."</div>"
                            ."<div style='display: flex; gap: 1rem;'>"
                                . "<a href='cart.php?order=".$index."'>Delete meal</a>"
                                . "<a href='meal.php?id=".$order["id"]."&index=".$index."'>Edit this meal</a>"
                            ."</div>"
                        . "</section>";
                        $total += $order["cost"];
                }
            }

            echo "<div style='display: flex;gap: 5rem'>"
                    ."<h1>To pay: ".$total."円</h1>";
                    if($order_details == null || empty($order_details)){
                        echo "<a  class='btn buy-btn' href='categories.php'>Continue to explore</a>";
                    }else{
                        echo "<a class='btn buy-btn' href='submit-order.php'>Complete service</a>";
                    }
            echo "</div>";
        ?>
    </div>
</body>
</html>