<?php
require_once '../core/init.php';
// Check if the user is not logged in
if (!Session::exists(Config::get('session/session_name'))) {
    // Redirect to the login page
    Redirect::to('login_page.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="admincss.css?v=<?php echo time(); ?>">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<script src="https://cdn.lordicon.com/lordicon-1.1.0.js"></script>
    <div class="container1">
        <div class="navigation">
            <ul>
                <li>
                    <a href="">
                        <span class="icon"><lord-icon src="https://cdn.lordicon.com/bgebyztw.json" trigger="loop" colors="primary:#ffffff,secondary:#ffffff" style="width:40px;height:40px; top:0.3vw;"></lord-icon></span>
                        <span class="title" style="color:#fff;">Admin Dashboard</span>
                    </a>
                </li>
                <li>
                    <a  href="../chat/index.html" class="primary">
                        <span class="icon"><ion-icon name="chatbubbles-outline"></ion-icon></span>
                        <span class="title">Inbox</span>
                    </a>
                </li>
                <li>
                    <a class="primary" onclick="window.dialog2.showModal();">
                        <span class="icon"><ion-icon name="person-add-outline"></ion-icon></span>
                        <span class="title">Inscription</span>
                    </a>
                    <div class="cont">
                </li>
                <li>
                    <a href="relier.php">
                        <span class="icon"><ion-icon name="link-outline"></ion-icon></span>
                        <span class="title">Parrainage</span>
                    </a>
                </li>
                <li class="DOWN">
                    <!-- <a href="">
                        <span class="icon"><ion-icon name="list-outline"></ion-icon></span>
                        <span class="title">Reset M.P</span>
                    </a> -->
                </li>
                <li class="">
                    <!-- <a href="#">
                        <span class="icon">
                            <lord-icon src="https://cdn.lordicon.com/lecprnjb.json" trigger="loop" state="hover-cog-2"
                                style="width:35px;height:35px">
                            </lord-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a> -->
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span  class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
        </div>
        <dialog class="dialog" id="dialog2">
    <div class="wrapper1">
        <section class="form signup">
            <a blur-toggle onclick="document.getElementById('dialog2').close();" aria-label="close" class="x close-button">❌</a>
            <header>Inscription</header>
            <form action="add_users.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="name" placeholder="First name" required>
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
                    <label for="user">User Type</label>
                    <input list="user_type" name="user" id="user" required>
                    <datalist id="user_type">
                        <option value="Direction"></option>
                        <option value="Professeur"></option>
                        <option value="Parent"></option>
                        <option value="Élève"></option>
                    </datalist>
                </div>
                <script>
const userTypeInput = document.getElementById('user');
userTypeInput.addEventListener('input', () => {
    const selectedOption = document.querySelector('#user_type option[value="' + userTypeInput.value + '"]');
    if (!selectedOption) {
        userTypeInput.value = ''; // Clear the input
        userTypeInput.setCustomValidity('Please select a valid user type.');
    } else {
        userTypeInput.setCustomValidity('');
    }
});
</script>
                <div class="field input">
                    <label>Place of Birth</label>
                    <input type="text" name="lieun" placeholder="Enter place of birth">
                </div>
                <div class="field input">
                    <label>Birthday Date</label>
                    <input type="date" name="daten" placeholder="Select birthday date">
                </div>
                <!-- Add a field to specify the parent's name -->
                <div class="field input" id="parentNameField" style="display: none;">
                    <label>Parent's Name (for students)</label>
                    <input type="text" name="parent_name" placeholder="Enter parent's name">
                </div>

                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter new password" required>
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
        </section>
    </div>
    <script src="js/parent"></script>
    <script src="js/pass-show-hide.js"></script>
    <script src="js/signup.js"></script>
</dialog>

<!-- dialog script -->
<script src="/js/popup.js"></script>

<!-- dialog script end  -->
<!-- <dialog class="dialog" id="dialog1">
<a blur-toggle onclick="document.getElementById('dialog1').close();" aria-label="close" class="x close-button">❌</a>

  <script src="js/users.js"></script>

    
      </dialog>     -->
     <!-- dialog script -->
<script src="/js/popup.js"></script>
<!-- dialog script end  -->

        <!-- main -->
        <div class="main">
        <div class="topbar">
            <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
            </div>
            <div class="welcome" style="top:-5vw">
            <!-- <h3 style="font-family: 'Ubuntu', sans-serif;font-size:14px;">Welcome ,<span></span></h3> -->
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
            <div class="button-drk">
                    <img style="height:3vw;width:auto;position:relative;right:-8vw;" src="../pics/moon.png" id="moon">
            </div>
        <script>
            var moon = document.getElementById("moon");
            moon.onclick = function(){
                document.body.classList.toggle("dark-theme");
                navigation.classList.toggle('active1')
        main.classList.toggle('active1')
                if (document.body.classList.contains("dark-theme")){
                    moon.src = "../pics/sun.png";
                }else{
                    moon.src = "../pics/moon.png";
                }
            }
        </script>
            <div class="user">
            <img src="admin.jpg">
            </div>
            

        </div>
<section>
        <h1 class="tbl-h">All Users</h1>
        <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th>Date de naissance</th>
                    <th>Lieu de naissance</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <!-- <div class="tbl-content"> -->
            <script>
                // '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
            </script>
            </div>
<!-- Include this script within your HTML where you have the edit button -->
</section>





            </tbody>
        </table>
</div>
	

	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/switch.js"></script>
    </div>
</div>  





        
    </div>
            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>
    //MenuToggle
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let main = document.querySelector('.main');

    toggle.onclick = function(){
        navigation.classList.toggle('active')
        main.classList.toggle('active')
    }

    let list = document.querySelectorAll('.navigation li')
    function activeLink(){
        list.forEach((item) =>
        item.classList.remove('hovered'));
        this.classList.add('hovered');
    }
    list.forEach((item) =>
    item.addEventListener('mouseover',activeLink));
</script>

<script src="js.js"></script>
        </body>
</html>
