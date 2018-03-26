<?php

require 'models/loggerModel.php';


class LoggerController {


	public static function doLogging(string $uname, int $tid, int $qid, string $sid, string $solution, int $isCorrect) {
		Logger::doLogging($uname,$tid,$qid,$sid,$solution,$isCorrect);
	}


	public static function logFinalScore(string $uname, int $tid, int $score, int $total) {
		Logger::logFinalScore($uname,$tid,$score,$total);
	}

	public static function getScore(string $uname, int $tid, string $sid) {
		return Logger::getScore($uname, $tid, $sid);
	}

}

?>