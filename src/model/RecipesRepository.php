<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 24/03/2017
 * Time: 15:39
 */

namespace Itb\Model;

class RecipesRepository
{
    private $recipes;

    public function __construct()
    {
        $r1 = new Recipes(1);
        $r1->setId(1);
        $r1->setTitle('Chocolate Chip Gooey Brownies');
        $r1->setImage('brownies.jpg');
        $r1->setTags('party, easy, quick, chocolate, brownies, kids');
        $r1->setIngredients('chocolate, butter, sugar, 4 eggs');
        $r1->setInstructions('Mix together');
        $this->addRecipes($r1);

        $r2 = new Recipes(2);
        $r2->setId(2);
        $r2->setTitle('banoffee  Pie');
        $r2->setImage('banoffee.jpg');
        $r2->setTags('dessert, banana, cream, light, banoffi, pie, caramel');
        $r2->setIngredients('Fresh cream, banana, digestive bicuits, tinned caramel.');
        $r2->setInstructions('chocolate');
        $this->addRecipes($r2);

        $r3 = new Recipes(3);
        $r3->setId(3);
        $r3->setTitle('Baileys Cheesecake');
        $r3->setImage('cheesecake.jpg');
        $r3->setTags('alcoholic, light, pie, cheesecake, adult');
        $r3->setIngredients('biscuit, Baileys, cheesecake');
        $r3->setInstructions('1. Layer together, 2. Mix');
        $this->addRecipes($r3);

        $r4 = new Recipes(4);
        $r4->setId(4);
        $r4->setTitle('FlapJacks');
        $r4->setImage('flapjacks.jpg');
        $r4->setTags('healthy, light, oats, tasty, adult');
        $r4->setIngredients('porridge oats, syrup, sugar, butter, 2 eggs');
        $r4->setInstructions('1. Layer together, 2. Mix');
        $this->addRecipes($r4);

        $r5 = new Recipes(5);
        $r5->setId(5);
        $r5->setTitle('Black Forest Gateau');
        $r5->setImage('gateau.png');
        $r5->setTags('chocolate, rich, cherry, cake, party');
        $r5->setIngredients('chocolate, butter, brown sugar, self-raising flour, 3 eggs');
        $r5->setInstructions('1. Layer together, 2. Mix');
        $this->addRecipes($r5);
    }
    /**
     * add the given Recipes to the repository
     *
     * NOTE: this is a PRIVATE method - just for use by the constructor
     * @param Recipes $Recipes
     */
    public function addRecipes(Recipes $Recipes)
    {
        // get ID from Recipes object
        $id = $Recipes->getId();

        // add Recipes object to array, with index of the ID
        $this->recipes[$id] = $Recipes;
    }

    /**
     * return an array containing all recipes
     * @return array
     */
    public function getAllRecipes()
    {
        return $this->recipes;
    }

    /**
     * attempt to retrieve and return Recipes for given id = $id
     * @param int $id
     * @return Recipes (if found)
     * @return null (if not found)
     */
    public function getOneRecipes($id)
    {
        if(array_key_exists($id, $this->recipes)){
            return $this->recipes[$id];
        } else {
            return null;
        }
    }

    /**
     * retrieve recipe tags
     * @param $tags
     * @return null
     */
    public function getRecipeTags($tags)
    {
        if(array_key_exists($tags, $this->recipes)){
            return $this->recipes[$tags];
        } else {
            return null;
        }
    }

    /**
     * Remove recipes with ID given
     * @param $id
     * @return null
     */
    public function removeRecipe($id)
    {
        if(array_key_exists($id, $this->recipes)){
            unset($this->recipes[$id]);
        } else {
            return 'Sorry, no such recipe found in database!';
        } return null;
    }
}