<?php 
    $xml = simplexml_load_file('../xml/strijelci.xml');
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="shortcut icon" href="../slike/favicon.ico" type="image/x-icon">
    <title>SuperSport HNL</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href="index.php">
                <img src="../slike/logo_navbar.png" alt="" width="250" height="90">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Početna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="najboljiIgraci.php">Najbolji igrači</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="prikazUtakmice.php">Detalji utakmica</a>
                    </li>
                </ul>
            </div>
            <span class="sezona fst-italic">SEZONA 2023./24.</span>
        </div>
    </nav>

    <div class="container mt-4 mb-4">
        <h1>Najbolji strijelci</h1>
    </div>

    <table class="table text-center">
        <colgroup>
            <col style="width: 5%;">
            <col style="width: 40%;">
            <col style="width: 20%;">
            <col style="width: 20%;">
        </colgroup>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th class="text-start" scope="col">Igrač</th>
                <th scope="col">Golovi</th>
                <th scope="col">Klub</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            $firstRow = true;
            foreach ($xml->strijelac as $strijelac): 
                $rowClass = $firstRow ? 'table-warning' : '';
                $firstRow = false;
            ?>
            <tr class="<?php echo $rowClass; ?>">
                <td class="align-middle"><?php echo $strijelac->mjesto; ?></td>
                <td class="text-start">
                    <div class="player-info align-middle">
                        <img src="<?php echo $strijelac->slika; ?>" alt="<?php echo $strijelac->ime; ?>" class="circular-image">
                        <span class="player-name"><?php echo $strijelac->ime; ?></span>
                    </div>
                </td>
                <td class="align-middle"><?php echo $strijelac->brojGolova; ?></td>
                <td class="align-middle">
                    <img src="<?php echo $strijelac->klub; ?>" alt="Club Logo" class="club-image" width="40">
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <div class="container mt-4 mb-4">
        <h1>Najbolji asistenti</h1>
    </div>

    <table class="table text-center">
        <colgroup>
            <col style="width: 5%;">
            <col style="width: 40%;">
            <col style="width: 20%;">
            <col style="width: 20%;">
        </colgroup>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th class="text-start" scope="col">Igrač</th>
                <th scope="col">Asistencije</th>
                <th scope="col">Klub</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            $firstRow = true;
            foreach ($xml->asistent as $asistent): 
                $rowClass = $firstRow ? 'table-warning' : '';
                $firstRow = false;
            ?>
            <tr class="<?php echo $rowClass; ?>">
                <td class="align-middle"><?php echo $asistent->mjesto; ?></td>
                <td class="text-start">
                    <div class="player-info align-middle">
                        <img src="<?php echo $asistent->slika; ?>" alt="<?php echo $asistent->ime; ?>" class="circular-image">
                        <span class="player-name"><?php echo $asistent->ime; ?></span>
                    </div>
                </td>
                <td class="align-middle"><?php echo $asistent->brojAsistencija; ?></td>
                <td class="align-middle">
                    <img src="<?php echo $asistent->klub; ?>" alt="Club Logo" class="club-image" width="40">
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <div class="container mt-4 mb-4">
        <h1>Clean Sheets</h1>
    </div>

    <table class="table text-center">
        <colgroup>
            <col style="width: 5%;">
            <col style="width: 40%;">
            <col style="width: 20%;">
            <col style="width: 20%;">
        </colgroup>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th class="text-start" scope="col">Igrač</th>
                <th scope="col">Utakmice bez primljenog gola</th>
                <th scope="col">Klub</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            $firstRow = true;
            foreach ($xml->golman as $golman): 
                $rowClass = $firstRow ? 'table-warning' : '';
                $firstRow = false;
            ?>
            <tr class="<?php echo $rowClass; ?>">
                <td class="align-middle"><?php echo $golman->mjesto; ?></td>
                <td class="text-start">
                    <div class="player-info align-middle">
                        <img src="<?php echo $golman->slika; ?>" alt="<?php echo $golman->ime; ?>" class="circular-image">
                        <span class="player-name"><?php echo $golman->ime; ?></span>
                    </div>
                </td>
                <td class="align-middle"><?php echo $golman->cleanSheets; ?></td>
                <td class="align-middle">
                    <img src="<?php echo $golman->klub; ?>" alt="Club Logo" class="club-image" width="40">
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <div class="container mt-4 mb-4">
        <h1>Dobiveni dueli po utakmici</h1>
    </div>

    <table class="table text-center">
        <colgroup>
            <col style="width: 5%;">
            <col style="width: 40%;">
            <col style="width: 20%;">
            <col style="width: 20%;">
        </colgroup>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th class="text-start" scope="col">Igrač</th>
                <th scope="col">Prosjek osvojenih duela po utakmici</th>
                <th scope="col">Klub</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            $firstRow = true;
            foreach ($xml->igracDuel as $igracDuel): 
                $rowClass = $firstRow ? 'table-warning' : '';
                $firstRow = false;
            ?>
            <tr class="<?php echo $rowClass; ?>">
                <td class="align-middle"><?php echo $igracDuel->mjesto; ?></td>
                <td class="text-start">
                    <div class="player-info align-middle">
                        <img src="<?php echo $igracDuel->slika; ?>" alt="<?php echo $igracDuel->ime; ?>" class="circular-image">
                        <span class="player-name"><?php echo $igracDuel->ime; ?></span>
                    </div>
                </td>
                <td class="align-middle"><?php echo $igracDuel->osvojeniDueli; ?></td>
                <td class="align-middle">
                    <img src="<?php echo $igracDuel->klub; ?>" alt="Club Logo" class="club-image" width="40">
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <div class="container mt-4 mb-4">
        <h1>Ključna dodavanja po utakmici</h1>
    </div>

    <table class="table text-center">
        <colgroup>
            <col style="width: 5%;">
            <col style="width: 40%;">
            <col style="width: 20%;">
            <col style="width: 20%;">
        </colgroup>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th class="text-start" scope="col">Igrač</th>
                <th scope="col">Prosjek ključnih dodavanja po utakmici</th>
                <th scope="col">Klub</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            $firstRow = true;
            foreach ($xml->igracDodavanje as $igracDodavanje): 
                $rowClass = $firstRow ? 'table-warning' : '';
                $firstRow = false;
            ?>
            <tr class="<?php echo $rowClass; ?>">
                <td class="align-middle"><?php echo $igracDodavanje->mjesto; ?></td>
                <td class="text-start">
                    <div class="player-info align-middle">
                        <img src="<?php echo $igracDodavanje->slika; ?>" alt="<?php echo $igracDodavanje->ime; ?>" class="circular-image">
                        <span class="player-name"><?php echo $igracDodavanje->ime; ?></span>
                    </div>
                </td>
                <td class="align-middle"><?php echo $igracDodavanje->kljucnaDodavanja; ?></td>
                <td class="align-middle">
                    <img src="<?php echo $igracDodavanje->klub; ?>" alt="Club Logo" class="club-image" width="40">
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <footer class="bg-body-tertiary text-center text-lg-start mt-3">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        Borna Hrastović - 0246113637
    </div>
    </footer>

</body>
</html>