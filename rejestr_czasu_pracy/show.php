﻿<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"pl-PL\">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"> 
    <title>Rezultat zapytania</title>
	

</head>

<body>  
<a href="add.html">Dodaj Pracownika</a>

<a href="show.php">Pokaż Pracownikow</a> 

<a href="index.php">Strona Glowna</a> 


<table width="900" align="center" border="1" bordercolor="#d5d5d5" cellpadding="0" cellspacing="0">     
<tr>
<?php 

ini_set("display_errors", 0);
require_once 'dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password)
or DIE("COULD NOT CONNECT");
mysqli_query($polaczenie, "SET CHARSET utf8");

mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
mysqli_select_db($polaczenie, $database);

$zapytanietxt = "SELECT * FROM pracownicy";

$isWhereSet=0;

	if(!empty($_POST['id'])){
		if($isWhereSet==0){
			$zapytanietxt = $zapytanietxt ." WHERE ";
		}
		else{
			$zapytanietxt = $zapytanietxt . " AND ";
		}
		$zapytanietxt = $zapytanietxt . "id_pracownika = $_POST[id]" ;
		$isWhereSet = 1;

	}
	
	if(!empty($_POST['pierwsze_imie'])){
		if($isWhereSet==0){
			$zapytanietxt = $zapytanietxt ." WHERE ";
		}
		else{
			$zapytanietxt = $zapytanietxt . " AND ";
		}
		$zapytanietxt = $zapytanietxt . "pierwsze_imie = \"$_POST[pierwsze_imie]\" ";
		$isWhereSet = 1;
	}
	
	if(!empty($_POST['nazwisko'])){
		if($isWhereSet==0){
			$zapytanietxt = $zapytanietxt ." WHERE ";
		}
		else{
			$zapytanietxt = $zapytanietxt . " AND ";
		}
		$zapytanietxt = $zapytanietxt . "nazwisko = \"$_POST[nazwisko]\"" ;
		$isWhereSet = 1;
	}
	
	if(!empty($_POST['pesel'])){
		if($isWhereSet==0){
			$zapytanietxt = $zapytanietxt ." WHERE ";
		}
		else{
			$zapytanietxt = $zapytanietxt . " AND ";
		}
		$zapytanietxt = $zapytanietxt . "pesel = $_POST[pesel]" ;
		$isWhereSet = 1;
	}



$rezultat = mysqli_query($polaczenie, $zapytanietxt);
$ile = mysqli_num_rows($rezultat);



echo<<<END
<td width="50" align="center" bgcolor="e5e5e5">id_pracownika</td>
<td width="100" align="center" bgcolor="e5e5e5">pierwsze_imie</td>
<td width="100" align="center" bgcolor="e5e5e5">nazwisko</td>
<td width="100" align="center" bgcolor="e5e5e5">pesel</td>
<td width="100" align="center" bgcolor="e5e5e5">adres</td>
<td width="100" align="center" bgcolor="e5e5e5">id_umowy</td>
</tr><tr>
END;

	for ($i = 1; $i <= $ile; $i++) 
	{
		
		$row = mysqli_fetch_assoc($rezultat);
		$id = $row['id_pracownika'];
		$tresc = $row['pierwsze_imie'];
		$odpa = $row['nazwisko'];
		$odpb = $row['pesel'];
		$odpc = $row['adres'];
		$odpd = $row['id_umowy'];

echo<<<END
<td width="50" align="center">$id</td>
<td width="100" align="center">$tresc</td>
<td width="100" align="center">$odpa</td>
<td width="100" align="center">$odpb</td>
<td width="100" align="center">$odpc</td>
<td width="100" align="center">$odpd</td>
</tr><tr>
END;
			
	}
	

?>


</tr></table>


<form  action="show.php" align="center" method="post">
    <br><br>
	<b>Search a worker</b>

	<p>id:
	<input type="int" align="center" name="id" size="30" value="" />
	</p>

	<p>pierwsze_imie:
	<input type="text" align="center" name="pierwsze_imie" size="30" value="" />
	</p>

	<p>nazwisko:
	<input type="text" align="center" name="nazwisko" size="30" value="" />
	</p>

	<p>pesel:
	<input type="text" align="center" name="pesel" size="30" value="" />
	</p>

	<input type="submit" align="center" name="submit" value="Send" />
	</p>

	</form>



</body>

</html>