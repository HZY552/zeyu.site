<div class="title-mesparcours">
    <h3>Mes Parcours</h3>
</div>
<div class="content-mesparcour">
    <?php foreach ($mesparcour as $m) :?>
        <div class="mesparcour">
            <div class="title">
                <h3><?=$m["nom_project"] . " ( " . $m["fait_ou"] . " )"?></h3>
            </div>
            <img src="<?="/views/projects/images/" . $m["photo1"]?>">
            <p><?=$m["description"]?></p>
            <p style="color: #2B66FF;">Date : <?=$m["date_debut"] . " - " . $m["date_defin"]?></p>
            <div class="description">
                <button onclick="open_login(<?="'" . "/projects/id/" . $m['id_project'] . "'"?>)">En Savoir Plus</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>