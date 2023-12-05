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
            <div class="hero-characteristics-left-jp">
                <h1 class="header-title vertical-writing">味わい和食</h1>
                <p class="header-text vertical-writing">料理の芸術を体験し、伝統を味わい、風味を楽しむ。各料理が魅力的な物語を語る世界へようこそ。</p>
            </div>
            <div class="hero-characteristics-rigth-jp">
                <h1 class="header-title vertical-writing">伝統を楽しむ</h1>
                <p class="header-text vertical-writing">日本の料理の遺産の魂に浸り、伝統の味が忘れられない一口ずつに広がる。</p>
            </div>
        </div>
    </header>
    <main>
        <!--carrousel-->
        <div class="carousel-container">
            <div class="card-carousel">
              <div class="card" id="1">
                <div class="image-container"></div>
                <p class="carousel-text"> ほっこりする創作料理、私たちの日本料理の魂</p>
              </div>
              <div class="card" id="2">
                <div class="image-container"></div>
                <p class="carousel-text">風味豊かな前菜が、洒落た料理の旅を始めます</p>
              </div>
              <div class="card" id="3">
                <div class="image-container"></div>
                <p class="carousel-text">スタイリッシュに食事を引き立てるさわやかな飲み物</p>
              </div>  
              <div class="card" id="4">
                <div class="image-container"></div>
                <p class="carousel-text"> 甘い贅沢品で食事を楽しい結びにする</p>
              </div>
              <div class="card" id="5">
                <div class="image-container"></div>
                <p class="carousel-text">シェフの秘密が明かされ、あなたの味覚冒険が待っています </p>
              </div>
            </div>
            <a href="#" class="visuallyhidden card-controller">Carousel controller</a>
          </div>

        <!--carrousel-->

        <!--Meals-->
        <div class="meals-container">
            <h2 class="meals-container-title">料理の卓越性を発見する</h2>
            <!--Meal mobile-->
            <section class="meal-mobile">
                <img class="meal-img" src="./imgs/ComidaEje.png" alt="meal">
                <a class="btn meal-btn" href="./meal.php">もっと見る</a>
            </section>
            <section class="meal-mobile meal-var-mobile">
                <img class="meal-img" src="./imgs/ComidaEje.png" alt="meal">
                <a class="btn meal-btn" href="./meal.php">もっと見る</a>
            </section>
            <section class="meal-mobile">
                <img class="meal-img" src="./imgs/ComidaEje.png" alt="meal">
                <a class="btn meal-btn" href="./meal.php">もっと見る</a>
            </section>
            <!--Meal mobile-->
            <section class="meal">
                <img class="meal-img" src="./imgs/ComidaEje.png" alt="meal">
                <div class="meal-text-container">
                    <h2 class="meal-title">親子丼</h2>
                    <p class="meal-description">日本の温かさを味わってください。当店自慢の親子丼は、心温まる一杯の喜びです。
                        柔らかい鶏肉とふんわりとした卵を、風味豊かな醤油ベースのたれで煮込み、蒸し暖かいご飯の上に滑らかな層を作ります。
                        この料理を永遠のお気に入りにする伝統の味と「親子の和」の調和をご体験ください。</p>
                    <a class="btn meal-btn" href="./meal.php">もっと見る</a>
                </div> 
            </section>
            <section class="meal meal-var">
                <div class="meal-text-container">
                    <h2 class="meal-title">親子丼</h2>
                    <p class="meal-description">日本の温かさを味わってください。当店自慢の親子丼は、心温まる一杯の喜びです。
                        柔らかい鶏肉とふんわりとした卵を、風味豊かな醤油ベースのたれで煮込み、蒸し暖かいご飯の上に滑らかな層を作ります。
                        この料理を永遠のお気に入りにする伝統の味と「親子の和」の調和をご体験ください。</p>
                    <a class="btn meal-btn" href="./meal.php">もっと見る</a>
                </div> 
                <img class="meal-img" src="./imgs/ComidaEje.png" alt="meal">
            </section>
            <section class="meal">
                <img class="meal-img" src="./imgs/ComidaEje.png" alt="meal">
                <div class="meal-text-container">
                    <h2 class="meal-title">親子丼</h2>
                    <p class="meal-description">日本の温かさを味わってください。当店自慢の親子丼は、心温まる一杯の喜びです。
                        柔らかい鶏肉とふんわりとした卵を、風味豊かな醤油ベースのたれで煮込み、蒸し暖かいご飯の上に滑らかな層を作ります。
                        この料理を永遠のお気に入りにする伝統の味と「親子の和」の調和をご体験ください。</p>
                    <a class="btn meal-btn" href="./meal.php">もっと見る</a>
                </div> 
            </section>
        </div>
        <!--Meals-->

        <!--subscribe-->
        <div class="subscribe-form-apps-container">
            <div class="subscribe-text-container-jp">
                <h3 class="subscribe-title vertical-writing">和食について</h3>
                <p class="vertical-writing">
                日本料理の本質を保存し、<br>
                共有する情熱を持ち、<br>
                私たちのシェフたち<br>
                は一つ一つの食事を丹念に作り上げ、<br>
                伝統的な味と料理の卓越性<br>
                を通じて忘れられない<br>
                旅を提供しています。<br>
                </p>
            </div>
            <div class="subscribe-apps-container">
                <h3 class="subscribe-apps-title">アプリ ダウンロード </h3>
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