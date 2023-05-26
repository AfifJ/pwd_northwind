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
  <form method="get" action="<?= $_SERVER['PHP_SELF'] ?>">
    <ul>
      <?php
      while ($result = $file->fetch_object()) {
        ?>
        <li>
          <a href="second.php?c=<?= $result->CategoryID ?>">
            <?= $result->CategoryName ?>
          </a>
        </li>
        <br>
        <?php
      }
      ?>
    </ul>
  </form>


</body>

</html>