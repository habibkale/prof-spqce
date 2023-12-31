<?php
require_once '../core/init.php';

// Check if the user is not logged in
if (!Session::exists(Config::get('session/session_name'))) {
    // Redirect to the login page
    Redirect::to('../login_page.php');
}

$courseManager = new courseManager();
$courses = $courseManager->getCourses();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/gilroy-bold" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/Gilroy-Light" rel="stylesheet">
    <link rel="stylesheet" href="../style/Courses.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <title>Courses</title>

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
                    <a href="Prof_page.php">
                        <span class="icon">
                            <lord-icon src="https://cdn.lordicon.com/cnpvyndp.json" trigger="hover"
                                style="width:35px;height:35px">
                            </lord-icon>
                        </span>
                        <span class="title">Accueil</span>
                    </a>
                </li>
                <li>
                    <a href="../chat/Chat.php">
                        <span class="icon">
                            <lord-icon src="https://cdn.lordicon.com/fdxqrdfe.json" trigger="hover"
                                colors="primary:#000000" style="width:35px;height:35px">
                            </lord-icon>
                        </span>
                        <span class="title">Chat</span>
                    </a>
                </li>
                <li>
                    <a href="E_R.php">
                        <span class="icon">
                            <lord-icon src="https://cdn.lordicon.com/abfverha.json" trigger="morph"
                                state="morph-calendar " style="width:35px;height:35px">
                            </lord-icon>
                        </span>
                        <span class="title">Evenment et Réunions</span>
                    </a>
                </li>
                <li>
                    <a href="New.php">
                        <span class="icon">
                            <lord-icon src="https://cdn.lordicon.com/hqymfzvj.json" trigger="hover"
                                style="width:35px;height:35px">
                            </lord-icon>
                        </span>
                        <span class="title">Nouveau</span>
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


            <section class="main-course">
                <h1>My courses:</h1>
                <div class="course-box">
                    <ul>
                        <li class="active">Arab</li>
                        <li>Math</li>
                        <li>Histoire</li>
                        <li>Français</li>
                    </ul>
                    
                    <?php
                    foreach ($courses as $course) {
                        echo '<div class="course">';
                        echo '  <div class="box">';
                        echo '    <h3>' . $course->getTitle() . '</h3>';
                        echo '    <p>' . $course->getDescription() . '</p>';
                        echo '    <i class="fa fa-file-text" aria-hidden="true"></i>';
                        echo '    <a href="../pdf/'. $course->geTPdfFile() .'" target="_blank">';
                        echo '    <button class="firstbtn">Continue</button>';
                        echo '    </a>';
                        echo '    <a href="../pdf/' . $course->getPdfFile() . '" download="' . $course->getTitle() . '.pdf">';;
                        echo '      <button class="secondbtn">Download</button>';
                        echo '    </a>';
                        echo '  </div>';
                        echo '</div>';
                    }
                    ?>
    
                </div>
            </section>

            <!-- Exercises -->
            <Section class="exercises">
                <h1> Exercises: </h1>
                <ul>
                    <li>Arab</li>
                    <li class="active">math</li>
                    <li>Histoire</li>
                    <li>Français</li>
                </ul>
                <div class="main-skills">
                    <div class="card">
                        <!-- <i class="fas fa-laptop-code"></i> -->
                        <h3>Title</h3>
                        <p>Sub</p>
                        <button>Get Started</button>
                    </div>
                    
                </div>
            </Section>
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