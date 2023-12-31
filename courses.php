<?php
require_once 'core/init.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'courseTitle' => array('required' => true),
            'courseDescription' => array('required' => true),
            'category' => array('required' => true),
            'fileInputCours' => array(
                'required' => true,
                'file' => array(
                    'allowed_types' => array('pdf', 'doc', 'docx'),
                    'max_size' => 5 * 1024 * 1024, // 5 MB
                    // 'upload_path' => '/path/to/upload/directory/' // Specify your upload path
                )
            ),
        ));

        if ($validation->passed()) {
            $course = new Course(
                Input::get('courseTitle'),
                Input::get('courseDescription'),
                $_FILES['fileInputCours']['name'], // Assuming you want to store the file name
                Input::get('category')
            );

            // Save the course to the database
            $course->saveToDatabase();

            echo 'Course added successfully!';
        } else {
            foreach ($validation->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">

<div class="field">
    <label for="courseTitle">Course Title</label>
    <input type="text" name="courseTitle" id="courseTitle" value="<?php echo escape(Input::get('courseTitle')); ?>" autocomplete="off">
</div>

<div class="field">
    <label for="courseDescription">Course Description</label>
    <textarea name="courseDescription" id="courseDescription"><?php echo escape(Input::get('courseDescription')); ?></textarea>
</div>

<div class="field">
    <label for="category">Category</label>
    <select name="category" id="category">
        <option value="Math">Math</option>
        <option value="Arab">Arab</option>
        <option value="Histoire">Histoire</option>
        <option value="Français">Français</option>
    </select>
</div>

<div class="field">
    <label for="fileInputCours">PDF File</label>
    <input type="file" name="fileInputCours" id="fileInputCours" accept=".pdf,.doc,.docx">
</div>

<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
<input type="submit" value="Add Now">
</form>