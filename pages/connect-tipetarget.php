<?php
    $tipe_target = $_POST['tipe_target'];

	// Database connection
	$conn = new mysqli('localhost','root','','kinerjapegawai');
	if($tipe_target == null){
		echo '<script>alert("Lengkapi Tipe Target terlebih dahulu!")</script>';
        echo '<script>window.location="tipe-target.php"</script>';
	}
    else {
		$stmt = $conn->prepare("insert into tb_tipetarget(tipe_target) values(?)");
		$stmt->bind_param("s", $tipe_target);
		$execval = $stmt->execute();
		echo $execval;
		echo '<script>alert("Add Tipe Target Successfully...!")</script>';
        echo '<script>window.location="tipe-target.php"</script>';
		$stmt->close();
		$conn->close();
	}
?>
