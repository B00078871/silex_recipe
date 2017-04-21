<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 20/04/2017
 * Time: 12:00
 */

namespace Itb\Controller;

use Itb\Model\RecipesRepository;
use Itb\WebApplication;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;


class AdminController
{
    /*
     * Class AdminController
     *
     * simple authentication using Silex session object
     * $app['session']->set('isAuthenticated', false);
     *
     * but the propert way to do it:
     * https://gist.github.com/brtriver/1740012
     *
     * @package Hdip\Controller
     */
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
        $username = $this->getAuthenticatedUserName();
        // check we are authenticated --------
        $isAuthenticated = (null != $username);
        if(!$isAuthenticated){
            // not authenticated, so redirect to LOGIN page
            return $app->redirect('/login');
        }
        $recipesRepository = new RecipesRepository();
        $recipes = $recipesRepository->getAllRecipes();
        // store username into args array
        $argsArray = ['recipes' => $recipes];
        // render (draw) template
        $templateName = 'admin/index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    // route for /adminCodes
    // will we allow access to the Admin home?
    public function codesAction(Request $request, Application $app)
    {
        $username = $this->getAuthenticatedUserName();
        // check we are authenticated
        $isAuthenticated = (null != $username);
        if(!$isAuthenticated){
            // not authenticated, so redirect to LOGIN page
            return $app->redirect('/login');
        }
        // store username into args array
        $argsArray = [ ];
        // render (draw) template
        $templateName = 'admin/codes';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function getAuthenticatedUserName()
    {
        // IF object (array) 'user' found with non-null value in 'session'
        $user = $this->app['session']->get('user');

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
}