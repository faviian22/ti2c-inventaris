
<?php
include 'db.php';

$query = "SELECT * FROM barang";
$result = mysqli_query($db, $query);

if (!$result) {
    die("Query error: " . mysqli_error($db));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Data Barang</title>
</head>
<body> <title>List Barang</title>
    <style>
       body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

h2 {
  text-align: center;
  animation: fade-in 1s ease-in-out;
}

table {
  width: 100%;
  border-collapse: collapse;
  animation: slide-in 1s ease-in-out;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
  animation: fade-in 1s ease-in-out;
}

tr:hover {
  background-color: #f2f2f2;
  animation: pulse 1s ease-in-out;
}

.back-btn {
  text-align: center;
  margin-top: 20px;
  animation: fade-in 1s ease-in-out;
}

.back-btn a {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  text-decoration: none;
  display: inline-block;
  border-radius: 5px;
  animation: shake 0.5s ease-in-out;
}

.back-btn a:hover {
  background-color: #45a049;
  animation: none;
}

@keyframes fade-in {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@keyframes slide-in {
  0% {
    transform: translateY(50px);
  }
  100% {
    transform: translateY(0);
  }
}

@keyframes pulse {
  0% {
    background-color: #f2f2f2;
  }
  50% {
    background-color: #e6e6e6;
  }
  100% {
    background-color: #f2f2f2;
  }
}

@keyframes shake {
  0% {
    transform: translate(1px, 1px) rotate(0deg);
  }
  10% {
    transform: translate(-1px, -2px) rotate(-1deg);
  }
  20% {
    transform: translate(-3px, 0px) rotate(1deg);
  }
  30% {
    transform: translate(3px, 2px) rotate(0deg);
  }
  40% {
    transform: translate(1px, -1px) rotate(1deg);
  }
  50% {
    transform: translate(-1px, 2px) rotate(-1deg);
  }
  60% {
    transform: translate(-3px, 1px) rotate(0deg);
  }
  70% {
    transform: translate(3px, 1px) rotate(-1deg);
  }
  80% {
    transform: translate(-1px, -1px) rotate(1deg);
  }
  90% {
    transform: translate(1px, 2px) rotate(0deg);
  }
  100% {
    transform: translate(1px, -2px) rotate(-1deg);
  }
}
    </style>
    <h2>List Barang</h2>
    <table border="1">
        <tr>
            <th>kode</th>
            <th>nama</th>
            <th>jumlah</th>
            <th>merek</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['kode'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['jumlah'] . "</td>";
            echo "<td>" . $row['merek'] . "</td>";
        }
        ?>
    </table>
</body>
</html>
<div class="back-btn">
        <a href="input data.html">Tambah Barang</a>
    </div>
<?php
mysqli_close($db);
?>
