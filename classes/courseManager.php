<?php
require_once '../classes/db.php';

class CourseManager {
    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function getCourses()
{
    $courses = [];

    $result = $this->db->query("SELECT * FROM courses");

    foreach ($result->results() as $row) {
        $courses[] = new Course($row->course_id, $row->title, $row->description, $row->pdfFile, $row->category, $row->class, $row->anné);
    }
    
    return $courses;
}
}
?>
