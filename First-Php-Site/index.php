<?php
 if (!isset($teamID)) {
        $teamID = filter_input(INPUT_GET, "teamID", FILTER_VALIDATE_INT);
        if ($teamID == NULL || $teamID == FALSE) {
            $teamID = 1;
        }
    }
    
    if (!isset($playerID)) {
        $playerID = filter_input(INPUT_GET, "playerID", FILTER_VALIDATE_INT);
        if ($playerID == NULL || $playerID == FALSE) {
            $playerID = 1;
        }
    }
    
    require_once ("database.php");
    //write the query
    $query = "SELECT * from teams ORDER BY teamName";
    //sanitizing the query
    $statement = $db -> prepare($query);
    //executing the query
    $statement->execute();
    //fetch the results
    $teams = $statement->fetchAll();
    //print_r($categories);
    $statement->closeCursor();

    $queryTeam = "SELECT * from teams WHERE teamID = :teamID";
    $statement1 = $db ->prepare($queryTeam);
    $statement1->bindValue(":teamID", $teamID);
    $statement1->execute();
    $team = $statement1->fetch();
    $teamName = $team["teamName"];
    $grounds = $team["teamGround"];
    $manager = $team["teamManager"];
    $teamLogo = $team["image"];
    $statement1->closeCursor();

    $queryTable = "SELECT * from players WHERE teamID = :playerID";
    $statement2 = $db ->prepare($queryTable);
    $statement2->bindValue(":playerID", $teamID);
    $statement2->execute();
    $player = $statement2->fetchAll();
    $statement2->closeCursor();
    include 'header.php';
?>

      <div class="container">
       <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="add_team_form.php">Promote Team</a></li>
        <li><a href="add_player_form.php">Add Player</a></li>
        
              
       </ul>
      </div>
        <aside><h2>Teams</h2>           
                <nav>
                    
                    <ul>
                        <?php
                        foreach ($teams as $t):
                        ?>
                        <li><a href="index.php?teamID=<?php echo $t["teamID"];?>"><?php echo $t["teamName"];?></a>
                            
                        </li>
                        <?php
                        endforeach;
                        ?>
                    </ul>                   
                </nav>
        </aside>
            <section>
                <br>
                <h2><?php echo $teamName;?>  <br> <?php echo (" Stadium: "); echo $grounds;?> <br> <?php echo (" Manager: "); echo $manager; ?></h2>
                <img src="images/teams/<?php echo $teamLogo;?>" alt="<?php echo $teamName;?> logo" id="logo"/>
                <form action="relegate_team.php" method="POST">
                    <input type="hidden" name="team_id" value="<?php echo $teamID; ?>"/>
                                <input type="submit" value="Relegate"/>
                </form><br>
                <table>
                    <h2>Star Players</h2>
                    <tr>
                        <th>Position</th>
                        <th>Name</th>
                        <th>Country</th>
                    </tr>
                    <?php 
                    foreach ($player as $p):
                    ?>
                    
                    
                    <tr>
                        <td><?php echo$p["playerPosition"];?></td>
                        <td><?php echo $p["playerName"];?></td>
                        <td><?php echo$p["playerCountry"];?></td>
                        <td>
                            <form action="update_player_form.php" method="POST">
                                <input type="hidden" name="team_id" value="<?php echo $team_id; ?>"/>
                                <input type="hidden" name="player_id" value="<?php echo $p["playerID"];?>"/>
                                <input type="submit" value="Update"/>
                            </form>
                                
                        </td>
                        <td>
                            <form action="delete_player.php" method="POST">
                                <input type="hidden" name="playerID" value="<?php echo $p["playerID"]; ?>"/>
                                <input type="submit" value="Delete"/>
                            </form>
                        </td>
                       
                    </tr>
                    <?php endforeach;?>
                </table>
                <br>
                
            </section>
        </main>
        <footer>
            <p>&copy; <?php echo date("Y"); ?> The Premier League.</p>
        </footer>
    </body>
</html>
