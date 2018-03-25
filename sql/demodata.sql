-- run this to create demo data
-- mysql -h <host> -u <username> -p uoquizzes < demodata.sql

-- declaring questions and answers and joining them together

INSERT INTO questions (txt) VALUES ("Which two of the following numbers have a product that is between –1 and 0?");
-- correct answer: '–10' and '2 to the power -4'
INSERT INTO answers (txt) VALUES ("–20");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (1, 1, 10, 0);
INSERT INTO answers (txt) VALUES ("–10");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (1, 2, 20, 1);
INSERT INTO answers (txt) VALUES ("2 to the power -4");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (1, 3, 30, 1);
INSERT INTO answers (txt) VALUES ("3 to the power -2");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (1, 4, 40, 0);

INSERT INTO questions (txt) VALUES ("Which of the following integers are multiples of both 2 and 3?");
-- correct answer: 12, 18, 36
INSERT INTO answers (txt) VALUES ("8");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (2, 5, 10, 0);
INSERT INTO answers (txt) VALUES ("9");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (2, 6, 20, 0);
INSERT INTO answers (txt) VALUES ("12");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (2, 7, 30, 1);
INSERT INTO answers (txt) VALUES ("18");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (2, 8, 40, 1);
INSERT INTO answers (txt) VALUES ("21");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (2, 9, 50, 0);
INSERT INTO answers (txt) VALUES ("36");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (2, 10, 60, 1);

INSERT INTO questions (txt) VALUES ("Which of the following could be the units digit of 57 to the power n where n is a positive integer?");
-- correct answer: 1, 3, 7, 9
INSERT INTO answers (txt) VALUES ("0");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (3, 11, 5, 0);
INSERT INTO answers (txt) VALUES ("1");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (3, 12, 10, 1);
INSERT INTO answers (txt) VALUES ("2");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (3, 13, 15, 0);
INSERT INTO answers (txt) VALUES ("3");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (3, 14, 20, 1);
INSERT INTO answers (txt) VALUES ("4");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (3, 15, 25, 0);
INSERT INTO answers (txt) VALUES ("5");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (3, 16, 30, 0);
INSERT INTO answers (txt) VALUES ("6");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (3, 17, 35, 0);
INSERT INTO answers (txt) VALUES ("7");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (3, 18, 40, 1);
-- INSERT INTO answers (txt) VALUES ("8"); re-used
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (3, 5, 45, 0);
-- INSERT INTO answers (txt) VALUES ("9"); re-used
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (3, 6, 50, 1);

INSERT INTO questions (txt) VALUES ("Among the following sets of two xy-coordinate points, which ones define a line on the xy-plane perpendicular to the line defined by the equation y = 4x – 2?");
-- correct answer: '(2,0) and (–2,1)', '(–2,3) and (–6,4)' and '(0,3) and (4,2)'
INSERT INTO answers (txt) VALUES ("(2,0) and (–2,1)");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (4, 19, 10, 1);
INSERT INTO answers (txt) VALUES ("(0,–2) and (2,6)");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (4, 20, 20, 0);
INSERT INTO answers (txt) VALUES ("(–2,3) and (–6,4)");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (4, 21, 30, 1);
INSERT INTO answers (txt) VALUES ("(–1,4) and (0,0)");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (4, 22, 40, 0);
INSERT INTO answers (txt) VALUES ("(–3,2) and (3,4)");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (4, 23, 50, 0);
INSERT INTO answers (txt) VALUES ("(0,3) and (4,2)");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (4, 24, 60, 1);

INSERT INTO questions (txt) VALUES ("If a > 0 > b > c, which of the following inequalities holds in all cases?");
-- correct answer: 'ab + c < 0' and 'ac + b < 0'
INSERT INTO answers (txt) VALUES ("ab + c < 0");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (5, 25, 10, 1);
INSERT INTO answers (txt) VALUES ("bc – a < 0");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (5, 26, 20, 1);
INSERT INTO answers (txt) VALUES ("ac + b < 0");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (5, 27, 30, 1);

INSERT INTO questions (txt) VALUES ("If p is a multiple of 3, which of the following expressions must in all cases represent a multiple of 2?");
-- correct answer: '2p'
INSERT INTO answers (txt) VALUES ("2p");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (6, 28, 10, 1);
INSERT INTO answers (txt) VALUES ("p to the power 2");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (6, 29, 20, 0);
INSERT INTO answers (txt) VALUES ("p + 2");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (6, 30, 30, 0);
INSERT INTO answers (txt) VALUES ("3p + 1");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (6, 31, 40, 0);

INSERT INTO questions (txt) VALUES ("Of the following, which is greater than 1/2?");
-- correct answer: '4/7', '8/15', '9/17'
INSERT INTO answers (txt) VALUES ("2/5");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (7, 32, 10, 0);
INSERT INTO answers (txt) VALUES ("4/7");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (7, 33, 20, 1);
INSERT INTO answers (txt) VALUES ("4/9");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (7, 34, 30, 0);
INSERT INTO answers (txt) VALUES ("5/11");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (7, 35, 40, 0);
INSERT INTO answers (txt) VALUES ("6/13");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (7, 36, 50, 0);
INSERT INTO answers (txt) VALUES ("8/15");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (7, 37, 60, 1);
INSERT INTO answers (txt) VALUES ("9/17");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (7, 38, 70, 1);

