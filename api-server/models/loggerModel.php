<?php

class Logger {

	public static function doLogging($uname,$tid,$qid,$sid,$solution,$isCorrect) {
		$db = Connection::getInstance();
		$req = $db->prepare('INSERT INTO repsonse_log (uname, unamehash, tid, qid, sid, solution, is_correct) VALUES (?, MD5(?), ?, ?, ?, ?, ?)');
		$req->execute(Array($uname, $uname, $tid, $qid, $sid, $solution, $isCorrect));
	}

	public static function logFinalScore($uname,$tid,$score,$total) {
		$db = Connection::getInstance();
		$req = $db->prepare('INSERT INTO results (uname, unamehash, tid, score, total) VALUES (?, MD5(?), ?, ?, ?)');
		$req->execute(Array($uname, $uname, $tid, $score, $total));
	}

	public static function getScore($uname, $tid, $sid) {
		$db = Connection::getInstance();
		$req = $db->prepare('SELECT count(id) AS score FROM repsonse_log WHERE unamehash = MD5(?) AND tid = ? AND sid = ? AND is_correct = 1');
		$req->execute(Array($uname, $tid, $sid));
		$res = $req->fetch();
		return $res['score'];
	}

}

?>