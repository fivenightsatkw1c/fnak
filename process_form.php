<?php
include "Database/GroepController.php";
include "Database/StudentController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_form"])) {
    // Get form data
    $groupNaam = $_POST["team_name"];
    $email = $_POST["email"];
    $selectedTime = $_POST["time"];
    $member1 = $_POST["member1"];
    $member2 = $_POST["member2"];
    $member3 = $_POST["member3"];
    $member4 = $_POST["member4"];
    $member5 = $_POST["member5"];

    // Check if group name already exists
    $existingGroup = ReadOneGroepName($groupNaam);

    if ($existingGroup) {
        // Group name already exists, display an error message
        echo '<p class="warning">Group with the name ' . $groupNaam . ' already exists. Please choose a different name.</p>';
    } else {
        // Continue with the registration process
        // Check if email already exists
        $existingEmail = CheckIfEmailExists($email);

        if ($existingEmail) {
            // Email already exists, display an error message
            echo '<p class="warning">Email ' . $email . ' is already associated with another group. Please use a different email.</p>';
        } else {
            // Check if the selected date and time are already reserved
            $isTimeReserved = CheckIfTimeReserved($selectedTime);

            if ($isTimeReserved) {
                // Time is already reserved, display an error message
                echo '<p class="warning">The selected date and time (' . $selectedTime . ') are already reserved by another group. Please choose a different time.</p>';
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

                // Display success message or redirect to another page
                echo '<p class="success">Registration successful!</p>';
            }
        }
    }
}
?>
