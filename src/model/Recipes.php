<?php

namespace Itb\Model;

/**
 * Class Book to represent book objects
 * @package Itb\Model;
 */
class Recipes
{
    /**
     * isbn of book (unique primary KEY)
     *
     * example:
     * <code>
     * 1234
     * </code>
     * @var integer
     */
    private $id;

    /**
     * title of book
     *
     * example:
     * <code>
     * The Return of Sherlock Holmes
     * </code>
     *
     * @var string
     */
    private $title;

    /**
     * path to cover image
     *
     * example:
     * <code>
     * holmes_return.jpg
     * </code>
     * @var string
     */
    private $image;

    /**
     * total number of pages (including Index)
     *
     * example:
     * <code>
     * 20
     * </code>
     * @var int
     */
    private $tags;
    /**
     * total number of pages (including Index)
     *
     * example:
     * <code>
     * 20
     * </code>
     * @var int
     */
    private $ingredients;
    /**
     * total number of pages (including Index)
     *
     * example:
     * <code>
     * 20
     * </code>
     * @var int
     */
    private $instructions;

    /**
     * set ISBN
     *
     * example usage:
     *
     * <code>
     * $book->setId(1234);
     * </code>
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * get the ISBN
     *
     * example usage:
     *
     * <code>
     * $isbn = $b->getId();
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
     * get the total number of pages
     * @return int
     */
    public function getTags()
    {
        return $this->tags;
    }
    /**
     * get the total number of pages
     * @return int
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }
    /**
     * get the total number of pages
     * @return int
     */
    public function getInstructions()
    {
        return $this->instructions;
    }
    /**
     * set the book title
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
     * @param int $numPages
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }
    /**
     * @param int $numPages
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }
    /**
     * @param int $numPages
     */
    public function setInstructions($instructions)
    {
        $this->instructions = $instructions;
    }
}