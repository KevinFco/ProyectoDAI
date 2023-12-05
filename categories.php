<?php

    require_once("./php/database.php");

    $servings = $database->select("tb_servings","*");

    $categories = $database->select("tb_categories","*");

    $items = $database -> select("tb_dishes",[
        "[>]tb_categories"=>["id_category" => "id_category"],
        "[>]tb_servings"=>["id_serving" => "id_serving"],
    ],[
        "tb_dishes.id_dish",
        "tb_servings.id_serving",
        "tb_categories.id_category",
        "tb_categories.category_name",
        "tb_dishes.dish_img",
        "tb_dishes.dish_name",
        "tb_dishes.description",
        "tb_dishes.featured_dish",
        "tb_dishes.price",
    ]);

    $featured = $database -> select("tb_dishes","*",[

        "featured_dish" => 1

    ]);

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
    <header class="hero-category-container">
            <div class="hero-section-container">
                <?php
                    include "./parts/navigator.php";
                ?>
            <div class="header-container">
                <h1 class="header-title-categories">Discover Culinary Excellence</h1>
                <div class="header-featured-container">
                    <!--header meal mobile-->
                    <div class="header-category-container-mobile">
                        <img src="./imgs/ComidaEje.png" alt="Oyakodon">
                        <p class="title-header-category">Oyakodon</p>
                        <p class="text-header-category">Chicken and egg harmony atop steaming rice</p>
                        <a class="btn meal-btn" href="./meal.html">Read More</a>
                    </div>
                    <!--header meal mobile-->
                    <?php 
                        for($i = 0; $i < 3; $i++){
                            echo "<div class='header-category-container'>"
                                    ."<img class='featured-img' src='./imgs/dishes-imgs/".$featured[$i]["dish_img"]."' alt='".$featured[$i]["dish_name"]."'>"
                                    ."<p class='title-header-category'>".$featured[$i]["dish_name"]."</p>"
                                    ."<p class='text-header-category'>".substr($featured[$i]["description"],0, 80)."...</p>"
                                    ."<a class='btn meal-btn' href='./meal.php?id=".$featured[$i]["id_dish"]."'>Read More</a>"
                                ."</div>";
                        }
                    ?>
                </div>
            </div>
        </header>
    <main>
        
        <!--Barra exploradora-->
        <div class="barra-busqueda">
            <div class="size-comidas">
                <h2 class="meals-container-title">Explore our menu</h2>
                <ul class="nav-size-list porciones-lista">
                    <li><button id="size0" value="0" class="size-porcion size-porcion-selected" onclick="updatePorcionSize('size0')">All</button></li>
                    <li><button id="size1" value="1" class="size-porcion" onclick="updatePorcionSize('size1')">Personal</button></li>
                    <li><button id="size2" value="2" class="size-porcion" onclick="updatePorcionSize('size2')">Couple</button></li>
                    <li><button id="size3" value="3" class="size-porcion" onclick="updatePorcionSize('size3')">Family</button></li>
                </ul>
            </div>
            <div class="categories-container">
                <button id="desserts" value="4" class="btn-category"><img class="categorie-img" src="./imgs/iconoPostres.svg" alt="desserts" onclick="getFilters('desserts')"></button>
                <button id="drinks" value="2" class="btn-category"><img class="categorie-img" src="./imgs/iconoBebidas.svg" alt="drinks" onclick="getFilters('drinks')"></button>
                <button id="main-dish" value="1" class="btn-category"><img class="categorie-img" src="./imgs/iconoComidas.svg" alt="main-dish" onclick="getFilters('main-dish')"></button>
                <button id="entrys" value="3" class="btn-category"><img class="categorie-img" src="./imgs/iconoEntradas.svg" alt="entrys" onclick="getFilters('entrys')"></button>
            </div>
        </div>
        <!--Barra exploradora-->
        <div id="dishes-container" class="category-meals-container">
            <?php
            echo "<div id='dishes' class='category-food-section-container'>";
            
                
                foreach($items as $food){
                    echo "<section class='category-meals'>"
                        ."<button class='like-btn'><img src='./imgs/like.svg' alt='like-btn'></button>"
                        ."<img class='meal-card-img' src='./imgs/dishes-imgs/".$food["dish_img"]."' alt='".$food["dish_name"]."'>"
                        ."<div class='price-category-container'>"
                            ."<h4 class='category-meal-title'>".$food["category_name"]."</h4>"
                            ."<div>"
                                ."<img src='./imgs/like1.svg' alt='like-btn'>"
                                ."<span>".$food["price"]."人</span>"
                            ."</div>" 
                        ."</div>"
                        ."<h3 class='food-title'>".$food["dish_name"]."</h3>"
                        ."<p class='meal-info'>".substr($food["description"],0,70)."...</p>"
                        ."<a class='btn meal-btn' href='./meal.php?id=".$food["id_dish"]."'>Read More</a>"
                    ."</section>";
                }

            echo "</div>"
            ?> 
        </div>
        <!--Footer-->
        <?php
            include "./parts/footer.php";
        ?>
    </main>
    <script>

        let sizeSelected= document.getElementById("size0");
        let sizeTemp = "";

        function updatePorcionSize(id){
            sizeSelected = document.getElementById(id);
            for(let i=0; i<4; i++){
                sizeTemp = document.getElementById("size"+i);
                if(sizeTemp != sizeSelected){
                    if(sizeTemp.classList.contains("size-porcion-selected")==true){
                        sizeTemp.classList.remove("size-porcion-selected");
                    }else{
                        sizeSelected.classList.add("size-porcion-selected");
                    }
                }
            }
        }
        //Ajax 
        function getFilters(categoryId){

            let info = {
                size: sizeSelected.value,
                category: document.getElementById(categoryId).value
            };

            //fetch
            fetch("http://localhost/proyectoDAI-1/response.php",{
                method: "POST",
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    'Accept': "application/json, text/plain, */*",
                    'Content-Type': "application/json"
                },
                body: JSON.stringify(info)
            })
            .then(response => response.json())
            .then(data => {
                //console.log(data);

                //let found = document.getElementById("found");
                //found.innerText = "We found: " + data.length + " destination(s)";

                if(data.length > 0){

                    if(document.getElementById("dishes") !== null) document.getElementById("dishes").remove();

                    let container =document.createElement("div");
                    container.setAttribute("id", "dishes");
                    container.classList.add("category-food-section-container");
                    document.getElementById("dishes-container").appendChild(container);

                    data.forEach(function(item) {

                        let section = document.createElement("section");
                        section.classList.add("category-meals");
                        container.appendChild(section);

                        let btnLike = document.createElement("button");
                        btnLike.classList.add("like-btn");
                        section.appendChild(btnLike);

                        let likeImg = document.createElement("img");
                        likeImg.setAttribute("src", "./imgs/like.svg");
                        likeImg.setAttribute("alt", "Like-btn");
                        btnLike.appendChild(likeImg);

                        let mealImg = document.createElement('img');
                        mealImg.classList.add('meal-card-img');
                        mealImg.setAttribute("src", './imgs/dishes-imgs/'+item.dish_img);
                        mealImg.setAttribute("alt", item.dish_name);
                        section.appendChild(mealImg);

                        let priceDiv = document.createElement("div");
                        priceDiv.classList.add("price-category-container");
                        section.appendChild(priceDiv);

                        let categoryTitle = document.createElement("h4");
                        categoryTitle.classList.add('category-meal-title');
                        categoryTitle.innerText =  item.category_name;
                        priceDiv.appendChild(categoryTitle);

                        let divPriceLike = document.createElement("div");
                        priceDiv.appendChild(divPriceLike);

                        let imgLike = document.createElement("img");
                        imgLike.setAttribute("src", './imgs/like1.svg');
                        imgLike.setAttribute("alt","like-btn");
                        divPriceLike.appendChild(imgLike);

                        let price = document.createElement("span");
                        price.innerText = item.price+"人";
                        divPriceLike.appendChild(price);

                        let dishTitle = document.createElement("h3");
                        dishTitle.innerText = item.dish_name;
                        dishTitle.classList.add('food-title');
                        section.appendChild(dishTitle);

                        let description = document.createElement("p");
                        description.classList.add('meal-info');
                        description.innerText = item.description.substr(1,70)+"..."
                        section.appendChild(description);

                        let readMore = document.createElement("a");
                        readMore.classList.add("btn");
                        readMore.classList.add("meal-btn");
                        readMore.innerText = "Read More";
                        readMore.setAttribute("href","./meal.php?id="+item.id_dish);
                        section.appendChild(readMore);



                        /* "<section class='category-meals'>"
                            ."<button class='like-btn'><img src='./imgs/like.svg' alt='like-btn'></button>"
                            ."<img class='meal-card-img' src='./imgs/dishes-imgs/".$food["dish_img"]."' alt='".$food["dish_name"]."'>"
                            ."<div class='price-category-container'>"
                                ."<h4 class='category-meal-title'>".$food["category_name"]."</h4>"
                                ."<div>"
                                    ."<img src='./imgs/like1.svg' alt='like-btn'>"
                                    ."<span>".$food["price"]."人</span>"
                                ."</div>" 
                            ."</div>"
                            ."<h3 class='food-title'>".$food["dish_name"]."</h3>"
                            ."<p class='meal-info'>".substr($food["description"],0,70)."...</p>"
                            ."<a class='btn meal-btn' href='./meal.php?id=".$food["id_dish"]."'>Read More</a>"
                        ."</section>" */
                    });
                }

            }) 
            .catch(err => console.log("error: "+ err));
        }
    </script>
</body>
</html>