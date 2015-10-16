<?php


	require_once("functions.php");
	require_once("edit_functions.php");
	
	//kasutaja tahab midagi muuta
	if(isset($_POST["update"])){
		updateCar($_POST["id"], $_POST["number_plate"], $_POST["color"]);
	}
	
	//kas kasutaja tahab kustutada
	//kas aadressireal on ?delete=?!?!!!?!
	if(isset($_GET["delete"])){
		
		//saadan kaasa id mida kustutada
		deleteCar($_GET["delete"]);
		
	}
	
	$car_list = getCarData();
	
	



?>
<table border= 1>
	<tr>
		<th>id</th>
		<th>user_id</th>
		<th>auto nr märk</th>
		<th>auto värv</th>
		<th>X</th>
		<th>Edit</th>
	</tr>
	<?php
		//iga massiivis oleva elemendi kohta
		//count($car_list) - massiivi pikkus
		for($i = 0; $i < count($car_list); $i++){
			//$i = $i + 1  ==  $i =+ 1  ==o   $i++
			
			// kui on see rida, mida kasutaja tahab muuta, siis kuvan input välja
			if(isset($_GET["edit"]) && $car_list[$i]->id == $_GET["edit"]){
				//kasutajale muutmiseks
				echo "<tr>";
					echo "<form action=table.php method='post'>";
						echo "<td>".$car_list[$i]->id."</td>";
						echo "<td>".$car_list[$i]->user_id."</td>";
						echo "<td><input type='hidden' name='id' value='".$car_list[$i]->id."'></td>";
						echo "<td><input name='number_plate' value='".$car_list[$i]->number_plate."'></td>";
						echo "<td><input name='color' value='".$car_list[$i]->color."'></td>";
						echo "<td><input type='submit' name='update'></td>";
						echo "<td><a href='table.php'>cancel</a></td>";

					echo "</form";
					
				echo "</tr>";
				
				
			}else{
				//tavaline rida
				echo "<tr>";
			
				echo "<td>".$car_list[$i]->id."</td>";
				echo "<td>".$car_list[$i]->user_id."</td>";
				echo "<td>".$car_list[$i]->number_plate."</td>";
				echo "<td>".$car_list[$i]->color."</td>";
				echo "<td><a href='?delete=".$car_list[$i]->id."'>X</td>";
				echo "<td><a href='?edit=".$car_list[$i]->id."'>Edit</td>";
				echo "<td><a href='edit.php?edit=".$car_list[$i]->id."'>edit.php</td>";
				
				echo "</td>"; 
			}
			
		}
	
	?>
	
	
	
</table>