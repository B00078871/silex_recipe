<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 03/12/15
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
        $r1->setTags('dessert, chocolate, brownies, kids');
        $r1->setIngredients('chocolate, butter, sugar');
        $r1->setInstructions('Mix together');
        $this->addRecipes($r1);

        $r2 = new Recipes(2);
        $r2->setId(2);
        $r2->setTitle('Banoffi Pie');
        $r2->setImage('banoffi.jpg');
        $r2->setTags('dessert, banana, cream, light');
        $r2->setIngredients('chocolate');
        $r2->setInstructions('chocolate');
        $this->addRecipes($r2);

        $r3 = new Recipes(3);
        $r3->setId(3);
        $r3->setTitle('Baileys Cheesecake');
        $r3->setImage('cheesecake.jpg');
        $r3->setTags('chocolate');
        $r3->setIngredients('biscuit, Baileys, cheesecake, alcohol, light');
        $r3->setInstructions('1. Layer together\n, 2. Mix');
        $this->addRecipes($r3);
        
    }
    /**
     * add the given Recipes to the repository
     *
     * NOTE: this is a PRIVATE method - just for use by the constructor
     * @param Recipes $Recipes
     */
    private function addRecipes(Recipes $Recipes)
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
}