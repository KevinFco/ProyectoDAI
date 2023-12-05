<?php
    require_once './php/database.php';
    $message = "";
    $messageLogin = "";

    if($_POST){

        if(isset($_POST["login"])){
            $user = $database->select("tb_users","*",[
                "usr"=>$_POST["username"]
            ]);
            if(count($user) > 0){
                if(password_verify($_POST["password"], $user[0]["password"])){
                    session_start();
                    $_SESSION["isLoggedIn"] = true;
                    $_SESSION["fullname"] = $user[0]["usr_full_name"];
                    header("location: index.php");
                }else{
                    $messageLogin = "wrong username or password";
                }
            }else{
                $messageLogin = "wrong username or password";
            }
        }

        if(isset($_POST["register"])){
            //validate if user already registered
            $validateUsername = $database->select("tb_users","*",[
                "usr"=>$_POST["username"]
            ]);

            if(count($validateUsername) > 0){
                $message = "This username is already registered";
            }else{
                $pass = password_hash($_POST["password"], PASSWORD_DEFAULT, ['cost' => 12]);
                $database->insert("tb_users",[
                    "usr_full_name"=> $_POST["fullname"],
                    "usr"=> $_POST["username"],
                    "password"=> $pass,
                    "email"=> $_POST["email"]
                ]);
            }
        }
    }
?>
                <div class="hero-btn-container">
                    <div class="btn-container">
                        <button type="button" onclick="login()" class="btn hero-btn" >ログインする</button>
                        <?php
                             session_start();
                             if(isset($_SESSION["isLoggedIn"])){
                                echo "<a class='btn hero-btn' href='logout.php'>ログアウトする</a>";
                             }else{
                                echo "<button type='button' onclick='signUp()' class='btn hero-btn'>サインアップする</button>";
                             }
                        ?>
                    </div>
                    <div class="btn-container">
                        <button class="btn hero-btn btn-adjust" onclick="changeLanguage('en')">EN</button>
                        <button class="btn hero-btn" onclick="changeLanguage('jp')">日本語</button>
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
                        <li><a class="nav-list-link" href="./index.php">ホーム</a></li>
                        <li><a class="nav-list-link" href="./categories.php">カテゴリー</a></li>
                        <?php 
                            if(isset($_SESSION["isLoggedIn"])){
                                echo "<li><a class='nav-list-link' href='profile.php'>".$_SESSION["fullname"]."</a></li>"; 
                            }else{
                                echo "<li><a class='nav-list-link' href='./index.php'>Guesst</a></li>";
                            }
                        ?>
                        <li><img class="nav-list-img" src="./imgs/logo.svg" alt="Logo"></li>
                        <li><a class="nav-list-link" href="#">場所</a></li>
                        <li><a class="nav-list-link" href="#">紹介</a></li>
                        <li><a class="nav-list-link" href="#">お問い合わせ </a></li>
                    </ul>
                </nav>
                <!--logo mobile-->
                <div class="logo-mobile">
                    <img src="./imgs/logo.svg" alt="logo">
                </div>

                <section id="loginForm" class="login-form">
                    <div class="title-exit-container">
                        <h3 class="login-title">Login</h3>
                        <button type="button" onclick="exit()" class="login-exit-btn">
                            <label class="exit-btn" >
                                <span></span>
                            </label>
                        </button>
                    </div>
                    <p>Enter your registered username and password in the designated fields.</p>
                    <form method="post" action="index.php">
                        <div class='form-items'>
                            <div>
                                <label class='form-label destination-extra' for='username'>Username</label>
                            </div>
                            <div>
                                <input id='username' class='form-input' type='text' name='username'>
                            </div>
                        </div>
                        <div class='form-items'>
                            <div>
                                <label class='form-label destination-extra' for='password'>Password</label>
                            </div>
                            <div>
                                <input id='password' class='form-input' type='password' name='password'>
                            </div>
                        </div>
                        <div class='form-items'>
                            <div>
                                <input class='form-input login-btn' type='submit' value="LOGIN">
                            </div>
                        </div>
                        <input type="hidden" name="login" value="1">
                    </form>
                </section>
                <section id="singupForm" class="login-form">
                    <div class="title-exit-container">
                        <h3 class='activity-title'>Sign In</h3>
                        <button type="button" onclick="exit()" class="login-exit-btn">
                            <label class="exit-btn" >
                                <span></span>
                            </label>
                        </button>
                    </div>
                    <p>Complete the registration process to enjoy our destinations.</p>
                    <form method="post" action="index.php">
                        <div class='form-items'>
                            <div class="title-exit-container">
                                <label class='form-label destination-extra' for='fullname'>Fullname</label>
                            </div>
                            <div>
                                <input id='fullname' class='form-input' type='text' name='fullname'>
                            </div>
                        </div>
                        <div class='form-items'>
                            <div>
                                <label class='form-label destination-extra' for='email'>Email Address</label>
                            </div>
                            <div>
                                <input id='email' class='form-input' type='text' name='email'>
                            </div>
                        </div>
                        <div class='form-items'>
                            <div>
                                <label class='form-label destination-extra' for='username'>Username</label>
                            </div>
                            <div>
                                <input id='username' class='form-input' type='text' name='username'>
                            </div>
                        </div>
                        <div class='form-items'>
                            <div>
                                <label class='form-label destination-extra' for='password'>Password</label>
                            </div>
                            <div>
                                <input id='password' class='form-input' type='password' name='password'>
                            </div>
                        </div>
                        <div class='form-items'>
                            <div>
                                <input class='form-input login-btn' type='submit' value="REGISTER">
                            </div>
                        </div>
                        <p><?php echo $message; ?></p>
                        <input type="hidden" name="register" value="1">
                    </form>
                </section>
                <script>
                    function login() {
                        document.getElementById("loginForm").style.display="grid";
                    }

                    function signUp() {
                        document.getElementById("singupForm").style.display="grid";
                    }

                    function exit(){
                        document.getElementById("loginForm").style.display="none";
                        document.getElementById("singupForm").style.display="none";
                    }
                </script>
                