<?php
// Initialize the session
session_start();
require("config.php");
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>

<body style="background-image: url(./img/bg.png); background-attachment: fixed;">
    <header>


        <!-- Toolbar -->
        <div class="toolbar" role="banner">
            <img width="180" alt="Logo" src="https://i.ibb.co/K7Th4wq/logobib.png" />

            <div class="spacer"></div>
            <div class="menu-gora">
                <a href="./index.php"><button type="button" class="btn btn-link">Strona Główna</button></a>
                <a href="./kontakt.php"><button type="button" class="btn btn-link">Kontakt</button></a>

                <?php


                if (isset($_SESSION['loggedin'])) {
                    if ($_SESSION['admin'] == 0) {
                        echo '<a href="./panel-czyt.php"><button type="button" class="btn btn-primary">Panel czytelnika</button></a>
    <a href="./logout.php"><button type="button" class="btn btn-primary">Wyloguj</button></a>';
                        if (isset($_GET['name'])) {
                            $kto = $_SESSION["id"];
                            $ksiazka = $_GET['name'];
                            $jeden = 1;
                            //$wynik1= mysqli_query($link, "");
                            $wynik1 = mysqli_query($link, "select ilosc from ksiazki where id_ksiazki= '$ksiazka'");
                            while ($row = mysqli_fetch_array($wynik1)) {
                                $ilosc = $row['ilosc'];
                            }
                            if ($ilosc > 1) {
                                $nowailosc = $ilosc - 1;
                                $wynik2 = mysqli_query($link, "update ksiazki set ilosc = '$nowailosc' where id_ksiazki='$ksiazka'");
                                $wynikn = mysqli_query($link, "INSERT INTO `rezerwacja` (`id_rez`, `id_czytelnik`, `id_ksiazki`, `data_rez`, `data_k_rez`) VALUES (NULL, '$kto', '$ksiazka', CURRENT_DATE(), CURRENT_DATE()+3)");
                            } else if ($ilosc == $jeden) {
                                $nowailosc = $ilosc - 1;
                                $wynik3 = mysqli_query($link, "update ksiazki set ilosc = '$nowailosc' where id_ksiazki='$ksiazka'");
                                $wynik4 = mysqli_query($link, "update ksiazki set stan = 1 where id_ksiazki='$ksiazka'");
                                $wynikn = mysqli_query($link, "INSERT INTO `rezerwacja` (`id_rez`, `id_czytelnik`, `id_ksiazki`, `data_rez`, `data_k_rez`) VALUES (NULL, '$kto', '$ksiazka', CURRENT_DATE(), CURRENT_DATE()+3)");
                            }
                        }
                    } elseif ($_SESSION['admin'] == 1) {
                        echo '<a href="./panel-admin.php"><button type="button" class="btn btn-primary">Panel bibliotekarza</button></a>
    <a href="./logout.php"><button type="button" class="btn btn-primary">Wyloguj</button></a>';
                    }
                } else {
                    echo '<button class="btn btn-primary" type="button" id="przykladowaLista" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Logowanie
</button>
<div class="dropdown-menu" aria-labelledby="przykladowaLista">
    <a class="dropdown-item" href="./login-user.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
        </svg> Konto czytelnika</a>
    <a class="dropdown-item" href="./login-admin.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"></path>
        </svg> Konto bibliotekarza</a>
</div>

<a href="./register.php"><button type="button" class="btn btn-primary">Rejestracja</button></a>';
                }

                ?>

            </div>
        </div>
    </header>

    <div class="content">
        <h2>🆕 Nowości</h2>
        <br>
        <div class="ksiazki">

            <?php


            $wynikn = mysqli_query($link, 'SELECT * FROM `ksiazki` WHERE stan =0 ORDER BY id_ksiazki DESC limit 5');
            while ($row = mysqli_fetch_array($wynikn)) {
                echo "
                <div class='card'>
                <img src='zdjecie/" . $row['zdjecie'] . "' class='card-img-top' style='width: 100%; height: 240px;' alt='...'>
                <hr>
                <div class='card-body' style='text-align: center;'>
                <p class='card-tytul' title='" . $row['tytul'] . "'>" . $row['tytul'] . "</p>
                <p class='card-text' style='text-align: center;'>" . $row['autor'] . "</p>
                    <p class='card-text' style='text-align: center; color:green;'>Dostępna</p>
                    <a href='index.php?name=" . $row['id_ksiazki'] . "'> <button type='button' class='btn btn-success'>Wypożycz</button></a>
                </div>
            </div>
                ";
            }


            ?>

        </div>

        <br><br>
        <h2>📖 Nasz księgozbiór: </h2><br>
        <div class="wyszukaj">

            <div class="input-group mb-4" style="width: 900px;">
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
        </div>
        <br>
        <div id="ksiazki1">
            <div class="ksiazki">


                <?php

                $liczba = 0;
                $wynik = mysqli_query($link, 'SELECT * FROM `ksiazki` WHERE stan=0');
                while ($row = mysqli_fetch_array($wynik)) {
                    if ($liczba % 5 == 0) {
                        if ($liczba > 0) {
                            echo "</div>
                                <div class='ksiazki'>
                                ";
                        }
                    }
                    echo "
                            <div class='card'>
                            <img src='zdjecie/" . $row['zdjecie'] . "' class='card-img-top' style='width: 100%; height: 240px;' alt='...'>
                            <hr>
                            <div class='card-body' style='text-align: center;'>
                            <p class='card-tytul' title='" . $row['tytul'] . "'>" . $row['tytul'] . "</p>
                            <p class='card-text' style='text-align: center;'>" . $row['autor'] . "</p>
                                <p class='card-text' style='text-align: center; color:green;'>Dostępna</p>
                                <a href='index.php?name=" . $row['id_ksiazki'] . "'> <button type='button' class='btn btn-success'>Wypożycz</button></a>
                            </div>
                        </div>
                            ";
                    $liczba = $liczba + 1;
                }
                $wynik1 = mysqli_query($link, 'SELECT * FROM `ksiazki` WHERE stan=1');
                while ($row = mysqli_fetch_array($wynik1)) {
                    if ($liczba % 5 == 0) {
                        echo "</div>
                                <div class='ksiazki'>
                                ";
                    }
                    echo "
                                <div class='card'>
                                <img src='zdjecie/" . $row['zdjecie'] . "' class='card-img-top' style='width: 100%; height: 240px;' alt='...'>
                                <hr>
                                <div class='card-body' style='text-align: center;'>
                                <p class='card-tytul' title='" . $row['tytul'] . "'>" . $row['tytul'] . "</p>
                                <p class='card-text' style='text-align: center;'>" . $row['autor'] . "</p>
                                    <p class='card-text' style='text-align: center; color:#fd078e;'>Wypożyczona</p>
                                    <button type='button' class='btn btn-primary'>Zapisz się</button>
                                </div>
                            </div>
                                ";
                    $liczba = $liczba + 1;
                }
                $wynik2 = mysqli_query($link, 'SELECT * FROM `ksiazki` WHERE stan=2');
                while ($row = mysqli_fetch_array($wynik2)) {
                    if ($liczba % 5 == 0) {
                        echo "</div>
                                <div class='ksiazki'>
                                ";
                    }
                    echo "
                                    <div class='card'>
                                    <img src='zdjecie/" . $row['zdjecie'] . "' class='card-img-top' style='width: 100%; height: 240px;' alt='...'>
                                    <hr>
                                    <div class='card-body' style='text-align: center;'>
                                    <p class='card-tytul' title='" . $row['tytul'] . "'>" . $row['tytul'] . "</p>
                                    <p class='card-text' style='text-align: center;'>" . $row['autor'] . "</p>
                                        <p class='card-text' style='text-align: center; color:grey;'>Wycofana</p>
                                        <button type='button' class='btn btn-light disabled'>Niedostępna</button>
                                    </div>
                                </div>
                                    ";
                    $liczba = $liczba + 1;
                }
                ?>


            </div>
        </div>
    </div>
    <a class="btn-circle1 btn-danger" href="#" role="button" style="height: 10%; margin-left: 95%;"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
        </svg> </a>


    <footer>
        <hr>
        <p id="stopka">Projekt wykonał zespół L2/G4</p>

    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function pokaz() {
        var opcja = document.getElementById("opcja").value;
        var wartosc = document.getElementById("wartosc").value;
        $.ajax({
            type: "POST",
            url: "pokaz.php",
            data: {
                option: opcja,
                tresc: wartosc
            }
        }).done(function(data) {
            document.getElementById("ksiazki1").innerHTML = data;
        });
    }
</script>


</html>