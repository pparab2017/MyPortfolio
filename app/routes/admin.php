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
use Propel\Runtime\Propel;


$app->get('/admin/Language/ajax', function ($request, $response, $args) {


    $language = LanguageQuery::create()
        ->joinWithProject()
        ->withColumn('count(Project.Id)', 'NoOfProjects')
        ->groupBy('Language.Id')
        ->find()
        ->toJSON();

    return $language;
})->setName('admin.Language.ajax');




$app->post('/admin/LanguageByID/ajax', function ($request, $response, $args) {

    $params = $request->getParsedBody();
    $projects = ProjectQuery::create()
        ->filterByLangId($params['id'], ProjectQuery::EQUAL)
        ->find()
        ->toJSON();

    return $projects;
})->setName('admin.Language.ajax');


$app->get('/admin/timeline/ajax', function ($request, $response, $args) {


    $users = TimelineQuery::create()
        ->joinWithEvent()
        ->joinWith("Event.EventType Type")
        ->orderById(TimelineQuery::DESC)
        ->orderBy("Event.Id")
        ->find()
        ->toJSON();

    return $users;
})->setName('admin.timeline.ajax');




$app->get('/projects/{id}', function ($request, $response, $args) {

    $laguage = LanguageQuery::create()
        ->filterById($args['id'],LanguageQuery::EQUAL)
        ->findOne();



    return $this->view->render($response, 'public.projects.twig.html', [
        'Language' =>$laguage
    ]);

})->setName('projects');



$app->get('/admin/user/delete/{id}', function ($request, $response, $args) {


//    $returnJson = "OK";
//
//    try{
//        UserQuery::create()
//            ->findById( $args['id'])
//            ->delete();
//    }
//    catch (Exception $ex)
//    {
//        $returnJson = $ex->getMessage();
//    }
//    finally
//    {
//        return json_encode($returnJson);
//    }

})->setName('admin.user.delete');
