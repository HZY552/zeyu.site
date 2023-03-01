<?php
global $jsfile;
global $login;
$jsfile = $this->getClassName();


    if (isset($_POST['submit'])){
        if (!empty($_POST['email']) && !empty($_POST['password'])){
            $login = $this->checkUser($_POST['email'],$_POST['password']);
            if ($login == true){
                header("location:/");
            }
        }
    }
?>


    <div class="main-content">
        <img src="views/<?= strtolower($this->getClassName()) ?>/images/login.gif" id="img">
        <div class="main-form">
            <p>Connectez-vous</p>
            <form action="" method="post" role="form" target="" id="send" onsubmit="">
                <?php
                    if (!empty($_POST['password']) && !empty($_POST['email'])){
                        if ($login == false){
                            echo "L'identifiant ou le mot de passe est incorrect";
                        }
                    }
                ?>
                <div id="group-email" class="group-email">
                    <input type="text" placeholder="Numéro de mobile ou E-mail" name="email" id="email">
                </div>
                <div id="group-password" class="group-password">
                    <input type="password" placeholder="Mot de passe" name="password" id="password">
                </div>
                <input type="submit" value="Login" class="button-submit" name="submit" id="submit">
                <p style="font-size: 0.7rem; margin-top: 5px; margin-bottom: 0px;color: #4F555A">- ou se connecter avec
                    -</p>
                <div class="loginfg">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                        </svg>
                    </button>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="google" viewBox="0 0 16 16">
                            <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>


<iframe name="iframeend" class="iframeend" id="iframeend" style="display: none;"></iframe>



