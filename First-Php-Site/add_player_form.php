<?php
require_once ("database.php");
$query = "Select * from teams";
$statement = $db -> prepare($query);
$statement -> execute();
$teams_array = $statement -> fetchAll();
$statement -> closeCursor();
include 'header.php';;
?>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="./js/valid_player.js"></script>
            <div class="container">
       <ul class="nav nav-tabs" role="tablist">
           <li class="active"><a href="index.php">Home</a></li>
        <li><a href="add_team_form.php">Promote Team</a></li>
        <li><a href="#">Add Player</a></li>
              
       </ul>
      </div>
            <h1>Add Player</h1>
            <form action="add_player.php" id="add_player" name="add_player" method="post">
                <label>Team:</label>
                <!-- Drop down list populated from the categories table -->
                <select name="team_id">
                    <?php foreach($teams_array as $team_row) : ?>
                    <option value="<?php echo $team_row["teamID"]; ?>">
                    <?php echo $team_row["teamName"];  ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <br/>
                <label for="position">Position:</label>
                <select name="position">
                    <option value="Goalkeeper">Goalkeeper</option>
                    <option value="Defender">Defender</option>
                    <option value="Midfielder">Midfielder</option>
                    <option value="Winger">Winger</option>
                    <option value="Striker">Striker</option>
                </select><br>
                
                <label for="name">Name:</label>
                <input type="text" id="name" name="name"/>
                <span>*</span><br/>
                <label for="country">Country:</label>
                <input type="text" id="country" name="country"/>
                <span>*</span><br/>
                <input type="button" id="add" value="Add Player"/>
                
            </form>
        </main>
        
    </body>
</html>
