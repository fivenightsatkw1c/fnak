<?php
include "Database/GroepController.php";
include "Database/StudentController.php";

// Function to sanitize user input
function sanitize($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

// Function to display error or success messages
function displayMessage($message, $type = 'warning')
{
    return '<p class="' . $type . '">' . $message . '</p>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_form"])) {
    // Get form data
    $groupNaam = sanitize($_POST["team_name"]);
    $email = sanitize($_POST["email"]);
    $selectedTime = sanitize($_POST["time"]);
    $member1 = sanitize($_POST["member1"]);
    $member2 = sanitize($_POST["member2"]);
    $member3 = sanitize($_POST["member3"]);
    $member4 = sanitize($_POST["member4"]);
    $member5 = sanitize($_POST["member5"]);

    // Check if group name already exists
    $existingGroup = ReadOneGroepName($groupNaam);

    if ($existingGroup) {
        // Group name already exists, display an error message
        $errorMessage = displayMessage('Group with the name ' . $groupNaam . ' already exists. Please choose a different name.');
    } else {
        // Continue with the registration process
        // Check if email already exists
        $existingEmail = CheckIfEmailExists($email);

        if ($existingEmail) {
            // Email already exists, display an error message
            $errorMessage = displayMessage('Email ' . $email . ' is already associated with another group. Please use a different email.');
        } else {
            // Check if the selected date and time are already reserved
            $isTimeReserved = CheckIfTimeReserved($selectedTime);

            if ($isTimeReserved) {
                // Time is already reserved, display an error message
                $errorMessage = displayMessage('The selected date and time (' . $selectedTime . ') are already reserved by another group. Please choose a different time.');
            } else {
                // Continue with the registration process
                // Insert group and student data into the database
                // Call CreateGroep and CreateStudent functions as needed
                CreateGroep($groupNaam, $email, $selectedTime);
                $groupId = ReadOneGroepName($groupNaam);
                CreateStudent($groupId, $member1);
                CreateStudent($groupId, $member2);
                CreateStudent($groupId, $member3);
                if (!empty($member4)) CreateStudent($groupId, $member4);
                if (!empty($member5)) CreateStudent($groupId, $member5);

                // Display success message
                $successMessage = displayMessage('Registration successful!', 'success');
            }
        }
    }
}
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
    <?php 
    $link3 = "active-link";
    include 'header.php';
    ?>

    <main class="main">
        <section class="RegisterForm section" id="Register">
            <div class="Register-container container">
                <?php
                if (isset($errorMessage)) {
                    echo $errorMessage;
                    echo '<a href="reservation.php" class="button button--flex">Back to Reservation</a>';
                } elseif (isset($successMessage)) {
                    echo $successMessage;
                }
                ?>

                <form class="Register-form grid" method="post" action="">
                    <!-- Your form inputs go here -->
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
