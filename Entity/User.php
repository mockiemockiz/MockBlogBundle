<?php
/**
 * Created by PhpStorm.
 * User: mockie
 * Date: 11/24/14
 * Time: 5:40 PM
 */

namespace MockBlogBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

class User{

    private $id;

    private $username;

    public function getId(){
        return 1;
    }

    public function getUsername()
    {
        return 'asdsad';
    }
    public function setId(){}

} 