<?php

require_once './Database/GroepController.php';

$groepName = $_POST['team_name'];
$email = $_POST['email'];
$reserveerDatumTijdstr = "2024-01-" . $_POST['day'] . " " . $_POST['time'] . ":" . "00";
$reserveerDatumTijd = new DateTime($reserveerDatumTijdstr);

$result = $reserveerDatumTijd->format('Y-m-d H:i:s');


#CreateGroep($groepName, $email, $result);

$groepId = ReadOneGroepName($groepName);


$members = [$_POST['member1'], $_POST['member2'], $_POST['member3']];
if (isset($_POST['member4']))
  array_push($members, $_POST['member4']);

if (isset($_POST['member4'])) {
    array_push($members, $_POST['member5']);
}


foreach ($members as $member) {
    CreateStudent($groepId, $member);
}











