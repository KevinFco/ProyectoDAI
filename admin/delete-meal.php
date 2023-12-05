<?php 
    require_once '../php/database.php';
    // Reference: https://medoo.in/api/where
    if($_GET){
        $data = $database->select("tb_dishes","*",[
            "id_dish"=>$_GET["id"]
        ]);
    }

    if($_POST){
        // Reference: https://medoo.in/api/delete
        $database->delete("tb_dishes",[
            "id_dish"=>$_POST["id"]
        ]);

        header("location: list-meals.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete dish</title>
</head>
<body>
    <h2>Delete dish: <?php echo $data[0]["id_dish"]; ?></h2>
    <form method="post" action="delete-meal.php">
        <input name="id" type="hidden" value="<?php echo $data[0]["id_dish"]; ?>">
        <input type="button" onclick="history.back();" value="CANCEL">
        <input type="submit" value="DELETE">
    </form>
</body>
</html>