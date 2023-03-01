

    <?php foreach ($article as $articles): ?>
    <div style="margin-top: 50px;">
        <div style="display: flex;flex-direction: row;align-items: center;">
            <label>Title : </label>
            <h3><a href= "<?=$this->getClassName()?>/title/<?=$articles['title']?>"> <?=$articles['title']?></a></h3>
        </div>
        <div style="display: flex;flex-direction: row;align-items: center;">
            <label>ID : </label>
            <p><a href="<?=$this->getClassName()?>/id/<?=$articles['id']?>"> <?=$articles['id']?></a></p>
        </div>
        <div style="display: flex;flex-direction: row;align-items: center;">
            <label>Content : </label>
            <p><?=$articles['content']?></p>
        </div>
        <div style="display: flex;flex-direction: row;align-items: center;">
            <label>Date : </label>
            <time><?=$articles['date']?></time>
        </div>

    </div>
    <?php endforeach; ?>










