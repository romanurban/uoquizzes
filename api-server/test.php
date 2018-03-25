<?php

// test controllers directly, without API wrapper
// those tests are based on demo data

require_once 'dbConnection.php';
require 'controllers/testsController.php';
require 'controllers/questionsController.php';
require 'controllers/loggerController.php';


$controller = new TestsController(1);
$result = $controller->list();
print_r($result); // do the assertion

//$result = $controller->getFirstQuestionID();
//$result = $controller->getNextQuestionID(5);
//$result = $controller->getProgress(9);



//$controller = new QuestionsController(10);
//$result = $controller->getAnswers();
//$result = $controller->checkSolution('50,52,49,51');
//$result = $controller->checkSolution('');
//$result = $controller->getQuestionText();
//print_r($result);