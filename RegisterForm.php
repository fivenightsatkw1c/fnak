<?php
include "Database/GroepController.php";
include "Database/StudentController.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- UNICONS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- SWIPER CSS -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!-- GOOGLE FONT POPPIN -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- FAVICON -->
    <link rel="icon" href="assets/img/favicon.png" type="image/png">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Koning Willem 1</title>
</head>

<body>


    <main class="main">
        <section class="RegisterForm section" id="Register">
            <h2 class="section-title">Registeer Hier</h2>
            <span class="section-subtitle"></span>

                <div class="Register-container container">
    <form class="Register-form grid" method="post" action="process_form.php">
        <div class="Register-inputs grid">
            <div class="Register-content">
                <label for="team" class="Register-label">TeamNaam</label>
                <input type="text" class="Register-input" id="GroepName" name="team_name" required />
            </div>
            <div class="Register-content">
                <label for="email" class="Register-label"> Primaire Contact E-mail (Voor Noodgeval)</label>
                <input type="email" class="Register-input" id="Email" name="email" required />
            </div>
            <div class="Register-content">
                <label required for="email" class="Register-label">Tijd</label>
                <?php
                    $result = ReadAllGroep();
                    $groepen = [];

                    // Haalt de data op
                    while($row = $result->fetch())
                    {
                        // Convert dateTime
                        $date = date_parse($row["reserveerDatumTijd"]);
                        array_push($groepen, $date);
                    }
                    // echo '<pre>';
                    // var_dump($groepen); die();
                    // echo '</pre>';

                    // Alle mogelijke tijden
                    $times =
                    [
                        ["day" => 22, "hour" => 9],
                        ["day" => 22, "hour" => 10],
                        ["day" => 22, "hour" => 11],
                        ["day" => 22, "hour" => 12],
                        ["day" => 22, "hour" => 13],
                        ["day" => 22, "hour" => 14],
                        ["day" => 23, "hour" => 9],
                        ["day" => 23, "hour" => 10],
                        ["day" => 23, "hour" => 11],
                        ["day" => 23, "hour" => 12],
                        ["day" => 23, "hour" => 13],
                        ["day" => 23, "hour" => 14],
                    ];

                    $groepenTijdenBezet = [];
                    // Kijkt welke tijden al gekozen zijn
                    foreach($groepen as $groep)
                    {
                        array_push($groepenTijdenBezet, [$groep["day"], $groep["hour"]]);
                    }

                    foreach($times as $index => $time)
                    {
                        foreach($groepen as $groep)
                        {
                            if ($groep["day"] == $time["day"] && $groep["hour"] == $time["hour"])
                            {
                                unset($times[$index]);
                            }
                        }
                    }

                    $currectDay = -1;
                    echo "<select name=\"time\" class=\"Register-input\">";
                    echo "<option disabled selected>Selecteer een tijd</option>";
                    foreach($times as $time)
                    {
                        if($currectDay != $time["day"])
                        {
                            $currectDay = $time["day"];
                            echo "<option disabled>".$currectDay."januari </option>";
                        }
                        $content = $time["hour"].":00 uur";
                        $value = "2024-1-" . $time["day"] . " " . $time["hour"] . ":00:00";
                        echo "<option value=\"" . $value . "\">".$content."</option>";
                    }
                    echo "</select>";

                    ?>
            </div>
            <div class="Register-content">
                <label for="leden" class="Register-label">teamlid 1</label>
                <input type="text" class="Register-input"  id="leden1" name="member1" required />
            </div>
            <div class="Register-content">
                <label for="leden" class="Register-label">teamlid 2</label>
                <input type="text" class="Register-input"  id="leden2" name="member2" required />
            </div>
            <div class="Register-content">
                <label for="leden" class="Register-label">teamlid 3</label>
                <input type="text" class="Register-input"  id="leden3" name="member3" required />
            </div>
            <div class="Register-content">
                <label for="leden" class="Register-label">teamlid 4(Optioneel)</label>
                <input type="text" class="Register-input" id="leden4" name="member4"/>
            </div>
            <div class="Register-content">
                <label for="leden" class="Register-label">teamlid 5(Optioneel)</label>
                <input type="text" class="Register-input" id="leden5" name="member5"/>
            </div>
        </div>
        <div>
          
        <button type="submit" <?php if(count($times) == 0) echo 'disabled';?> class="button button--flex" name="submit_form">
            Registreren
            <i class="uil uil-message button-icon"></i>
        </button>
        </div>
    </form>
</div>


            </section>
        </main>

    <?php include 'footer.php'; ?>

    <!-- SWIPER JS -->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!-- SCROLL REVEAL JS -->
    <script src="assets/js/scrollreveal.min.js"></script>

    <!-- MAIN JS -->
    <script src="assets/js/main.js"></script>
</body>

</html>
