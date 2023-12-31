<?php

require_once '../core/init.php';


if (Input::exists()) {
    if(Token::check(Input::get('token'))){

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'firstName' => array(
                'required' => true,
                'min' => 2,
                'max' => 50,
                'unique' => 'users'
            ),
            'lastName' => array(
                'required' => true,
                'min' => 2,
                'max' => 50,
                'unique' => 'users'
            ),
            'birthDate' => array(
                'required' => true,
                'date' => true, // Validate as a valid date
                'date_format' => 'Y-m-d' // Specify the expected date format
            ),
            'birthPlace' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'email' => array(
                'required' => true,
                'min' => 18,
                'max' => 50,
                'email' => true, // Validate as a valid email address
                'unique' => 'users' // Check if the email is unique in the 'users' table
            ),
            'password' => array(
                'required' => true,
                'min' => 8
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            ),
            'userType' => array(
                'required' => true,
                'in' => array('Admin', 'ProfesseurP','Professeur','Parent','Élève') // Validate that the value is one of 'admin' or 'user'
            ),
            'PhotoProfil' => array(
                'required' => false,
                'file' => array(
                    'allowed_types' => array('jpg', 'jpeg', 'png'),
                    'max_size' => 5 * 1024 * 1024, // 5 MB
                    'upload_path' => '/path/to/upload/directory/'
                )
            ),
        ));

        if($validation->passed()){
            // Session::flash('success', 'You registred successfully');
            // header('Location: index.php');
            $user = new User();

            $salt = Hash::salt(32);

        try {
            $hashedPassword = Hash::make(Input::get('password'), $salt);

            $user->create(array(
                'firstName' => Input::get('firstName'),
                'lastName' => Input::get('lastName'),
                'birthDate' => date('Y-m-d'),
                'birthPlace' => Input::get('birthPlace'),
                'email' => Input::get('email'),
                'password' => $hashedPassword,
                'salt' => $salt,
                'userType' => Input::get('userType')
                // 'PhotoProfil' => $imageData 
            ));

            // Session::flash('home', 'User has been registered and can now login!');
            echo 'User has been registred and can now login !';
            Redirect::to('../login/login_page.php');
        } catch (Exception $e) {
            die($e->getMessage());
        }

            
        } else {
            foreach($validation->errors() as $error){
                echo $error, '<br>';
            }
        }
        }
}


?>

<form action="" method="post">

    <div class="field">
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName" value="<?php echo escape(Input::get('firstName')); ?>" autocomplete="off">
    </div>

    <div class="field">
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" value="<?php echo escape(Input::get('lastName')); ?>" autocomplete="off">
    </div>

    <div class="field">
        <label for="birthDate">Birthday</label>
        <input type="date" name="birthDate" id="birthDate">
    </div>

    <div class="field">
        <label for="birthPlace">Birth Place</label>
        <input type="text" name="birthPlace" id="birthPlace" value="" autocomplete="off">
    </div>

    <div class="field">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>

    <div class="field">
        <label for="password">Choose a Password</label>
        <input type="password" name="password" id="password">
    </div>

    <div class="field">
        <label for="password_again">Enter your Password again</label>
        <input type="password" name="password_again" id="password_again">
    </div>

    <div class="field">
        <label for="userType">User Type</label>
        <input type="text" name="userType" id="userType">
    </div>

    <div class="field">
        <label for="PhotoProfil">Profile Picture</label>
        <input type="file" name="PhotoProfil" id="PhotoProfil">
    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value="Register">
</form>