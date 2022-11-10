<?php
    $frekuensi = $_POST['frekuensi'];

	// Database connection
	$conn = new mysqli('localhost','root','','kinerjapegawai');
	if($frekuensi == null){
		echo '<script>alert("Lengkapi Frekuensi terlebih dahulu!")</script>';
        echo '<script>window.location="frekuensi.php"</script>';
	}
    else {
		$stmt = $conn->prepare("insert into tb_frekuensi(frekuensi) values(?)");
		$stmt->bind_param("s", $frekuensi);
		$execval = $stmt->execute();
		echo $execval;
		echo '<script>alert("Add Kategori Satuan Successfully...!")</script>';
        echo '<script>window.location="frekuensi.php"</script>';
		$stmt->close();
		$conn->close();
	}
?>
