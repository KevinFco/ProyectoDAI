<?php 
    require_once '../php/database.php';
    // Reference: https://medoo.in/api/select
    $items = $database->select("tb_dishes","*");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Meals</title>
</head>
<body>
    <h2>Registered Meals</h2>
    <table>
        <?php
            foreach($items as $item){
                echo "<tr>";
                echo "<td>".$item["dish_name"]."</td>";
                echo "<td><a href='edit-meal.php?id=".$item["id_dish"]."'>Edit</a> <a href='delete-meal.php?id=".$item["id_dish"]."'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
    
</body>
</html>