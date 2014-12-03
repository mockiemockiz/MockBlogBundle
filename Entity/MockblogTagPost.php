<?php

namespace MockBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MockblogTagPost
 */
class MockblogTagPost
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \MockBlogBundle\Entity\MockblogPost
     */
    private $post;

    /**
     * @var \MockBlogBundle\Entity\MockblogTag
     */
    private $tag;


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
     * Set post
     *
     * @param \MockBlogBundle\Entity\MockblogPost $post
     * @return MockblogTagPost
     */
    public function setPost(\MockBlogBundle\Entity\MockblogPost $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \MockBlogBundle\Entity\MockblogPost 
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set tag
     *
     * @param \MockBlogBundle\Entity\MockblogTag $tag
     * @return MockblogTagPost
     */
    public function setTag(\MockBlogBundle\Entity\MockblogTag $tag = null)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return \MockBlogBundle\Entity\MockblogTag 
     */
    public function getTag()
    {
        return $this->tag;
    }
}
