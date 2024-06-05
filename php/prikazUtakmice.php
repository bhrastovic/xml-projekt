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
                        <a class="nav-link" aria-current="page" href="najboljiIgraci.php">Najbolji igrači</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="prikazUtakmice.php">Detalji utakmica</a>
                    </li>
                </ul>
            </div>
            <span class="sezona fst-italic">SEZONA 2023./24.</span>
        </div>
    </nav>

    <div class="container text-center mt-4">
        <p>Kako bi dobio vizualni prikaz odabrane utakmice <b> potrebno je napraviti XML datoteku po zadanoj Schemi</b></p>
        <p>Potrebnu XML Schemu možeš preuzeti klikom na gumb ispod</p>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col text-center">
                <a href="../XML/schema.xsd" class="btn btn-primary" download>Preuzmi XML Schemu</a>
            </div>
        </div>
    </div>

    <hr>

    <div class="container text-center mt-4">
        <p>Ako nemaš vremena, volje ili nečeg trećeg za izradu vlastitog XML dokumenta po zadanoj schemi <b> slobodno preuzmi gotov XML kako bi testirao funkcionalnost </b></p>
        <p>Primjer ispravnog XML dokumenta možeš preuzeti klikom na gumb ispod</p>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col text-center">
                <a href="../XML/primjer.xml" class="btn btn-primary" download>Preuzmi Ispravni XML Dokument</a>
            </div>
        </div>
    </div>

    <hr>

    <div class="container text-center mt-4">
        <p>Nakon što napraviš potrebnu XML datoteku <b> uploadaj je klikom na gumb ispod </b> kako bi dobio vizualni prikaz utakmice</p>
    </div>

    <div class="container text-center">
        <form action="prikazUtakmice.php" method="post" enctype="multipart/form-data">
            <label for="xml_file">XML datoteka:</label>
            <input type="file" id="xml_file" name="xml_file" accept=".xml"><br><br>

            <p>U zadnjem koraku pritisni gumb ispod kako bi <b> prenio datoteku i dobio vizualni prikaz utakmice</b></p>
            
            <input type="submit" class="btn btn-primary" value="Prenesi datoteku">
        </form>
    </div>

    <div class="container mt-4 mb-4 border text-center">
        <?php
            error_reporting(0);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Check if a file is uploaded
                if(isset($_FILES["xml_file"]) && $_FILES["xml_file"]["error"] == 0) {
                    // Check file extension
                    $file_ext = pathinfo($_FILES["xml_file"]["name"], PATHINFO_EXTENSION);
                    if($file_ext === "xml") {
                        // Load the uploaded XML file
                        $xml = new DOMDocument();
                        if($xml->load($_FILES["xml_file"]["tmp_name"])) {
                            // Load the schema
                            $schemaPath = "../xml/schema.xsd"; // Path to your schema file
                            // Validate the XML against the schema
                            if($xml->schemaValidate($schemaPath)) {
                                // Print the content of the XML file
                                $homeClub = $xml->getElementsByTagName("homeClub")->item(0)->nodeValue;
                                $awayClub = $xml->getElementsByTagName("awayClub")->item(0)->nodeValue;
                                $homeScore = $xml->getElementsByTagName("homeScore")->item(0)->nodeValue;
                                $awayScore = $xml->getElementsByTagName("awayScore")->item(0)->nodeValue;
                                $date = $xml->getElementsByTagName("date")->item(0)->nodeValue;
                                $stadiumName = $xml->getElementsByTagName("stadiumName")->item(0)->nodeValue;
                                $spectators = $xml->getElementsByTagName("spectators")->item(0)->nodeValue;
                                $referee = $xml->getElementsByTagName("referee")->item(0)->nodeValue;
                                
                                // Print match details
                                echo "<div class='container text-center'>";
                                echo "<p class='display-3'>$homeClub $homeScore - $awayScore $awayClub</p>";
                                echo "<p class='fst-italic'>$date</p>";
                                echo "<p class='display-6'>Glavni sudac: $referee</p>";
                                echo "</div>";
                                
                                // Print starting elevens as a table
                                echo "<div class='container text-center'>";
                                echo "<h3>Sastavi</h3>";
                                echo "<table class='table'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>$homeClub</th>";
                                echo "<th>$awayClub</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                $StartingElevenHome = $xml->getElementsByTagName("startingElevenHome")->item(0)->getElementsByTagName("player");
                                $StartingElevenAway = $xml->getElementsByTagName("startingElevenAway")->item(0)->getElementsByTagName("player");
                                $homeCoach = $xml->getElementsByTagName("homeCoach")->item(0)->nodeValue;
                                $awayCoach = $xml->getElementsByTagName("awayCoach")->item(0)->nodeValue;

                                $maxPlayers = max($StartingElevenHome->length, $StartingElevenAway->length);
                                for($i = 0; $i < $maxPlayers; $i++) {
                                    echo "<tr>";
                                    echo "<td>" . ($StartingElevenHome->item($i) ? $StartingElevenHome->item($i)->nodeValue : "") . "</td>";
                                    echo "<td>" . ($StartingElevenAway->item($i) ? $StartingElevenAway->item($i)->nodeValue : "") . "</td>";
                                    echo "</tr>";
                                }

                                echo "<tr>";
                                echo "<td><b>Trener:</b> $homeCoach</td>";
                                echo "<td><b>Trener:</b> $awayCoach</td>";
                                echo "</tr>";
                                echo "</tbody>";
                                echo "</table>";
                                echo "<p class='display-6'>$stadiumName - $spectators gledatelja</p>";
                                echo "</div>";
                            } else {
                                echo "The XML file is invalid according to the schema.";
                            }
                        } else {
                            echo "Failed to load XML file.";
                        }
                    } else {
                        echo "Nije odabrana XML datoteka.";
                    }
                } else {
                    echo "Nije odabrana niti jedna datoteka.";
                }
            }
        ?>
    </div>

    <footer class="bg-body-tertiary text-center text-lg-start mt-3">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        Borna Hrastović - 0246113637
    </div>
    </footer>

</body>
</html>