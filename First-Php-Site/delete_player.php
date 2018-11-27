<?php
require_once ("database.php");

$team_id = filter_input(INPUT_POST, "team_id");
$playerID = filter_input(INPUT_POST, "playerID");

$query = "DELETE FROM players WHERE playerID = :np_playerID";
$statement = $db -> prepare($query);
$statement -> bindValue(":np_playerID", $playerID);
$statement -> execute();
$statement -> closeCursor();

include("index.php");
