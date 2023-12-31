<?php

class Submission {
    private $id;
    private $student_id;
    private $homework_id;
    private $submission_date;
    private $mark;
    private $comments;

    // Constructor to initialize the object
    public function __construct($id, $student_id, $homework_id, $submission_date, $mark ,$comments) {
        $this->id = $id;
        $this->student_id = $student_id;
        $this->homework_id = $homework_id;
        $this->submission_date = $submission_date;
        $this->mark = $mark;
        $this->comments = $comments;
    }

    // Getters and setters for each property if needed
    public function getId() {
        return $this->id;
    }

    public function getStudent_id() {
        return $this->student_id;
    }

    public function getHomework_id() {
        return $this->homework_id;
    }

    public function getSubmission_date() {
        return $this->submission_date;
    }

    public function getMark() {
        return $this->mark;
    }

    public function getComment() {
        return $this->comments;
    }

    // Repeat for other properties...

    // Method to save the course to the database
    public function saveToDatabase() {
    //     $db = DB::getInstance();

    //     return $db->insertCourse('devoir', array(
    //         'id' => $this->id,
    //         'student_id' => $this->student_id,
    //         'homework_id' => $this->homework_id,
    //         'submission_date' => $this->submission_date,
    //         'mark' => $this->mark,
    //         'comments' => $this->comments
    //     ));
    }
}
?>
