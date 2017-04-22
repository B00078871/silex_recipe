<?php
namespace Itb\Controller;

use Silex\Application as SilexApp;
use Symfony\Component\HttpFoundation\Request;
use Itb\WebApplication;
use Itb\Model\RecipesRepository;
use Itb\Model\Recipes;

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

    /**
     * search recipe tags in database
     * @param Request $request
     * @param SilexApp $app
     * @return null|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function searchTags(Request $request, SilexApp $app){
        $request = $app['request_stack']->getCurrentRequest();
        $tags = $request->get('tags');
        $con = mysqli_connect('localhost', 'root', '', 'recipe_test');
        $result = mysqli_query($con, 'select * from recipes where tags="' . $tags . '"');
        if (mysqli_num_rows($result) == 1) {
            //$app['session']->set('tags', array('tags' => $tags));
            $recipesRepository = new RecipesRepository();
            return $recipesRepository->getRecipeTags($tags);
        } else {
            echo "Account Information is invalid!";
            return $app->redirect('/error');
        }
    }

    /**
     * add recipe to database using user input
     * @param Request $request
     * @param SilexApp $app
     * @param Recipes $Recipes
     * @return null
     */
    public function addRecipe(Request $request, SilexApp $app, Recipes $Recipes)
    {
        $request = $app['request_stack']->getCurrentRequest();
        $add = $request->get('add');
        $con = mysqli_connect('localhost', 'root', '', 'recipe_test');
        $result = mysqli_query($con, 'insert into recipes (`id`, `title`, `image`, `tags`, `ingredients`, `instructions`) values ="' . $add . '"');
        if(isset($_GET['bttAdd'])){
            $recipesRepository = new RecipesRepository();
            $recipes = $recipesRepository->addRecipes($Recipes);
            array_push($this->$recipes, $add);
        }
        return null;
    }

    /**
     * delete recipe from database using entered recipe ID
     * @param Request $request
     * @param SilexApp $app
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteRecipe(Request $request, SilexApp $app, $id){
        $request = $app['request_stack']->getCurrentRequest();
        $delete = $request->get('delete');
        $con = mysqli_connect('localhost', 'root', '', 'recipe_test');
        $result = mysqli_query($con, 'DELETE FROM recipes WHERE id="' . $delete . '"');
        if(isset($_GET['bttDelete'])) {
            if ($result == $id) {
                $recipesRepository = new RecipesRepository();
                $recipes = $recipesRepository->removeRecipe($id);
                unset($this->$recipes[$id]);
            } else {
                echo "Account Information is invalid!";
                return $app->redirect('/error');
            }
        }
    }
}