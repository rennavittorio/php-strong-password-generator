<?php

session_start();

//psw vars
// $low_letters = 'abcdefghilmnopqrstuvzxywkj';
$low_letters = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaapqrstuvzxywkj';
$up_letters = strtoupper($low_letters);
$numbers = '0123456789';
$symbols = '?!%&$£';

//user input
$num_input = isset($_GET['num']) ? intval($_GET['num']) : null;

$doublesCheck = isset($_GET['doubles-check']) ? $_GET['doubles-check'] : false;
var_dump('doubles: ' . $doublesCheck);

$lettersOn = isset($_GET['letters']) ? $low_letters . $up_letters : null;
$numberOn = isset($_GET['numbers']) ? $numbers : null;
$symbolsOn = isset($_GET['symbols']) ? $symbols : null;

//psw baseline
$chars = $lettersOn . $numberOn . $symbolsOn;
var_dump('selected chars are: ' . $chars);

//prendo la function da altro file
include __DIR__ . '/function.php';

//salvo nuova psw in variabile
if ($chars !== '' && $num_input !== 0) {
    $new_psw = generateRndPsw($num_input, $chars, $doublesCheck);
    $_SESSION["password"] = $new_psw;
    var_dump('the new psw is: ' . $_SESSION["password"]);
} else {
    var_dump('pls insert at least once');
}

//reindirizzo a pag psw
if (!empty($_SESSION["password"])) {
    header('Location: ./pswpage.php');
};

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class="container mb-5">
        <h1>strong psw generator</h1>
    </div>

    <div class="container">

        <form action="" method="GET" class="row">
            <div class="col">
                <label for="num-select" class="form-label">Num</label>
                <input class="form-control w-auto mb-2" type="text" name="num" id="num-select" placeholder="Insert a number..." value="<?php echo $num_input; ?>">
            </div>
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="doubles-check" id="doubles-check1" value="off">
                    <label class="form-check-label" for="doubles-check1">
                        no doubles
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="doubles-check" id="doubles-check2" value="on">
                    <label class="form-check-label" for="doubles-check2">
                        doubles
                    </label>
                </div>
            </div>

            <div class="col">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" id="letterscheck" name="letters">
                    <label class="form-check-label" for="letterscheck">
                        letters
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" id="numberscheck" name="numbers">
                    <label class="form-check-label" for="numberscheck">
                        numbers
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" id="symbolscheck" name="symbols">
                    <label class="form-check-label" for="symbolscheck">
                        symbols
                    </label>
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Genera psw</button>
            </div>

        </form>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>