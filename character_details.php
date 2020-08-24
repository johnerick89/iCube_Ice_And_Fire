<html>
<head>
<title> Characters List </title>
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
$url = 'https://anapioficeandfire.com/api/characters/'.$id;
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
	  <li><a href="./index.php">Books</a></li>
	  <li><a href="./houses.php">Houses</a></li>
	  <li  class="active"><a href="./characters.php">Characters</a></li>
	</ul>
	 <h1>Character Detail</h1>
	 <div class="table-bordered">
	  <table class="table">
		<?php
			
		   echo "<tr><td>Name </td><td>".$json["name"]."</td></tr>";
		   echo "<tr><td>Aliases </td><td>".implode(", ",$json["aliases"])."</td></tr>";
		   echo "<tr><td>Gender </td><td>".$json["gender"]."</td></tr>";
		   echo "<tr><td>Culture </td><td>".$json["culture"]."</td></tr>";
		   echo "<tr><td>Born </td><td>".$json["born"]."</td></tr>";
		   echo "<tr><td>Died </td><td>".$json["died"]."</td></tr>";
		   echo "<tr><td>Titles </td><td>".implode(", ",$json["titles"])."</td></tr>";
		   echo "<tr><td>Father </td><td>".$json["father"]."</td></tr>";
		   echo "<tr><td>Mother </td><td>".$json["mother"]."</td></tr>";
		   echo "<tr><td>Spouse </td><td>".$json["spouse"]."</td></tr>";
		   echo "<tr><td>Allegiances </td><td>".implode(", ",$json["allegiances"])."</td></tr>";
		   echo "<tr><td>Books </td><td>".implode(", ",$json["books"])."</td></tr>";
		   echo "<tr><td>Pov Books </td><td>".implode(", ",$json["povBooks"])."</td></tr>";
		   echo "<tr><td>Tv Series </td><td>".implode(", ",$json["tvSeries"])."</td></tr>";
		   echo "<tr><td>Played By </td><td>".implode(", ",$json["playedBy"])."</td></tr>";
		   
			
		
		?>
	  </table>
	  
</div> 

</div>
</body>
</html>