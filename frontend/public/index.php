<?php 
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../service/define.php';

$config = ['settings' => [
    'addContentLengthHeader' => false,
    'displayErrorDetails' => true, // set to false in production
]];
$app = new \Slim\App($config);

use Higo\Service\Oauth\Repository\ClientRepository;
// Define app routes
$app->get('/hello/{name}', function ($request, $response, $args) {

    //$repo = new \Higo\Service\Oauth\Repository\ClientRepository();
    //    $ret = $repo::getClientEntity('testclient', null, 'testpass');
    //
    ClientRepository::createClient(['client_id'=>'test']); 
  //  var_dump($ret); die;
    return $response->write("Hello " . $args['name']);
});

// Run app
$app->run();
