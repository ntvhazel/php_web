<?php
    session_start();
    if ($_SESSION["username"] === "admin"){
        $option = array(1, 2, 3, 4, 5, 6);
        $list_major = array("Cơ khí", "Điện - Điện tử", "Xây dựng");
        $err = array(
            "uname" => "",
            "phone"=> ""
        );
        $uname = isset($_POST["user_name"]) ? $_POST["user_name"] : "";
        $phone = isset($_POST["user_phone"]) ? $_POST["user_phone"] : "";
        $umajor = isset($_POST["major"]) ? $_POST["major"] : "";
        $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
        $subject = isset($_POST["subject"]) ? $_POST["subject"] : array();
    } else {
        header("location:buoi1.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" style="padding-bottom: 100px;">
        <label for="user_name">Tên tài khoản<span style="color: red;"></span>: </label>
        <input name="user_name" type="text"><br>
        <label for="user_phone">Số điện thoại<span style="color: red;"></span>: </label>
        <input name="user_phone" type="number"><br>
        <label for="gender">Nam:</label>
        <input name="gender" type="radio" value="male">
        <label for="gender">Nữ: </label>
        <input name="gender" type="radio" value="female"><br>
        <label for="major">Chuyên ngành:</label>
        <select name="major">
            <option selected></option>
            <?php 
                foreach($list_major as $major){
                    echo "<option>".$major."</option>";
                }
            ?>
        </select><br>

        <label for="subject">Đăng ký môn học: </label><br>
        <input type="checkbox" name="subject[]" value="Trường điện từ">Trường điện từ
        <input type="checkbox" name="subject[]" value="Kỹ thuật số">Kỹ thuật số
        <input type="checkbox" name="subject[]" value="IoT">IoT
        <br>


        <button type="submit">Đăng ký</button>
        <button type="reset">Nhập lại</button>
    </form>

</body>
</html>


