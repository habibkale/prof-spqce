<?php

class Course {
    private $course_id;
    private $title;
    private $description;
    private $pdfFile;
    private $category;
    private $class;
    private $anné;

    // Constructor to initialize the object
    public function __construct($course_id, $title, $description, $pdfFile, $category, $class, $anné) {
        $this->course_id = $course_id;
        $this->title = $title;
        $this->description = $description;
        $this->pdfFile = $pdfFile;
        $this->category = $category;
        $this->class = $class;
        $this->anné = $anné;
    }

    // Getters and setters for each property if needed
    public function getCourseId() {
        return $this->course_id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPdfFile() {
        return $this->pdfFile;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getClass() {
        return $this->class;
    }

    public function getAnné() {
        return $this->anné;
    }

    // Repeat for other properties...

    // Method to save the course to the database
    public function saveToDatabase() {
        $db = DB::getInstance();

        return $db->insertCourse('courses', array(
            'course_id' => $this->course_id,
            'title' => $this->title,
            'description' => $this->description,
            'pdfFile' => $this->pdfFile,
            'category' => $this->category,
            'class' => $this->class,
            'anné' => $this->anné
        ));
    }
}

?>
