<?php

class Test {

	public $tid;
	private $name;
	private $prio;
	private $testQuestions;

	// get test properties and test question list in format array(prio=>qid)
	public function __construct($tid) {
		$this->tid = $tid;
		$db = Connection::getInstance();

		$req = $db->prepare('SELECT * FROM tests WHERE tid = ?');
		$req->execute(Array($tid));
		$post = $req->fetch();
		$this->name = $post['name'];
		$this->prio = $post['prio'];

		$req = $db->prepare('SELECT qid, prio FROM questions_of_test WHERE tid = ? ORDER BY prio');
		$req->execute(Array($tid));
		foreach($req->fetchAll() as $question) {
			$this->testQuestions[$question['qid']] = $question['prio'];
		}
	}

	public static function list() {
		$tests = [];
		$db = Connection::getInstance();

		$req = $db->query('SELECT * FROM tests ORDER BY prio');
		$tests = $req->fetchAll();

		return $tests;
	}

	public function getTestQuestions() {
		// debug error_log(print_r($this->testQuestions,true));
		return $this->testQuestions;
	}

}

?>