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

        <div class="meal-meal-title-container">
            <div class="meal-names-container">
                <button class="btn-meal-like"><img src="./imgs/btnlike 1.svg" alt=""></button>
                <h1 class="meal-meal-title">親子丼</h1>
                <h2 class="meal-title-two">Oyakodon</h2>
            </div>
            <div class="meal-info-container">
                <div class="info-container">
                    <img class="meal-img-category" src="./imgs/iconoComidas 2.svg" alt="categorie-maindish">
                    <div class="text-container">
                        <h2 class="meal-title-two">Oyakodon</h2>
                        <p class="info-text">Oyakodon is a Japanese one-bowl dish with tender 
                        chicken and beaten eggs simmered in a sweet soy-based sauce.
                         Served over fluffy rice, it offers a perfect balance of textures
                          and flavors, with creamy egg layers over succulent chicken.
                           This dish traces its roots to 19th-century Tokyo,
                            becoming a beloved, affordable comfort meal.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="characteristics-container">
            <div class="left-container">
                <section class="order-size-container">
                    <h3>Order Size</h3>
                    <ul class="meal-char-nav">
                        <li><button class="characteristics-btn">Personal</button></li>
                        <li><button class="characteristics-btn">Family</button></li>
                    </ul>
                </section>

                <section class="order-size-container">
                    <h3>Delivery</h3>
                    <ul class="meal-char-nav">
                        <li><button class="characteristics-btn">Salon</button></li>
                        <li><button class="characteristics-btn">Express</button></li>
                        <li><button class="characteristics-btn">To go</button></li>
                    </ul>
                </section>
            </div>

            <div class="rigth-container">
                <h2 class="price-title">Main dish</h2>

                <h2 class="price-title feature-title">Featured Meal</h2>

            </div>
        </div>
        
        <div class="order-buy-container">
            <h2 class="price-title">Price 1200円</h2>
            <button class="buy-btn">Add to Cart</button>
        </div>

        <?php
            include "./parts/footer.php";
        ?>
    </main>
</body>
</html>