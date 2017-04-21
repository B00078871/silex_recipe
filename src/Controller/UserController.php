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
    /**
     * route for /login
     **/
    public function loginAction(Request $request, SilexApp $app)
    {
        // add to args array
        $argsArray = [];
        // render (draw) template
        $templateName = 'login';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * logout action route
     * @param Request $request
     * @param SilexApp $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function logoutAction(Request $request, SilexApp $app)
    {
        // logout any existing user
        $app['session']->remove('user');
        // redirect to home page
        return $app->redirect('/');
    }

    /**
     * process
     * @param Request $request
     * @param SilexApp $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function processLoginAction(Request $request, SilexApp $app)
    {
        session_start();
        $request = $app['request_stack']->getCurrentRequest();
        $username = $request->get('username');
        $password = $request->get('password');
        // mySQL connection & query
        $con = mysqli_connect('localhost', 'root', '', 'recipe_test');
        $result = mysqli_query($con, 'select * from users where username="' . $username . '" and password="' . $password . '"');
        // if results match a table row
        if (mysqli_num_rows($result) == 1) {
            $app['session']->set('user', array('username' => $username));
            $recipesRepository = new RecipesRepository();
            $recipes = $recipesRepository->getAllRecipes();
            $argsArray = ['recipes' => $recipes];// add to args array
            $templateName = 'list';// render (draw) template
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        } else {
            echo "Account Information is invalid!";
            return $app->redirect('/error');
        }
    }
}