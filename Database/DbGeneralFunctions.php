<?php
/*
Naam:       Jeffrey
Datum:      15-12-2023
Subject:    General functies voor de database
*/

// Start een connectie met de database
function StartConnection()
{
  // connect to the database
  $conn = new PDO("sqlsrv:Server=fnak.database.windows.net;Database=fnak", "sqladmin", "En93N8=?@sB^FjP");


    // Check the connection
    if ($conn->errorCode() == '00000')
    {
        die("<strong>Connection failed:</strong>" . $conn->errorInfo() . "<br>");
    }
    else
    {
        // echo "<strong>Connected</strong><br>";
        return $conn;
    }
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

    // Voert de query uit
    try
  {
        // Was de query uitvoeren goed gegaan?
        if ($stmt->execute($arg))
        {
            // Haal resultaat op
            $result = $stmt;
            // Als er geen resultaat is betekent dat het geen select query is en word de affected_rows terug gegeven
            if ($result->columnCount() == 0)
            {
                $result = $stmt->rowCount();
            }
            // echo "<strong>Query successful:</strong> ".$query."<br>";
        }
        else
        {
            // 😔
            echo "<strong>Er is iets mis gegaan</strong><br>";
            die();
        }
    }
    catch (PDOException $e)
    {
        // 😔
      if($e->getCode() == 23000)
      {
        echo "<script>alert(\"de team naam bestaat al\")</script>";
      }else{
        echo "er ging iets fout: " . $e->getMessage();
    }
    die(); 
    }

    // Geeft het resultaat terug
    return $result;
}
