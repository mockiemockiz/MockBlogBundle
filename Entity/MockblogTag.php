<?php

namespace MockBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MockBlogBundle\Entity\User;

/**
 * MockblogTag
 */
class MockblogTag
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var integer
     */
    private $totalPost;

    /**
     * @var User
     */
    private $user;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return MockblogTag
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return MockblogTag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return MockblogTag
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set totalPost
     *
     * @param integer $totalPost
     * @return MockblogTag
     */
    public function setTotalPost($totalPost)
    {
        $this->totalPost = $totalPost;

        return $this;
    }

    /**
     * Get totalPost
     *
     * @return integer 
     */
    public function getTotalPost()
    {
        return $this->totalPost;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return MockblogTag
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
