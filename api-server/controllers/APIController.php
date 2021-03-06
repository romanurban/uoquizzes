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
*				 getNextQuestionID
*				 getQuestionText
*				 getAnswers
*				 startSession
*		return:  array(qid, nextqid, txt, answers: array())
*
*	testProceed():
*		actions: checkSolution
*				 doLogging
*				 getNextQuestionID
*			 	 getNextQuestionID (second next)
*	nextQid>0: getQuestionText
*				 getAnswers
*		return:  array(qid, nextqid, txt, progress, answers: array())
*	nextQid<=0: getScore
*				 logFinalScore
*		return:  array(uname, score, total)
*
*/
class APIController {
	// N.B. this is NOT REST API

	public static function testList() {
		$result = TestsController::list();
		return json_encode($result);
	}

	public static function testBegin(int $tid, string $uname) {
		$testCtrl = new TestsController($tid);
		$firstQid = $testCtrl->getFirstQuestionID();
		$nextQid = $testCtrl->getNextQuestionID($firstQid);
		$questionCtrl = new QuestionsController($firstQid);
		$qTxt = $questionCtrl->getQuestionText();
		$answers = $questionCtrl->getAnswers();
		APIController::startSession($tid, $uname);
		return json_encode(array("qid" => $firstQid, "nextqid" => $nextQid, "txt" => $qTxt, "answers" => $answers));
	}

	public static function testProceed(int $qid, string $solution) {
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
			$progress = $testCtrl->getProgress($nextQid);
			$secondNextQid = $testCtrl->getNextQuestionID($nextQid);
			return json_encode(array("qid" => $nextQid, "nextqid" => $secondNextQid, "txt" => $qTxt, "progress"=>$progress, "answers" => $answers));
		} else { // that's all folks! do the logging and return result
			$score = LoggerController::getScore($session['uname'], $session['tid'], $session['SID']);
			$total = $testCtrl->getQuestionCount();
			LoggerController::logFinalScore($session['uname'],$session['tid'],$score,$total);
			return json_encode(array("uname"=>$session['uname'], "score"=>$score, "total"=>$total));
		}
		
	}

	private function startSession(int $tid, string $uname) {
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