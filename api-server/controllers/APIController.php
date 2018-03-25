<?php

require_once 'dbConnection.php';
require 'controllers/testsController.php';
require 'controllers/questionsController.php';
require 'controllers/loggerController.php';

// glues together controller methods into real scenarios
class APIController {

	public static function testList() {
		$result = TestsController::list();
		return $result;
	}

	public static function testBegin($tid,$uname) {
		// set session stuff
		$testCtrl = new TestsController($tid);
		$firstQid = $testCtrl->getFirstQuestionID();
		$questionCtrl = new QuestionsController($firstQid);
		$qTxt = $questionCtrl->getQuestionText();
		$answers = $questionCtrl->getAnswers();

		return json_encode(array("qid" => $firstQid, "txt" => $qTxt, "answers" => $answers));
	}

	public static function testProceed($qid) {
		// here we should check session and extract stuff from there like uname. testID
		// create isntance ?

		return $result;
	}

	private function setSessionStuff() {
		// set session stuff
	}

	private function getSessionStuff() {
		// get session stuff
	}

}

// tests/list
//		list

// test/begin
//		getFirstQuestionID
//		getQuestionText
//		getAnswers
//		return as a whole json

// test/proceed
//		checkSolution
//		dothelog
//		getNextQuestionID - returned > 0
//------------------
//		getQuestionText
//		getAnswers
//		return as a whole json
//-------------------
//		getNextQuestionID - returned < 0
//		dotheFinallog
//		getScore

?>