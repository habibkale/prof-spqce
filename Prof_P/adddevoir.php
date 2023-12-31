<?php
require_once '../core/init.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'title' => array('required' => true),
            'description' => array('required' => true),
            'number' => array('required' => true),
            'matiere' => array('required' => true),
            'deadline' => array('required' => true),
            'class' => array('required' => true),
            'year' => array('required' => true),
            'linkForm' => array('required' => true),
            'correction' => array('required' => true),  
            
        ));

        if ($validation->passed()) {
        
            $Devoire = new Devoir(
                Input::get('id'),
                Input::get('title'),
                Input::get('description'),
                Input::get('number'),
                Input::get('matiere'),
                Input::get('deadline'),
                Input::get('class'),
                Input::get('year'),
                Input::get('linkForm'),
                Input::get('correction')
            );
        
            // Save the course to the database
            $Devoire->saveToDatabase();
        
            echo 'Devoir added successfully!';
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
    <link rel="stylesheet" href="../style_P/New.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <title>Nouveau</title>

</head>

<body class="white-preview">
                        
                        <div class="box">
                            <h3>Ajoutez votre Devoir</h3>
                            <p>Sub Title</p>
                            <button onclick="openPopupp('Ajouter Un Devoir')">Ajouter</button>
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                        </div>
                        
                        
                <!-- Popup content exercice-->

        <div class="overlayy" onclick="closePopupp()"></div>
        <div class="popupp" id="popupp">
            <h2 id="popuppTitle">Popupp Title</h2>
            <form id="courseForm" action="" method="post" enctype="multipart/form-data">

                        
                            <label for="devoireTitle">devoire Title</label>
                            <input class="cours-title" type="text" name="title" id="title" value="<?php echo escape(Input::get('title')); ?>" autocomplete="off">
                       

                        
                            <label for="description">Course Description</label>
                            <textarea name="description" id="description"><?php echo escape(Input::get('description')); ?></textarea>
                            
                            
                        <div class="name-details">
                            <div class="field input">
                                <label  for="matiere">mataire</label>
                                    <select class="selectmatiere" name="matiere" id="matiere" >
                                        <option value="Math">Math</option>
                                        <option value="Arab">Arab</option>  
                                        <option value="Histoire">Histoire</option>
                                        <option value="Français">Français</option>
                                    </select>
                            </div>

                            <div class="field input">
                                <label  for="class">Class</label>
                                    <select class="selectclass" name="class" id="class" >
                                        <option value="Class A">Class A</option>
                                        <option value="Class B">Class B</option>
                                        <option value="Class C">Class C</option>
                                        <option value="Class D">Class D</option>
                                    </select>
                            </div>

                            <div class="field input">
                                <label  for="year">year</label>
                                    <select class="selectyear" name="year" id="year" >
                                        <option value="Anné 1">Anné 1</option>
                                        <option value="Anné 2">Anné 2</option>
                                        <option value="Anné 3">Anné 3</option>
                                        <option value="Anné 4">Anné 4</option>
                                        <option value="Anné 5">Anné 5</option>
                                    </select>
                            </div>
                    </div>
                        
                    <label for="deadline">Dead Line</label>
                    <input class="cours-title" type="date" name="deadline" id="deadline" value="<?php echo escape(Input::get('deadline')); ?>" autocomplete="off">

                    <label for="LinkForm">Link Form</label>
                    <input class="cours-title" type="text" name="linkForm" id="linkForm" value="<?php echo escape(Input::get('linkForm')); ?>" autocomplete="off">
                        
                        
                        
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                        <input class="ad" type="submit" value="Add Now">
                        <!-- <button class="clos" onclick="closePopupp()">Close</button> -->
                        </form>
        </div>

                <!-- Script-->

        <script>

                //exercises popup

            function openPopupp(title) {
                document.getElementById('popuppTitle').innerText = title;
                document.querySelector('.overlayy').style.display = 'block';
                document.getElementById('popupp').style.display = 'block';
            }

            function closePopupp() {
                document.querySelector('.overlayy').style.display = 'none';
                document.getElementById('popupp').style.display = 'none';
            }
            </script>
</body>

</html>