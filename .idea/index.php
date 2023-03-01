<?php

    $log = fopen('C:\xampp\apache\logs\access.log','r') or die("File no found ! ");
    if ($log){
        $i = 0;
        $ip_echo = [];
        $date_echo = [];
        $function_echo = [];
        while (($log_read = fgets($log,1024)) !== false){
            $ip = substr($log_read,0,strrpos($log_read,'['));
            $function = substr(strrchr($log_read,']'),1);
            preg_match("/(?:\[)(.*)(?:\])/i",$log_read, $date);
            array_push($ip_echo,str_replace('-',"",$ip));
            array_push($date_echo,$date);
            array_push($function_echo,str_replace('-',"",$function));
            // echo $date_echo[$i][0] . '</br>';
            // var_dump($log_read);
            $i++;
        }
        fclose($log);
    }

    function get_ip($ip){      
        $loc = file_get_contents("https://www.iplocate.io/api/lookup/".$ip);
        return json_decode($loc);
    }
?>  

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<style>
    html,body{
        width:99%;
        height:auto;
    }

    table{
        display: flex;
        /* justify-content: center; */
        max-width: 100%;
        max-height: 94vh;
        overflow-x: auto;
        overflow-y: auto;
    }

    tr{
        max-width: 100%;
    }

    td{
        padding: 5px 5px;
        overflow: hidden;
    }

    div{
        display: flex;
        max-width: 80%;
        align-items: center;
        overflow: auto;
        justify-content: center;
        flex-direction: row;
        margin: 0 auto;
    }

    .green{
        color:green;
    }

    .red{
        color:red;
    }

</style>
<body>
    <div>
        <table border="1" cellspacing="0" cellpadding="0">
            <tr>
                <th>ID</th>
                <th>IP</th>
                <th>DATE</th>
                <th>STATUTS</th>
            </tr>
            <?php 
            $z = ($i-1);
            while ($z >= 0){
                $date_str = $date_echo[$z][0];
                // $country = get_ip($ip_echo[$z])->country;
                $ip_str = $ip_echo[$z];
                if (substr(trim($ip_echo[$z]),0,3) === "172"){
                    echo "<tr>
                        <td class='green' style='max-width:150px;'>$z</td>
                        <td class='green' style='max-width:150px;'>$ip_str</td>
                        <td class='green' style='max-width:250px;'>$date_str</td>
                        <td class='green' style='max-width:250px;'>$function_echo[$z]</td>
                    </tr>
                    ";
                }else{
                    echo "<tr>
                        <td class='red' style='max-width:150px;'>$z</td>
                        <td class='red' style='max-width:150px;'>$ip_str</td>
                        <td class='red' style='max-width:250px;'>$date_str</td>
                        <td class='red' style='max-width:250px;'>$function_echo[$z]</td>
                    </tr>
                    ";
                }
                
                
                if ($z < $i-5000){
                    break;
                }
                $z--;
                
            }
        ?>
        </table>
        
    </div>
</body>
</html>