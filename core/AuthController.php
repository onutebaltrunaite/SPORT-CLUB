<?php


namespace app\core;

use app\model\UserModel;

/**
 * Responsible for handling login and register.
 *
 * Class AuthController
 * @package app\core
 */
class AuthController extends Controller
{

    public Validation $vld;
    protected UserModel $userModel;

    public function __construct()
    {
        $this->vld = new Validation();
        $this->userModel = new UserModel();
    }

    public function login(Request $request)
    {
        if ($request->isGet()) :

            $data = [
                'email'     => '',
                'password'  => '',
                'errors' => [
                    'emailErr'     => '',
                    'passwordErr'  => '',
                ]
            ];
            return $this->render('login', $data);

        endif;


        if ($request->isPost()) :

            $data = $request->getBody();

            $data['errors']['emailErr'] = $this->vld->validateLoginEmail($data['email'], $this->userModel);
            $data['errors']['passwordErr'] = $this->vld->validateEmpty($data['password'], 'Please enter your password');

            // check if we have errors
            if ($this->vld->ifEmptyArr($data['errors'])) {

            $loggedInUser = $this->userModel->login($data['email'], $data['password']);

            if ($loggedInUser) {
                $this->startUserSession($loggedInUser);
                $request->redirect('/');
                
            } else {
                $data['errors']['passwordErr'] = 'Wrong password';
                // load view with errors
                return $this->render('login', $data);
            }            
                
            }

            return $this->render('login', $data);
        endif;
    }


    public function startUserSession($user)
    {
        session_start();
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
       
    }

    public function logout(Request $request)
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);

        session_destroy();
        $request->redirect('/');
        
    }
    public function register(Request $request)
    {
        if ($request->isGet()) :
            $data = [
                'name'      => '',
                'surname'      => '',
                'email'     => '',
                'password'  => '',
                'passwordRpt' => '',
                'phone'      => '',
                'address'     => '',
                'errors' => [
                    'nameErr'      => '',
                    'surnameErr'      => '',
                    'emailErr'     => '',
                    'passwordErr'  => '',
                    'passwordRptErr' => '',
                    'phoneErr'      => '',
                    'addressErr'     => '',
                ],
            ];

            return $this->render('register', $data);

        endif;



        if ($request->isPost()) :
            // request is post and we need to pull user data
            $data = $request->getBody();

            $data['errors']['nameErr'] = $this->vld->validateName($data['name'], 4, 40);
            $data['errors']['surnameErr'] = $this->vld->validateName($data['surname'], 4, 40);

            $data['errors']['emailErr'] = $this->vld->validateEmail($data['email'], $this->userModel);

            $data['errors']['passwordErr'] = $this->vld->validatePassword($data['password'], 4, 10);

            $data['errors']['passwordRptErr'] = $this->vld->validatePasswordConfirm($data['passwordRpt']);

            $data['errors']['phoneErr'] = $this->vld->validatePhone($data['phone']);
            $data['errors']['addressErr'] = $this->vld->validateAddress($data['address'], 255);

            // if there are no errors
            if ($this->vld->ifEmptyArr($data['errors'])) :


                // hash password // save way to store pass
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // create user
                if ($this->userModel->register($data)) {
                    // flash msg maybe?
                    $request->redirect('login');
                } else {
                    die('Something went wrong in adding user to db');
                }
            endif;


            return $this->render('register', $data);
        endif;
    }
} 