<?php
/**
 * Created by PhpStorm.
 * User: mockie
 * Date: 12/1/14
 * Time: 11:45 AM
 */

namespace MockBlogBundle\Service\Model;

use Doctrine\ORM\EntityRepository;
use MockBlogBundle\Entity\MockblogCategory;

class ModelCategory extends AbstractModel {

    public function __construct($em, $request, $params)
    {
        $this->params = $params['params'];
        $this->em = $em['entity_manager'];
        $this->request = $request['request']->getCurrentRequest();
    }

    /**
     * Set slug, if slug input blank use name input instead.
     */
    private function setSlug()
    {
        $postData = $this->getRequest($this->params['form_alias']);
        $slug = ($postData['slug']) ? $postData['slug'] : $postData['name'];
        $this->request->request->set($this->params['form_alias'], array_merge($postData,['slug' => $slug]));
    }

    /**
     * Set Entity
     *
     * @param string $id
     * @return $this
     */
    public function setEntity($id='')
    {
       $this->entity = (!$id) ? new MockblogCategory() : $this->find($id);

        return $this;
    }

    /**
     * @return EntityRepository
     */
    public function getRepository()
    {
        if (!$this->repository) {
            $this->repository = $this->em->getRepository($this->params['entity_alias']);
        }
        return parent::getRepository();
    }

    /**
     *
     * @param $form
     * @return bool
     */
    public function create($form)
    {
        $this->setSlug();
        $this->getEntity()->setCreated(date_create("now"));
        return parent::create($form);
    }

} 