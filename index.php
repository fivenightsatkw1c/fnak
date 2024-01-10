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
    <?php 
      $link1="active-link";
      include 'header.php';
    ?>

    <main class="main">
        <section class="section">
            <h1 class="section-title">Speel jij mee met de escape room?</h1>
            <p class="section-subtitle">
                Stap in de toekomst van escape rooms met onze unieke ervaring, volledig aangedreven door de kracht
                van Raspberry Pi! Ontdek een wereld waar technologie en spanning samenkomen in een meeslepend
                avontuur zonder grenzen. Onze escape room, gevormd door innovatieve Raspberry Pi-componenten, biedt
                een opwindende reeks uitdagingen die je denkvermogen en teamvaardigheden op de proef stellen.
                Duik in een labyrint van geavanceerde puzzels en interactieve opstellingen, waar elke Raspberry
                Pi-geïntegreerde component een sleutelrol speelt in het ontrafelen van de mysteries. Werk samen met
                je team, analyseer de codes en navigeer door de digitale en fysieke puzzels om de ultieme
                ontsnapping te bereiken.
                Durf jij de onbekende wereld van onze Raspberry Pi escape room te betreden? Reserveer nu en ontdek
                een nieuwe dimensie van escapisme, waar de toekomst van technologie en entertainment elkaar ontmoeten.
                Een ervaring die je niet wilt missen!
            </p>
            <div>
                <button type="submit" class="button button--flex" name="submit_form">
                    Registreren
                    <i class="uil uil-message button-icon"></i>
                </button>
            </div>
        </section>

        <section class="section" id="Register">
            <h2 class="section-title">Registeer Hier</h2>
            <div class="Register-container container">
                <form class="Register-form grid" method="post" action="process_form.php">
                    <div class="Register-inputs grid">
                        <div class="Register-content">
                            <label for="team" class="Register-label">TeamNaam</label>
                            <input type="text" class="Register-input" id="name" name="team_name" required>
                        </div>
                        <div class="Register-content">
                            <label for="email" class="Register-label"> Primaire Contact E-mail</label>
                            <input type="email" class="Register-input" id="email" name="email" required>
                        </div>
                        <div class="Register-content">
                            <label for="day" class="Register-label">Dag</label>
                            <select name="day" class="Register-input">
                                <option value="22">22nd January</option>
                                <option value="23">23rd January</option>
                            </select>
                        </div>
                        <div class="Register-content">
                            <label for="email" class="Register-label">Tijd</label>
                            <select name="time" class="Register-input">
                                <?php
                                for ($hour = 9; $hour <= 14; $hour++) {
                                    $timeValue = sprintf("%02d:00", $hour);
                                    echo "<option value=\"$timeValue\">$hour:00</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="Register-content">
                            <label for="leden" class="Register-label">teamlid 1</label>
                            <input type="text" class="Register-input" id="leden" name="members" required>
                        </div>
                        <div class="Register-content">
                            <label for="leden" class="Register-label">teamlid 2</label>
                            <input type="text" class="Register-input" id="leden" name="members" required>
                        </div>
                        <div class="Register-content">
                            <label for="leden" class="Register-label">teamlid 3</label>
                            <input type="text" class="Register-input" id="leden" name="members" required>
                        </div>
                        <div class="Register-content">
                            <label for="leden" class="Register-label">teamlid 4(Optioneel)</label>
                            <input type="text" class="Register-input" id="leden" name="members">
                        </div>
                        <div class="Register-content">
                            <label for="leden" class="Register-label">teamlid 5(Optioneel)</label>
                            <input type="text" class="Register-input" id="leden" name="members">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="button button--flex" name="submit_form">
                            Registreren
                            <i class="uil uil-message button-icon"></i>
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>

    <!-- Scripts -->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
