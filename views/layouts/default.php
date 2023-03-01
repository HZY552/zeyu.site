<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Google 字体 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- 加载 CSS -->
    <link rel="stylesheet" href="/main.css" media="screen and (min-width:1130px)"/>
    <link rel="stylesheet" href="/main1130501.css" media="screen and (max-width:1129px) and (min-width:800px)"/>
    <link rel="stylesheet" href="/main800.css" media="screen and (max-width:799px)"/>
    <link rel="stylesheet" href="/views/<?=strtolower($this->getClassName())?>/src/style.css" media="screen and (min-width:1130px)" />
    <link rel="stylesheet" href="/views/<?=strtolower($this->getClassName())?>/src/style1130501.css" media="screen and (max-width:1129px) and (min-width:800px)" />
    <link rel="stylesheet" href="/views/<?=strtolower($this->getClassName())?>/src/style800.css" media="screen and (max-width:799px)" />
    <!-- 加载 JavaScript -->
    <script src="/main.js"></script>
    <script src="/views/<?=strtolower($this->getClassName())?>/src/<?=$this->getJsFile()?>.js"></script>
    <title><?=$this->getClassName()?></title>
    <!-- 加载 图标 -->
    <link rel="icon" type="image/x-icon" href="chat16.ico">
</head>
<body>
    <header>
        <div class="header-content">
            <div class="header-logo">
                <button>
                    <h3><a href="/" style="text-decoration: none;color: black;">Zeyu.site / Home</a></h3>
                    <hr class="bar-button">
                </button>
            </div>
            <div class="header-navli" id="header-navli">
                <?php $url = $_SERVER["REQUEST_URI"]; if($url === "/" || $url === "/indexs") : ?>
                <button id="button-a-proposedemoi">
                    <h3>A propose de moi</h3>
                    <hr class="bar-button">
                </button>
                <button id="mes-parcours" style="width: 130px;">
                    <h3>Mes Parcours</h3>
                    <hr class="bar-button">
                </button>
                <button id="button-contact">
                    <h3>Contact</h3>
                    <hr class="bar-button">
                </button>
                <button>
                    <h3><a href="/Downloads" style="text-decoration: none;color: black;">Téléchargement</a></h3>
                    <hr class="bar-button">
                </button>
                <button>
                    <h3>
                        <?php
                        $js = $this->getJsFile();
                        if ($js == 'inscription'){
                            echo '<a href="/logins" style="text-decoration: black;color: black;">Login</a>';
                        }else{
                            if ($js == 'login'){
                                echo '<a href="/inscriptions" style="text-decoration: black;color: black;">Inscription</a>';
                            }else{
                                if(empty($_SESSION['token'])){
                                    echo '<a href="/logins" style="text-decoration: none; color: black;">Login</a>';
                                }else{
                                    $token = $_SESSION['token'];
                                    echo '<a href="/accounts" style="text-decoration: none; color: black;" >'.$username.'</a>';
                                }
                            }

                        }
                        ?>
                    </h3>
                    <hr class="bar-button">
                </button>
                <?php else: ?>
                <button id="mes-parcours" style="width: 130px;">
                    <h3>Mes Parcours</h3>
                    <hr class="bar-button">
                </button>
                <button>
                    <h3><a href="/Downloads" style="text-decoration: none;color: black;">Téléchargement</a></h3>
                    <hr class="bar-button">
                </button>
                <button>
                    <h3>
                        <?php
                        $js = $this->getJsFile();
                        if ($js == 'inscription'){
                            echo '<a href="/logins" style="text-decoration: black;color: black;">Login</a>';
                        }else{
                            if ($js == 'login'){
                                echo '<a href="/inscriptions" style="text-decoration: black;color: black;">Inscription</a>';
                            }else{
                                if(empty($_SESSION['token'])){
                                    echo '<a href="/logins" style="text-decoration: none; color: black;">Login</a>';
                                }else{
                                    $token = $_SESSION['token'];
                                    echo '<a href="/accounts" style="text-decoration: none; color: black;" >'.$username.'</a>';
                                }
                            }

                        }
                        ?>
                    </h3>
                    <hr class="bar-button">
                </button>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <main>
        <?= $content ?>
    </main>
    <footer>
        <div class="font-footer">
            <div class="footer-left"></div>
            <div class="footer-right"></div>
        </div>
        <div class="content-footer">
            <h4>Zeyu.site</h4>
            <div class="menu">
                <div class="menu-footer">
                    <div class="menu-s">
                        <a href="/menu">
                            <p class="p-footer">Menu</p>
                        </a>
                    </div>
                </div>
                <div class="menu-footer">
                    <div class="menu-s">
                        <a href="/aproposedemoi">
                            <p class="p-footer">A propose de moi</p>
                        </a>

                    </div>
                </div>
                <div class="menu-footer">
                    <div class="menu-s">
                        <a href="/parcour">
                            <p class="p-footer">Mes parcours</p>
                        </a>
                    </div>
                </div>
                <div class="menu-footer">
                    <div class="menu-s">
                        <a href="/contact">
                            <p class="p-footer">Contact</p>
                        </a>
                    </div>
                </div>
                <div class="menu-footer">
                    <div class="menu-s">
                        <a href="/logins">
                            <p class="last-p">Login</p>
                        </a>

                    </div>
                </div>
            </div>
            <div class="logo-footer">
                <a href="https://www.facebook.com">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg>
                </a>
                <a href="https://www.github.com">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                    </svg>
                </a>
                <a href="https://www.twitter.com">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                    </svg>
                </a>
                <a href="https://www.google.com">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                    </svg>
                </a>
            </div>
        </div>
    </footer>
</body>
</html>


