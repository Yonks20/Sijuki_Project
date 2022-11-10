<?php
    $kategori_satuan = $_POST['kategori_satuan'];

	// Database connection
	$conn = new mysqli('localhost','root','','kinerjapegawai');
	if($kategori_satuan == null){
		echo '<script>alert("Lengkapi Kategori Satuan terlebih dahulu!")</script>';
        echo '<script>window.location="kategori-satuan.php"</script>';
	}
    else {
		$stmt = $conn->prepare("insert into tb_kategori(kategori_satuan) values(?)");
		$stmt->bind_param("s", $kategori_satuan);
		$execval = $stmt->execute();
		echo $execval;
		echo '<script>alert("Add Kategori Satuan Successfully...!")</script>';
        echo '<script>window.location="kategori-satuan.php"</script>';
		$stmt->close();
		$conn->close();
	}
?>
