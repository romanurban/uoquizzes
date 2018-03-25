<?php

require 'controllers/APIController.php';

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

// Route it up!
switch ($request_uri[0]) {
	// source for first page dropdown
	case '/api/test/list':
		header('Content-type: application/json');
		print_r(APIController::testList());
		break;
	// start testing
	case '/api/test/begin':
		$tid = filter_var($_GET['tid'], FILTER_SANITIZE_NUMBER_INT);
		$uname = filter_var($_GET['uname'], FILTER_SANITIZE_STRING);
		header('Content-type: application/json');
		print_r(APIController::testBegin($tid,$uname));
		break;
	// proceed with next question
	case '/api/test/proceed':
		$qid = filter_var($_GET['qid'], FILTER_SANITIZE_NUMBER_INT);
		$solution = filter_var($_GET['solution'], FILTER_SANITIZE_STRING);
		header('Content-type: application/json');
		print_r(APIController::testProceed($qid,$solution));
		break;
	// Everything else
	default:
		header('HTTP/1.0 404 Not Found');
		die();
		break;
}



?>