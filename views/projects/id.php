<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<style>
    main{
        background-color: white;
    }
</style>
<div class="px-4 pt-5 my-5 text-center border-bottom">
    <h1 class="display-4 fw-bold text-body-emphasis"><?=$project["nom_project"] . " ( " . $project["fait_ou"] . " ) "?></h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4"><?php
            if ($project["fait_ou"] == "Stage"){
                echo "<span><b>Informations sur la société</b></span>";
            }
            ?>
            <?=$project["description"]?></p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
            <?php if ($project["url_project"] !== 'localhost') : ?>
            <a href="<?=$project["url_project"]?>">
                <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Voir en ligne</button>
            </a>
            <?php endif; ?>
            <?php if(!empty($project["github"])) :?>
            <a href="<?=$project["github"]?>">
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Github</button>
            </a>
            <?php endif;?>
        </div>
    </div>
    <div class="overflow-hidden" style="max-height: 30vh;">
        <div class="container px-5">
            <img src="<?='/views/projects/images/' . $project['photo1']?>" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
        </div>
    </div>
</div>
<main class="container" style="background-color: white;">
    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                Description
            </h3>

            <article class="blog-post">
                <h2 class="blog-post-title mb-1"><?=$project["nom_project"] . " ( " . $project["fait_ou"] . " ) "?></h2>
                <p class="blog-post-meta">Date :
                    <?=$project["date_debut"] . " - " . $project["date_defin"]?></br></p>
                <p><?php
                    if ($project["fait_ou"] == "Stage"){
                        echo "<span><b>Informations sur la société</b></span>";
                    }
                    ?>
                    <?=$project["description"]?></p>
                <hr>
                <h2>Technologie Utilisée</h2>
                <ul>
                    <?php
                    $str = $project["tec"];
                    $array = explode("/",$str);
                    ?>
                    <?php foreach ($array as $a) :?>
                        <li>
                            <?=$a ?>
                        </li>
                    <?php endforeach;?>
                </ul>
                <hr>
                <h2>Pour Moi</h2>
                <p>
                    <?=$project["info"]?>
                </p>
            </article>
        </div>

        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <div class="p-4 mb-3 bg-body-tertiary rounded">
                    <h4 class="fst-italic">À propos</h4>
                    <?=$project["nom_project"] . " ( " . $project["fait_ou"] . " ) "?></br>
                    Date :
                    <?=$project["date_debut"] . " - " . $project["date_defin"]?></br>
                    <?=$project["tec"]?>
                </div>

                <div class="p-4">
                    <h4 class="fst-italic">Liens et documentations</h4>
                    <ol class="list-unstyled mb-0">
                        <?php if(!empty($project["github"])) :?>
                            <li><a href="<?=$project["github"]?>">GitHub</a></li>
                        <?php endif;?>
                        <?php if ($project["fait_ou"] != "Stage" && !empty($project["documentation"])) : ?>
                            <li><a href="<?='/views/projects/images/' . $project["documentation"]?>">Documentation</a></li>
                        <?php endif;?>
                    </ol>
                </div>
                <div class="p-4">
                    <h4 class="fst-italic">Contact Moi</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div id="carouselExample" class="carousel slide">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Photos
        </h3>
        <div class="carousel-inner pb-5">
            <div class="carousel-item active">
                <img src="<?='/views/projects/images/' . $project['photo1']?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?='/views/projects/images/' . $project['photo2']?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?='/views/projects/images/' . $project['photo3']?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <?php if (!empty($project['photo4'])) : ?>
                    <img src="<?='/views/projects/images/' . $project['photo4']?>" class="d-block w-100" alt="...">
                <?php endif;?>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</main>



