<?php
    $polaritas = $_POST['polaritas'];

	// Database connection
	$conn = new mysqli('localhost','root','','kinerjapegawai');
	if($polaritas == null){
		echo '<script>alert("Lengkapi Polaritas terlebih dahulu!")</script>';
        echo '<script>window.location="polaritas.php"</script>';
	}
    else {
		$stmt = $conn->prepare("insert into tb_polaritas(polaritas) values(?)");
		$stmt->bind_param("s", $polaritas);
		$execval = $stmt->execute();
		echo $execval;
		echo '<script>alert("Add Polaritas Successfully...!")</script>';
        echo '<script>window.location="polaritas.php"</script>';
		$stmt->close();
		$conn->close();
	}
?>
