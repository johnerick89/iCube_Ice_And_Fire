<html>
<head>
<title> Houses List </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
</head>
<body>
<?php
/*
* Fetch all books, houses and characters
*/
//Fetch books
$id =basename($_SERVER['REQUEST_URI']);
$url = 'https://anapioficeandfire.com/api/houses/'.$id;
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'Content-Type: application/json'
]);
$response = curl_exec($curl);
curl_close($curl);
//var_dump(json_decode($response . PHP_EOL));
$json = $response . PHP_EOL;
$json = json_decode($json, TRUE);
//var_dump($json);


?>
	<div class="container">
	<ul class="nav nav-tabs">
	  <li><a href="index.php">Books</a></li>
	  <li class="active"><a href="houses.php">Houses</a></li>
	  <li><a href="characters.php">Characters</a></li>
	</ul>
	 <h1>House Details</h1>
	 <div class="table-bordered">
	  <table class="table">
		<?php
		   echo "<tr><td>Name</td><td>".$json["name"]."</td></tr>";
		   echo "<tr><td>Region</td><td>".$json["region"]."</td></tr>";
		   echo "<tr><td>Coat Of Arms</td><td>".$json["coatOfArms"]."</td></tr>";
		   echo "<tr><td>words</td><td>".$json["words"]."</td></tr>";
		   echo "<tr><td>titles</td><td>".implode(", ",$json["titles"])."</td></tr>";
		   echo "<tr><td>seats</td><td>".implode(", ",$json["seats"])."</td></tr>";
		   echo "<tr><td>currentLord</td><td>".$json["currentLord"]."</td></tr>";
		   echo "<tr><td>heir</td><td>".$json["heir"]."</td></tr>";
		   echo "<tr><td>overlord</td><td>".$json["overlord"]."</td></tr>";
		   echo "<tr><td>founded</td><td>".$json["founded"]."</td></tr>";
		   echo "<tr><td>founder</td><td>".$json["founder"]."</td></tr>";
		   echo "<tr><td>diedOut</td><td>".$json["diedOut"]."</td></tr>";
		   echo "<tr><td>ancestralWeapons</td><td>".implode(", ",$json["ancestralWeapons"])."</td></tr>";
		   echo "<tr><td>cadetBranches</td><td>".implode(", ",$json["cadetBranches"])."</td></tr>";
		   echo "<tr><td>swornMembers</td><td>".implode(", ",$json["swornMembers"])."</td></tr>";
		
		?>
	  </table>
	  
</div> 

</div>
</body>
</html>