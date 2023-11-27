<?php
class Users extends Controller{

    protected $userModel;

    public function __construct() {
        $this->userModel = $this->model('M_Users');
    }

    public function register() {
        $data = [];

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'fname' => trim($_POST['fname']),
                'lname' => trim($_POST['lname']),
                'dob' => $_POST['dob'],
                'email' => trim($_POST['email']),
                'city' => trim($_POST['city']),
                'country' => trim($_POST['country']),
                'password' => $_POST['password'],
                'c_password' => $_POST['c_password'],
                'name_err' => '',
                'email_err' => '',
                'c_password_err' => '',
                'password_err' => ''
            ];

            if(empty($data['fname']) || empty($data['lname'])) $data['name_err'] = "Please enter first and last names";

            if(empty($data['email'])) $data['email_err'] = "Please enter an email";
            else if($this->userModel->findUserByEmail($data['email'])) $data['email_err'] = "Email is already Registered";

            if(empty($data['password'])) $data['password_err'] = "Please enter a password";
            else if($data['password'] != $data['c_password']) $data['c_password_err'] = "Password doesn't match";

            if(empty($data['name_err']) && empty($data['password_err']) && empty($data['c_password_err'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Registering the user
                if($this->userModel->register($data)) {
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
            }

            $this->view('users/register', $data);

        } else {
            $data = [
                'fname' => '',
                'lname' => '',
                'email' => '',
                'city' => '',
                'country' => '',
                'name_err' => '',
                'email_err' => '',
                'c_password_err' => '',
                'password_err' => ''
            ];
            $this->view('users/register', $data);
        }
    }

    public function login() {

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            // Form validation

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];

            // Validations
            if(empty($data['email'])) $data['email_err'] = "Please enter the email";
            else {
                if($this->userModel->findUserByEmail($data['email'])) {
                    // User found
                } else {
                    // User not found
                }
            }

            if(empty($data['password'])) $data['password_err'] = "Please enter the password";
            else {
                // DD
            }

            if(empty($data['email_err']) && empty($data['password_err'])) {
                $loggedUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedUser) {
                    // Create user session for authenticated user
                    redirect('pages/index');
                } else {
                    $data['password_err'] = "Password is Incorrect";
                }
            }


        } else {
            // Initiail Form
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];
        }

        $this->view('users/login', $data);
    }
}