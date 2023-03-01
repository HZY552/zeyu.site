<?php

    if (isset($_POST["submit"]) && !empty($_FILES["file"])){
        $num_files = count($_FILES["file"]["name"]) ;

        if ($num_files == 1){
            $test = $this->send_upload();
        }else{
            $test2 = $this->send_uploads();
        }

//        echo $test ? 'true' : 'false';
//        echo $_FILES["file"]["error"];


    }

?>


<div class="uploads">
    <form method="post" enctype="multipart/form-data">
        <div class="group-input">
            <input type="file" name="file[]" id="file" value="ch" multiple="multiple">
        </div>
        <input type="submit" name="submit" value="提交">
    </form>
    <table class="group-info" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <td>name</td>
                <td>Size</td>
                <td>Date</td>
                <td>Statut</td>
            </tr>
        </thead>
        <?php if (!empty($_FILES))
        {
            for($i = 0;$i<=count($_FILES["file"]["name"])-1;$i++) :?>
                <tr class="info">
                    <td><?=$_FILES["file"]["name"][$i]?></td>
                    <td><?=$this->convert_size($_FILES["file"]["size"][$i])?></td>
                    <td><?=date("Y-m-d H:i:s",time())?></td>
                    <td><?="Done"?></td>
                </tr>
            <?php endfor;
        }?>
    </table>


</div>
