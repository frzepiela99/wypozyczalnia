<?php
// Initialize the session
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

<body>
    <header>


        <!-- Toolbar -->
        <div class="toolbar" role="banner">
            <img width="180" alt="Logo" src="https://i.ibb.co/K7Th4wq/logobib.png" />

            <div class="spacer"></div>
            <div class="menu-gora">
                <a href="./index.php"><button type="button" class="btn btn-link">Strona Główna</button></a>
                <!--<button mat-button>Aktualności</button>-->
                <a href="./nowosci.php"><button type="button" class="btn btn-link">Nowości</button></a>
                <a href="./kontakt.php"><button type="button" class="btn btn-link">Kontakt</button></a>

                <?php


                if (isset($_SESSION['loggedin'])) {
                    if ($_SESSION['admin'] == 0) {
                        echo '<a href="./panel-czyt.php"><button type="button" class="btn btn-primary">Panel czytelnika</button></a>
    <a href="./logout.php"><button type="button" class="btn btn-primary">Wyloguj</button></a>';
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
<body style="background-image: url(./img/bg.png); background-attachment: fixed;">
    <div class="content">

        <h2>🆕 Nowości</h2>
        <br>
        <div class="ksiazki">
            <div class="card">
                <img src="https://emp-scs-uat.img-osdw.pl/img-p/1/kipwn/d576082e/std/2bc-452/105533208o.jpg" class="card-img-top" alt="...">
                <div class="card-body" style="text-align: center;">
                    <p class="card-text" style="font-weight:600; text-align: center;">Podstawy programowania w języku C++.</p>
                    <p class="card-text" style="text-align: center;">Józef Zieliński</p>
                    <p class="card-text" style="text-align: center; color:green;">Dostępna</p>
                    <button type="button" class="btn btn-success">Wypożycz</button>


                </div>

            </div>

            <div class="card">
                <img src="https://emp-scs-uat.img-osdw.pl/img-p/1/kipwn/d576082e/std/2bc-452/105533208o.jpg" class="card-img-top" alt="...">
                <div class="card-body" style="text-align: center;">
                    <p class="card-text" style="font-weight:600; text-align: center;">Podstawy programowania w języku C++.</p>
                    <p class="card-text" style="text-align: center;">Józef Zieliński</p>
                    <p class="card-text" style="text-align: center; color:#fd078e;">Wypożyczona</p>
                    <button type="button" class="btn btn-primary">Zapisz się</button>


                </div>
            </div>

            <div class="card">
                <img src="https://emp-scs-uat.img-osdw.pl/img-p/1/kipwn/d576082e/std/2bc-452/105533208o.jpg" class="card-img-top" alt="...">
                <div class="card-body" style="text-align: center;">
                    <p class="card-text" style="font-weight:600; text-align: center;">Podstawy programowania w języku C++.</p>
                    <p class="card-text" style="text-align: center;">Józef Zieliński</p>
                    <p class="card-text" style="text-align: center; color:grey;">Wycofana</p>
                    <button type="button" class="btn btn-light disabled">Niedostępna</button>


                </div>
            </div>

            <div class="card">
                <img src="https://emp-scs-uat.img-osdw.pl/img-p/1/kipwn/d576082e/std/2bc-452/105533208o.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>

            <div class="card">
                <img src="https://emp-scs-uat.img-osdw.pl/img-p/1/kipwn/d576082e/std/2bc-452/105533208o.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            <div class="wincyj" style="height: 10%; margin-left:10px; margin-top: 46%;">
                <a href="./nowosci.php"><button type="button" class="btn-circle btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                            <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path>
                        </svg>
                    </button></a>
            </div>
        </div>

        <br><br>
        <h2>📖 Nasz księgozbiór: </h2><br>
        <div class="wyszukaj">

            <div class="input-group mb-4" style="width: 900px;">
                <div class="input-group-text p-0">
                    <select class="form-select form-select-lg shadow-none bg-light border-0" style="font-size: 14px;">
                        <option>Tytuł</option>
                        <option>Autor</option>
                        <option>Gatunek</option>
                        <option>Wydawnictwo</option>
                    </select>
                </div>
                <input type="text" class="form-control" placeholder="Wyszukaj">
                <button class="input-group-text shadow-none px-4 btn-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </div>
        </div>
        <br>
        <div class="ksiazki">
            <div class="card">
                <img src="https://emp-scs-uat.img-osdw.pl/img-p/1/kipwn/d576082e/std/2bc-452/105533208o.jpg" class="card-img-top" alt="...">
                <div class="card-body" style="text-align: center;">
                    <p class="card-text" style="font-weight:600; text-align: center;">Podstawy programowania w języku C++.</p>
                    <p class="card-text" style="text-align: center;">Józef Zieliński</p>
                    <p class="card-text" style="text-align: center; color:green;">Dostępna</p>
                    <button type="button" class="btn btn-success">Wypożycz</button>


                </div>

            </div>

            <div class="card">
                <img src="https://emp-scs-uat.img-osdw.pl/img-p/1/kipwn/d576082e/std/2bc-452/105533208o.jpg" class="card-img-top" alt="...">
                <div class="card-body" style="text-align: center;">
                    <p class="card-text" style="font-weight:600; text-align: center;">Podstawy programowania w języku C++.</p>
                    <p class="card-text" style="text-align: center;">Józef Zieliński</p>
                    <p class="card-text" style="text-align: center; color:#fd078e;">Wypożyczona</p>
                    <button type="button" class="btn btn-primary">Zapisz się</button>


                </div>
            </div>

            <div class="card">
                <img src="https://emp-scs-uat.img-osdw.pl/img-p/1/kipwn/d576082e/std/2bc-452/105533208o.jpg" class="card-img-top" alt="...">
                <div class="card-body" style="text-align: center;">
                    <p class="card-text" style="font-weight:600; text-align: center;">Podstawy programowania w języku C++.</p>
                    <p class="card-text" style="text-align: center;">Józef Zieliński</p>
                    <p class="card-text" style="text-align: center; color:grey;">Wycofana</p>
                    <button type="button" class="btn btn-light disabled">Niedostępna</button>


                </div>
            </div>

            <div class="card">
                <img src="https://emp-scs-uat.img-osdw.pl/img-p/1/kipwn/d576082e/std/2bc-452/105533208o.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>

            <div class="card">
                <img src="https://emp-scs-uat.img-osdw.pl/img-p/1/kipwn/d576082e/std/2bc-452/105533208o.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>


        </div>
        <br>
        <div class="ksiazki">
            <div class="card">
                <img src="https://emp-scs-uat.img-osdw.pl/img-p/1/kipwn/d576082e/std/2bc-452/105533208o.jpg" class="card-img-top" alt="...">
                <div class="card-body" style="text-align: center;">
                    <p class="card-text" style="font-weight:600; text-align: center;">Podstawy programowania w języku C++.</p>
                    <p class="card-text" style="text-align: center;">Józef Zieliński</p>
                    <p class="card-text" style="text-align: center; color:green;">Dostępna</p>
                    <button type="button" class="btn btn-success">Wypożycz</button>


                </div>

            </div>

            <div class="card">
                <img src="https://emp-scs-uat.img-osdw.pl/img-p/1/kipwn/d576082e/std/2bc-452/105533208o.jpg" class="card-img-top" alt="...">
                <div class="card-body" style="text-align: center;">
                    <p class="card-text" style="font-weight:600; text-align: center;">Podstawy programowania w języku C++.</p>
                    <p class="card-text" style="text-align: center;">Józef Zieliński</p>
                    <p class="card-text" style="text-align: center; color:#fd078e;">Wypożyczona</p>
                    <button type="button" class="btn btn-primary">Zapisz się</button>


                </div>
            </div>

            <div class="card">
                <img src="https://emp-scs-uat.img-osdw.pl/img-p/1/kipwn/d576082e/std/2bc-452/105533208o.jpg" class="card-img-top" alt="...">
                <div class="card-body" style="text-align: center;">
                    <p class="card-text" style="font-weight:600; text-align: center;">Podstawy programowania w języku C++.</p>
                    <p class="card-text" style="text-align: center;">Józef Zieliński</p>
                    <p class="card-text" style="text-align: center; color:grey;">Wycofana</p>
                    <button type="button" class="btn btn-light disabled">Niedostępna</button>


                </div>
            </div>

            <div class="card">
                <img src="https://emp-scs-uat.img-osdw.pl/img-p/1/kipwn/d576082e/std/2bc-452/105533208o.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>

            <div class="card">
                <img src="https://emp-scs-uat.img-osdw.pl/img-p/1/kipwn/d576082e/std/2bc-452/105533208o.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>


        </div>
    </div>
    <hr>
    <footer style="text-align: center;">
        <p>Wygląd wykonał Rzepson</p>

    </footer>
    </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</html>