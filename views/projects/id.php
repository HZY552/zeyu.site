
    <h3>
        <?=$project["nom_project"]?>
    </h3>
    <?php if($project["nom_project"] == "FastFood") : ?>
        <p style="text-align: center;width: 100%;color: red;">Projet En Cours ... </p>
    <?php endif; ?>
    <hr style="width: 100%;">
    <a href="<?=$project["url_project"]?>">
        URL : <?=$project["url_project"]?>
    </a>
    <?php if(!empty($project["github"])) :?>
    <a href="<?=$project["github"]?>">
            GitHub : <?=$project["github"]?>
    </a>
    <?php endif;?>
    <h4><?=$project["fait_ou"]?></h4>
    <p>
        <?=$project["date_debut"] . " - " . $project["date_defin"]?>
    </p>
    <hr style="width: 100%;">
    <p class="box_des">
        <?php
            if ($project["fait_ou"] == "Stage"){
                echo "<span><b>Informations sur la société</b></span>";
            }
        ?>
        <?=$project["description"]?>
    </p>
    <hr style="width: 100%;">
    <p class="box_tec">
        <?=$project["tec"]?>
    </p>
    <?php if ($project["fait_ou"] != "Stage" && !empty($project["documentation"])) : ?>
        <hr style="width: 100%;">
        <h4>Documentation</h4>
        <embed src="<?='/views/projects/images/' . $project["documentation"]?>" type="application/pdf">
        <hr style="width: 100%;">
    <?php endif;?>

    <div class="box-img">
        <h4 style="margin-top: 20px;">Images</h4>
        <img src="<?='/views/projects/images/' . $project['photo1']?>">
        <img src="<?='/views/projects/images/' . $project['photo2']?>">
        <img src="<?='/views/projects/images/' . $project['photo3']?>">
        <?php if (!empty($project['photo4'])) : ?>
            <img src="<?='/views/projects/images/' . $project['photo4']?>">
        <?php endif;?>
    </div>
