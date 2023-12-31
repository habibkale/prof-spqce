<?php
require_once '../core/init.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'firstName' => array('required' => true),
            'lastName' => array('required' => true),
            'birthDate' => array('required' => true),
            'birthPlace' => array('required' => true),
            'PhotoProfil' => array('required' => true),
        ));

        if ($validation->passed()) {
            $student = new Students(
                Input::get('firstName'),
                Input::get('lastName'),
                Input::get('birthDate'),
                Input::get('birthPlace'),
                Input::get('PhotoProfil')
            );

            $student->saveToDatabase();

            echo 'Student added successfully!';
        } else {
            foreach ($validation->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/gilroy-bold" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/Gilroy-Light" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../style/New.css?v=<?php echo time(); ?>"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <title>Nouveau</title>

</head>

<body>
    
<form action="" method="post" enctype="multipart/form-data">

                        
<label for="courseTitle">First Name</label>
<input class="cours-title" type="text" name="firstName" id="firstName" value="<?php echo escape(Input::get('firstName')); ?>" autocomplete="off">



<label for="courseDescription">Last Name</label>
<textarea name="lastName" id="lastName"><?php echo escape(Input::get('lastName')); ?></textarea>


<label>Birthday Date</label>
<input type="date" name="birthDate" placeholder="Select birthday date">

<label for="courseTitle">birthPlace</label>
<input class="birthPlace" type="text" name="birthPlace" id="birthPlace" value="<?php echo escape(Input::get('birthPlace')); ?>" autocomplete="off">


<!-- <label  id="fileDropAreaCours" class="file-drop-area" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event, 'fileDropAreaCours')" ondrop="handleFileDrop(event, 'fileInputCours')" onclick="triggerFileInput('fileInputCours')">
<p>Drag & Drop PDF File or Click to Select</p>
</label> -->

<!-- <label for="fileInputCours"></label>
<input class="fil" type="file" name="fileInputCours" id="fileInputCours" accept=".pdf,.doc,.docx"> -->

<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
<input class="ad" type="submit" value="Add Now">
<!-- <button class="clos" onclick="closePopupp()">Close</button> -->
</form>
</body>

</html>