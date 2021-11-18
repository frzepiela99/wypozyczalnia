<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["admin"] != 1) {
    header("location: index.php");
    exit;
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
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Krzyżacy</td>
      <td>Henryk Sienkiewicz</td>
      <td>2</td>
      <td>Dostępna</td>
      <td><a href="./edycja.php"><button type="button" class="btn btn-warning">Edytuj</button></a></td>
    </tr>
    <tr>
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