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


$app->post('/admin/user/add', function ($request, $response, $args) {

    $con = Propel::getWriteConnection('default');// get the data base name connection
    $returnJson = "OK";
    try {
        $params = $request->getParsedBody();// get the form request
        $user = new User();
        $user->setFname(htmlentities($params['user-fname']));
        $user->setLname($params['user-lname']);
        $user->setEmail($params['user-email']);
        $user->setHash(Utils::generateHash($params['user-pass']));
        $user->setGender($params['user-gender']);
        $user->setAddress($params['user-address']);
        $user->setWeight($params['user-weight']);
        $user->setAge($params['user-age']);

        $con->beginTransaction();
        $user->save();


    }
    catch (Exception $e) {
        $con->rollBack();
        if(strpos($e, '1062') !== false)
        {
            $returnJson =  "Action not completed, An account with this email address already exist!";
        }
        else
        {
            $returnJson = $e->getMessage();
        }
    }
    finally
    {
        $con->commit();
        return json_encode($returnJson);

    }


})->setName('admin.user.add')
    ->add($checkAdminAuthMiddleware);



$app->post('/admin/user/update', function ($request, $response, $args) {
    $returnJson = "OK";
    try {
        $params = $request->getParsedBody();// get the form request
        $user = UserQuery::create()->findOneById($params['user-EditId']);
        $user->setEmail($params['user-email']);
        if($params['user-pass']!= "PASSWORD")
            $user->setHash(Utils::generateHash($params['user-pass']));
        $user->setFname($params['user-fname']);
        $user->setLname($params['user-lname']);
        $user->setGender($params['user-gender']);
        $user->setAddress($params['user-address']);
        $user->setWeight($params['user-weight']);
        $user->setAge($params['user-age']);
        $user->save();
    }
    catch (Exception $ex)
    {
        if(strpos($ex, '1062') !== false)
        {
            $returnJson =  "Action not completed, An account with this email address already exist!";
        }
        else
        {
            $returnJson = $ex->getMessage();
        }
    }
    finally
    {
        return json_encode($returnJson);
    }


})
    ->setName('admin.user.update')
    ->add($checkAdminAuthMiddleware);


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
