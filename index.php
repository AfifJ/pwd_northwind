<?php
include "fun.php";
$conn = nwconnect();
$q = "select * from categories";
$file = $conn->query($q);

$response = "";


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="" rel="stylesheet" />
  <title>Northwind</title>
</head>

<body>
  <h1>Product Category</h1>
  <ul>
    <?php
    while ($result = $file->fetch_object()) {
      ?>
      <li>
        <form method="post" action="second.php">
          <input type="hidden" name="produkID" id="produkID" value="<?= $result->CategoryID ?>">
          <input type="submit" value="<?= $result->CategoryName ?>">
          </a>
        </form>
      </li>
      <br>
      <?php
    }
    ?>
  </ul>


</body>

</html>