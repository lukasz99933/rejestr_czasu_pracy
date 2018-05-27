<html>
<head>
<title>Add Student</title>
</head>
<body>

<a href="add.html">Dodaj Pracownika</a>

<a href="show.php">Pokaz Pracownikow</a> 

<a href="index.php">Strona Glowna</a> 

<?php
 
session_start();
 
if((isset($_POST['pierwsze_imie']) && (isset($_POST['nazwisko'])) && (isset($_POST['pesel']))&& (isset($_POST['adres']))&& (isset($_POST['id_umowy'])))) {
  
    $pierwsze_imie = $_POST['pierwsze_imie'];
    $drugie_imie = $_POST['drugie_imie'];
    $nazwisko = $_POST['nazwisko'];
    $pesel = $_POST['pesel'];
    $adres = $_POST['adres'];
    $id_umowy = $_POST['id_umowy'];
      
    $connection = mysqli_connect('localhost', 'root',"")
    or die('Brak połączenia z serwerem MySQL');
    $db = mysqli_select_db($connection, 'rejestr_czasu_pracy')
    or die('Nie mogę połączyć się z bazą danych');
      
    // dodajemy rekord do bazy
    $ins = mysqli_query($connection,"INSERT INTO `pracownicy` (`id_pracownika`, `pierwsze_imie`, `drugie_imie`, `nazwisko`, `pesel`, `adres`, `id_umowy`) 
	VALUES (NULL, '$pierwsze_imie', '$drugie_imie', '$nazwisko', '$pesel', '$adres', '$id_umowy')");
      
    if($ins) echo "Rekord został dodany poprawnie";
    else echo "Błąd nie udało się dodać nowego rekordu";
      
    mysqli_close($connection);
}
?>

</body>
</html>