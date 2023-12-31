<?php
require_once '../core/init.php';
// Check if the user is not logged in
if (!Session::exists(Config::get('session/session_name'))) {
    // Redirect to the login page
    Redirect::to('../login_page.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/gilroy-bold" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/Gilroy-Light" rel="stylesheet">
    <link rel="stylesheet" href="../style/prof_page.css?v=<?php echo time(); ?>">
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
                        <span class="title">Prof Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="prof_page.php">
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
                <!-- <li>
                    <a class="primary" onclick="window.dialog2.showModal();">
                        <span class="icon"><ion-icon name="add-outline"></ion-icon></span>
                        <span class="title">Ajouté</span>
                    </a>
                </li> -->
                <li class="Down">
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
                <a href="Courses.php">
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
                <a href="Classes.php">
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
                <a href="#">
                    <div class="card">
                        <div>
                            <div class="numbers">Students</div>
                            <div class="cardName">215</div>
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
                <form action="add_users.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="error-text"></div>
                    <div class="name-details">
                        <div class="field input">
                            <label>First Name</label>
                            <input type="text" name="fname" placeholder="First name" required>
                        </div>
                        <div class="field input">
                            <label>Last Name</label>
                            <input type="text" name="lname" placeholder="Last name" required>
                        </div>
                    </div>
                    <div class="field input">
                        <label>Email Address</label>
                        <input type="text" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="field input">
                        <label>Phone Number</label>
                        <input type="text" name="phone" placeholder="Enter your phone" required>
                    </div>
                    <div class="field input">
                        <label for="browser">User Type</label>
                        <input list="user type" name="user" id="user">
                        <datalist id="user type">
                            <option type="radio" value="Parent"></option>
                            <option value="Élève"></option>
                        </datalist>
                    </div>
                    <div class="field input">
                        <label>Place of Birth</label>
                        <input type="text" name="lieun" placeholder="Enter place of birth">
                    </div>
                    <div class="field input">
                        <label>Birthday Date</label>
                        <input type="date" name="daten" placeholder="Select birthday date">
                    </div>

                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter new password">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label>Select Image</label>
                        <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
                    </div>
                    <div class="field button">
                        <input type="submit" name="submit" value="Add User">
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