<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["admin"] != 1) {
    header("location: index.php");
    exit;
}

require("config.php");

if (isset($_GET['skasuj'])) {

    $numer= $_GET['skasuj'];
    
    $zap= mysqli_query($link, "SELECT * FROM `wypozyczenia` WHERE data_zwrotu is null and id_ksiazki='$numer'");
    $row_cnt = mysqli_num_rows($zap);
    $zap1= mysqli_query($link, "SELECT * FROM `rezerwacja` WHERE id_ksiazki='$numer'");
    $row_cnt1 = mysqli_num_rows($zap1);



    if($row_cnt>0 || $row_cnt1 >0)
    {
    echo '<script>alert("Ksiazka jest wypożyczona lub zarezerwowana")</script>';
    }
    else {

        $wynik1= mysqli_query($link, "delete from ksiazki where id_ksiazki='$numer'");
    }
    header("location: edytuj-ksiazke.php");
}


?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- FAVICON -->
        <link rel="apple-touch-icon" sizes="57x57" href="./favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="./favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
    <link rel="manifest" href="./favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Koniec favicon -->
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <title>🛠 Panel Administratora</title>
</head>

<body>
    <div class="calosc">

        <div class="lewa-panel">
            <div class="logo">

                <img width="180" alt="Logo" src="https://i.ibb.co/K7Th4wq/logobib.png" /> <br><br>
                <p style="text-align: center;">Panel bibliotekarza</p>

            </div>
            <hr>
            <div class="menu">
                <div class="linki">
                    <a href="./panel-admin.php"><button type="button" class="btn btn-link" style="font-size: 16px;">🏠 Panel Biblioteka</button></a><br><br>
                    <a href="./dodaj-ksiazke.php"><button type="button" class="btn btn-link" style="font-size: 16px;">📖 Dodaj książkę</button></a><br><br>
                    <a href="./edytuj-ksiazke.php"><button type="button" class="btn btn-link" style="font-size: 16px;">📝 Edytuj książkę</button></a><br><br>
                    <a href="./szukaj-czyt.php"><button type="button" class="btn btn-link" style="font-size: 16px;">🔍 Wyszukaj czytelnika</button></a><br><br>

                    <a href="./reset-password-admin.php"><button type="button" class="btn btn-link" style="font-size: 16px;">🔏 Zmień hasło</button></a><br><br>
                    <a href="./index.php"><button type="button" class="btn btn-link" style="font-size: 16px;">📙 Biblioteka</button></a><br><br>
                </div>
            </div>
        </div>

        <div class="prawa-panel">
            <div class="panel-prawa-gora">
                <span style="margin-right: 20px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg> <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></span>
                <a href="./logout.php"><button type="button" class="btn btn-primary">Wyloguj</button></a>
                <hr>
            </div>
            <h3>🗃 Księgozbiór biblioteki</h3>
            <br>
            <div class="wyszukaj-czytelnika">
                <div class="input-group mb-4" style="width: 50%;">
                    <div class="input-group-text p-0">
                        <select class="form-select form-select-lg shadow-none bg-light border-0" style="font-size: 14px;" id="opcja">
                            <option value="tytul">Tytuł</option>
                            <option value="autor">Autor</option>
                            <option value="gatunek">Gatunek</option>
                            <option value="wydawnictwo">Wydawnictwo</option>
                        </select>
                    </div>
                    <input type="text" class="form-control" placeholder="Wyszukaj" id="wartosc">
                    <button class="input-group-text shadow-none px-4 btn-warning" onclick="pokaz()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </div>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Nazwa książki</th>
      <th>Autor</th>
      <th>Ilość</th>
      <th>Stan</th>
      <th>Edytuj</th>
      <th>Skasuj</th>
    </tr>
  </thead>
  

 <tbody>
<?php
$wynik0= mysqli_query($link, "select * from ksiazki where stan=0");
while ($row = mysqli_fetch_array($wynik0)) {

    echo "
       
    <tr>
    <td>".$row['tytul']."</td>
      <td>".$row['autor']."</td>
      <td>".$row['ilosc']."</td>
      <td>Dostępna</td>
      <td><a href='./edycja.php?numer=".$row['id_ksiazki']."'><button type='button' class='btn btn-warning'>Edytuj</button></a></td>
      <td><a href='./edytuj-ksiazke.php?skasuj=".$row['id_ksiazki']."'><button type='button' class='btn btn-danger'>Skasuj</button></a></td>
</tr>
   
    ";
}
$wynik0= mysqli_query($link, "select * from ksiazki where stan=1");
while ($row = mysqli_fetch_array($wynik0)) {

    echo "
       
    <tr>
    <td>".$row['tytul']."</td>
      <td>".$row['autor']."</td>
      <td>".$row['ilosc']."</td>
      <td>Wypożyczone</td>
      <td><a href='./edycja.php?numer=".$row['id_ksiazki']."'><button type='button' class='btn btn-warning'>Edytuj</button></a></td>
      <td><a href='./edytuj-ksiazke.php?skasuj=".$row['id_ksiazki']."'><button type='button' class='btn btn-danger'>Skasuj</button></a></td>
      
</tr>
   
    ";
}
$wynik2= mysqli_query($link, "select * from ksiazki where stan=2");
while ($row = mysqli_fetch_array($wynik2)) {

    echo "
       
    <tr>
    <td>".$row['tytul']."</td>
      <td>".$row['autor']."</td>
      <td>".$row['ilosc']."</td>
      <td>Niedostępne</td>
      <td><a href='./edycja.php?numer=".$row['id_ksiazki']."'><button type='button' class='btn btn-warning'>Edytuj</button></a></td>
      <td><a href='./edytuj-ksiazke.php?skasuj=".$row['id_ksiazki']."'><button type='button' class='btn btn-danger'>Skasuj</button></a></td>
</tr>
   
    ";
}



?>
      </tbody>
      
    
    

 


</table>



            </div>





        </div>
    </div>
    <div class="footer">
        <hr>
        <p id="stopka">Projekt wykonał zespół P2/G4</p>
    </div>
</body>

</html>