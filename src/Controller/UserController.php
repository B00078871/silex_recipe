<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 15/04/2017
 * Time: 13:01
 */

namespace Itb\Controller;

use Silex\Application as SilexApp;
use Symfony\Component\HttpFoundation\Request;

use Itb\Model\RecipesRepository;
use Itb\WebApplication;

class UserController
{
    private $app;

    public function __construct(WebApplication $app)
    {
        $this->app = $app;
    }
    // route for /login
    public function loginAction(Request $request, SilexApp $app)
    {
        // add to args array
        $argsArray = [];
        // render (draw) template
        $templateName = 'login';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    public function logoutAction(Request $request, SilexApp $app)
    {
        // logout any existing user
        $app['session']->remove('user');
        // redirect to home page
        return $app->redirect('/');
    }
    public function processLoginAction(Request $request, SilexApp $app)
    {
        /*$request = $app['request_stack']->getCurrentRequest();
        $username = $request->get('username');
        $password = $request->get('password');

        if ('users' === $username && 'users' === $password) {
            // store username in 'user' in 'session'
            $app['session']->set('users', array('username' => $username));

            // success - redirect to the secure admin home page
            return $app->redirect('/admin');
        }
        $templateName = 'login';
        $argsArray = array(
            'errorMessage' => 'bad username or password - please re-enter',
        );

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
*/
        session_start();
        echo 'Welcome ' . $_SESSION['username'];
        $request = $app['request_stack']->getCurrentRequest();
        $username = $request->get('username');
        $password = $request->get('password');

        $con = mysqli_connect('localhost', 'root', '', 'recipe_test');
        $result = mysqli_query($con, 'select * from users where username="' . $username . '" and password="' . $password . '"');

        if (mysqli_num_rows($result) == 1) {
            $app['session']->set('user', array('username' => $username));
            //$_SESSION['username'] = $username;
            $recipesRepository = new RecipesRepository();
            $recipes = $recipesRepository->getAllRecipes();
            $argsArray = ['recipes' => $recipes];     // add to args array
            $templateName = 'list';// render (draw) template
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        } else {
            echo 'Welcome';
            echo "Account Information is invalid!";
        }
    }
}