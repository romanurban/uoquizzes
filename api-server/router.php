<?php

require 'controllers/APIController.php';

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

// Route it up!
switch ($request_uri[0]) {
	// source for first page dropdown
	case '/api/test/list':
		print_r(APIController::testList());
		break;
	// start testing
	case '/api/test/begin':
		$tid = filter_var($_GET['tid'], FILTER_SANITIZE_NUMBER_INT);
		$uname = filter_var($_GET['uname'], FILTER_SANITIZE_STRING);
		print_r(APIController::testBegin($tid,$uname));
		break;
	// proceed with next question
	case '/api/test/proceed':
		$qid = filter_var($_GET['qid'], FILTER_SANITIZE_NUMBER_INT);
		$solution = filter_var($_GET['solution'], FILTER_SANITIZE_STRING);
		print_r(APIController::testProceed($qid,$solution));
		break;
    // Everything else
    default:
    	header('HTTP/1.0 404 Not Found');
    	break;
}

//TODO: make some unit tests
//require_once 'dbConnection.php';
//require 'controllers/testsController.php';
//require 'controllers/questionsController.php';
//require 'controllers/loggerController.php';

//$controller = new TestsController(1);
//$result = $controller->list();
//$result = $controller->getFirstQuestionID();
//$result = $controller->getNextQuestionID(5);
//$result = $controller->getProgress(9);
//print_r($result);


//$controller = new QuestionsController(10);
//$result = $controller->getAnswers();
//$result = $controller->checkSolution('50,52,49,51');
//$result = $controller->checkSolution('');
//$result = $controller->getQuestionText();
//print_r($result);

?>