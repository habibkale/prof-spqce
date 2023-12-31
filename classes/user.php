<?php
class User {
    private $_db,
            $_data,
            $_sessionName;

    public function __construct($user = null){
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('session/session_name');
    }

    public function create($fields = array()){
        if(!$this->_db->insert('users', $fields)){
            throw new Exception('There was a problem creating an account');
        }
    }

    public function find($user = null) {
        if ($user) {
            $field = (is_numeric($user)) ? 'id' : 'email';
            $data = $this->_db->get('users', array($field, '=', $user));
    
            if ($data->count()) {
                $this->_data = $data->first();
                return $this;  // Return the User instance
            } else {
                echo "User doesn't exist"; // Add this line for debugging
            }
        }
        return null;  // Return null if $user is not provided
    }
    
    
    public function login($email = null, $password = null) {
        $user = $this->find($email);
    
        if ($user) {
            // Use the stored salt for hashing during login
            $hashedPassword = Hash::make($password, $user->data()->salt);
    
            // Use password_verify to compare hashed passwords
            if (password_verify($password, $user->data()->password)) {
                Session::put($this->_sessionName, $user->data()->id);
    
                // Redirect based on user type
                switch ($user->data()->userType) {
                    case 'Admin':
                        Redirect::to('../Admin/admin_page.php');
                        break;
                    case 'ProfesseurP':
                        Redirect::to('../Prof_P/prof_P_page.php');
                        break;
                    case 'Professeur':
                        Redirect::to('../Prof/prof_page.php');
                        break;
                    case 'Parent':
                        Redirect::to('parent_page.php');
                        break;
                    case 'Élève':
                        Redirect::to('eleve_page.php');
                        break;
                    // Add more cases for other user types as needed
                    default:
                        // Redirect to a default page or handle as appropriate
                        Redirect::to('default_page.php');
                        break;
                }
    
                return true;
            }
        }
    
        // Debugging Statements
        // echo 'Entered Email: ' . Input::get('email') . '<br>';
        // echo 'Entered Password: ' . Hash::make(Input::get('password'), $user->data()->salt) . '<br>';
        // echo 'Stored Password: ' . $user->data()->password . '<br>';
    
        return false;
    }
    
    
    
    
    
    
    
    

    private function data() {
        return $this->_data;
    }
}

?>
