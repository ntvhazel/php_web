<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm</title>
</head>
<body>
    <?php
        echo $_POST["username"] != "" && $_POST["pwd"] != "" ? "Username: " .$_POST["username"]. "<br>" : 
        "<h1>Invalid action, redirecting ... <span></span></h1>
        <script>
            setTimeout(() => {
                window.location.replace('login.php')
            }, 1000)
        </script>";
    ?>
</body>
</html>