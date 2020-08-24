<html>
<head>
<title> Books List </title>
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
$books_url = 'https://anapioficeandfire.com/api/books?page=1&pageSize=50';
$curl = curl_init($books_url);
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
	  <li class="active"><a href="./index.php">Books</a></li>
	  <li><a href="./houses.php">Houses</a></li>
	  <li><a href="./characters.php">Characters</a></li>
	</ul>
	 <h2>Books of Blood and Fire</h2>
	 <div class="table-bordered">
	  <table class="table">
		<thead><td hidden>URL</td><td>Name</td><td>ISBN</td><td>authors</td>
		<td>Number Of Pages</td><td>Publisher</td><td>Country</td><td>Media Type</td><td>Number of Characters</td></thead>
		<?php
		foreach($json as $obj){
		   $id = str_replace("https://anapioficeandfire.com/api/books/","",$obj["url"]);
		   echo "<tr>";
		   echo "<td hidden>".$obj["url"]."</td>";
		   echo "<td><a href='books.php/$id' target='blank'>".$obj["name"]."</a></td>";
		   echo "<td>".$obj["isbn"]."</td>";
		   echo "<td>".$obj["authors"][0]."</td>";
		   echo "<td>".$obj["numberOfPages"]."</td>";
		   echo "<td>".$obj["publisher"]."</td>";
		   echo "<td>".$obj["country"]."</td>";
		   echo "<td>".$obj["mediaType"]."</td>";
		   echo "<td>".count($obj["characters"])."</td>";
		   echo "</tr>";
			
		}
		?>
	  </table>
	 
</div> 

</div>
</body>
</html>