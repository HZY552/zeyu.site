<?php
   $test = $this->get_All_rar();
?>

<div class="main-content">
    <h3 id="h3_tele">Téléchargement</h3>
    <br>
</div>
<div class="list-download">
    <table>

        <?php foreach ($test as $t) :?>
            <tr>
                <td>
                    <a href="<?="/downloads/infofile/" . substr($t,0,strrpos($t,'.')) ?>" class="a_dow">
                        <?php
                        echo $t;
                        ?>
                    </a>
                </td>
                <td>
                    <?php
                    $path = dirname(__FILE__) . "\\file_downloads\\" . $t;

                    $size = filesize($path) / pow(1024,3);
                    if ($size > 0.99){
                        echo round($size,2). " GB";
                    }elseif ($size > 0.1 && $size <= 0.99){
                        echo round($size * 1024,2) . " MB";
                    }else{
                        echo round($size * 1024 *1024,2) . " KB";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $path = dirname(__FILE__) . "\\file_downloads\\" . $t;

                    echo date ("Y-m-d H:i:s",filemtime($path));
                    ?>
                </td>
                <td>
                    <a href="<?= "/views/downloads/file_downloads/" . $t ?>" class="a_dow">
                        <button class="button_dow">
                            <span class="span_dow">Télécharger</span>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-download" viewBox="0 0 16 16" style="display: flex;">
                                    <path d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
                                    <path d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                                </svg>
                            </div>
                        </button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>
