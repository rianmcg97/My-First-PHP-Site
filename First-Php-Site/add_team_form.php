<?php 
include 'header.php';
?>
      <div class="container">
       <ul class="nav nav-tabs" role="tablist">
           <li class="active"><a href="index.php">Home</a></li>
        <li><a href="#">Promote Team</a></li>
        <li><a href="add_player_form.php">Add Player</a></li>
              
       </ul>
      </div>
            <h1>Promote Team</h1>
            <form action="add_team.php" method="POST" enctype="multipart/data">
                <label>Team Name:</label>
                <input type="text" name="team_name" required=""><br>
                <label>Team Ground:</label>
                <input type="text" name="team_ground" required=""><br>
                <label>Team Manager:</label>
                <input type="text" name="team_manager" required=""><br>
                <input type="file" name="image" id="image" /><br>
                <input type="submit" value="Promote Team">
            </form>
        </main>
        <footer>
            <p>&copy; <?php echo date("Y"); ?> The Premier League</p>
        </footer>
    </body>
</html>

