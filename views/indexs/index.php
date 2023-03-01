<?php

ini_set('session.gc_maxlifetime', "3600");
ini_set("session.cookie_lifetime","3600");
session_start();
global $username;

if(!empty($_SESSION['token'])){
    if (empty($username)){
        $username = $this->getUserEmail($_SESSION['token'])['nom'];
        if (!empty($username)){
            setcookie('username',$username);
        }
    }
}

$img = $this->getImg(); //getimg
$path_cv = "/views/indexs/images/cv.pdf";
$etucation = $this->getEtucation();
$projects = $this->getProject();

if(isset($_POST['submit'])){
    $this->send_contact($_POST['name'],$_POST['email'],$_POST['tele'],$_POST['sujet'],$_POST['message']);
}


?>

<div class="banner" xmlns="http://www.w3.org/1999/html">
    <div class="banner-text">
        <h3 class="title1"></h3>
        <h3 class="title2"></h3>
        <p>Bienvenue dans mon portefolio, Étudiant H3 Hitema BTS SIO SLAM</p>
        <button class="banner-button" id="banner-button">Login</button>
    </div>
    <div class="banner-img">
        <div class="animation-img" id="animation-img">
            <?php foreach ($img as $i) : ?>
                <?php
                if ($i['path'] == 'imgbanner'){
                    $banner =  "/views/".$i['page']."/images/".$i['path'].$i['type'];
                }?>
                <img src="<?=$banner?>" class="img-banner">
                <?php
                    if (!empty($banner)){
                        break;
                    }
                ?>
            <?php endforeach; ?>
        </div>
        <div class="banner-button-header">
            <button>
                <a href="https://github.com/HZY552" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                    </svg>
                </a>
            </button>
            <button>
                <a href="https://www.linkedin.com/in/%E6%B3%BD%E5%AE%87-%E4%BE%AF-667a71237/" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                    </svg>
                </a>
            </button>
            <button>
                <a href=https://twitter.com/?lang=fr" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                    </svg>
                </a>
            </button>
            <button>
                <a href="https://www.facebook.com/" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg>
                </a>
            </button>
        </div>
    </div>
</div>
<div class="p2">
    <div class="ab-me">
        <h3>A Propose De Moi</h3>
        <p>Je m'appelle Hou Zeyu</p>
        <p>Actuellement en 2iére année d'études de BTS Services informatiques aux organisations, option SLAM à l’école H3 Hitema (Issy-les-Moulineaux), je suis à la recherche d'une entreprise qui pourrait m'accueillir en alternance.
        </p>
        <div class="cv-button">
            <button class="button-contact">Contact</button>
        </div>
    </div>
    <img src="/views/indexs/images/profil xiaoyu3.png">
</div>
<div class="p3">
    <div class="p3_title">
        <h3>Mon expertise</h3>
        <h2>Fournir une large gamme de </br> services numérique</h2>
    </div>
    <div class="background-img"></div>
    <div class="p3_box">
        <div class="show_box">
            <div class="box_img">
                <img src="/views/indexs/images/service-icon3.png">
            </div>
            <div class="box-text">
                <span>Développement Web</span>
                <p>Lorem ipsum dolor sit amet,
                    consectetur adipisicing elit.
                    Aspernatur blanditiis deleniti deserunt distinctio ducimus eius eos
                    error et ex fugit molestias, necessitatibus nesciunt
                    pariatur porro possimus sit totam, veniam voluptate?</p>
            </div>
        </div>
        <div class="show_box">
            <div class="box_img">
                <img src="/views/indexs/images/service-icon4.png">
            </div>
            <div class="box-text">
                <span>Développement D'application</span>
                <p>Lorem ipsum dolor sit amet,
                    consectetur adipisicing elit.
                    Aspernatur blanditiis deleniti deserunt distinctio ducimus eius eos
                    error et ex fugit molestias, necessitatibus nesciunt
                    pariatur porro possimus sit totam, veniam voluptate?</p>
            </div>
        </div>
        <div class="show_box">
            <div class="box_img">
                <img src="/views/indexs/images/service-icon3.png">
            </div>
            <div class="box-text">
                <span>Développement Web</span>
                <p>Lorem ipsum dolor sit amet,
                    consectetur adipisicing elit.
                    Aspernatur blanditiis deleniti deserunt distinctio ducimus eius eos
                    error et ex fugit molestias, necessitatibus nesciunt
                    pariatur porro possimus sit totam, veniam voluptate?</p>
            </div>
        </div>
        <div class="show_box">
            <div class="box_img">
                <img src="/views/indexs/images/service-icon4.png">
            </div>
            <div class="box-text">
                <span>Développement Web</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid asperiores consequuntur distinctio dolorum exercitationem nam odit unde. Culpa cupiditate dolores impedit maiores nihil provident recusandae sapiente? Aperiam eos eveniet nostrum.</p>
            </div>
        </div>
    </div>
