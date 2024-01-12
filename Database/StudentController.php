<?php
/*
Naam:       Jeffrey
Datum:      15-12-2023
Subject:    General functies voor de database
*/

////////////////////////////////////////////////////////////////////////////////////////////
// Om deze code te gebruiken moet je "include DbGeneralFunctions;" Toevoegen aan je code! //
////////////////////////////////////////////////////////////////////////////////////////////

require_once "/DbGeneralFunctions.php; 


// Creates een nieuwe student
function CreateStudent($GroepId ,$StudentNaam)
{
    // Query aanmaken
    $query = "INSERT INTO Student(GroepId, StudentNaam) VALUES (?, ?)";
    // Query uitvoeren
    return ExecuteQuery($query, "is", [$GroepId, $StudentNaam]);
}

// Haalt alle studenten op
function ReadAllStudent()
{
    // Query aanmaken
    $query = "SELECT * FROM Student";

    // Query uitvoeren
    return ExecuteQuery($query);
}

// Haalt alle studenten op op basis van GroepId
function ReadStudentGroepId($groepId = "StudentId")
{
    // Query aanmaken
    $query = "SELECT * FROM Student WHERE GroepId = ?";

    // Query uitvoeren
    return ExecuteQuery($query, "s", [$groepId]);
}

// Update student uit database op basis van StudentId
function UpdateStudent($studentId, $groepId, $studentNaam)
{
    // Query aanmaken
    $query = "UPDATE Student SET GroepId = ?, StudentNaam = ? WHERE StudentId = ?;";

    // Query uitvoeren
    return ExecuteQuery($query, "isi", [$groepId, $studentNaam, $studentId]);
}

// Verwijderd student uit database op basis van StudentId
function DeleteStudent($studentId)
{
    // Query aanmaken
    $query = "DELETE FROM Student WHERE StudentId = ?";

    // Query uitvoeren
    return ExecuteQuery($query, "i", [$studentId]);
}
