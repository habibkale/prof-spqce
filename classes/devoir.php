<?php

class Devoir {
    private $id;
    private $title;
    private $description;
    private $number;
    private $matiere;
    private $deadline;
    private $class;
    private $year;
    private $linkForm;
    private $correction;

    // Constructor to initialize the object
    public function __construct($id, $title, $description, $number, $matiere, $deadline, $class, $year, $linkForm, $correction) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->number = $number;
        $this->matiere = $matiere;
        $this->deadline = $deadline;
        $this->class = $class;
        $this->year = $year;
        $this->linkForm = $linkForm;
        $this->correction = $correction;
    }

    // Getters and setters for each property if needed
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getNumber() {
        return $this->number;
    }

    public function getMatiere() {
        return $this->matiere;
    }

    public function getDeadline() {
        return $this->deadline;
    }

    public function getClass() {
        return $this->class;
    }

    public function getYear() {
        return $this->year;
    }

    public function getLinkForm() {
        return $this->linkForm;
    }

    public function getCorrection() {
        return $this->correction;
    }

    // Repeat for other properties...

    // Method to save the course to the database
    public function saveToDatabase() {
        $db = DB::getInstance();

        return $db->insertDevoir('devoir', array(
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'number' => $this->number,
            'matiere' => $this->matiere,
            'deadline' => $this->deadline,
            'class' => $this->class,
            'year' => $this->year,
            'linkForm' => $this->linkForm,
            'correction' => $this->correction
        ));
    }
}

?>
