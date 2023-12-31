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
    <link rel="stylesheet" href="../style_P/prof_page.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="../style/slider.css?v=<?php echo time(); ?>">
    <title>Prof Dashboard</title>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="school-outline"></ion-icon></span>
                        <span class="title">Prof prancipal Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="prof_P_page.php">
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
                    <a class="primary" onclick="window.dialog2.showModal();">
                        <span class="icon"><ion-icon name="add-outline"></ion-icon></span>
                        <span class="title">Ajouté</span>
                    </a>
                </li>
                <li  class="Down">
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
                            <lord-icon class="lord-icon-s" colors="primary:#000000"
                                src="https://cdn.lordicon.com/kkvxgpti.json" trigger="hover"
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

            <!-- SLIDERS -->

            <div class="wrapper">
                <div class="container">
                    <input class="slider" type="radio" name="slide" id="c1" checked>
                    <label for="c1" class="cards">
                        <div class="row">
                            <div class="icon">1</div>
                            <div class="description">
                                <h4>Winter</h4>
                                <p>Winter has so much to offer - creative activities</p>
                            </div>
                        </div>
                    </label>

                    <input class="slider" type="radio" name="slide" id="c2">
                    <label for="c2" class="cards">
                        <div class="row">
                            <div class="icon">2</div>
                            <div class="description">
                                <h4>Digital Technology</h4>
                                <p>Gets better every day - stay tunned</p>
                            </div>
                        </div>
                    </label>

                    <input class="slider" type="radio" name="slide" id="c3">
                    <label for="c3" class="cards">
                        <div class="row">
                            <div class="icon">3</div>
                            <div class="description">
                                <h4>Globalization</h4>
                                <p>Help people all over the world</p>
                            </div>
                        </div>
                    </label>

                    <input class="slider" type="radio" name="slide" id="c4">
                    <label for="c4" class="cards">
                        <div class="row">
                            <div class="icon">4</div>
                            <div class="description">
                                <h4>New technologies</h4>
                                <p>Space engineering becomes more and more advanced</p>
                            </div>
                        </div>
                    </label>
                </div>
            </div>



            <!-- cards -->
            <div class="cardBox">
                <a href="Courses_P.php">
                    <div class="card">
                        <div>
                            <div class="numbers">Courses</div>
                            <div class="cardName">10</div>
                        </div>
                        <div class="iconBx">
                            <lord-icon src="https://cdn.lordicon.com/zyzoecaw.json" trigger="loop" delay="3000"
                                state="loop-book" style="width:50px;height:50px">
                            </lord-icon>
                        </div>
                    </div>
                </a>
                <a href="Classes_P.php">
                    <div class="card">
                        <div>
                            <div class="numbers">Classes</div>
                            <div class="cardName">2</div>
                        </div>
                        <div class="iconBx">
                            <ion-icon name="pencil-outline"></ion-icon>
                        </div>
                    </div>
                </a>
                <a href="devoir_P.php">
                    <div class="card">
                        <div>
                            <div class="numbers">Devoir</div>
                            <div class="cardName"></div>
                        </div>
                        <div class="iconBx">
                            <lord-icon src="https://cdn.lordicon.com/kthelypq.json" trigger="loop" delay="3000"
                                style="width:50px;height:50px">
                            </lord-icon>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div id="myBtn">
                        <div class="card">
                            <div>
                                <div class="numbers" id="myBtn">Notifications</div>
                                <div class="cardName">*</div>
                            </div>
                            <div class="iconBx">
                                <lord-icon src="https://cdn.lordicon.com/vspbqszr.json" trigger="loop" delay="3000"
                                    style="width:50px;height:50px">
                                </lord-icon>
                            </div>
                        </div>
                        <div id="myModal" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <h1>Notifications:</h1>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
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

    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.lordicon.com/lordicon-1.1.0.js"></script>

    <script>

        // SLIDERS



        // NOTIFICATIONS POPOUT
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function () {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == span) {
                modal.style.display = "none";
            }
        }

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