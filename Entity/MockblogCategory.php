<?php

namespace MockBlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * MockblogCategory
 */
class MockblogCategory
{
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
    private $description;

    /**
     * @var integer
     */
    private $parentId;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $picture;

    /**
     * @var integer
     */
    private $totalPost;

    /**
     * @var \MockBlogBundle\Entity\MockblogCategory
     */
    private $id;

    private $children;

    private $parent;

    public function __construct() {
        $this->children = new ArrayCollection();
    }


    /**
     * Set created
     *
     * @param \DateTime $created
     * @return MockblogCategory
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
     * @return MockblogCategory
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
     * Set description
     *
     * @param string $description
     * @return MockblogCategory
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function setParent(MockblogCategory $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set parent
     *
     * @param $parentId
     * @return MockblogCategory
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parent
     *
     * @return integer
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return MockblogCategory
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
     * Set picture
     *
     * @param string $picture
     * @return MockblogCategory
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set totalPost
     *
     * @param integer $totalPost
     * @return MockblogCategory
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
     * Set id
     *
     * @param \MockBlogBundle\Entity\MockblogCategory $id
     * @return MockblogCategory
     */
    public function setId(MockblogCategory $id = null)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \MockBlogBundle\Entity\MockblogCategory 
     */
    public function getId()
    {
        return $this->id;
    }
}
