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

$url = 'https://anapioficeandfire.com/api/houses?page=1&pageSize=50';
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
	 <h1>Houses of Blood and Fire</h1>
	 <div class="table-bordered">
	  <table class="table">
		<thead><td hidden>URL</td><td>Name</td><td>Region</td><td>Coat Of Arms</td></thead>
		<?php
		foreach($json as $obj){
		   $id = str_replace("https://anapioficeandfire.com/api/houses/","",$obj["url"]);
		   echo "<tr>";
		   echo "<td hidden>".$obj["url"]."</td>";
		   echo "<td><a href='house_details.php/$id' target='blank'>".$obj["name"]."</a></td>";
		   echo "<td>".$obj["region"]."</td>";
		   echo "<td>".$obj["coatOfArms"]."</td>";
		   echo "</tr>";
			
		}
		?>
	  </table>
	  <ul class="pager">
		  <li class="previous"><a href="#">Previous</a></li>
		  <li class="next"><a href="#">Next</a></li>
		</ul> 
</div> 

</div>
</body>
</html>