</div>
<div class="p4" id="p4">
    <div class="p4-title">
        <h3>Mes Compétences</h3>
        <h2>Des Expériences Informatique</h2>
        <p>langages programmation: (Html, Css, JavaScript, Python, PHP, SQL)</br>
        Système d'explotation: (Windows, Linux)</br>
            Virtualisation
        </p>
    </div>
    <div class="progress-content pro1" id="progress-content" >
        <div class="progress">
            <div class="circle_process" id="html">
                <span style="margin: 0 auto"></span>
                <div class="wrapper right">
                    <div class="circle rightcircle"></div>
                </div>
                <div class="wrapper left">
                    <div class="circle leftcircle" id="leftcircle"></div>
                </div>
            </div>
        </div>
        <div class="progress">
            <div class="circle_process" id="css">
                <span style="margin: 0 auto"></span>
                <div class="wrapper right">
                    <div class="circle rightcircle"></div>
                </div>
                <div class="wrapper left">
                    <div class="circle leftcircle" id="leftcircle"></div>
                </div>
            </div>
        </div>
        <div class="progress">
            <div class="circle_process" id="java">
                <span style="margin: 0 auto"></span>
                <div class="wrapper right">
                    <div class="circle rightcircle"></div>
                </div>
                <div class="wrapper left">
                    <div class="circle leftcircle" id="leftcircle"></div>
                </div>
            </div>
        </div>
        <div class="progress">
            <div class="circle_process" id="python">
                <span style="margin: 0 auto"></span>
                <div class="wrapper right">
                    <div class="circle rightcircle"></div>
                </div>
                <div class="wrapper left">
                    <div class="circle leftcircle" id="leftcircle"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="progress-content pro2" id="progress-content" >
        <div class="progress">
            <div class="circle_process" id="php">
                <span style="margin: 0 auto"></span>
                <div class="wrapper right">
                    <div class="circle rightcircle"></div>
                </div>
                <div class="wrapper left">
                    <div class="circle leftcircle" id="leftcircle"></div>
                </div>
            </div>
        </div>
        <div class="progress">
            <div class="circle_process" id="js">
                <span style="margin: 0 auto"></span>
                <div class="wrapper right">
                    <div class="circle rightcircle"></div>
                </div>
                <div class="wrapper left">
                    <div class="circle leftcircle" id="leftcircle"></div>
                </div>
            </div>
        </div>
        <div class="progress">
            <div class="circle_process" id="sql">
                <span style="margin: 0 auto"></span>
                <div class="wrapper right">
                    <div class="circle rightcircle"></div>
                </div>
                <div class="wrapper left">
                    <div class="circle leftcircle" id="leftcircle"></div>
                </div>
            </div>
        </div>
        <div class="progress">
            <div class="circle_process" id="vue.js">
                <span style="margin: 0 auto"></span>
                <div class="wrapper right">
                    <div class="circle rightcircle"></div>
                </div>
                <div class="wrapper left">
                    <div class="circle leftcircle" id="leftcircle"></div>
                </div>
            </div>
        </div>
    </div>
    <button>Télécharger CV</button>
</div>
<div class="p5" id="p5">
    <div class="font-p5">
        <div class="font-left"></div>
        <div class="font-right"></div>
    </div>
    <div class="p5-text">
        <h3>Parcours de professionnalisation</h3>
        <p>Durant les deux années d'études en BTS, nous avons réalisé de nombreux projets en entreprise ou à l'école.Vous trouverez ci-dessous notre projet.</p>
    </div>
    <div class="projects">
        <div class="images">
            <div class="button-left" onclick="moin()">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
            </div>
            <div class="content-project">
                <?php foreach ($projects as $project) : ?>
                    <img src="<?='/views/projects/images/' . $project['photo1']?>">
                <?php endforeach; ?>
            </div>
            <div class="button-right" onclick="plus()">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                </svg>
            </div>
        </div>
        <div class="box-span">
            <?php foreach ($projects as $project) : ?>
                <button class="button-active" onclick="change_c(<?=$project['id_project']-1?>)">.</button>
            <?php endforeach; ?>
        </div>
        <div class="box-des">
            <?php foreach ($projects as $project) : ?>
                <div class="des content-active">
                    <h3><?=$project['nom_project']?></h3>
                    <p>
                        <?=$project['description']?>
                    </p>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="p6">
    <div class="p6-title">
        <h3>Contactez-moi</h3>
        <h2>Vous avez des questions ?</h2>
        <h2>N'hésitez pas à contacter</h2>
    </div>
    <div class="formul">
        <div class="info-p6">
            <div class="add">
                <div class="logo-infop6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-geo-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
                    </svg>
                </div>
                <div class="text-ingop6">
                    <p>Address : </p>
                    <p>Paris</p>
                </div>
            </div>
            <div class="add">
                <div class="logo-infop6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                    </svg>
                </div>
                <div class="text-ingop6">
                    <p>Email : </p>
                    <p>houzeyu7@gmail.com</p>
                </div>
            </div>
            <div class="add">
                <div class="logo-infop6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-telephone-inbound-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0z"/>
                    </svg>
                </div>
                <div class="text-ingop6">
                    <p>Téléphone : </p>
                    <p>06 95 86 72 79</p>
                </div>
            </div>
        </div>
        <div class="form-p6">
            <form method="post" id="form" target="iframeend">
                <div class="inp">
                    <input type="text" placeholder="Name" class="input-class" name="name" id="name">
                    <input type="text" placeholder="Email" class="input-class" name="email" id="email">
                </div>
                <div class="inp">
                    <input type="text" placeholder="Téléphone" class="input-class" name="tele" id="tele">
                    <input type="text" placeholder="Sujet" class="input-class" name="sujet" id="sujet">
                </div>
                <div class="mess">
                    <textarea placeholder="Message" rows="3" name="message" id="message"></textarea>
                </div>
                <input type="submit" value="Soumettre" class="button-submit" id="submit" name="submit">
            </form>
        </div>
    </div>
</div>
<iframe name="iframeend" class="iframeend" id="iframeend" style="display: none;"></iframe>

