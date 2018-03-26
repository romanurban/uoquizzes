<?php

class Question {

	public $qid;
	private $txt;
	private $questionAnswers;
	private $correctAnswers;

	public function __construct(int $qid) {
		$this->qid = $qid;
		$db = Connection::getInstance();

		$req = $db->prepare('SELECT * FROM questions WHERE qid = ?');
		$req->execute(Array($qid));
		$question = $req->fetch();
		$this->qid = $question['qid'];
		$this->txt = $question['txt'];

		$req = $db->prepare('SELECT aq.aid, a.txt, aq.prio, aq.is_correct FROM answers_on_questions AS aq LEFT JOIN answers AS a ON aq.aid = a.aid WHERE aq.qid = ? ORDER BY aq.prio');
		$req->execute(Array($qid));
		foreach($req->fetchAll() as $answer) {
			$this->questionAnswers[$answer['aid']] = $answer['txt'];
			if ($answer['is_correct'] == '1') {
				$this->correctAnswers[] = $answer['aid'];
			}
		}
	}

	public function getAnswers() {
		return $this->questionAnswers;
	}

	public function getCorrectAnswers() {
		return $this->correctAnswers;
	}

	public function getText() {
		return $this->txt;
	}

}

?>