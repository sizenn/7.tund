<?php
	//id mida muudame
	echo $_GET["edit"];

	//saada kätte kõige uuemad andmed selle id kota
	//numbrimärk ja värv
?>
<h2>Muuda autot</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
  	<label for="number_plate" >auto nr</label><br>
	<input id="number_plate" name="number_plate" type="text" value=""><br><br>
  	<label for="color">värv</label><br>
	<input id="color" name="color" type="text" value=""><br><br>
  	<input type="submit" name="update" value="Salvesta">
  </form>