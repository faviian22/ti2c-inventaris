
<?php
include 'db.php';

// Cek apakah data di submit melalui POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir
    $kode = filter_input(INPUT_POST, 'kode', FILTER_SANITIZE_NUMBER_INT);
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $jumlah = filter_input(INPUT_POST, 'jumlah', FILTER_SANITIZE_STRING);
    $merek = filter_input(INPUT_POST, 'merek', FILTER_SANITIZE_STRING);

    // Siapkan query untuk memasukkan data ke database
    $query = "INSERT INTO barang (kode, nama, jumlah, merek)
                VALUES (?, ?, ?, ?)";

    // Siapkan statement
    $stmt = mysqli_prepare($db, $query);

    // Bind parameter ke statement
    mysqli_stmt_bind_param($stmt, "ssss", $kode, $nama, $jumlah, $merek);

    // Jalankan query
    if (mysqli_stmt_execute($stmt)) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
}
header("Location: list.php");
mysqli_close($db);
?>
