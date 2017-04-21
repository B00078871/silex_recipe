<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 21/04/2017
 * Time: 11:45
 */

namespace ItbTest;

use Itb\Model\Recipes;

class RecipeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test to create a recipe object
     */
    public function testCanCreateObject()
    {
        // Arrange
        $recipe = new Recipes(123);

        // Act

        // Assert
        $this->assertNotNull($recipe);
    }

    /**
     * Test to retrieve the Recipe ID
     */
    public function testGetIdAfterSetId()
    {
        // Arrange
        $recipe = new Recipes();
        $recipe->setId(123);
        $expectedResult = 123;

        // Act
        $result = $recipe->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
