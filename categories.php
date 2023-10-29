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
    <header class="hero-category-container">
        <div class="hero-section-container">
            <div class="hero-btn-container">
                <div class="btn-container">
                    <a class="btn hero-btn" href="#">log in</a>
                    <a class="btn hero-btn" href="#">sign up</a>
                </div>
                <div class="btn-container">
                    <a class="btn hero-btn btn-adjust" href="#">EN</a>
                    <a class="btn hero-btn" href="#">日本語</a>
                </div>
            </div>
        <nav class="top-nav">
            <!--mobile nav btn-->
            <input class="mobile-cb" type="checkbox">
            <label class="mobile-btn">
                <span></span>
            </label>
            <!--mobile nav btn-->
            <ul class="nav-list">
                <li><a class="nav-list-link" href="./index.php">Home</a></li>
                <li><a class="nav-list-link" href="./categories.php">Categories</a></li>
                <li><a class="nav-list-link" href="#">Gallery</a></li>
                <li><img class="nav-list-img" src="./imgs/logo.svg" alt="Logo"></li>
                <li><a class="nav-list-link" href="#">Locations</a></li>
                <li><a class="nav-list-link" href="#">About</a></li>
                <li><a class="nav-list-link" href="#">Contact Us</a></li>
            </ul>
        </nav>
        <!--logo mobile-->
        <div class="logo-mobile">
            <img src="./imgs/logo.svg" alt="logo">
        </div>
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
                <div class="header-category-container">
                    <img src="./imgs/ComidaEje.png" alt="Oyakodon">
                    <p class="title-header-category">Oyakodon</p>
                    <p class="text-header-category">Chicken and egg harmony atop steaming rice</p>
                    <a class="btn meal-btn" href="./meal.html">Read More</a>
                </div>
                <div class="header-category-container">
                    <img src="./imgs/ComidaEje.png" alt="Oyakodon">
                    <p class="title-header-category">Oyakodon</p>
                    <p class="text-header-category">Chicken and egg harmony atop steaming rice</p>
                    <a class="btn meal-btn" href="./meal.html">Read More</a>
                </div>
                <div class="header-category-container">
                    <img src="./imgs/ComidaEje.png" alt="Oyakodon">
                    <p class="title-header-category">Oyakodon</p>
                    <p class="text-header-category">Chicken and egg harmony atop steaming rice</p>
                    <a class="btn meal-btn" href="./meal.html">Read More</a>
                </div>
            </div>
        </div>
    </header>

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
        <footer class="footer-container">
            <div class="footer-content">
                <section class="footer-info">
                    <div class="footer-img-container">
                        <img class="footer-img" src="./imgs/logo.svg" alt="logo">
                    </div>
                    <p>
                        At Washoku, we invite you on an enchanting culinary journey through the heart of Japan. Our name, "Washoku," reflects our commitment to the art of traditional Japanese cuisine, which has been celebrated for its balance of flavors, artful presentation, and deep cultural significance.
                    </p>
                </section>
                <div class="footer-links">
                    <section>
                        <h3>Get to Know Us</h3>
                        <ul class="nav-footer-list">
                            <li><a class="nav-footer-link" href="#">About Us</a></li>
                            <li><a class="nav-footer-link" href="#">Rules & Reservation Policies</a></li>
                            <li><a class="nav-footer-link" href="#">Accessibility Media Center</a></li>
                            <li><a class="nav-footer-link" href="#">Locations</a></li>
                        </ul>
                    </section>
                    <section>
                        <h3 class="footer-link-title">Let Us Help You</h3>
                        <ul class="nav-footer-list">
                            <li><a class="nav-footer-link" href="#">Your Account</a></li>
                            <li><a class="nav-footer-link" href="#">Your Reservations</a></li>
                            <li><a class="nav-footer-link" href="#">Contact Us</a></li>
                            <li><a class="nav-footer-link" href="#">Help Center</a></li>
                            <li><a class="nav-footer-link" href="#">Submit Feedback</a></li>
                        </ul>
                    </section>
                </div>
            </div>
            <button class="btn-up"></button>
            <p class="footer-legal">&copy; 2023. All rights reserved.</p>
        </footer>
    </main>
</body>
</html>