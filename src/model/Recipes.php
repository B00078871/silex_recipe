<?php

namespace Itb\Model;

/**
 * Class Book to represent book objects
 * @package Itb\Model;
 */
class Recipes
{
    /**
     * id of recipes (unique primary KEY)
     *
     * example:
     * <code>
     * 123
     * </code>
     * @var integer
     */
    private $id;

    /**
     * title of recipe
     *
     * example:
     * <code>
     * Chocolate Brownies
     * </code>
     *
     * @var string
     */
    private $title;

    /**
     * path to image
     *
     * example:
     * <code>
     * brownies.jpg
     * </code>
     * @var string
     */
    private $image;

    /**
     * recipe tags
     *
     * example:
     * <code>
     * dessert
     * </code>
     * @var int
     */
    private $tags;
    /**
     * recipe ingredients
     *
     * example:
     * <code>
     * banana, cream, etc.
     * </code>
     * @var int
     */
    private $ingredients;
    /**
     * baking instructions
     *
     * example:
     * <code>
     * bake for 20mins
     * </code>
     * @var int
     */
    private $instructions;

    /**
     * set ID
     *
     * example usage:
     *
     * <code>
     * $recipe->setId(123);
     * </code>
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * get the ID
     *
     * example usage:
     *
     * <code>
     * $id = $recipe->getId();
     * </code>
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * get the title
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * get the image path
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * get the recipe tags
     * @return int
     */
    public function getTags()
    {
        return $this->tags;
    }
    /**
     * get the ingredients of recipe
     * @return int
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * recipe cooking instructions
     * @return int
     */
    public function getInstructions()
    {
        return $this->instructions;
    }
    /**
     * set the recipe title
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * set the image path
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * set recipe tags
     * @param $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * set recipe ingredients
     * @param $ingredients
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * set instructions
     * @param $instructions
     */
    public function setInstructions($instructions)
    {
        $this->instructions = $instructions;
    }
}