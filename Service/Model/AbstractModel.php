<?php
/**
 * Created by PhpStorm.
 * User: mockie
 * Date: 12/1/14
 * Time: 10:53 AM
 */

namespace MockBlogBundle\Service\Model;


abstract class AbstractModel {

    protected $em;

    protected  $repository;

    protected  $entity;

    abstract public function __construct($em);

    abstract public function setEntity($id='');


    public function getRepository()
    {
        return $this->repository;
    }

    public function getEntity()
    {
        return $this->entity;
    }

    public function find($id)
    {
        return $this->getRepository()->find($id);
    }

    public function create($form, $request)
    {
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->em->persist($this->getEntity());
            $this->em->flush();

            return $this->getEntity()->getId();
        }

        return false;
    }

    public function save()
    {
        $this->em->flush();
    }

    public function delete($entity)
    {
        $this->em->remove($entity);
        $this->em->flush();
    }

} 