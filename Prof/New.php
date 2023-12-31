<?php
require_once '../core/init.php';

function moveUploadedFile($fileInputName, $uploadPath)
{
    $uploadedFileName = $_FILES[$fileInputName]['name'];
    $uploadedFileTmpName = $_FILES[$fileInputName]['tmp_name'];

    // Move the uploaded file to the designated directory with the original filename
    $destination = $uploadPath . $uploadedFileName;
    move_uploaded_file($uploadedFileTmpName, $destination);

    return $uploadedFileName;
}


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
            // Process file upload
            $fileInputName = 'fileInputCours';
            $uploadPath = '../pdf/'; // Specify your upload path
            $uploadedFileName = moveUploadedFile($fileInputName, $uploadPath);
        
            $course = new Course(
                Input::get('courseId'),
                Input::get('courseTitle'),
                Input::get('courseDescription'),
                $uploadedFileName,
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/gilroy-bold" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/Gilroy-Light" rel="stylesheet">
    <link rel="stylesheet" href="../style/New.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <title>Nouveau</title>

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
                        <lord-icon
                            src="https://cdn.lordicon.com/hqymfzvj.json"
                            trigger="hover"
                            style="width:35px;height:35px">
                        </lord-icon>
                        </span>
                        <span class="title">Nouveau</span>
                    </a>
                </li>
                <li class="Down">
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
            
                    <!-- Main ADD -->

            <section class="main-course">
                <h1>Ajouter</h1>  
                <div class="course-box">
                    <div class="course">
                        <div class="box">
                            <h3>Ajouter votre cours</h3>
                            <p style="max-width=200px">Sub Title</p>
                            <button onclick="openPopup('Ajouter Un Cour')">Ajouter</button>
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                        </div>
                        <div class="box">
                            <h3>Ajoutez votre Quiz</h3>
                            <p>Sub Title</p>
                            <button onclick="openPopupp('Ajouter Un Quiz')">Ajouter</button>
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                        </div>
                        <div class="box">
                            <h3>Ajouter votre Devoir</h3>
                            <p>Sub Title</p>
                            <button onclick="openPopuppp('Ajouter Un Devoir')">Ajouter</button>
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                        </div>
                        <div class="box">
                            <h3>Ajouter Photos/Vidéos</h3>
                            <p>Sub Title</p>
                            <button onclick="openPopupppp('Ajouter Un Photo/Vidéo')">Ajouter</button>
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                        </div>
                        
                         <!-- Popup content cours-->

        <div class="overlay" onclick="closePopup()"></div>
        <div class="popup" id="popup">
            <h2 id="popupTitle">Popup Title</h2>

                    <form id="courseForm" action="" method="post" enctype="multipart/form-data">

                        
                            <label for="courseTitle">Course Title</label>
                            <input class="cours-title" type="text" name="courseTitle" id="courseTitle" value="<?php echo escape(Input::get('courseTitle')); ?>" autocomplete="off">
                       

                        
                            <label for="courseDescription">Course Description</label>
                            <textarea name="courseDescription" id="courseDescription"><?php echo escape(Input::get('courseDescription')); ?></textarea>
                        

                            <label  for="category">Category</label>
                            <select class="selectcategory" name="category" id="category">
                                <option value="Math">Math</option>
                                <option value="Arab">Arab</option>
                                <option value="Histoire">Histoire</option>
                                <option value="Français">Français</option>
                            </select>
                        
                        
                        <label  id="fileDropAreaCours" class="file-drop-area" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event, 'fileDropAreaCours')" ondrop="handleFileDrop(event, 'fileInputCours')" onclick="triggerFileInput('fileInputCours')">
                        <p>Drag & Drop PDF File or Click to Select</p>
                        </label>

                        <label for="fileInputCours"></label>
                        <input class="fil" type="file" name="fileInputCours" id="fileInputCours" accept=".pdf,.doc,.docx">
                        
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                        <input class="ad" type="submit" value="Add Now">
                        <!-- <button class="clos" onclick="closePopupp()">Close</button> -->
                        </form>
                <!-- </form> -->
            
        </div>
                <!-- Popup content exercice-->

        <div class="overlayy" onclick="closePopupp()"></div>
        <div class="popupp" id="popupp">
            <h2 id="popuppTitle">Popupp Title</h2>
            <form id="exerciceForm" onsubmit="addCourse(event)">
                    <label for="courseTitle">Course Title:</label>
                    <input class="cours-title" type="text" id="courseTitle" required>
                    
                    <label for="courseDescription">Course Description:</label>
                    <textarea id="courseDescription" required></textarea>

                    <select class="selectcategory" id="category">
                        <option value="Math">Math</option>
                        <option value="Arab">Arab</option>
                        <option value="Histoire">Histoire</option>
                        <option value="Français">Français</option>
                    </select>

                    <label id="fileDropAreaExercice" class="file-drop-area" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event, 'fileDropAreaExercice')" ondrop="handleFileDrop(event, 'fileInputExercice')" onclick="triggerFileInput('fileInputExercice')">
                        <p>Drag & Drop PDF File or Click to Select</p>
                    </label>
                    <input class="fil" type="file" id="fileInputExercice" accept=".pdf,.doc,.docx" onchange="handleFileChange('fileInputExercice')" required>

                    <button class="ad" type="submit">Add Now</button>
                    <button class="clos" onclick="closePopupp()">Close</button>
                </form> 
        </div>

        <!-- Popup content Exam-->

        <div class="overlayyy" onclick="closePopuppp()"></div>
        <div class="popuppp" id="popuppp">
            <h2 id="popupppTitle">Popuppp Title</h2>
            <form id="examForm" onsubmit="addCourse(event)">
                    <label for="courseTitle">Course Title:</label>
                    <input class="cours-title" type="text" id="courseTitle" required>
                    
                    <label for="courseDescription">Course Description:</label>
                    <textarea id="courseDescription" required></textarea>

                    <select class="selectcategory" id="category">
                        <option value="Math">Math</option>
                        <option value="Arab">Arab</option>
                        <option value="Histoire">Histoire</option>
                        <option value="Français">Français</option>
                    </select>

                    <label id="fileDropAreaExercice" class="file-drop-area" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event, 'fileDropAreaExam')" ondrop="handleFileDrop(event, 'fileInputExam')" onclick="triggerFileInput('fileInputExam')">
                        <p>Drag & Drop PDF File or Click to Select</p>
                    </label>
                    <input class="fil" type="file" id="fileInputExam" accept=".pdf,.doc,.docx" onchange="handleFileChange('fileInputExam')" required>

                    <button class="ad" type="submit">Add Now</button>
                    <button class="clos" onclick="closePopuppp()">Close</button>
                </form>
            
        </div>

        <!-- Popup content Post-->

        <div class="overlayyyy" onclick="closePopupppp()"></div>
        <div class="popupppp" id="popupppp">
            <h2 id="popuppppTitle">Popupppp Title</h2>
            <form action="../Classes/addcours.php" method="post" id="postForm" onsubmit="addPost(event)">
                    <label for="PostTitle">Course Title:</label>
                    <input name="title" class="Post-title" type="text" id="courseTitle" required>
                    
                    <label for="PostDescription">Course Description:</label>
                    <textarea name="description" id="PostDescription" required></textarea>

                    <label id="fileDropAreaPost" class="file-drop-area" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event, 'fileDropAreaPost')" ondrop="handleFileDrop(event, 'fileInputPost')" onclick="triggerFileInput('fileInputPost')">
                        <p>Drag & Drop PDF File or Click to Select</p>
                    </label>
                    <input name="pdfFile" class="fil" type="file" id="fileInputExercice" accept=".pdf,.doc,.docx" onchange="handleFileChange('fileInputPost')" required>

                    <button class="ad" type="submit">Add Now</button>
                    <button class="clos" onclick="closePopupppp()">Close</button>
                </form>
            
        </div>

                <!-- Script-->

        <script>
            function openPopup(title) {
                document.getElementById('popupTitle').innerText = title;
                document.querySelector('.overlay').style.display = 'block';
                document.getElementById('popup').style.display = 'block';
            }

            function closePopup() {
                document.querySelector('.overlay').style.display = 'none';
                document.getElementById('popup').style.display = 'none';
            }


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

                //exam popup

                function openPopuppp(title) {
                document.getElementById('popupppTitle').innerText = title;
                document.querySelector('.overlayyy').style.display = 'block';
                document.getElementById('popuppp').style.display = 'block';
            }

            function closePopuppp() {
                document.querySelector('.overlayyy').style.display = 'none';
                document.getElementById('popuppp').style.display = 'none';
            }


            function openPopupppp(title) {
                document.getElementById('popuppppTitle').innerText = title;
                document.querySelector('.overlayyyy').style.display = 'block';
                document.getElementById('popupppp').style.display = 'block';
            }

            function closePopupppp() {
                document.querySelector('.overlayyyy').style.display = 'none';
                document.getElementById('popupppp').style.display = 'none';
            }



    // FILES
    function handleDragOver(event) {
        event.preventDefault();
        event.target.classList.add('active');
    }

    function handleDragLeave(event, fileDropAreaId) {
        document.getElementById(fileDropAreaId).classList.remove('active');
    }

    function handleFileDrop(event, fileInputId) {
        event.preventDefault();
        document.getElementById(fileInputId).classList.remove('active');

        var files = event.dataTransfer.files;
        if (files.length > 0) {
            document.getElementById(fileInputId).files = files;
        }
    }

    function handleFileChange(fileInputId) {
        var files = document.getElementById(fileInputId).files;
        if (files.length > 0) {
            document.getElementById(fileInputId + 'DropArea').classList.remove('active');
        }
    }

    function triggerFileInput(fileInputId) {
        document.getElementById(fileInputId).click();
    }
        </script>
                    </div>
                </div>
            </section>

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