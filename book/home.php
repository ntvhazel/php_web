<?php
require_once "./Connect.php";

$stmt = $conn->prepare("SELECT * FROM book_manager ");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$response = $stmt->fetchAll();
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
        <form action="manage.php" method="post" autocomplete="off">
            <div class="input-group mb-2">
                <input required type="text" name="book_name" class="form-control" id="inlineFormInputGroup"
                    placeholder="Nhập tên sách">
                <span>
                    <?php echo isset($err["book_name"]) ? $err["book_name"] : ""; ?>
                </span>
            </div>
            <div class="input-group mb-2">
                <input required type="text" name="author" class="form-control" id="inlineFormInputGroup"
                    placeholder="Nhập tên tác giả">
                <span>
                    <?php echo isset($err["author"]) ? $err["author"] : ""; ?>
                </span>
            </div>
            <div class="input-group mb-2">
                <input required type="text" name="publish_year" class="form-control" id="inlineFormInputGroup"
                    placeholder="Nhập năm xuất bản sách">
                <span>
                    <?php echo isset($err["publish_year"]) ? $err["publish_year"] : ""; ?>
                </span>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Thêm</button>
            <button type="reset" class="btn btn-danger mt-3">Hủy</button>
        </form>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sách</th>
                    <th scope="col">Tác giả</th>
                    <th scope="col">Năm xuất bản</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($response as $row) { ?>
                    <tr>
                        <td>
                            <?php echo $row["id"]; ?>
                        </td>
                        <td>
                            <?php echo $row["book_name"]; ?>
                        </td>
                        <td>
                            <?php echo $row["author"]; ?>
                        </td>
                        <td>
                            <?php echo $row["publish_year"]; ?>
                        </td>
                        <td style="display: flex; flex-direction: row; gap: 10px;">
                            <a class="btn btn-primary" href="./edit.php?id=<?php echo $row["id"] ?>">
                                Edit
                            </a>
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Edit on popup
                            </button>
                            <a class=" btn btn-danger" href="./deleteAction.php?id=<?php echo $row["id"] ?>">
                                Remove
                            </a>
                        </td>
                    </tr>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="editAction.php" method="post" autocomplete="off">
                                        <div class="input-group mb-2">
                                            <input readonly type="text" name="id" class="form-control"
                                                id="inlineFormInputGroup"
                                                value="<?php echo isset($row["id"]) ? $row["id"] : "" ?>">
                                        </div>
                                        <div class="input-group mb-2">
                                            <input required type="text" name="book_name" class="form-control"
                                                id="inlineFormInputGroup" placeholder="Nhập tên sách"
                                                value="<?php echo isset($row["book_name"]) ? $row["book_name"] : "" ?>">
                                            <span>
                                                <?php echo isset($err["book_name"]) ? $err["book_name"] : ""; ?>
                                            </span>
                                        </div>
                                        <div class="input-group mb-2">
                                            <input required type="text" name="author" class="form-control"
                                                id="inlineFormInputGroup" placeholder="Nhập tên tác giả"
                                                value="<?php echo isset($row["author"]) ? $row["author"] : "" ?>">
                                            <span>
                                                <?php echo isset($err["author"]) ? $err["author"] : ""; ?>
                                            </span>
                                        </div>
                                        <div class="input-group mb-2">
                                            <input required type="text" name="publish_year" class="form-control"
                                                id="inlineFormInputGroup" placeholder="Nhập năm xuất bản sách"
                                                value="<?php echo isset($row["publish_year"]) ? $row["publish_year"] : "" ?>">
                                            <span>
                                                <?php echo isset($err["publish_year"]) ? $err["publish_year"] : ""; ?>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>
        <?php if (sizeof($response) == 0) { ?>
            <h2>Nothing to see here people!</h2>
        <?php } ?>
    </div>




</body>

</html>