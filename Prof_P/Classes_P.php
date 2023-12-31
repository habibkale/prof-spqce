<?php

require_once '../core/init.php';

// Assuming you have a DB class for database operations
$db = DB::getInstance();

// Fetch data from the students table
$students = $db->query("SELECT * FROM students")->results();

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
  
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'firstName' => array('required' => true),
            'lastName' => array('required' => true),
            'category' => array('required' => true),
            'class' => array('required' => true),
            'anné' => array('required' => true),
            'birthDate' => array('required' => true),
            'birthPlace' => array('required' => true),
            'PhotoProfil' => array('required' => true),
        ));
  
        if ($validation->passed()) {
            $student = new Students(
                Input::get('firstName'),
                Input::get('lastName'),
                Input::get('category'),
                Input::get('class'),
                Input::get('anné'),
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
    <link rel="stylesheet" href="../style_P/Classes.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <title>Classes</title>

    <!-- <script>
function confirmDelete(StudentId) {
    var result = confirm("Are you sure you want to delete this user?");
    if (result) {
        window.location.href = '../delete.php?id=' + StudentId;
    }
}
</script> -->

</head>

<body class="white-preview">
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="school-outline"></ion-icon></span>
                        <span class="title">Prof Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="Prof_P_page.php">
                        <span class="icon">
                            <lord-icon src="https://cdn.lordicon.com/cnpvyndp.json" trigger="hover"
                                style="width:35px;height:35px">
                            </lord-icon>
                        </span>
                        <span class="title">Accueil</span>
                    </a>
                </li>
                <li>
                    <a href="../chat_P/index.php">
                        <span class="icon">
                            <lord-icon src="https://cdn.lordicon.com/fdxqrdfe.json" trigger="hover"
                                colors="primary:#000000" style="width:35px;height:35px">
                            </lord-icon>
                        </span>
                        <span class="title">Chat</span>
                    </a>
                </li>
                <li>
                    <a href="E_R_P.php">
                        <span class="icon">
                            <lord-icon src="https://cdn.lordicon.com/abfverha.json" trigger="morph"
                                state="morph-calendar " style="width:35px;height:35px">
                            </lord-icon>
                        </span>
                        <span class="title">Evenment et Réunions</span>
                    </a>
                </li>
                <li>
                    <a href="New_P.php">
                        <span class="icon">
                        <lord-icon
                            src="https://cdn.lordicon.com/hqymfzvj.json"
                            trigger="hover"
                            style="width:35px;height:35px">
                        </lord-icon>
                        </span>
                        <span class="title">Nouveau</span>
                    </a>
                </li>
                <li>
                    <a class="primary" onclick="window.dialog2.showModal();">
                        <span class="icon"><ion-icon name="add-outline"></ion-icon></span>
                        <span class="title">Ajouté</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div>
                    <!-- <h4 class="welcome">
                        <lord-icon src="https://cdn.lordicon.com/gqjpawbc.json" class="lord-icon-b" trigger="loop"
                            delay="2000" style="width:30px;height:30px">
                        </lord-icon>welcome, <span>
                            
                        </span>
                    </h4> -->
                </div>

                <!-- search -->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search Here">
                        <a href="#">
                            <lord-icon class="lord-icon-s" src="https://cdn.lordicon.com/kkvxgpti.json" trigger="hover"
                                style="width:25px;height:25px">
                            </lord-icon>
                        </a>
                    </label>
                </div>

                <!-- UserIMG -->

                <div class="user">
                    <img src="../pics/logo_web.png">
                </div>
            </div>

            <!-- Ajouter popout -->

            <dialog class="dialog" id="dialog2">
        <div class="wrapper1">
            <section class="form signup">
                <a blur-toggle onclick="document.getElementById('dialog2').close();" aria-label="close"
                    class="x close-button">❌</a>
                <header>Inscription</header>
                <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="error-text"></div>
                    <div class="name-details">
                        <div class="field input">
                            <label for="courseTitle">First Name</label>
                            <input class="field input" type="text" name="firstName" id="firstName" value="<?php echo escape(Input::get('firstName')); ?>" autocomplete="off">
                        </div>

                        <div class="field input">
                        <label for="courseDescription">Last Name</label>
                        <input class="field input" type="text" name="lastName" id="lastName" value="<?php echo escape(Input::get('lastName')); ?>" autocomplete="off">
                        </div>

                    </div>

                    <div class="field input">
                    <label>Birthday Date</label>
                    <input type="date" name="birthDate" placeholder="Select birthday date">
                    </div>

                    <div class="field input">
                    <label for="courseTitle">birthPlace</label>
                    <input class="birthPlace" type="text" name="birthPlace" id="birthPlace" value="<?php echo escape(Input::get('birthPlace')); ?>" autocomplete="off">
                    </div>
                   
                    <!-- <div class="field image">
                        <label>Select Image</label>
                        <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
                    </div> -->
                    <div class="field button">
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    <input class="ad" type="submit" value="Add Now">
                    </div>
                </form>
                <!-- <div class="link">Already signed up? <a href="login.php">Login now</a></div> -->
            </section>
        </div>

        <script src="js/pass-show-hide.js"></script>
        <script src="js/signup.js"></script>
    </dialog>
            
            <!-- data list -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Class A1</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Num°</td>
                                <td>Name</td>
                                <td>Prename</td>
                                <td>Class</td>
                                <td>Anné</td>
                                <td>B.D</td>
                                <td>B.P</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Loop through the students and display each row
                        foreach ($students as $index => $student) {
                            echo '<tr>';
                            echo '  <td>' . ($index + 1) . '</td>';
                            echo '  <td>' . $student->firstName . '</td>';
                            echo '  <td>' . $student->lastName . '</td>';
                            echo '  <td>' . $student->class . '</td>';
                            echo '  <td>' . $student->anné . '</td>';
                            echo '  <td>' . $student->birthDate . '</td>';
                            echo '  <td>' . $student->birthPlace . '</td>';
                            // echo '<td><button href="../delete.php?id=' . $student->id . '">Delete</button></td>';
                            echo '  <td><button href="../delete.php?id=' . $student->id . '">Delete</button>       <button>Edit</button></td>';
                            echo '</tr>';
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
            
    </div>


        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="https://cdn.lordicon.com/lordicon-1.1.0.js"></script>


        <script>
            //MenuToggle
            let toggle = document.querySelector('.toggle');
            let navigation = document.querySelector('.navigation');
            let main = document.querySelector('.main');

            toggle.onclick = function () {
                navigation.classList.toggle('active')
                main.classList.toggle('active')
            }

            let list = document.querySelectorAll('.navigation li')
            function activeLink() {
                list.forEach((item) =>
                    item.classList.remove('hovered'));
                this.classList.add('hovered');
            }
            list.forEach((item) =>
                item.addEventListener('mouseover', activeLink));

        </script>

        <script src="js.js"></script>
</body>

</html>