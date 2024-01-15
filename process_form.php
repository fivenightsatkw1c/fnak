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