<?php
session_start();
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

<script src="script.js" defer></script>
</head>

<body>
    <header>

        <!-- Toolbar -->
        
        <body style="background-image: url(./img/bg.png); background-attachment: fixed;">
<nav class="navbar" role="banner">
<img width="180" alt="Logo" src="https://i.ibb.co/K7Th4wq/logobib.png" />
        <a href="#" class="toggle-button">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </a>
        <div class="navbar-links">
          <ul>
            <li><a href="./index.php"><button type="button" class="btn btn-link">Strona Główna</button></a></li>
            <li><a href="./kontakt.php"><button type="button" class="btn btn-link">Kontakt</button></a></li>
            <?php


                if (isset($_SESSION['loggedin'])) {
                    if ($_SESSION['admin'] == 0) {
                        echo '<li><a href="./panel-czyt.php"><button type="button" class="btn btn-primary">Panel czytelnika</button></a></li>
    <li><a href="./logout.php"><button type="button" class="btn btn-primary">Wyloguj</button></a>/li>';
    if (isset($_GET['name'])) {
        $kto=$_SESSION["id"];
        $ksiazka= $_GET['name'];
        $jeden=1;
        //$wynik1= mysqli_query($link, "");
        $wynik1= mysqli_query($link, "select ilosc from ksiazki where id_ksiazki= '$ksiazka'");
        while ($row = mysqli_fetch_array($wynik1)) {
            $ilosc=$row['ilosc'];
        }
        if($ilosc > 1)
        {
            $nowailosc=$ilosc-1;
            $wynik2= mysqli_query($link, "update ksiazki set ilosc = '$nowailosc' where id_ksiazki='$ksiazka'");
            $wynikn = mysqli_query($link, "INSERT INTO `rezerwacja` (`id_rez`, `id_czytelnik`, `id_ksiazki`, `data_rez`, `data_k_rez`) VALUES (NULL, '$kto', '$ksiazka', '2021-11-09', '2021-11-11')");

        }
        else if($ilosc==$jeden)
        {
            $nowailosc=$ilosc-1;
            $wynik3= mysqli_query($link, "update ksiazki set ilosc = '$nowailosc' where id_ksiazki='$ksiazka'");
            $wynik4= mysqli_query($link, "update ksiazki set stan = 1 where id_ksiazki='$ksiazka'");
            $wynikn = mysqli_query($link, "INSERT INTO `rezerwacja` (`id_rez`, `id_czytelnik`, `id_ksiazki`, `data_rez`, `data_k_rez`) VALUES (NULL, '$kto', '$ksiazka', '2021-11-09', '2021-11-11')");
        }


    }


                    } elseif ($_SESSION['admin'] == 1) {
                        echo '<li><a href="./panel-admin.php"><button type="button" class="btn btn-primary">Panel bibliotekarza</button></a></li>
                        <li><a href="./logout.php"><button type="button" class="btn btn-primary">Wyloguj</button></a></li>';
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

<li><a href="./register.php"><button type="button" class="btn btn-primary">Rejestracja</button></a></li>';
                }

                ?>
            </div>

    </header>

    <div class="content">
        <br>
        <h2>Kontakt</h2>
        <div class="container-contact">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2585.3988095417926!2d20.701682750797776!3d49.60908565540864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473de53b7dba810d%3A0x17e7e466414735ae!2sPWSZ%20w%20Nowym%20S%C4%85czu%20-%20Instytut%20Techniczny!5e0!3m2!1spl!2spl!4v1636884042963!5m2!1spl!2spl" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe> <br><br>
            <div class="row">
                <div class="col-md-3">
                    <h3>📞 Kontakt:</h3><br>
                    <h6 style="margin-left: 5px;">📚 Biblioteka Publiczna</h6>
                    <span style="margin-left: 25px;">ul.Zamenhofa 1a,</span>
                    <br>
                    <span style="margin-left: 25px;">33-300 Nowy Sącz</span>
                    <br>
                    <span style="margin-left: 25px;">Telefon: +48181234567</span>
                    <p>
                </div>
                <div class="col-md-9">
                    <h3>📋 Formularz kontaktowy:</h3><br>
                    <div class="contact-form" style="align-items: center;">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fname">Imię:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fname" placeholder="Proszę wprowadzić imię" name="fname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="lname">Nazwisko:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="lname" placeholder="Proszę wprowadzić nazwisko" name="lname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Proszę wprowadzić adres e-mail" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="comment">Wiadomość:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" id="comment" style="resize: none;"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-warning">Wyślij</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
    <hr>
        <p style="text-align: center;" >Projekt wykonał zespół L2/G4</p>

    </footer>
</body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</html>