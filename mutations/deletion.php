<?php
$user = 'root';
$pass = '';
$db = 'mutations';

$db = new mysqli('localhost', $user, $pass, $db) or die ("unable to connect");

$sql = "SELECT * from mutation where mutation_type='del'";
$result = $db -> query($sql);
if (isset($_POST['submit'])){
	$snp=$_POST['SNP'];
	$sql="SELECT * from mutation where mutation_type='del' and  SNPID='".$snp."'";
	$result = $db -> query($sql);
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Deletion </title>
</head>

<body>
<div class="header">
	<nav>
	<a href="home.html" class ="btn" style="color:white"> Click to go Home </a>
	</nav>
<h1> Mutations in miRNA </h1>
<p> Deletion type mutations occuring in miRNA specifically </p>

</div>

<br>
<br>
<br>
<br>
<center>
		<form action="" method="post">
		<label for="">Enter Deletion-ID:</label>
		<input type="text" name="SNP" >
		<input type="submit" value="Search" name="submit">
	</form>
	<br>
	<br>
</center>

<table>
<tr>
<th> TranscriptID </th>
<th> SNPID </th>
<th> Chromosome </th>
<th> Allele1miR </th>
<th> Allele2miR </th>
</tr>

<?php
if ($result -> num_rows >0 ) {
	while ($row = $result -> fetch_assoc()) {
	echo "<tr><td>" .$row["TransciptID"]."</td><td>".$row["SNPID"]."</td><td>".$row["Chrom"]."</td><td>".$row["Allele1miR"]."</td><td>".$row["Allele2miR"]."</td></tr>";
}
echo"</table>";
}

else {
echo "0 result";
}

$db -> close();
?>

</table>
</body>

<style>
table {
	border-collapse: collapse;
	border spacing: 0;
	margin-left: auto;
  	margin-right: auto;
	font-size: 15px;
	border: 1px solid #ddd;
}

td {
	text-align: left;
	border: 1px solid #ddd;
  	padding: 8px;
}

tr:nth-child(even) {
background-color: #b2dfdb;
}

th {
background-color: #009688 ;
color : white;
text-align: center;
border: 1px solid #ddd;
padding: 8px;
}

tr:nth-child(even):hover {
background-color: #00bfa5;
color: white;
}

tr:nth-child(odd):hover {
background-color: #00bfa5;
color: white;
}


.header {
  padding: 8px;
  text-align: center;
  background: #00695c;
  color: white;
  font-size: 25px;
}

nav {
float : right;
}


</style>
</html>