<h3 class="title">Upload</h3>
<div class="box-table">
  <table class="table-fill">
    <thead>
      <tr>
        <th>Name : </th>
        <th>Size : </th>
        <th>Last update : </th>
        <th>Status : </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($test as $t) : ?>
        <tr>
            <td>
              <p><?php
                echo $t;
                ?></p>
            </td>
            <td>
              <?php
                 $path = dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '\\views\\downloads\\file_downloads\\' . $t;

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
                 $path = dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '\\views\\downloads\\file_downloads\\' . $t;

                 echo date ("Y-m-d H:i:s",filemtime($path));
                 ?>
            </td>
            <td style="display: flex;">
              <button class="button-del">Delete</button>
            </td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
<hr class="hr-s">
<div class="upload-box" id="upload">
  <button @click="click_upload">test</button>
</div>
