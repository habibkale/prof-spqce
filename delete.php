<?php
require_once 'core/init.php';

if (!Session::exists(Config::get('session/session_name'))) {
    Redirect::to('login_page.php');
}

// Check if the ID parameter is set
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Use your DB class to perform the delete operation
    $db = DB::getInstance();

    // Delete from the parent_student_links table
    $db->delete('users', ['id', '=', $userId]);

    // Perform the delete operation in the users table
    $result = $db->delete('users', ['id', '=', $userId]);

    if ($result) {
        // Deletion successful
        echo 'User deleted successfully';
    } else {
        // Error in deletion
        echo 'Error deleting user';
    }
}

// Redirect back to the admin_page.php after deletion
Redirect::to('Prof_P/Classes_P.php');


?>