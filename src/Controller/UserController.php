<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 15/04/2017
 * Time: 13:01
 */

namespace Itb\Controller;

use Itb\Model\Recipes;
use Itb\Model\RecipesRepository;
use Itb\WebApplication;

class UserController
{
    private $app;

    public function __construct(WebApplication $app)
    {
        $this->app = $app;
    }

    // action for route:    /
    public function loginAction()
    {
        // add to args array
        // ------------
        $argsArray = [];

        // render (draw) template
        // ------------
        $templateName = 'login';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    public function processLoginAction()
    {
        session_start();
        echo 'Welcome '.$_SESSION['username'];

        if(isset ($_GET['bttLogin'])) {

            $username = $_GET['username'];
            $password = $_GET['password'];
            $con = mysqli_connect('localhost', 'root', '', 'recipe_test');
            $result = mysqli_query($con, 'select * from users where username="'.$username.'" and password="'.$password.'"');
            if(mysqli_num_rows($result) == 1){
                $_SESSION['username'] = $username;
                $recipesRepository = new RecipesRepository();
                $recipes = $recipesRepository->getAllRecipes();

                // add to args array
                // ------------
                $argsArray = [
                    'recipes' => $recipes
                ];
                // render (draw) template
                $templateName = 'list';
                return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
            } else {
                echo "Account Information is invalid!";
            }
        }
        // add to args array
        // ------------

    }
    public function logoutAction()
    {
        // add to args array
        // ------------
        $argsArray = [];

        // render (draw) template
        // ------------
        $templateName = 'login';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}