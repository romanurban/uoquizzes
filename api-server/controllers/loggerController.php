<?php

require 'models/loggerModel.php';


class LoggerController {


	public function doLogging($uname,$tid,$qid,$solution,$is_correct) {
		// just insert in a table
	}


	public function finalScore($uname,$tid,$score,$total) {
		// aks total from TestController -> getQuestionCount
		// somehow get score (probably from log, maybe better approach)
		// but anyway seems like we need SSID field in a log table
	}

	public function getScore($uname,$tid) {
		// select over log table
	}

}

?>