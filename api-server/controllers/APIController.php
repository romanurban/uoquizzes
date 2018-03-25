<?php

require_once 'dbConnection.php';
require 'controllers/testsController.php';
require 'controllers/questionsController.php';
require 'controllers/loggerController.php';

/* this class glues together controller methods into real scenarios
*
*	testList():
*		actions: list
*		return:  json array of tests
*
*	testBegin():
*		actions: getFirstQuestionID
*				 getQuestionText
*				 getAnswers
*				 startSession
*		return:  array(qid, txt, answers: array())
*
*	testProceed():
*		actions: checkSolution
*				 doLogging
*				 getNextQuestionID
*	nextQid>0: getQuestionText
*				 getAnswers
*		return:  array(qid, txt, progress, answers: array())
*	nextQid<=0: getScore
*				 logFinalScore
*		return:  array(uname, score, total)
*
*/
class APIController {

	public static function testList() {
		$result = TestsController::list();
		return json_encode($result);
	}

	public static function testBegin($tid,$uname) {
		$testCtrl = new TestsController($tid);
		$firstQid = $testCtrl->getFirstQuestionID();
		$questionCtrl = new QuestionsController($firstQid);
		$qTxt = $questionCtrl->getQuestionText();
		$answers = $questionCtrl->getAnswers();
		APIController::startSession($tid, $uname);
		return json_encode(array("qid" => $firstQid, "txt" => $qTxt, "answers" => $answers));
	}

	public static function testProceed($qid, $solution) {
		// continue with user/test context
		$session = APIController::getSession();
		$testCtrl = new TestsController($session['tid']);
		$questionCtrl = new QuestionsController($qid);

		$isCorrect = $questionCtrl->checkSolution($solution);
		// let's log the fact
		LoggerController::doLogging($session['uname'],$session['tid'],$qid,$session['SID'],$solution,$isCorrect);
		$nextQid = $testCtrl->getNextQuestionID($qid);
		if ($nextQid > 0) {
			// get next question data
			$questionCtrl = new QuestionsController($nextQid);
			$qTxt = $questionCtrl->getQuestionText();
			$answers = $questionCtrl->getAnswers();
			$progress = $testCtrl->getProgress($qid);
			return json_encode(array("qid" => $nextQid, "txt" => $qTxt, "progress"=>$progress, "answers" => $answers));
		} else { // that's all folks! do the logging and return result
			$score = LoggerController::getScore($session['uname'], $session['tid'], $session['SID']);
			error_log($session['uname']);
			error_log($session['tid']);
			error_log($session['SID']);
			error_log($score);
			$total = $testCtrl->getQuestionCount();
			LoggerController::logFinalScore($session['uname'],$session['tid'],$score,$total);
			return json_encode(array("uname"=>$session['uname'], "score"=>$score, "total"=>$total));
		}
		
	}

	private function startSession($tid, $uname) {
		if (isset($_SESSION)) { //loose previous session if any
			unset($_SESSION);
			session_unset();
			session_destroy();
		}
		session_start();
		session_regenerate_id(FALSE);
		$_SESSION['tid'] = $tid;
		$_SESSION['uname'] = $uname;
	}

	private function getSession() {
		session_start();
		return array('SID'=>session_id(), 'tid'=>$_SESSION['tid'], 'uname'=>$_SESSION['uname']);
	}
}

?>