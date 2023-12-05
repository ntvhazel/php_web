<?php 
      require_once("./connect.php");
      $stmt = $conn->prepare("SELECT * FROM authen_user ");
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
      $response = $stmt->fetchAll();
?>

      <!DOCTYPE html>
      <html>
      <head>
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
      <style>
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {
        background-color: #dddddd;
      }
      </style>
      </head>
      <body>

      <h2>HTML Table</h2>
      <form action="./logout.php" method="post">
        <input type="hidden" name="action" value="logout">
        <button type="submit" class="btn btn-danger">Log out</button>
      </form>
      <table class="mt-3">
        <thead>
          <tr>
            <td>STT</td>
            <td>Tên người dùng</td>
            <td>Mật khẩu</td>
            <td>SĐT</td>
          </tr>
        </thead>

        <tbody>
        <?php 
          foreach ($response as $row){
        ?>
            <tr>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['user_name'] ?></td>
              <td><?php echo $row['pwd'] ?></td>
              <td><?php echo $row['phone'] ?></td>
            </tr>
        <?php }
        ?>
        
        </tbody>
      </table>
      <?php if (sizeof($response) == 0) { ?>
                  <h2>Nothing to see here people!</h2>
              <?php } ?>

      </body>
      </html>




