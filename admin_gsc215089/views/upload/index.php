<?php


    $test = $this->get_all_files();


//    if (isset($_POST["submit"]) && !empty($_FILES["file"]) && $_FILES["file"]["name"][0] != ""){
//        $num_files = count($_FILES["file"]["name"]) ;
//        if ($num_files == 1){
//            $res = $this->send_upload();
//        }else{
//            $res = $this->send_uploads();
//            echo '<script>
//                window.location.href = "upload"
//            </script>';
//        }
//
//    //        echo $test ? 'true' : 'false';
//    //        echo $_FILES["file"]["error"];
//
//
//    }else{
//
//    }
    include 'src/upload.vue';
?>




