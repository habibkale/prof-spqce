<?php

class Students {
    private $firstName;
    private $lastName;
    private $category;
    private $class;
    private $anné;
    private $birthDate;
    private $birthPlace;
    private $PhotoProfil;

    // Constructor to initialize the object
    public function __construct($firstName, $lastName, $category, $class, $anné, $birthDate, $birthPlace, $PhotoProfil) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->category = $category;
        $this->class = $class;
        $this->anné = $anné;
        $this->birthDate = $birthDate;
        $this->birthPlace = $birthPlace;
        $this->PhotoProfil = $PhotoProfil;
    }

    // Getters and setters for each property if needed
    public function getfirstName() {
        return $this->firstName;
    }

    public function getlastName() {
        return $this->lastName;
    }

    public function getcategory() {
        return $this->category;
    }

    public function getclass() {
        return $this->class;
    }

    public function getanné() {
        return $this->anné;
    }

    public function getbirthDate() {
        return $this->birthDate;
    }

    public function getbirthPlace() {
        return $this->birthPlace;
    }

    public function getPhotoProfil() {
        return $this->PhotoProfil;
    }

    // Repeat for other properties...

    // Method to save the course to the database
    public function saveToDatabase() {
        $db = DB::getInstance();

        return $db->insertCourse('students', array(
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'category' => $this->category,
            'class' => $this->class,
            'anné' => $this->anné,
            'birthDate' => $this->birthDate,
            'birthPlace' => $this->birthPlace,
            'PhotoProfil' => $this->PhotoProfil
        ));
    }
}
?>
