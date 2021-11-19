<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["admin"] != 1){
    header("location: index.php");
    exit;
}
require("config.php");
$ostatni=0;
$ostatni=$ostatni.".png";
$wynikn = mysqli_query($link, 'SELECT id_ksiazki FROM `ksiazki` ORDER BY id_ksiazki DESC LIMIT 1');
            while ($row = mysqli_fetch_array($wynikn)) { 
                $ostatni=$row['id_ksiazki']+1;
                $ostatni=$ostatni.".png";
                //echo $ostatni;
            }
         

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $tytul = $_POST['tytul'];
    $autor = $_POST['autor'];
    $nr_ksiazki = $_POST['nr_ksiazki'];
    $gatunek = $_POST['gatunek'];
    $wydawnictwo = $_POST['wydawnictwo'];
    $rok_wyd = $_POST['rok_wyd'];
    $opis = $_POST['opis'];
 

    /*
    echo $tytul."<br>";
    echo $autor."<br>";
    echo $nr_ksiazki."<br>";
    echo $gatunek."<br>";
    echo $wydawnictwo."<br>";
    echo $rok_wyd."<br>";
    echo $opis."<br>";
    */

    if (empty($tytul)||empty($autor) || empty($nr_ksiazki)|| empty($gatunek)|| empty($wydawnictwo)|| empty($rok_wyd)) 
    {
      echo "Uzupełnij wszystkie dane";
      
    } 
    else {
        if(isset($_FILES['zdjecie'])){
            
            $file_name = $_FILES['zdjecie']['name'];
            $file_tmp =$_FILES['zdjecie']['tmp_name'];
          //echo $ostatni;
            $wynikn = mysqli_query($link, "INSERT INTO `ksiazki` (`id_ksiazki`, `tytul`, `autor`, `gatunek`, `wydawnictwo`, `rok_wydania`, `zdjecie`, `stan`, `ilosc`, `opis`) VALUES (NULL, '$tytul', '$autor', '$gatunek', '$wydawnictwo', '$rok_wyd', '$ostatni', '0', '$nr_ksiazki', '$opis')");
        move_uploaded_file($file_tmp,"zdjecie/".$ostatni);
        


  }
}
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a href="./logout.php"><button type="button" class="btn btn-primary">Wyloguj</button></a><hr>
            </div>
            <h3>📖 Dodaj książkę!</h3><br>
            
            <div class="formularz-dodania-ksiazki">
                <form method="post" action="dodaj-ksiazke.php" enctype="multipart/form-data">
                    <label for="tytul">Tytuł</label>
                    <input type="text" class="form-control" id="tytul" name="tytul" placeholder="Wpisz Tytuł" style="width: 400px;">
                    <label for="autor">Autor</label>
                    <input type="text" class="form-control" id="autor" name="autor" placeholder="Wpisz autora">
                    <label for="nr_ksiazki">Ilość książki</label>
                    <input type="number" class="form-control" id="nr_ksiazki" name="nr_ksiazki" placeholder="Wpisz ilość książek">
                    <label for="gatunek">Gatunek</label>
                    <input type="text" class="form-control" id="gatunek" name="gatunek" placeholder="Wpisz gatunek">
                    <label for="wydawnictwo">Wydawnictwo</label>
                    <input type="text" class="form-control" id="wydawnictwo" name="wydawnictwo" placeholder="Wpisz nazwe wydawnictwa">
                    <label for="rok_wyd">Rok wydania</label>
                    <input type="number" class="form-control" id="rok_wyd" name="rok_wyd" placeholder="Wpisz rok wydania">
                    <label for="opis">Opis</label>
                    <textarea class="form-control" id="opis" name="opis" rows="3"></textarea>
                    <br>
                    <label for="przykladoweWysylaniePliku">Zdjęcie okładki</label>
                    <input type="file" class="form-control-file" id="przykladoweWysylaniePliku" name="zdjecie">
                    <br><br>
                    <input type="submit" class="btn-sm btn-primary" value="Dodaj książkę">
                </form>
                <br>
            </div>
        </div>
    </div>
    <div class="footer">
                <hr>
                <p id="stopka">Projekt wykonał zespół P2/G4</p>
            </div>
</body>
</html>