    <div class="content-project">
        <div class="info-project">
            <div class="bloc">
                <h3>Nom du projet : </h3>
                <p><?=$project["nom_project"] . " ( " . $project["fait_ou"] . " ) "?></p>
            </div>
            <?php if ($project["url_project"] !== 'localhost') : ?>
            <div class="bloc">
                <h3>Site Web : </h3>
                <a href="<?=$project["url_project"]?>">
                    <?=$project["url_project"]?>
                </a>
            </div>
            <?php endif; ?>
            <?php if(!empty($project["github"])) :?>
                <div class="bloc">
                    <h3>GitHub : </h3>
                    <a href="<?=$project["github"]?>">
                        <?=$project["github"]?>
                    </a>
                </div>
            <?php endif;?>
            <div class="bloc">
                <h3>Date : </h3>
                <p>
                    <?=$project["date_debut"] . " - " . $project["date_defin"]?>
                </p>
            </div>
            <div class="bloc-des">
                <hr>
                <p class="box_des">
                    <?php
                    if ($project["fait_ou"] == "Stage"){
                        echo "<span><b>Informations sur la société</b></span>";
                    }
                    ?>
                    <?=$project["description"]?>
                </p>
                <hr>
            </div>

            <p class="box_tec">
                <?=$project["tec"]?>
            </p>
        </div>
        <div class="img-project">
            <img src="<?='/views/projects/images/' . $project['photo1']?>">
            <img src="<?='/views/projects/images/' . $project['photo2']?>">
            <img src="<?='/views/projects/images/' . $project['photo3']?>">
            <?php if (!empty($project['photo4'])) : ?>
                <img src="<?='/views/projects/images/' . $project['photo4']?>">
            <?php endif;?>
        </div>
    </div>
    <hr>
    <div class="documents">
        <?php if ($project["fait_ou"] != "Stage" && !empty($project["documentation"])) : ?>
        <div class="bloc-document">
            <h4>Documentation : </h4>
            <embed src="<?='/views/projects/images/' . $project["documentation"]?>" type="application/pdf">
        </div>
        <?php endif;?>
    </div>


