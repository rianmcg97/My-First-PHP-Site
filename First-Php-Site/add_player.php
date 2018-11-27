<?php
//connect to database
require_once ("database.php");
//get the values from te form
$team_id = filter_input(INPUT_POST, "team_id");
if (!isset($team_id)) 
{
    include("add_player_form.php");
    exit();
}
$position = filter_input(INPUT_POST, "position");
$name = filter_input(INPUT_POST, "name");
$country = filter_input(INPUT_POST, "country");
//run the insert query
$insertQuery = "INSERT INTO players (teamID, playerPosition, playerName, playerCountry) "
        . "VALUES (:np_team_id, :np_position, :np_name, :np_country)";
$statement = $db -> prepare($insertQuery);
$statement -> bindValue(":np_team_id", $team_id);
$statement -> bindValue(":np_position", $position);
$statement -> bindValue(":np_name", $name);
$statement -> bindValue(":np_country", $country);
$statement -> execute();
$statement -> closeCursor();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="MyCss/main.css" rel="stylesheet" type="text/css"
    </head>
    <body>
        <header> <img src="images/pl_logo.png" img id="pl_logo"><h1>The Premier League Stars</h1></header>
        <main>
            <h1>Add Player</h1>
            <a href="index.php">Back to Main Page</a>
        </main>
        <?php
        // put your code here
        ?>
    </body>
</html>


