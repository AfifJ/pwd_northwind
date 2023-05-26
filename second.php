<?php
include 'fun.php';
$conn = nwconnect();

/* Halaman kedua menampilkan daftar produk untuk kategori 
tertentu. Halaman ini menampilkan informasi productid, 
productname dan unitprice. Productname bisa diklik menuju 
halaman ketiga. */
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="" rel="stylesheet" />
  <title></title>
</head>

<body>
  <h1></h1>


  <div>OUTPUT</div>
  <?php
  if (isset($_POST['produkID'])) {
    $categoryID = $_POST['produkID'];
    $categoryName = $conn
      ->query("select CategoryName from categories where CategoryID = '$categoryID'")
      ->fetch_object()
      ->CategoryName;
    ?>
    <div>
      <?= $categoryName ?>
    </div>
    <br>

    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Unit</th>
        <th>Price</th>
      </tr>
      <?php
      $q = "select * from products where CategoryID = '$categoryID'";
      if ($results = $conn->query($q))
        while ($result = $results->fetch_object()) {

          ?>
          <tr>
            <td>
              <?= $result->ProductID ?>
            </td>
            <td>
              <a href="third.php?p=<?= $result->ProductID ?>">
                <?= $result->ProductName ?>
              </a>
            </td>
            <td>
              <?= $result->QuantityPerUnit ?>
            </td>
            <td>
              <?= number_format($result->UnitPrice,2)." USD" ?>
            </td>
          </tr>
          <?php
        }
  }
  ?>
  </table>

</body>

</html>