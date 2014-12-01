<?php
/**
 * Created by PhpStorm.
 * User: mockie
 * Date: 12/1/14
 * Time: 11:45 AM
 */

namespace MockBlogBundle\Service\Model;


use \DateTime;
use MockBlogBundle\Entity\MockblogCategory;

class ModelCategory extends AbstractModel {

    public function __construct($em)
    {
        $this->em = $em['entity_manager'];
    }

    public function setEntity($id='')
    {
       $this->entity = (!$id) ? new MockblogCategory() : $this->find($id);

        return $this;
    }

    public function getRepository()
    {
        if (!$this->repository) {
            $this->repository = $this->em->getRepository('MockBlogBundle:MockblogCategory');
        }
        return parent::getRepository();
    }

    public function create($form, $request)
    {
        $this->getEntity()->setCreated(date_create("now"));
        return parent::create($form, $request);
    }

} 