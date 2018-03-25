<?php

// allow this in ./htaccess before using
// test controllers directly, without API wrapper
// those tests are based on demo data

require_once 'dbConnection.php';
require 'controllers/testsController.php';
require 'controllers/questionsController.php';
require 'controllers/loggerController.php';

$testList = TestsController::list();
echo("Assert test list length is 5: ");
echo (count($testList) == 5) ? "true" : "false";
echo("<br />");
echo("<br />");
//////////////////////////////////////
echo("Asserts on test 1:<br />");
$controller = new TestsController(1);
$fqid = $controller->getFirstQuestionID();
echo("1. first qid is 8: ");
echo ($fqid == 8) ? "true" : "false";
echo("<br />");

$nextqid = $controller->getNextQuestionID(5);
echo("2. next qid after 5 is 3: ");
echo ($nextqid == 3) ? "true" : "false";
echo("<br />");

$progress = $controller->getProgress(9);
echo("3. progress is 83%: ");
echo ($progress == 83) ? "true" : "false";
echo("<br />");

$progress = $controller->getProgress(8);
echo("4. progress is 0%: ");
echo ($progress == 0) ? "true" : "false";
echo("<br />");

$progress = $controller->getProgress(5);
echo("5. progress is 33%: ");
echo ($progress == 33) ? "true" : "false";
echo("<br />");

$count = $controller->getQuestionCount();
echo("6. question count is 6: ");
echo ($count == 6) ? "true" : "false";
echo("<br />");
echo("<br />");
//////////////////////////////////////
echo("Asserts on  test 5:<br />");
$controller = new TestsController(5);

$fqid = $controller->getFirstQuestionID();
echo("1. first qid is 10: ");
echo ($fqid == 10) ? "true" : "false";
echo("<br />");

$nextqid = $controller->getNextQuestionID(10);
echo("3. next qid after 10 is -1: ");
echo ($nextqid == -1) ? "true" : "false";
echo("<br />");

$progress = $controller->getProgress(10);
echo("4. progress is 0%: ");
echo ($progress == 0) ? "true" : "false";
echo("<br />");

$count = $controller->getQuestionCount();
echo("5. question count is 1: ");
echo ($count == 1) ? "true" : "false";
echo("<br />");
echo("<br />");
//////////////////////////////////////
echo("Asserts on question 10 with solution '49,50,51,52' :<br />");
$controller = new QuestionsController(10);
$count = count($controller->getAnswers());
echo("1. answer count is 5: ");
echo ($count == 5) ? "true" : "false";
echo("<br />");

$txt = $controller->getQuestionText();
echo("2. question txt is exact as ethalon: ");
echo ($txt == "If x / y is an integer, which of the following statements need NOT always be true?") ? "true" : "false";
echo("<br />");

$isCorrect = $controller->checkSolution('');
echo("3. solution '' is wrong: ");
echo ($isCorrect == 0) ? "true" : "false";
echo("<br />");

$isCorrect = $controller->checkSolution('49,50');
echo("3. solution '49,50' is wrong: ");
echo ($isCorrect == 0) ? "true" : "false";
echo("<br />");

$isCorrect = $controller->checkSolution('49,50,51,52');
echo("4. solution '49,50,51,52' is correct: ");
echo ($isCorrect == 1) ? "true" : "false";
echo("<br />");

$isCorrect = $controller->checkSolution('49,50,51,52,53');
echo("4. solution '49,50,51,52,53' is wrong: ");
echo ($isCorrect == 0) ? "true" : "false";
echo("<br />");
