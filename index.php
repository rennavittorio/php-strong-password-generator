<?php

$num_input = isset($_GET['num']) ? intval($_GET['num']) : false;
var_dump($num_input);

$low_letters = 'abcdefghilmnopqrstuvzxywkj';
$up_letters = strtoupper($low_letters);
$numbers = '0123456789';
$symbols = '?!%&$£';

function generateRndPsw($num_input, $low_letters, $up_letters, $numbers, $symbols)
{
    $rndPsw = [];
    for ($i = 0; $i < $num_input; $i++) {

        $rndChoice = rand(0, 3);
        if ($rndChoice === 0) {
            $rndIndex = rand(0, (strlen($low_letters) - 1));
            $rndPsw[] = $low_letters[$rndIndex];
        }
        if ($rndChoice === 1) {
            $rndIndex = rand(0, (strlen($up_letters) - 1));
            $rndPsw[] = $up_letters[$rndIndex];
        }
        if ($rndChoice === 2) {
            $rndIndex = rand(0, (strlen($numbers) - 1));
            $rndPsw[] = $numbers[$rndIndex];
        }
        if ($rndChoice === 3) {
            $rndIndex = rand(0, (strlen($symbols) - 1));
            $rndPsw[] = $symbols[$rndIndex];
        }
    };

    return $rndPsw;
};


var_dump(implode(generateRndPsw($num_input, $low_letters, $up_letters, $numbers, $symbols)));

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

    <div class="container">
        <h1>strong psw generator</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="" method="GET">

                    <input class="form-control w-auto mb-2" type="text" name="num" placeholder="Insert a number...">
                    <button type="submit" class="btn btn-primary">Genera psw</button>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>