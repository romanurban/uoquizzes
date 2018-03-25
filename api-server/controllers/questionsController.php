<?php

require 'models/questionsModel.php';


class QuestionsController {

	private $questionInst;
	private $correctAnswers;

	public function __construct($qid) {
		$this->questionInst = new Question($qid);
		$this->correctAnswers = $this->questionInst->getCorrectAnswers();
	}

	public function getAnswers() {
		$answers = $this->questionInst->getAnswers();
		return $answers;
	}

	public function getQuestionText() {
		$text = $this->questionInst->getText();
		return $text;
	}

	// expecting receive csv string with aid's
	public function checkSolution($solutionStr) {
		$solutions = str_getcsv($solutionStr); // more sanitizing
		$solutions = array_unique($solutions); // prevent cheating
		$corrCount = 0;
		// if we met aid which are not part of the solution, then exit right away
		foreach ($solutions as $aid) {
			if (!in_array($aid, $this->correctAnswers)) {
				return 0;
			} else {
				// so far - so good, increment 'correctness' counter
				$corrCount++;
			}
		}

		if (count($this->correctAnswers) != $corrCount ) {
			// no wrong answers, but not all possible correct solutions given
			return 0;
		} else {
			// bingo!
			return 1;
		}
	}

}

?>