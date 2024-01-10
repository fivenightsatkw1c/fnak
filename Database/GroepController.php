<?php
/*
Naam:       Jeffrey
Datum:      15-12-2023
Subject:    General functies voor de database
*/

////////////////////////////////////////////////////////////////////////////////////////////
// Om deze code te gebruiken moet je "include DbGeneralFunctions;" Toevoegen aan je code! //
////////////////////////////////////////////////////////////////////////////////////////////

// Creates een nieuwe groep en zet deze in de database
function CreateGroep($groepNaam, $email, $reserveerDatumTijd)
{
    // Query aanmaken
    $query = "INSERT INTO Groep(Groepnaam, Email, reserveerDatumTijd, EscapeTijd) VALUES (?, ?, ?, ?)";
    // Query uitvoeren
    return ExecuteQuery($query, "ssss", [$groepNaam, $email, $reserveerDatumTijd]);
}

// Haalt alle groepen op en sorteerd deze
// Gebruik fetch_assoc om resultaten op te halen. Voorbeeld: (haalt alle groep Email op)
// $result = ReadAllGroepStudent();
// while($row = $result->fetch_assoc())
// {
//     echo $row["Email"]."<br>";
// }
function ReadAllGroep($OrderBy = "G.GroepId")
{
    // Query aanmaken
    $query = "SELECT G.*, S.StudentId, S.StudentNaam ".
    "FROM Groep AS G ".
    "JOIN Student AS S ".
    "ON G.GroepId = S.StudentId ".
    "ORDER BY ?";
    
    // Query uitvoeren
    return ExecuteQuery($query, "s", [$OrderBy]);
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