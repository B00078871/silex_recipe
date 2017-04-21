<?php
namespace Itb\Controller;

use Silex\Application as SilexApp;
use Symfony\Component\HttpFoundation\Request;
use Itb\WebApplication;
use Itb\Model\RecipesRepository;

class MainController
{
    private $app;

    /**
     * MainController constructor.
     * @param WebApplication $app
     */
    public function __construct(WebApplication $app)
    {
        $this->app = $app;
    }

    /**
     * Index Action for route: /
     * @param Request $request
     * @param SilexApp $app
     * @return mixed twig template
     */
    public function indexAction(Request $request, SilexApp $app)
    {
        // add to args array
        $argsArray = [];
        // render (draw) template
        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * route for /list
     * @param Request $request
     * @param SilexApp $app
     * @return mixed twig template
     */
    public function listAction(Request $request, SilexApp $app)
    {
        // Reference the repository & get array of all Recipess
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

    /**
     * Route for /display
     * @param Request $request
     * @param SilexApp $app
     * @param $id
     * @return mixed twig template
     */
    public function displayAction(Request $request, SilexApp $app, $id)
    {
        // reference to repository
        $recipesRepository = new RecipesRepository();
        $recipes = $recipesRepository->getOneRecipes($id);
        // if no recipe result with given ID
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

    /**
     * Error message if no ID entered
     * @param Request $request
     * @param SilexApp $app
     */
    public function showNoIdAction(Request $request, SilexApp $app)
    {
        $errorMessage = 'you must provide an id for the display page (e.g. /display/123)';
        // 400 - bad request
        $app->abort(400, $errorMessage);
    }
}