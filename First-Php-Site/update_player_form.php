<?php
require_once ("database.php");
$query = "Select * from teams";
$statement = $db -> prepare($query);
$statement -> execute();
$teams_array = $statement -> fetchAll();
$statement -> closeCursor();

//get the team_id and player_id from the form (passed from the index.php page)
$team_id = filter_input(INPUT_POST, "team_id");
$player_id = filter_input(INPUT_POST, "player_id");

//look up the player information based on the player_id
$queryByplayerID = "SELECT * FROM players WHERE playerID = :np_player_id";
$statement1 = $db -> prepare($queryByplayerID);
$statement1 -> bindValue(":np_player_id", $player_id);
$statement1 -> execute();
$player = $statement1 -> fetch();
$statement1 -> closeCursor();
include 'header.php';
?>




            <h1>Update player</h1>
            <form action="update_player.php" method="post">
                <input type="hidden" name="player_id" value="<?php echo $player_id; ?>"/>
                <label>team:</label>
                <!-- Drop down list populated from the teams table -->
                <select name="team_id">
                    <?php foreach($teams_array as $team_row) : ?>
                    <option value="<?php echo $team_row["teamID"]; ?>"
                            <?php if($team_row["teamID"] == $team_id) { ?>
                            selected
                            <?php } ?>
                            >
                    <?php echo $team_row["teamName"];  ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <br/>
                <label for="position">Position:</label>
                
                <label>Position:</label>
                <select name="position" value="<?php echo $player["playerPosition"];?>"required=""
                 
                    <option value="Goalkeeper">Goalkeeper</option>
                    <option value="Defender">Defender</option>
                    <option value="Midfielder">Midfielder</option>
                    <option value="Winger">Winger</option>
                    <option value="Striker">Striker</option>
                 </select><br/>
                <label>Name:</label>
                <input type="text" name="name" value="<?php echo $player["playerName"]; ?>" required=""/><br/>
                <label>Country:</label>
                <input type="text" name="country" value="<?php echo $player["playerCountry"]; ?>" required=""/><br/>
                <input type="submit" value="Update player"/>
                
            </form>
        </main>
        <?php
        // put your Position here
        ?>
    </body>
</html>

