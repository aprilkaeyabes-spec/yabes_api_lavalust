<?php
// filepath: c:\laragon\www\Lavalust\app\controllers\LoginController.php

defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $this->call->model('UserModel');
    }

    public function index()
    {
        $this->call->view('Login');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/login');
            return;
        }

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = $this->UserModel->findByEmail($email);

        if (is_object($user)) {
            $user = get_object_vars($user);
        }

        $storedPassword = is_array($user)
            ? ($user['password'] ?? '')
            : '';

        if (!$user || !password_verify($password, $storedPassword)) {
            $_SESSION['login_error'] = 'Incorrect email or password.';
            redirect('/login');
            return;
        }

        session_regenerate_id(true);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] =
            $user['firstname'] ?? $user['username'] ?? $user['email'];

        redirect('/products');
    }

    public function logout()
    {
        $_SESSION = [];

        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }

        redirect('/login');
    }
}