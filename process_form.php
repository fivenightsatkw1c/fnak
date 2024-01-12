<?php

require_once './Database/GroepController.php';
include "Database/StudentController.php";

$groepName = $_POST['team_name'];
$email = $_POST['email'];
$reserveerDatumTijdstr = $_POST['time'];

$reserveerDatumTijd = new DateTime($reserveerDatumTijdstr);

$result = $reserveerDatumTijd->format('Y-m-d H:i:s');
CreateGroep($groepName, $email, $result);

$groepId = ReadOneGroepName($groepName);


$members = [$_POST['member1'], $_POST['member2'], $_POST['member3']];
if (($_POST['member4']) !== "") {
    array_push($members, $_POST['member4']);
}
if (($_POST['member5']) !== "") {
    array_push($members, $_POST['member5']);
}


foreach ($members as $member) {
    CreateStudent($groepId, $member);
}
echo 'Registratie successfull. U wordt terug gestuurd naar de home pagina over een paar seconden';
header( "refresh:4;url=index.php" );
