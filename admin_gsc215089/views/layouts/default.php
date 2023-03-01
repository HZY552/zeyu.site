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
    <link rel="stylesheet" href="/admin_gsc215089/src/main.css" media="screen and (min-width:1130px)"/>
    <link rel="stylesheet" href="/admin_gsc215089/src/main1130501.css" media="screen and (max-width:1129px) and (min-width:800px)"/>
    <link rel="stylesheet" href="/admin_gsc215089/src/main800.css" media="screen and (max-width:799px)"/>
    <link rel="stylesheet" href="/admin_gsc215089/views/<?=strtolower($this->getClassName())?>/src/style.css" media="screen and (min-width:1130px)" />
    <link rel="stylesheet" href="/admin_gsc215089/views/<?=strtolower($this->getClassName())?>/src/style1130501.css" media="screen and (max-width:1129px) and (min-width:800px)" />
    <link rel="stylesheet" href="/admin_gsc215089/views/<?=strtolower($this->getClassName())?>/src/style800.css" media="screen and (max-width:799px)" />
    <!-- 加载 JavaScript -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="/admin_gsc215089/src/vue.js"></script>
    <script src="/admin_gsc215089/src/main.js" type="module"></script>
    <script src="/admin_gsc215089/views/<?=strtolower($this->getClassName())?>/src/<?=$this->getJsFile()?>.js" type="module"></script>
    <!-- 加载 图标 -->
    <link rel="icon" type="image/x-icon" href="../chat16.ico">
    <title><?=strtolower($this->getClassName())?></title>
</head>
<body>
    <header>
        <?php include dirname(dirname(dirname(__FILE__))) . '\src\header.vue' ?>
    </header>
</body>

</html>


