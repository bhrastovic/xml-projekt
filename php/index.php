<?php

$tablica = json_decode(file_get_contents('../json/tablica.json'), true);

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
                        <a class="nav-link active" aria-current="page" href="index.php">Početna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="najboljiIgraci.php">Najbolji igrači</a>
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
        <h1>Tablica</h1>
    </div>

    <table class="table text-center">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th class="text-start" scope="col">Team</th>
            <th scope="col">P</th>
            <th scope="col">W</th>
            <th scope="col">D</th>
            <th scope="col">L</th>
            <th scope="col">GD</th>
            <th scope="col">PTS</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($tablica as $index => $klub) { 
            $rowClass = '';
            if ($index === 0) {
                $rowClass = 'table-success';
            } elseif ($index === 1) {
                $rowClass = 'table-primary';
            } elseif ($index === 2 || $index === 3) {
                $rowClass = 'table-warning';
            } elseif ($index === count($tablica) - 1) {
                $rowClass = 'table-danger';
            }
        ?>
            <tr class="<?php echo $rowClass; ?>">
                <td><?php echo $klub['position']; ?></td>
                <td class="text-start">
                    <img src="<?php echo $klub['badge']; ?>" alt="<?php echo $klub['club']; ?> badge" width="30" class="me-2">
                    <?php echo $klub['club']; ?>
                </td>
                <td><?php echo $klub['matchesPlayed']; ?></td>
                <td><?php echo $klub['win']; ?></td>
                <td><?php echo $klub['draw']; ?></td>
                <td><?php echo $klub['lose']; ?></td>
                <td><?php echo $klub['goalDifference']; ?></td>
                <td><?php echo $klub['points']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="container mt-4">
        <h1>Novosti</h1>
        <div class="row mt-5">
            <div class="col text-center">
                <img src="../slike/slika1.jpg" alt="" class="w-100">
                <h5 class="text-start mt-3">Dinamo slavi naslov, Rijeka zaključila sezonu pobjedom uz hat-trick Jankovića</h5>
                <p class="text-start">Od aktualne se sezone drugoplasirana Rijeka oprostila visokom domaćom pobjedom nad Slaven Belupom, a Dinamo je u slavljeničkoj atmosferi odigrao neriješenih 3:3 s Rudešom.</p>
                <p class="text-start fst-italic">26.05.2024.</p>
            </div>
            <div class="col text-center">
                <img src="../slike/slika2.jpg" alt="" class="w-100">
                <h5 class="text-start mt-3">Mierez i Bukvić za pobjedu Osijeka, Hajduk u nesvakidašnjoj golijadi svladao Lokomotivu</h5>
                <p class="text-start">Nogometaši Osijeka zaključili su svoju prvenstvenu sezonu gostujućom pobjedom kod Varaždina, a Hajduk je potom uvjerljivo pobijedio kod Lokomotive.</p>
                <p class="text-start fst-italic">25.05.2024</p>
            </div>
            <div class="col text-center">
                <img src="../slike/slika3.jpg" alt="" class="w-100">
                <h5 class="text-start mt-3">Gorica pobjedom nad Istrom 1961 osigurala sedmo mjesto</h5>
                <p class="text-start">U prvoj utakmici posljednjeg ovosezonskog kola SuperSport HNL-a sastali su se Gorica i Istra 1961, a domaćin je pogocima s igračem više u završnih petnaestak minuta došao do pobjede 2:0.</p>
                <p class="text-start fst-italic">24.05.2024.</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <img src="../slike/slika4.jpg" alt="" class="w-100">
                <h5 class="text-start mt-2">Dvostruka kruna: Dinamo u Rijeci osvojio i Kup</h5>
                <p class="text-start">Nakon osvajanja SuperSport HNL-a, nogometaši zagrebačkog Dinama osvojili su i naslov pobjednika SuperSport Hrvatskog nogometnog kupa.</p>
                <p class="text-start fst-italic">22.05.2024.</p>
            </div>
            <div class="col text-center">
                <img src="../slike/slika5.jpg" alt="" class="w-100">
                <h5 class="text-start mt-2">Novčane kazne za Hajduk, Osijek, Rijeku i Dinamo</h5>
                <p class="text-start">Disciplinski sudac SuperSport Hrvatske nogometne lige, Alan Klakočer, donio je odluke o kaznama iz utakmica 35. kola.</p>
                <p class="text-start fst-italic">22.05.2024</p>
            </div>
            <div class="col text-center">
                <img src="../slike/slika6.jpg" alt="" class="w-100">
                <h5 class="text-start mt-2">Osijek pobjedom potvrdio četvrto mjesto, Hajduk preokretom svladao Goricu</h5>
                <p class="text-start">U posljednjoj domaćoj utakmici ove sezone Hajduk je unatoč vodstvu gostiju nadjačao Goricu (2:1), a Osijek je potom pred svojim navijačima izborio vizu za europska natjecanja.</p>
                <p class="text-start fst-italic">19.05.2024.</p>
            </div>
        </div>
    </div>

    <footer class="bg-body-tertiary text-center text-lg-start mt-3">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        Borna Hrastović - 0246113637
    </div>
    </footer>

</body>
</html>