<?php
	require_once("../configglobal.php");
	$database = "if15_sizen";

	//loome uue funktsiooni, et küsida ab'ist andmeid
	function getCarData(){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plates WHERE deleted IS NULL");
		echo $mysqli->error;
		$stmt->bind_result($id, $user_id, $number_plate, $color_from_db); 
		
		//võtab eest iga väärtuse ja paneme muutujasse
		$stmt->execute();
		
		// tühi array(massiiv), kuhu pistame abst ühe rea andmeid
		$array = array();
		// tee tsüklit nii mitu korda, kui saad andmebaasist ühe rea andmeid.
		while($stmt->fetch()){
			//loon objekti iga while tsükli kord
			$car = new StdClass();
			$car->id = $id;
			$car->number_plate = $number_plate;
			$car->color = $color_from_db;
			$car->user_id = $user_id;
			//lisame massiivi
			array_push($array, $car);
			//echo "<pre>";
			//var_dump($array);
			//echo "</pre>";
			
		}
		
		$stmt->close();
		$mysqli->close();
		
		return $array;
	}
	function deleteCar($id_to_be_deleted){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("UPDATE car_plates SET deleted=NOW() WHERE id=?");
		$stmt->bind_param("i", $id_to_be_deleted);
		
		if($stmt->execute()){
			//sai edukalt kustutatud
			header("Location: table.php");
			
		}
		
		$stmt->close();
		$mysqli->close;
	}
	
	


?> 
