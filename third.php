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
if (isset($_POST['submit'])) {
  $n = $_POST['n'];
  header("location:fourth.php?n=$n&id=$productID");
}
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
  <h1>
    <?= $result->CategoryName ?>
  </h1>
  <h1>
    <?= $result->CompanyName ?>
  </h1>
  <h1>
    <?= $result->QuantityPerUnit ?>
  </h1>
  <h1>
    <?= $result->UnitPrice ?>
  </h1>

  <div>
    <form method="post">
      <label for="n">berapa banyak</label>
      <input type="number" name="n" id="n">
      <button type="submit" name="submit">Beli</button>
    </form>
  </div>
</body>

</html>

<?php

?>