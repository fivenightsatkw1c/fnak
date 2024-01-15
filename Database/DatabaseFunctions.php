<?php
/*
Naam:       Jeffrey, Daan
Datum:      15-12-2023
Subject:    Alle functies voor de database
*/

////////////////////////////////
//                            //
//   Gebruik deze file NIET   //
//                            //
////////////////////////////////

//////////////////////
// General functies //
//////////////////////

// Start een connectie met de database
function StartConnection()
{
    // Replace these values with your actual database credentials
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "Fnak";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error)
    {
        die("<strong>Connection failed:</strong> ".$conn->connect_error."<br>");
    }
    else
    {
        // echo "<strong>Connected</strong><br>";
        return $conn;
    }
}

// Eindigd de connectie met de database
function EndConnection($conn, $stmt)
{
    $stmt->close();
    $conn->close();
    // echo "<strong>Disconnected</strong><br>";
}

/*
$Query = een string van de query die uitgevoert moet worden. Alle data in deze query moet een "?" worden.
$Types = een string met alle datatypes die gebruikt word voor bind_param().
    Voor meer informatie: https://www.php.net/manual/en/mysqli-stmt.bind-param.php
$arg = een array van alle data
    Voor meer informatie: https://www.php.net/manual/en/mysqli-stmt.bind-param.php
*/
function ExecuteQuery($query, $types = "", array $arg = [])
{
    $result = null;

    // Start de connectie
    $conn = StartConnection();
        
    // Maakt de query klaar
    $stmt = $conn->prepare($query);

    // Voert de query argumenten in als dat nodig is
    if ($types != "")
    {
        $stmt->bind_param($types, ...$arg);
    }

    // Voert de query uit
    try
    {
        $stmt->execute();
        // Was de query uitvoeren goed gegaan?
        if ($stmt)
        {
            // Haal resultaat op
            $result = $stmt->get_result();
            // Als er geen resultaat is betekent dat het geen select query is en word de affected_rows terug gegeven
            if ($result == null)
            {
                $result = $stmt->affected_rows;
            }
            // echo "<strong>Query successful:</strong> ".$query."<br>";
        }
        else
        {
            // 😔
            echo "<strong>Er is iets mis gegaan</strong><br>";
        }
    }
    catch (Exception $e)
    {
        // 😔
        echo "<strong>Query error</strong>: ".$query."<br>".$e."<br>";
        die();
    }

    // Eindigd de connectie
    EndConnection($conn, $stmt);

    // Geeft het resultaat terug
    return $result;
}

////////////////////
// Groep functies //
////////////////////

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
function ReadAllGroep($OrderBy = "G.GroepId")
{
    // Query aanmaken
    $query = "SELECT * ".
    "FROM Groep AS G ".
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
function ReadOneGroepName($Groepnaam)
{
    // Query aanmaken
    $query = "SELECT GroepId ".
    "FROM Groep ".
    "WHERE Groepnaam = ?";
    
    // Query uitvoeren
    return ExecuteQuery($query, "s", [$Groepnaam])->fetch_row()[0];
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

//////////////////////
// Student functies //
//////////////////////

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

/*
// Random read test
$result = ReadAllGroep();
$groepen = [];
while($row = $result->fetch_assoc())
{
    array_push($groepen, ['Groep' => $row, 'Studenten' => []]);
}

foreach($groepen as $key=>$groep)
{
    $result = ReadStudentGroepId($groep["Groep"]["GroepId"]);
    $studenten = [];
    while($row = $result->fetch_assoc())
    {
        array_push($studenten, $row);
    }
    $groepen[$key]['Studenten'] = $studenten;
}

foreach($groepen as $groep)
{
    echo "<details><summary>".$groep["Groep"]["Groepnaam"]."</summary>";
    $studenten = $groep["Studenten"];
    foreach($studenten as $student)
    {
        echo "<p>".$student["StudentNaam"]."</p>";
    }
    echo "</details><br>";
}
*/