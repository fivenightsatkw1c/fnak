<?php
/*
Naam:       Jeffrey
Datum:      15-12-2023
Subject:    General functies voor de database
*/

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
        echo "<strong>Connected</strong><br>";
        return $conn;
    }
}

// Eindigd de connectie met de database
function EndConnection($conn, $stmt)
{
    $stmt->close();
    $conn->close();
    echo "<strong>Disconnected</strong><br>";
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
    //$result;

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
            echo "<strong>Query successful:</strong> ".$query."<br>";
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