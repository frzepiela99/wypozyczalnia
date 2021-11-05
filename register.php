<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = $imie = $nazwisko = $nr_tel = $miej = $ul = $nr_dom = "";
$username_err = $password_err = $confirm_password_err = $imie_err = $nazwisko_err = $nr_tel_err = $miej_err = $ul_err = $nr_dom_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Validate imie
    if (empty(trim($_POST["imie"]))) {
        $imie_err = "Podaj imię.";
    } elseif (!preg_match('/^[a-ĄąĆćĘęŁłŃńÓóŚśŹźŻżA-Z]+$/', trim($_POST["imie"]))) {
        $imie_err = "Imię powinno zawierać tylko litery.";
    } else {
        $imie = trim($_POST["imie"]);
    }


    // Validate nazwisko
    if (empty(trim($_POST["nazwisko"]))) {
        $nazwisko_err = "Podaj nazwisko.";
    } elseif (!preg_match('/^[a-ĄąĆćĘęŁłŃńÓóŚśŹźŻżA-Z]+$/', trim($_POST["nazwisko"]))) {
        $nazwisko_err = "Nazwisko powinno zawierać tylko litery.";
    } else {
        $nazwisko = trim($_POST["nazwisko"]);
    }


    // Validate nr_tel
    if (empty(trim($_POST["nr_tel"]))) {
        $nr_tel_err = "Podaj numer telefonu.";
    } elseif (!preg_match('/^\d{9}$/', trim($_POST["nr_tel"]))) {
        $nr_tel_err = "Numer telefonu musi mieć 9 znaków.";
    } else {
        $nr_tel = trim($_POST["nr_tel"]);
    }


    // Validate miejscowosc
    if (empty(trim($_POST["miej"]))) {
        $miej_err = "Podaj miejsce zamieszkania.";
    } elseif (!preg_match('/^[a-ĄąĆćĘęŁłŃńÓóŚśŹźŻżA-Z]+$/', trim($_POST["miej"]))) {
        $miej_err = "Miejscowość powinna zawierać tylko litery.";
    } else {
        $miej = trim($_POST["miej"]);
    }




    // Validate ulica
    if (empty(trim($_POST["ul"]))) {
        $ul_err = "Podaj ulicę.";
    } elseif (!preg_match('/^[a-ĄąĆćĘęŁłŃńÓóŚśŹźŻżA-Z]+$/', trim($_POST["ul"]))) {
        $ul_err = "Ulica powinna zawierać tylko litery.";
    } else {
        $ul = trim($_POST["ul"]);
    }


    // Validate nr_dom
    if (empty(trim($_POST["nr_dom"]))) {
        $nr_dom_err = "Podaj numer domu.";
    } elseif (!preg_match('/^[0-9\/]+$/', trim($_POST["nr_dom"]))) {
        $nr_dom_err = "Numer domu nie może mieć liter.";
    } else {
        $nr_dom = trim($_POST["nr_dom"]);
    }



    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Podaj email.";
    } elseif (!filter_var(trim($_POST["username"]), FILTER_VALIDATE_EMAIL)) {
        $username_err = "Podaj poprawny adres email";
    } else {
        // Prepare a select statement
        $sql = "SELECT id_czytelnik FROM czytelnik WHERE Mail = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Konto z takim emailem już istnieje.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Coś poszło nie tak.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Podaj hasło.";
    } elseif (strlen(trim($_POST["password"])) < 8) {
        $password_err = "Hasło musi mieć przynajmniej 8 znaków.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Potwierdź hasło.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Hasła się nie zgadzają.";
        }
    }



    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($imie_err) && empty($nazwisko_err) && empty($nr_tel_err) && empty($miej_err) && empty($ul_err) && empty($nr_dom_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO czytelnik (Imie, Nazwisko, Mail, Haslo, Nr_telefonu, Miejscowosc, Ulica, Nr_domu) VALUES (?,?,?,?,?,?,?,?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_imie, $param_nazwisko, $param_username, $param_password, $param_nr_tel, $param_miej, $param_ul, $param_nr_dom);

            // Set parameters
            $param_imie = $imie;
            $param_nazwisko = $nazwisko;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Tworzy hashowane hasło
            $param_nr_tel = $nr_tel;
            $param_miej = $miej;
            $param_ul = $ul;
            $param_nr_dom = $nr_dom;


            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login-user.php");
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
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


                <button class="btn btn-primary" type="button" id="przykladowaLista" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

                <a href="./register.php"><button type="button" class="btn btn-primary">Rejestracja</button></a>
            </div>

    </header>

    <div class="content">
        <br>
        <h2>Rejestracja</h2> <br>
        <div class="wrapper">

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Imię</label>
                    <input type="text" name="imie" class="form-control <?php echo (!empty($imie_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $imie; ?>">
                    <span class="invalid-feedback"><?php echo $imie_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Nazwisko</label>
                    <input type="text" name="nazwisko" class="form-control <?php echo (!empty($nazwisko_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nazwisko; ?>">
                    <span class="invalid-feedback"><?php echo $nazwisko_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Hasło</label>
                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Powtórz hasło</label>
                    <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Numer telefonu</label>
                    <input type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true" name="nr_tel" class="form-control <?php echo (!empty($nr_tel_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nr_tel; ?>">
                    <span class="invalid-feedback"><?php echo $nr_tel_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Miejsce zamieszkania</label>
                    <input type="text" name="miej" class="form-control <?php echo (!empty($miej_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $miej; ?>">
                    <span class="invalid-feedback"><?php echo $miej_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Ulica</label>
                    <input type="text" name="ul" class="form-control <?php echo (!empty($ul_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ul; ?>">
                    <span class="invalid-feedback"><?php echo $ul_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Numer domu</label>
                    <input type="text" name="nr_dom" class="form-control <?php echo (!empty($nr_dom_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nr_dom; ?>">
                    <span class="invalid-feedback"><?php echo $nr_dom_err; ?></span>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Utwórz">
                    <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                </div>
                <p>Masz już konto? 🤔 <a href="login-user.php">Zaloguj się!</a>.</p>
            </form>
        </div>
    </div>
    <footer style="text-align: center; margin-top: 20%;">
        <hr>
        <p>Wygląd wykonał Rzepson</p>
    </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>


</html>