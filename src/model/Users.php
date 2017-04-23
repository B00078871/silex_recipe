<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 23/04/2017
 * Time: 14:36
 */

namespace Itb\model;


class Users
{
    private $id;
    private $username;
    private $password;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUsername($username)
    {
        $this->id = $username;
    }

    public function setPassword($password)
    {
        $this->id = $password;
    }
    /**
     * get the User ID
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * get the username
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * get the users password
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}