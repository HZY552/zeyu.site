<?php
session_start();
global $username;
$username = $_SESSION['username'];
if (isset($_SESSION['token'])){
    $res = $this->GetUser($_SESSION['token']);
}else{
    header("location: /");
}

if (isset($_POST['submit'])){
    user_exit();
}

function user_exit(){
    session_destroy();
    setcookie('username','');
    header("location: /");
}

?>

<div style="display: flex; flex-direction: column; justify-content: center;align-items: center;gap: 10px;width: 100%; margin-top: 50px;">
    <div style="display: flex;flex-direction: row;justify-content: center;align-items: center;width: 100%;gap: 10px;">
        <label>Email : </label>
        <input type="text" value="<?=$res['email']?>">
    </div>
    <div style="display: flex;flex-direction: row;justify-content: center;align-items: center;width: 100%;gap: 10px;">
        <label>Nom : </label>
        <input type="text" value="<?=$res['nom']?>">
    </div>
    <div style="display: flex;flex-direction: row;justify-content: center;align-items: center;width: 100%;gap: 10px;">
        <label>Date de inscription : </label>
        <input type="text" value="<?=$res['dateinscription']?>">
    </div>
    <form method="post" action="">
        <input type="submit" name="submit" value="Déconnecter" style="cursor: pointer;width: 200px;">
    </form>

</div>

