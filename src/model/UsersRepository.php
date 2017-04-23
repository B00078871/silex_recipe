<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 23/04/2017
 * Time: 14:41
 */

namespace Itb\model;


class UsersRepository
{
    private $users;

    public function __construct()
    {
        $u1 = new Users(1);
        $u1->setId(1);
        $u1->setUsername('kevinlardner');
        $u1->setPassword('123456');
        $this->addUsers($u1);

        $u2 = new Users(2);
        $u2->setId(2);
        $u2->setUsername('mattsmith');
        $u2->setPassword('654321');
        $this->addUsers($u2);

        $u3 = new Users(3);
        $u3->setId(3);
        $u3->setUsername('admin');
        $u3->setPassword('password');
        $this->addUsers($u3);
    }
    public function addUsers(Users $Users)
    {
        // get ID from Recipes object
        $id = $Users->getId();

        // add Recipes object to array, with index of the ID
        $this->users[$id] = $Users;
    }

    public function removeUsers($id)
    {
        if(array_key_exists($id, $this->users)){
            unset($this->users[$id]);
        } else {
            return 'Sorry, no such users found on database!';
        } return null;
    }

}