INSERT INTO questions (txt) VALUES ("If an object travels at five feet per second, how many feet does it travel in one hour?");
-- correct answer: '18000'
INSERT INTO answers (txt) VALUES ("30");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (8, 39, 10, 0);
INSERT INTO answers (txt) VALUES ("300");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (8, 40, 20, 0);
INSERT INTO answers (txt) VALUES ("720");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (8, 41, 30, 0);
INSERT INTO answers (txt) VALUES ("1800");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (8, 42, 40, 0);
INSERT INTO answers (txt) VALUES ("18000");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (8, 43, 50, 1);

INSERT INTO questions (txt) VALUES ("The price of a cycle is reduced by 25 per cent. The new price is reduced by a further 20 per cent. The two reductions together are equal to a single reduction of");
-- correct answer: '40%'
INSERT INTO answers (txt) VALUES ("45%");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (9, 44, 10, 0);
INSERT INTO answers (txt) VALUES ("40%");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (9, 45, 20, 1);
INSERT INTO answers (txt) VALUES ("35%");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (9, 46, 30, 0);
INSERT INTO answers (txt) VALUES ("32.5%");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (9, 47, 40, 0);
INSERT INTO answers (txt) VALUES ("30%");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (9, 48, 50, 0);

INSERT INTO questions (txt) VALUES ("If x / y is an integer, which of the following statements need NOT always be true?");
-- correct answer: 'both x and y are integers', 'x is an integer', 'either x or y is negative', 'y / x is an integer'
INSERT INTO answers (txt) VALUES ("both x and y are integers");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (10, 49, 10, 1);
INSERT INTO answers (txt) VALUES ("x is an integer");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (10, 50, 20, 1);
INSERT INTO answers (txt) VALUES ("either x or y is negative");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (10, 51, 30, 1);
INSERT INTO answers (txt) VALUES ("y / x is an integer");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (10, 52, 40, 1);
INSERT INTO answers (txt) VALUES ("x = ny where n is an integer");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (10, 53, 50, 0);

INSERT INTO questions (txt) VALUES ("If a positive integer n, divided by 5 has a remainder 2, which of the following must be true?");
-- correct answer: 'n + 3 is divisible by 5'
INSERT INTO answers (txt) VALUES ("n is odd");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (11, 54, 10, 0);
INSERT INTO answers (txt) VALUES ("n + 1 cannot be a prime number");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (11, 55, 20, 0);
INSERT INTO answers (txt) VALUES ("(n + 2) divided by 7 has remainder 2");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (11, 56, 30, 0);
INSERT INTO answers (txt) VALUES (" n + 3 is divisible by 5");
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (11, 57, 40, 1);

INSERT INTO questions (txt) VALUES ("If the product of 6 integers is negative, at most how many of the integers can be negative?");
-- correct answer: '5'
-- INSERT INTO answers (txt) VALUES ("2"); re-used
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (12, 13, 10, 0);
-- INSERT INTO answers (txt) VALUES ("3"); re-used
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (12, 14, 20, 0);
-- INSERT INTO answers (txt) VALUES ("4"); re-used
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (12, 15, 30, 0);
-- INSERT INTO answers (txt) VALUES ("5"); re-used
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (12, 16, 40, 1);
-- INSERT INTO answers (txt) VALUES ("6"); re-used
INSERT INTO answers_on_questions (qid, aid, prio, is_correct) VALUES (12, 17, 50, 0);

-- lets create some demo tests
INSERT INTO tests (name, prio) VALUES ("First Sample Test", 10);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (1, 8, 10);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (1, 1, 20);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (1, 5, 30);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (1, 3, 40);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (1, 10, 50);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (1, 9, 60);

INSERT INTO tests (name, prio) VALUES ("Second Sample Test", 20);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (2, 3, 10);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (2, 7, 20);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (2, 12, 30);

INSERT INTO tests (name, prio) VALUES ("Third Sample Test", 30);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (3, 11, 10);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (3, 2, 20);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (3, 1, 30);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (3, 6, 40);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (3, 4, 50);


INSERT INTO tests (name, prio) VALUES ("Fourth Mega Sample Test", 40);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (4, 12, 10);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (4, 11, 20);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (4, 10, 30);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (4, 9, 40);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (4, 8, 50);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (4, 7, 60);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (4, 6, 70);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (4, 5, 80);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (4, 4, 90);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (4, 3, 100);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (4, 2, 110);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (4, 1, 120);

INSERT INTO tests (name, prio) VALUES ("Fifth Tiny Sample Test", 50);
INSERT INTO questions_of_test (tid, qid, prio) VALUES (5, 10, 10);