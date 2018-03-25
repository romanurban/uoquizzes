<?php

require 'models/loggerModel.php';


class LoggerController {


	public static function doLogging($uname,$tid,$qid,$sid,$solution,$isCorrect) {
		Logger::doLogging($uname,$tid,$qid,$sid,$solution,$isCorrect);
	}


	public static function logFinalScore($uname,$tid,$score,$total) {
		Logger::logFinalScore($uname,$tid,$score,$total);
	}

	public static function getScore($uname, $tid, $sid) {
		Logger::getScore($uname, $tid, $sid);
	}

}

?>