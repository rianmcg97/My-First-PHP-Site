<?php
require_once ("database.php");

$team_id = filter_input(INPUT_POST, "team_id");
$player_id = filter_input(INPUT_POST, "player_id");

$query = "DELETE FROM teams WHERE teamID = :np_team_id";
$statement = $db -> prepare($query);
$statement -> bindValue(":np_team_id", $team_id);
$statement -> execute();
$statement -> closeCursor();

include("index.php");
