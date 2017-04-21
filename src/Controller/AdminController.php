<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 20/04/2017
 * Time: 12:00
 */
/*
namespace Itb\Controller;
use Itb\WebApplication;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;


class AdminController
{
    *
     * Class AdminController
     *
     * simple authentication using Silex session object
     * $app['session']->set('isAuthenticated', false);
     *
     * but the propert way to do it:
     * https://gist.github.com/brtriver/1740012
     *
     * @package Hdip\Controller

    private $app;
    public function __construct(WebApplication $app)
    {
        $this->app = $app;
    }
    // action for route:    /admin
    // will we allow access to the Admin home?
    public function indexAction(Request $request, Application $app)
    {
        // test if 'username' stored in session ...
        //$username = $this->getAuthenticatedUserName();
        $username = 'admin';
        // check we are authenticated --------
        $isAuthenticated = (null != $username);
        if(!$isAuthenticated){
            // not authenticated, so redirect to LOGIN page
            return $app->redirect('/login');
        }
        // store username into args array
        $argsArray = [];
        // render (draw) template
        $templateName = 'admin/index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    // route for /adminCodes
    // will we allow access to the Admin home?
    public function codesAction(Request $request, Application $app)
    {
        //$username = $this->getAuthenticatedUserName();
        $username = 'admin';
        // check we are authenticated
        $isAuthenticated = (null != $username);
        if(!$isAuthenticated){
            // not authenticated, so redirect to LOGIN page
            return $app->redirect('/login');
        }
        // store username into args array
        $argsArray = [];
        // render (draw) template
        $templateName = 'admin/codes';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    // action for route:    /index
    // will we allow access to the Admin home?
    public function indexAction(Request $request, Application $app)
    {
        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);
        $argsArray = array(
            'username' => $username
        );

        // check we are authenticated --------
        $isAuthenticated = (null != $username);
        if(!$isAuthenticated){
            return $app->redirect('/login');
        }

        // render (draw) template
        // ------------
        $templateName = 'admin';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    public function getAuthenticatedUserName(Request $request, Application $app)
    {
        // IF object (array) 'user' found with non-null value in 'session'
        $user = $app['session']->get('user');

        // if no such object in session, return NULL
        if(null == $user){
            return null;
        }
        // IF no value found in $user with key 'username' then return NULL
        if (!isset($user['username'])){
            return null;
        }
        // if we get here, we can return the value whose key is 'username'
        return $user['username'];
    }

    public function processLoginAction(Request $request, SilexApp $app)
    {
        session_start();
        echo 'Welcome ' . $_SESSION['username'];
        $request = $app['request_stack']->getCurrentRequest();
        $username = $request->get('username');
        $password = $request->get('password');
        //if(isset ($_GET['bttLogin'])) {
        // mySQL connection & query
        $con = mysqli_connect('localhost', 'root', '', 'admin_users');
        $result = mysqli_query($con, 'select * from admin where username="' . $username . '" and password="' . $password . '"');

        // if results match a table row
        if (mysqli_num_rows($result) == 1) {
            $app['session']->set('user', array('username' => $username));
            $argsArray = ['recipes' => $recipes];     // add to args array
            $templateName = 'list';// render (draw) template
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        } else {
            echo "Account Information is invalid!";
            return $app->redirect('/error');
        }
    }

}*/