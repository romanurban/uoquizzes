-- run this to create db structure
-- mysql -h <host> -u <username> -p < dbstruct.sql
CREATE DATABASE uoquizzes CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
use uoquizzes;
GRANT SELECT, INSERT, UPDATE ON uoquizzes.* TO uoquizzesapp@localhost IDENTIFIED BY 'uoquizzespasswd';

-- make sure engine is INNODB, regardless server config
-- indexes for foreign keys created automatically, primary - always indexed
-- each table has auto-updated timestamp column for audit
CREATE TABLE tests (
	tid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	prio INT NOT NULL,
	ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=INNODB;

CREATE TABLE questions (
	qid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	txt VARCHAR(255) NOT NULL,
	ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=INNODB;

CREATE TABLE questions_of_test (
	tid INT NOT NULL,
	qid INT NOT NULL,
	prio INT NOT NULL,
	ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (tid,qid),
	FOREIGN KEY (tid) REFERENCES tests(tid),
	FOREIGN KEY (qid) REFERENCES questions(qid)
) ENGINE=INNODB;

CREATE TABLE answers (
	aid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	txt VARCHAR(255) NOT NULL,
	ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=INNODB;

CREATE TABLE answers_on_questions (
	qid INT NOT NULL,
	aid INT NOT NULL,
	prio INT NOT NULL,
	is_correct BOOLEAN NOT NULL DEFAULT 0,
	ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (qid,aid),
	FOREIGN KEY (qid) REFERENCES questions(qid),
	FOREIGN KEY (aid) REFERENCES answers(aid)
) ENGINE=INNODB;

-- here goes some log tables
-- let's suppose, that search will happen mostly on username and test id (fk indexed)
-- so since db will grow very big, let's have a hash index for username
CREATE TABLE repsonse_log (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	uname VARCHAR(255) NOT NULL,
	unamehash CHAR(32) NOT NULL,
	tid INT NOT NULL,
	qid INT NOT NULL,
	solution VARCHAR(255) NOT NULL,
	is_correct BOOLEAN NOT NULL DEFAULT 0,
	ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY (tid) REFERENCES tests(tid),
	FOREIGN KEY (qid) REFERENCES questions(qid),
	KEY unamehash_idx (unamehash)
) ENGINE=INNODB;

CREATE TABLE results (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	uname VARCHAR(255) NOT NULL,
	unamehash CHAR(32) NOT NULL,
	tid INT NOT NULL,
	score INT NOT NULL,
	total INT NOT NULL,
	FOREIGN KEY (tid) REFERENCES tests(tid),
	KEY unamehash_idx (unamehash)
) ENGINE=INNODB;
