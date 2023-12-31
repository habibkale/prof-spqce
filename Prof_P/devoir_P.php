<?php
require_once '../core/init.php';

$db = DB::getInstance();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submissionId = Input::get('submissionId');
    $mark = Input::get('mark');
    $comments = Input::get('comments');
    

    // Perform validation and update database
    // (Note: You might want to use the validation logic you already have)
    // ...

    // Update the database using your DB class
    $db->update('submission', $submissionId, [
        'mark' => $mark,
        'comments' => $comments,
    ]);

    // Redirect or display a success message
    // ...
}

// Fetch data from the students table
$submissions = $db->query("SELECT * FROM submission")->results();

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'id' => array('required' => true),
            'student_id' => array('required' => true),
            'homework_id' => array('required' => true),
            'matiare' => array('required' => true),
            'submission_date' => array('required' => true),
            'mark' => array('required' => true),
            'comments' => array('required' => true),
        ));

        if ($validation->passed()) {
            // $submissions = new submission(
            //     Input::get('id'),
            //     Input::get('student_id'),
            //     Input::get('homework_id'),
            //     Input::get('submission_date'),
            //     Input::get('mark'),
            //     Input::get('comments')
            // );

            // $submissions->saveToDatabase();

            // echo 'note/comment added successfully!';
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
    <link rel="stylesheet" href="../style_P/devoir.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <title>Devoir</title>

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
                    <a href="../chat_P/Chat.php">
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
                            <lord-icon src="https://cdn.lordicon.com/hqymfzvj.json" trigger="hover"
                                style="width:35px;height:35px">
                            </lord-icon>
                        </span>
                        <span class="title">Nouveau</span>
                    </a>
                </li>
                <li>
                    <a href="new_SP.php">
                        <span class="icon"><ion-icon name="add-outline"></ion-icon></span>
                        <span class="title">Ajouté</span>
                    </a>
                </li>
                <li  class="Down">
                    <a href="">
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
               
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Class A1</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>Name</td>
                                <td>prename</td>
                                <td>matiare</td>
                                <td>submission date</td>
                                <td>note</td>
                                <td>remarke</td>
                                <td>edit</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        //Loop through the students and display each row
                        if (!empty($submissions) && is_array($submissions)) {
                            foreach ($submissions as $index => $submission) {
                                echo '<tr>';
                                echo '  <td>' . $submission->id . '</td>';
                                echo '  <td>' . $submission->student_id . '</td>';
                                echo '  <td>' . $submission->homework_id . '</td>';
                                echo '  <td>' . $submission->matiare . '</td>';
                                echo '  <td>' . $submission->submission_date . '</td>';
                                echo '  <td>' . $submission->mark . '</td>';
                                echo '  <td>' . $submission->comments . '</td>';
                                echo '  <td><button class="edit" onclick="openEditForm(' . $submission->id . ')">Edit</button></td>';
                                echo '</tr>';
                            }
                        }
                        
                        ?>

                        <div id="editFormContainer" style="display:none;">
                                <form id="editForm" method="post" action="">
                                    <label for="mark">Mark (out of 10): </label>
                                    <input type="number" name="mark" id="mark" min="0" max="10" required>

                                    <label for="comments">Comment: </label>
                                    <input name="comments" id="comments" required></input>

                                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                    <input type="hidden" name="submissionId" id="submissionId">
                                    <input class="bbtn" type="submit" value="Submit">
                                </form>
                        </div>

                        </tbody>
                    </table>
                </div>
                </div>
                </div>

                <script>
                    function openEditForm(submissionId) {
                        var submission = <?php echo json_encode($submissions); ?>.find(function (s) {
                            return s.id === submissionId;
                        });

                        document.getElementById('mark').value = submission.mark;
                        document.getElementById('comments').value = submission.comments;
                        document.getElementById('submissionId').value = submission.id;

                        document.getElementById('editFormContainer').style.display = 'block';
                    }
                </script>


        <script src="js/pass-show-hide.js"></script>

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
</body>

</html>