<?php
// Task 1
echo "<h2>Task 1</h2>";
include_once("Models/UserModel.php");
include_once("Controllers/UserController.php");
include_once("Views/UserView.php");

// Task 2
echo "<h2>Task 2</h2>";
include_once("./autoload.php");
$userView = new UserView("Rostyslav", 25);
