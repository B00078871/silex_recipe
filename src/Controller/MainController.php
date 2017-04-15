<?php
namespace Itb\Controller;

use Itb\Model\Recipes;
use Itb\Model\RecipesRepository;
use Itb\WebApplication;

class MainController
{
    private $app;

    public function __construct(WebApplication $app)
    {
        $this->app = $app;
    }

    // action for route:    /
    public function indexAction()
    {
        // add to args array
        // ------------
        $argsArray = [];

        // render (draw) template
        // ------------
        $templateName = 'index';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    // action for route:    /list
    public function listAction()
    {

        // get reference to our repository
        // and get array of all DVDs
        $recipesRepository = new RecipesRepository();
        $recipes = $recipesRepository->getAllRecipes();

        // add to args array
        // ------------
        $argsArray = [
            'recipes' => $recipes
        ];

        // render (draw) template
        // ------------
        $templateName = 'list';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    // action for route:    /display
    public function displayAction($id)
    {
        // get reference to our repository
        $recipesRepository = new RecipesRepository();
        $recipes = $recipesRepository->getOneRecipes($id);

        if(null == $recipes){
            $errorMessage = 'Sorry, No recipe found with id = ' . $id;
            $this->app->abort(404, $errorMessage);
        }

        $argsArray = [
            'recipes' => $recipes
        ];
        $templateName = 'display';
        return $this->app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function showNoIdAction()
    {
        $errorMessage = 'you must provide an isbn for the show page (e.g. /show/123)';
        // 400 - bad request
        $this->app->abort(400, $errorMessage);
    }
}