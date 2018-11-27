<?php 
require_once ("database.php");

$t_name = filter_input(INPUT_POST, "team_name");
if(!isset($t_name)){
    include ("add_team_form.php");
    exit();
}

$t_ground = filter_input(INPUT_POST, "team_ground");
if(!isset($t_ground)){
    include ("add_team_form.php");
    exit();
}

$t_manager = filter_input(INPUT_POST, "team_manager");
if(!isset($t_manager)){
    include ("add_team_form.php");
    exit();
}

$t_image = filter_input(INPUT_POST, "image");
if(!isset($t_image)){
    include ("add_team_form.php");
    exit();
}
//$target_dir = "images/teams/";
//print_r($_FILES);
//$target_file = $target_dir . basename($_FILES["image"]["name"]);
//$uploadOk = 1;
//$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//// Check if image file is a actual image or fake image
//if(isset($_POST["submit"])) {
//    $check = getimagesize($_FILES["image"]["tmp_name"]);
//    if($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
//        $uploadOk = 1;
//    } else {
//        echo "File is not an image.";
//        $uploadOk = 0;
//    }
//}
$insertQuery = "INSERT INTO teams (teamName, teamGround, teamManager, image)"
        . " VALUES (:np_team_name, :np_team_ground, :np_team_manager, :np_image)";

$statement = $db -> prepare($insertQuery);
$statement -> bindValue(":np_team_name", $t_name);
$statement -> bindValue(":np_team_ground", $t_ground);
$statement -> bindValue(":np_team_manager", $t_manager);
$statement -> bindValue(":np_image", $t_image);
$statement -> execute();
$statement -> closeCursor();

include 'header.php';
?>

            <h1>Promote Team</h1>
        </main>
        <a href="index.php">Back to Main Page</a>
        <?php
        // put your code here
        ?>
    </body>
</html>


