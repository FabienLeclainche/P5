<?php

namespace App\Controller;

use App\Dao\CustomerDao;
use App\Dao\FormDao;
use App\Dao\UserDao;
use Firebase\JWT\JWT;

class FrontendController
{
    private $formDao;
    private $userDao;
    private $customerDao;

    public function __construct()
    {
        $this->formDao = new FormDao();
        $this->userDao = new UserDao();
        $this->customerDao = new CustomerDao();
    }

    public function home()
    {
        $budgets = $this->formDao->findbudget();
        $niveaux = $this->formDao->findniveau();
        $saisons = $this->formDao->findsaison();
        include_once __DIR__ . '/../view/home.php';
    }

    public function login()
    {
        include_once __DIR__ . '/../view/login.php';
    }

    public function loginAction($login, $password)
    {
        $user = $this->userDao->findByLogin($login);
        $userId = $user->getId();
        if (!isset($userId)) {
            header('Location: /login?err=login_error');
            die();
        }
        if (!password_verify($password, $user->getPassword())) {
            header('Location: /login?err=password_error');
            die();
        }

        $env = parse_ini_file(getcwd() . '/env');
        $token = JWT::encode([
            'user_id' => $userId,
            "exp" => time() + 3600,
        ], $env['jwt_token']);
        setcookie('p5_authentification', $token);
        header('Location: /admin');
        die();
    }
}
