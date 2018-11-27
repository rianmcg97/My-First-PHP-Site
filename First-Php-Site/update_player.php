
<?php 
require_once ("database.php");

//get the form data and save in variables
$player_id = filter_input(INPUT_POST, "player_id");
$team_id = filter_input(INPUT_POST, "team_id");
$position = filter_input(INPUT_POST, "position");
$name = filter_input(INPUT_POST, "name");
$country = filter_input(INPUT_POST, "country");

//run an update query
$query = "UPDATE players SET teamID = :np_team_id, "
        . "playerPosition = :np_position, playerName = :np_name, "
        . "playerCountry = :np_country WHERE playerID = :np_player_id";
$statement = $db -> prepare($query);
$statement -> bindValue(":np_team_id", $team_id);
$statement -> bindValue(":np_position", $position);
$statement -> bindValue(":np_name", $name);
$statement -> bindValue(":np_country", $country);
$statement -> bindValue(":np_player_id", $player_id);
$statement -> execute();
$statement -> closeCursor();
include("index.php");
