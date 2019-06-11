<?php

class User {

    private static $lastId;
    private $id;
    private $username;
    private $password;
    private $questions = [];
    private $answers = [];
    private $comments = [];

    function __construct(string $username, string $password) {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->id = ++self::$lastId;
    }

    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {

        if (!preg_match("/[0-9]+/", $password)) {
            throw new Exception("Password should contain digits");
        }

        if (!preg_match("/[a-z]+/", $password)) {
            throw new Exception("Password should contain letters");
        }
        $this->password = $password;
    }

    public function getQuestions() {
        return $this->questions;
    }

    public function askQuestion(Question $question) {
        $this->questions[] = $question;
    }

    public function getAnswers() {
        return $this->answers;
    }

    public function answer(Question $question, Answer $answer) {
        $this->answers = $answer;
        $question->answer($answer);
    }

    public function getComments() {
        return $this->comments;
    }

    public function comment(Answer $comment, Answer $answer) {
        $this->comments[] = $comment;
        $answer->comment($comment);
    }

}

class Question {

    const TITLE_MIN_LENGTH = 3;
    const BODY_MIN_LENGTH = 10;

    private static $lastId;
    private $id;
    private $title;
    private $body;
    private $author;
    private $answers = [];

    function __construct(string $title, string $body, User $author) {

        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setBody($body);
        $this->id = ++self::$lastId;
    }

    public function setTitle(string $title) {

        if (strlen($title) < self::TITLE_MIN_LENGTH) {
            throw new Exception("Title too short");
        }
        $this->title = $title;
    }

    public function getTitle(): string {

        return $this->title;
    }

    public function setBody() {

        if (strlen($body) < self::BODY_MIN_LENGTH) {
            throw new Exception("Body too short");
        }
        $this->body = $body;
    }

    public function getBody(): string {
        return $this->body;
    }

    function getAuthor(): User {
        return $this->author;
    }

    function setAuthor(User $author) {
        $this->author = $author;
    }

    function getId() {
        return $this->id;
    }

    public function getAnswer() {
        return $this->answers;
    }

    public function answer(Answer $answer) {
        $this->answers[] = $answer;
    }

}

class Answer {

    const BODY_MIN_LENGTH = 7;

    private static $lastId;
    private $id;
    private $body;
    private $author;
    private $question;
    private $answer;
    private $comments = [];

    public function __construct(string $body, User $author, Question $question, Answer $answer) {
        $this->setBody($body);
        $this->setAuthor($author);
        $this->setQuestion($question);
        $this->setAnswer($answer);
        $this->id = ++self::$lastId;
    }

    static function getLastId() {
        return self::$lastId;
    }

    function getBody() {
        return $this->body;
    }

    function getAuthor() {
        return $this->author;
    }

    function getQuestion() {
        return $this->question;
    }

    function getAnswer() {
        return $this->answer;
    }

    static function setLastId($lastId) {
        self::$lastId = $lastId;
    }

    function setBody($body) {
        if (strlen($body) < self::BODY_MIN_LENGTH) {
            throw new Exception("Body too short");
        }
        $this->body = $body;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

    function setQuestion($question) {
        $this->question = $question;
    }

    function setAnswer(Answer $answer = null) {
        $this->answer = $answer;
    }

    public function comment(Answer $answer) {
        $this->comments[] = $answer;
    }

    public function getId() {
        return $this->id;
    }

    public function getComments() {
        return $this->comments;
    }

}

class Forum {

    private $usersById = [];
    private $usersByUsername = [];
    private $users = [];
    private $questions = [];
    private $answers = [];
    private $comments = [];
    private $currentUser;

    public function start() {
        while (true) {
            $line = trim(fgets(STDIN));
            $commandArgs = explode(" ", $line);
            $commandName = $commandArgs[0];
            try {
                switch ($commandName) {
                    case "register":
                        $this->register($commandArgs[1], $commandArgs[2]);
                        break;
                    case "login":
                        $this->login($commandArgs[1], $commandArgs[2]);
                        break;
                    case "ask":
                        $this->login($commandArgs[1], $commandArgs[2]);
                        break;
                    case "answer":
                        $this->answer(intval($commandArgs[1]), $commandArgs[2]);
                        break;
                    case "comment":
                        $this->comment(intval($commandArgs[1]), $commandArgs[2]);
                        break;
                    case "show":
                        $this->show();
                        break;
                    default :
                        break;
                }
            } catch (Exception $e) {
                echo $e->getMessage() . PHP_EOL;
            }
        }
    }

    public function register(string $username, string $password) {
        if (array_key_exists($username, $this->usersByUsername)) {
            throw new Exception("Username already exists");
        }
        $user = new User($username, $password);
        $this->usersById[$user->getId()] = $user;
        $this->usersByUsername[$username] = $user;
    }

    public function login(string $username, string $password) {
        if (!array_key_exists($username, $this->usersByUsername)) {
            throw new Exception("Username does not exist");
        }
        $user = $this->usersByUsername[$username];
        $userPassword = $user->getPassword();
        if ($userPassword != $password) {
            throw new Exception("Passwords missmatch");
        }
        $this->currentUser = $user;
    }

    public function ask(string $title, string $body) {
        if (!$this->currentUser) {
            throw new Exception("Anonymous question asking is not allowed");
        }
        $question = new Question($title, $body, $this->currentUser);
        $this->questions[$question->getId()] = $question;
        $this->currentUser->askQuestion($question);
    }

    public function answer(int $questionId, string $body) {
        if (!$this->currentUser) {
            throw new Exception("Anonymous answering is not allowed");
        }
        if (!array_key_exists($questionId, $this->questions)) {
            throw new Exception("Invalid question to answer");
        }
        $answer = new Answer($body, $this->currentUser, $this->questions[$questionId]);
        $this->answers[$answer->getId()] = $answer;
        $this->currentUser->answer($this->questions[$questionId], $answer);
    }

    public function comment(int $answerId, string $body) {
        if (!$this->currentUser) {
            throw new Exception("Anonymous commenting is not allowed");
        }
        if (!array_key_exists($answerId, $this->answers)) {
            throw new Exception("Answer does not exist");
        }
        $answer = $this->answers[$answerId];
        $question = $answer->getQuestion();
        $comment = new Answer($body, $this->currentUser, $question, $answer);
        $this->comments[$comment->getId()] = $comment;
        $this->currentUser->comment($comment, $answer);
    }

    public function show() {
        foreach ($this->questions as $question) {
            echo " -- Question Title: " . $question->getTitle() . " Body: " . $question->getBody() . " Author: " . $question->getAuthor()->getUsername() . PHP_EOL;
            foreach ($question->getAnswers() as $answer) {
                echo "      --- Answer Body: " . $answer->getBody() . " Author: " . $answer->getAuthor()->getUsername() . PHP_EOL;
                foreach ($answer->getComments() as $comment) {
                    echo "         --- Comment Body: " . $answer->getBody() . " Author: " . $answer->getAuthor()->getUsername() . PHP_EOL;
                }
            }
        }
    }

}

$forum = new Forum;
$forum->start();
