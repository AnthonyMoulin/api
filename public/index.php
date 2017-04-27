<?php


use FindCode\Api\Controller\PackageController;
use FindCode\Api\Model\PackageModel;
use FindCode\Api\View\PackageView;

require"../vendor/autoload.php";

$c = new PackageController(
	new PackageModel(),
	new PackageView());

header("Content-Type: application/json; charset=utf8");

echo $c->execute();




