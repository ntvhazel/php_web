<?php
require_once("./connect.php");
$stmt = $conn->prepare("SELECT * FROM book_manager WHERE id = :id");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
if (isset($_GET["id"])) {
    $stmt->execute(array("id" => $_GET["id"]));
}
$rows = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sách</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-3">
        <h1>Quản lý sách</h1>
        <form action="editAction.php" method="post" autocomplete="off">
            <div class="input-group mb-2">
                <input readonly type="text" name="id" class="form-control" id="inlineFormInputGroup"
                value="<?php echo isset($rows[0]["id"]) ? $rows[0]["id"] : ""?>">
            </div>
            <div class="input-group mb-2">
                <input required type="text" name="book_name" class="form-control" id="inlineFormInputGroup"
                    placeholder="Nhập tên sách" value="<?php echo isset($rows[0]["book_name"]) ? $rows[0]["book_name"] : ""?>">
                <span>
                    <?php echo isset($err["book_name"]) ? $err["book_name"] : ""; ?>
                </span>
            </div>
            <div class="input-group mb-2">
                <input required type="text" name="author" class="form-control" id="inlineFormInputGroup"
                    placeholder="Nhập tên tác giả" value="<?php echo isset($rows[0]["author"]) ? $rows[0]["author"] : ""?>">
                <span>
                    <?php echo isset($err["author"]) ? $err["author"] : ""; ?>
                </span>
            </div>
            <div class="input-group mb-2">
                <input required type="text" name="publish_year" class="form-control" id="inlineFormInputGroup"
                    placeholder="Nhập năm xuất bản sách" value="<?php echo isset($rows[0]["publish_year"]) ? $rows[0]["publish_year"] : ""?>">
                <span>
                    <?php echo isset($err["publish_year"]) ? $err["publish_year"] : ""; ?>
                </span>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Chỉnh sửa</button>
        </form>
</body>

</html>

