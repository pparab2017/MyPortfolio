<?php
/**
 * Created by PhpStorm.
 * User: rlews
 * Date: 3/6/16
 * Time: 12:38 AM
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Utils\Utils;
use Respect\Validation\Validator as v;



$app->get('/admin[/[dashboard]]', function ($request, $response, $args) {

    $errorString="";
    $paramValue = $request-> getQueryParam('error',null);
    if($paramValue!=null)
    $errorString = Utils::getErrorString($paramValue);
    return $this->view->render($response, 'public.projects.twig.html', [
        "error" => $errorString
    ]);
})->setName('admin.dashboard')
    ->add($checkAdminAuthMiddleware);



