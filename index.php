<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProyectoDAI</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
<header class="hero-container">
        <div class="hero-section-container">
            <?php
                include "./parts/navigator.php";
            ?>
            <!--logo mobile-->
            <div class="hero-rombo">
                <img src="./imgs/romboWashoku.svg" alt="">
            </div>
            <div class="hero-characteristics-left">
                <h1 class="header-title">Taste Washoku</h1>
                <p class="header-text">Experience culinary artistry, savor tradition, embrace flavor. Welcome to a world where each dish tells a captivating story.</p>
            </div>
            <div class="hero-characteristics-rigth">
                <h1 class="header-title">Enjoy Tradition</h1>
                <p class="header-text">Immerse in the soul of Japan's culinary heritage, where flavors of tradition unfold with each unforgettable bite.</p>
            </div>
        </div>
    </header>
    <main>
        <!--carrousel-->
        <div class="carousel-container">
            <div class="card-carousel">
              <div class="card" id="1">
                <div class="image-container"></div>
                <p class="carousel-text"> Heartwarming creations, the soul of our Japanese cuisine</p>
              </div>
              <div class="card" id="2">
                <div class="image-container"></div>
                <p class="carousel-text">Savory starters ignite your culinary journey with flair</p>
              </div>
              <div class="card" id="3">
                <div class="image-container"></div>
                <p class="carousel-text">Refreshing sips that complement your meal in style</p>
              </div>  
              <div class="card" id="4">
                <div class="image-container"></div>
                <p class="carousel-text"> Sweet indulgences to conclude your meal with delight</p>
              </div>
              <div class="card" id="5">
                <div class="image-container"></div>
                <p class="carousel-text">Chef's secrets unveiled, your taste adventure awaits</p>
              </div>
            </div>
            <a href="#" class="visuallyhidden card-controller">Carousel controller</a>
          </div>

        <!--carrousel-->

        <!--Meals-->
        <div class="meals-container">
            <h2 class="meals-container-title">Discover Culinary Excellence</h2>
            <!--Meal mobile-->
            <section class="meal-mobile">
                <img class="meal-img" src="./imgs/ComidaEje.png" alt="meal">
                <a class="btn meal-btn" href="./meal.php">Read More</a>
            </section>
            <section class="meal-mobile meal-var-mobile">
                <img class="meal-img" src="./imgs/ComidaEje.png" alt="meal">
                <a class="btn meal-btn" href="./meal.php">Read More</a>
            </section>
            <section class="meal-mobile">
                <img class="meal-img" src="./imgs/ComidaEje.png" alt="meal">
                <a class="btn meal-btn" href="./meal.php">Read More</a>
            </section>
            <!--Meal mobile-->
            <section class="meal">
                <img class="meal-img" src="./imgs/ComidaEje.png" alt="meal">
                <div class="meal-text-container">
                    <h2 class="meal-title">Oyakodon</h2>
                    <p class="meal-description">Savor the warmth of Japan with our Oyakodon,
                        a comforting one-bowl delight. Tender chicken and softly beaten eggs,
                        simmered in a savory soy-based sauce, create a velvety layer over a bed of steaming rice.
                        Experience a taste of tradition and the 'parent and child' harmony that makes
                        this dish a timeless favorite.</p>
                    <a class="btn meal-btn" href="./meal.php">Read More</a>
                </div> 
            </section>
            <section class="meal meal-var">
                <div class="meal-text-container">
                    <h2 class="meal-title">Oyakodon</h2>
                    <p class="meal-description">Savor the warmth of Japan with our Oyakodon,
                        a comforting one-bowl delight. Tender chicken and softly beaten eggs,
                        simmered in a savory soy-based sauce, create a velvety layer over a bed of steaming rice.
                        Experience a taste of tradition and the 'parent and child' harmony that makes
                        this dish a timeless favorite.</p>
                    <a class="btn meal-btn" href="./meal.php">Read More</a>
                </div> 
                <img class="meal-img" src="./imgs/ComidaEje.png" alt="meal">
            </section>
            <section class="meal">
                <img class="meal-img" src="./imgs/ComidaEje.png" alt="meal">
                <div class="meal-text-container">
                    <h2 class="meal-title">Oyakodon</h2>
                    <p class="meal-description">Savor the warmth of Japan with our Oyakodon,
                        a comforting one-bowl delight. Tender chicken and softly beaten eggs,
                        simmered in a savory soy-based sauce, create a velvety layer over a bed of steaming rice.
                        Experience a taste of tradition and the 'parent and child' harmony that makes
                        this dish a timeless favorite.</p>
                    <a class="btn meal-btn" href="./meal.php">Read More</a>
                </div> 
            </section>
        </div>
        <!--Meals-->

        <!--subscribe-->
        <div class="subscribe-form-apps-container">
            <div class="subscribe-text-container">
                <h3 class="subscribe-title">About Washoku</h3>
                <p>
                At Washoku, we embrace the centuries-old culinary traditions of Japan, weaving authenticity into every dish. 
                With a passion for preserving and sharing the essence of Japanese cuisine, our chefs meticulously craft each meal, ensuring an unforgettable journey through traditional flavors and culinary excellence. 
                </p>
            </div>
            <div class="subscribe-apps-container">
                <h3 class="subscribe-apps-title">Download App</h3>
                <a href="#"><img src="./imgs/GooglePlay.png" alt="GooglePlay"></a>
                <a href="#"><img src="./imgs/AppStore.png" alt="AppStore"></a>
            </div>
        </div>  
        <!--subscribe-->

        <?php
            include "./parts/footer.php";
        ?>
    </main>
    <script src="./Js/buttonup.js"></script>
    <script src="./Js/main.js"></script>
    <script src="./Js/carousel.js"></script>
</body>
</html>