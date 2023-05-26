<?php
/* Halaman keempat adalah halaman shopping cart tersebut. Halaman ini akan menampilkan semua produk yang akan dibeli beserta info jumlah, subtotal dan total harga nya. (clue: gunakan session management) */
session_start();
/* if (!isset($_SESSION['n'])) {
  header("location:index.php");
}
if (isset($_POST['submit'])) {
  session_destroy();
  header("header:index.php");
} */
$id = $_GET['id'];
$n = $_GET['n'];
$newOrder = (object) [
  "id" => $id,
  "quantity" => $n
];
$_SESSION['cart'] = [];
array_unshift($_SESSION['cart'], $newOrder);

if (isset($_POST['checkout'])) {
  session_unset();
}

// if (isset($_SESSION['cart']))
// var_dump($_SESSION['cart']);

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="" rel="stylesheet" />
  <title>Cart</title>
</head>

<body>
  <a href="index.php">back</a>
  <h1>Your Cart</h1>

  <form action="" method="post">
    <button type="submit" name="checkout">end session</button>
  </form>

</body>

</html>