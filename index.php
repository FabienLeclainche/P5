<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Controller\ApiController;
use App\Controller\BackendController;
use App\Controller\FrontendController;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Klein\Klein;
$frontendController = new FrontendController();
$backendController = new BackendController();
$apiController = new ApiController();
$klein = new Klein();
/**
 * Définition des routes
 */
$klein->respond('GET', '/', function () use ($frontendController) {
    $frontendController->home();
});
$klein->respond('GET', '/login', function () use ($frontendController) {
    $frontendController->login();
});

$klein->respond('POST', '/login', function ($request) use ($frontendController) {
    $params = $request->paramsPost();
    $frontendController->loginAction($params['login'], $params['password']);
});

$klein->respond('GET', '/logout', function () use ($backendController) {
    $backendController->logout();
});
$klein->respond('GET', '/admin', function () use ($backendController) {
    checkAuthentication();
    $backendController->adminHome();
});
$klein->respond('GET', '/api/destinations/[:budget]/[:niveau]/[:saison]', function ($request, $response) use ($apiController) {
    $response->json($apiController->getDestinations($request->budget, $request->niveau, $request->saison));
    die();
});

$klein->respond('POST', '/api/customers', function ($request, $response) use ($apiController) {
    $prenom = $request->paramsPost()['prenom'];
    $nom = $request->paramsPost()['nom'];
    $email = $request->paramsPost()['email'];
    $budget = $request->paramsPost()['budget'];
    $niveau = $request->paramsPost()['niveau'];
    $saison = $request->paramsPost()['saison'];
    $apiController->createCustomer($prenom, $nom, $email, $budget, $niveau, $saison);
    $response->json(['status' => 'OK']);
});

$klein->respond('DELETE', '/api/customers/[:customerId]', function ($request, $response) use ($apiController) {
    $apiController->deleteCustomer($request->customerId);
    return 'OK';
});


$klein->respond('GET', '/public/[*]', function ($request, $response) {
    $file = __DIR__ . '/src' . $request->pathname();
    $mimeType = \MimeType\MimeType::getType($file);
    $response->header('Content-Type', $mimeType);
    return file_get_contents($file);
});
$klein->dispatch();

function checkAuthentication()
{

    if(!isset($_COOKIE['p5_authentification'])){
        header('Location: /login');
        die();
    }
    $token = $_COOKIE['p5_authentification'];
    $env = parse_ini_file(getcwd() . '/env');
    /* Si le token a expiré ou n'est pas valide, la librairie propage une exception qu'on traite ici en laissant passer ou pas l'utilisateur */
    try {
        $decodedToken = JWT::decode($token, $env['jwt_token'], array('HS256'));
    } catch (Exception $e){
        header('Location: /login');
    }
}

