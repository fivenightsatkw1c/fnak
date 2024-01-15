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
            <!-- Your existing content here -->
        </section>

        <section class="section" id="Register-View">
            <h2 class="section-title">Registeer Hier</h2>
            <div class="Register-View-container container">
                <form class="Register-View-form grid" method="post" action="process_form.php">
                    <div class="Register-View-Times grid">
                        <?php
                        // Fetch existing teams and their reserved times
                        $existingTeams = ReadAllGroep();

                        // Create an associative array to store reserved times and team names
                        $reservedTeams = [];

                        // Loop through existing teams
                        while ($row = $existingTeams->fetch()) {
                            $reservedTeams[date('H:i', strtotime($row['reserveerDatumTijd']))] = $row['Groepnaam'];
                        }

                        // Define all possible times
                        $possibleTimes = ["9:00", "10:00", "11:00", "12:00", "13:00", "14:00"];

                        // Loop through possible times to create labels
                        for ($i = 0; $i < count($possibleTimes); $i++) {
                            $time = $possibleTimes[$i];
                            ?>
                            <div class="Register-View-content">
                                <label for="team" class="Register-View-label">
                                    <?php
                                    if (array_key_exists($time, $reservedTeams)) {
                                        echo $reservedTeams[$time];
                                    } else {
                                        echo 'Open';
                                    }
                                    ?>
                                </label>
                            </div>
                            <div class="Register-View-content">
                                <label for="Time" class="Register-View-label"><?php echo $time; ?></label>
                            </div>
                            <?php
                        }
                        ?>
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
