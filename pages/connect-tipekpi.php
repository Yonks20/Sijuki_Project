<?php
    $tipe_kpi = $_POST['tipe_kpi'];

	// Database connection
	$conn = new mysqli('localhost','root','','kinerjapegawai');
	if($tipe_kpi == null){
		echo '<script>alert("Lengkapi Tipe KPI terlebih dahulu!")</script>';
        echo '<script>window.location="tipe-kpi.php"</script>';
	}
    else {
		$stmt = $conn->prepare("insert into tb_tipekpi(tipe_kpi) values(?)");
		$stmt->bind_param("s", $tipe_kpi);
		$execval = $stmt->execute();
		echo $execval;
		echo '<script>alert("Add Tipe KPI Successfully...!")</script>';
        echo '<script>window.location="tipe-kpi.php"</script>';
		$stmt->close();
		$conn->close();
	}
?>
