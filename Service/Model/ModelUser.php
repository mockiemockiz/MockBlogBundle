<?php
/**
 * Created by PhpStorm.
 * User: mockie
 * Date: 12/1/14
 * Time: 11:45 AM
 */

namespace MockBlogBundle\Service\Model;

use Doctrine\ORM\EntityRepository;

class ModelUser extends AbstractModel {

    public function __construct($em, $request, $params)
    {
        $this->params = $params['params'];
        $this->em = $em['entity_manager'];
        $this->request = $request['request']->getCurrentRequest();
    }

    /**
     * Set Entity
     *
     * @param string $id
     * @return $this
     */
    public function setEntity($id='')
    {
       $this->entity = $this->find($id);

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

} 