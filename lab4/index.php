<?php
// Task 1
echo "<h2>Task 1</h2>";
include_once("Models/UserModel.php");
include_once("Controllers/UserController.php");
include_once("Views/UserView.php");

// Task 2
echo "<h2>Task 2</h2>";
include_once("./autoload.php");
// $userView = new UserView("Rostyslav", 25);

// Task 3 and 4
echo "<h2>Task 3 and 4</h2>";
use Controllers\UserController;
use Models\UserModel;
use Views\UserView;

$controller = new UserController();
$controller->set_name("car");
echo "<span>Name controller: </span>" . $controller->get__name();

$view = new UserView("Rostyslav", 19);

$model = new UserModel();
$model->set_info("model2", "sky");
echo "<br />";
echo "<span>Name: </span>" . $model->get__name();
echo "<br />";
echo "Type: " . $model->get__type();