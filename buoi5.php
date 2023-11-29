<?php

if(isset($_POST['user_name'])){
    $user_name = $_POST['user_name'];
}
if(isset($_POST['password'])){
    $password = $_POST['password'];
}

if(isset($user_name)){
    $ket_noi = mysqli_connect("localhost:3308", 'root', "", 'php357') or die("khong ket noi duoc");
    // echo("ok");
        
    $sql = "insert into `user`(`user_name`,`password`) values('".$user_name."','".$password."')";
    // echo($sql);
    mysqli_query($ket_noi, "insert into `user`(`user_name`,`password`) values('".$user_name."','".$password."')");
    //$row = mysqli_fetch_assoc($ket_qua);
    
    // print_r($row = mysqli_fetch_assoc($ket_qua));
    $ket_qua = mysqli_query($ket_noi, "select * from `user`");

    while($row = mysqli_fetch_assoc($ket_qua)){
        echo("<br>");
        print_r($row);
    }  

    mysqli_close($ket_noi);

}


?>

<form method="post">
<table>
    <tr>
        <td>User Name</td>
        <td><input type="text" name="user_name"/></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="text" name="password"/></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" value="Dang ky"/>
            <input type="submit" value="Dang nhap"/>
        </td>
    </tr>
</table>
</form>