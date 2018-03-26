<?php

require 'models/testsModel.php';

class TestsController {

	private $testInst;
	private $testQuestions;

	public function __construct(int $tid) {
		$this->testInst = new Test($tid);
		$this->testQuestions = $this->testInst->getTestQuestions();
	}

	// static
	public static function list() {
		$tests = Test::list();
		return $tests;
	}

	// get first item of question list
	public function getFirstQuestionID() {
		$firstQid = array_keys($this->testQuestions)[0];
		return $firstQid;
	}

	public function getQuestionCount() {
		$count = count($this->testQuestions);
		return $count;
	}

	// find current among question list and return next question id
	// if no more questions, then return -1
	public function getNextQuestionID(int $currQid) {
		$keys = array_keys($this->testQuestions);
		$index = array_search($currQid,$keys)+1;
		$nextQid = isset($keys[$index]) ? $keys[$index] : -1;
		return $nextQid;
	}

	// get current progress in percentage
	public function getProgress(int $currQid) {
		$keys = array_keys($this->testQuestions);
		$index = array_search($currQid,$keys);
		$total = count($keys);
		if ($index > 0) {
			$progress = round($index * 100 / $total);
		} else {
			$progress = 0;
		}
		return $progress;
	}

}

?>
