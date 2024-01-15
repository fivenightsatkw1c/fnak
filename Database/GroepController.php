<?php
/*
Naam:       Jeffrey
Datum:      15-12-2023
Subject:    
*/

require_once "DbGeneralFunctions.php"; 

// Creates een nieuwe groep en zet deze in de database
function CreateGroep($groepNaam, $email, $reserveerDatumTijd)
{
    // Query aanmaken
    $query = "INSERT INTO Groep(Groepnaam, Email, reserveerDatumTijd) VALUES (?, ?, ?)";
    // Query uitvoeren
    return ExecuteQuery($query, "sss", [$groepNaam, $email, $reserveerDatumTijd]);
}

// Haalt alle groepen op en sorteerd deze
// Gebruik fetch_assoc om resultaten op te halen. Voorbeeld: (haalt alle groep Email op)
// $result = ReadAllGroepStudent();
// while($row = $result->fetch_assoc())
// {
//     echo $row["Email"]."<br>";
// }
function ReadAllGroep()
{
    $query = "SELECT * FROM Groep";

    // Call ExecuteQuery to execute the query
    $result = ExecuteQuery($query, '', []);

    // Fetch all rows from the result set
    $groepen = $result->fetchAll(PDO::FETCH_ASSOC);

    return $groepen;
}

// Haalt één groep op
function ReadOneGroep($GroepId)
{
    // Query aanmaken
    $query = "SELECT G.*, S.StudentId, S.StudentNaam ".
    "FROM Groep AS G ".
    "JOIN Student AS S ".
    "ON G.GroepId = S.StudentId ".
    "WHERE GroepId = ?";
    
    // Query uitvoeren
    return ExecuteQuery($query, "i", [$GroepId]);
}

function ReadOneGroepName($Groepnaam)
{
    // Query aanmaken
    $query = "SELECT GroepId ".
    "FROM Groep ".
    "WHERE Groepnaam = ?";
    
    // Query uitvoeren
    return ExecuteQuery($query, "s", [$Groepnaam])->fetch()["GroepId"];
}

// Update de groep op basis van GroepId
function UpdateGroep($groepId, $groepNaam, $email, $reserveerDatumTijd, $escapeTijd)
{
    // Query aanmaken
    $query = 
        "UPDATE Groep ".
        "SET Groepnaam = ?, Email = ?, reserveerDatumTijd = ?, EscapeTijd = ? ".
        "WHERE GroepId = ?;";
    
    // Query uitvoeren
    return ExecuteQuery($query, "ssssi", [$groepNaam, $email, $reserveerDatumTijd, $escapeTijd, $groepId]);
}

// Verwijderd een groep uit de database op basis van GroepId
function DeleteGroep($groepId)
{
    // Query aanmaken
    $query = "DELETE FROM Groep WHERE GroepId = ?";

    // Query uitvoeren
    return ExecuteQuery($query, "i", [$groepId]);
}

// Function to check if a specific time is already reserved
function CheckIfTimeReserved($reserveTime)
{
    // Query to check if the time is reserved
    $query = "SELECT COUNT(*) as count FROM Groep WHERE EscapeTijd = ?";
    
    // Execute the query
    $result = ExecuteQuery($query, "s", [$reserveTime]);

    // Fetch the result as an associative array
    $row = $result->fetch();

    // Extract the count from the associative array
    $count = isset($row['count']) ? $row['count'] : 0;

    // Return true if count is greater than 0, indicating the time is reserved
    return $count > 0;
}