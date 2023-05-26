<?php
include 'fun.php';
$conn = nwconnect();
if (!isset($_GET['p']))
  header("location:index.php");
$productID = $_GET['p'];

$q = "select products.*, categories.CategoryName, suppliers.CompanyName from products inner join categories on products.CategoryID = categories.CategoryID inner join suppliers on suppliers.SupplierID = products.SupplierID where products.ProductID = $productID";
$result = $conn
  ->query($q)
  ->fetch_object();
session_start();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="" rel="stylesheet" />
  <title>Buy</title>
</head>

<body>
  <h1>
    <?= $result->ProductName ?>
  </h1>
  <table>
    <tr>
      <td>Category : </td>
      <td>
        <?= $result->CategoryName ?>
      </td>
    </tr>
    <tr>
      <td>Supplier</td>
      <td>
        <?= $result->CompanyName ?>
      </td>
    </tr>
    <tr>
      <td>Quantity per unit</td>
      <td>
        <?= $result->QuantityPerUnit ?>
      </td>
    </tr>
    <tr>
      <td>Unit Price</td>
      <td>
        <?= $result->UnitPrice ?>
      </td>
    </tr>

  </table>

  <div>
    <form method="post" action="fourth.php">
      <label for="jumlah">Jumlah</label>
      <input type="number" name="jumlah" id="jumlah" value="1">
      <input type="hidden" name="namaproduk" id="namaproduk" value="<?= $result->ProductName ?>">
      <input type="hidden" name="harga" id="harga" value="<?= $result->UnitPrice ?>">
      <input type="hidden" name="kategori" id="kategori" value="<?= $result->CategoryName ?>">
      <input type="hidden" name="supplier" id="supplier" value="<?= $result->CompanyName ?>">
      <input type="hidden" name="quantityperunit" id="quantityperunit" value="<?= $result->QuantityPerUnit ?>">
      <button type="submit" name="addToCart">Beli</button>
    </form>
  </div>

</body>

</html>

<?php

?>