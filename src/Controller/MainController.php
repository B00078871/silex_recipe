<?php
namespace Itb\Controller;

use Silex\Application as SilexApp;
use Symfony\Component\HttpFoundation\Request;
use Itb\WebApplication;
use Itb\Model\RecipesRepository;

class MainController
{
    private $app;

    public function __construct(WebApplication $app)
    {
        $this->app = $app;
    }

    // action for route:    /
    public function indexAction(Request $request, SilexApp $app)
    {
        // add to args array
        $argsArray = [];
        // render (draw) template
        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    // route for /list
    public function listAction(Request $request, SilexApp $app)
    {
        // Reference the  repository & get array of all Recipess
        $recipesRepository = new RecipesRepository();
        $recipes = $recipesRepository->getAllRecipes();
        // add to args array
        $argsArray = [
            'recipes' => $recipes
        ];
        // render (draw) template
        $templateName = 'list';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    // route for /display
    public function displayAction(Request $request, SilexApp $app, $id)
    {
        // get reference to our repository
        $recipesRepository = new RecipesRepository();
        $recipes = $recipesRepository->getOneRecipes($id);

        if(null == $recipes){
            $errorMessage = 'Sorry, No recipe found with id = ' . $id;
            $app->abort(404, $errorMessage);
        }

        $argsArray = [
            'recipes' => $recipes
        ];
        $templateName = 'display';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function showNoIdAction(Request $request, SilexApp $app)
    {
        $errorMessage = 'you must provide an isbn for the show page (e.g. /show/123)';
        // 400 - bad request
        $app->abort(400, $errorMessage);
    }
}