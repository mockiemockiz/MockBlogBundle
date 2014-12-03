<?php

namespace MockBlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use MockBlogBundle\Entity\MockblogTag;
use MockBlogBundle\Form\MockblogTagType;

/**
 * MockblogTag controller.
 *
 */
class MockblogTagController extends Controller
{
    const SERVICE_ENTITY_NAME = 'tag_factory';

    const SERVICE_FORM_NAME = 'form.type.tag';

    private  $entityService;

    private $params;

    public function getParams($name)
    {
        if (!$this->params) {
            $this->params = $this->container->getParameter('tag');
        }

        return $this->params[$name];
    }

    public function getEntityService()
    {
        if (!$this->entityService) {
            $this->entityService = $this->get(self::SERVICE_ENTITY_NAME);
        }

        return $this->entityService;
    }

    /**
     * Lists all MockblogCategory entities.
     *
     */
    public function indexAction()
    {
        $entities = $this->getEntityService()->getRepository()->findAll();

        return $this->render($this->getParams('entity_alias') . ':index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new MockblogCategory entity.
     *
     */
    public function createAction()
    {
        $entity = $this->getEntityService()->setEntity()->getEntity();
        $form = $this->get(self::SERVICE_FORM_NAME)->createForm($entity);

        $id = $this->getEntityService()->create($form);
        if ($id) {
            return $this->redirect($this->generateUrl('tag_show', array('id' => $id)));
        }

        return $this->render($this->getParams('entity_alias') . ':new.html.twig', array(
            'entity' => $this->getEntityService()->setEntity()->getEntity(),
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new MockblogCategory entity.
     *
     */
    public function newAction()
    {
        $entity = $this->getEntityService()->setEntity()->getEntity();
        $form = $this->get(self::SERVICE_FORM_NAME);

        return $this->render($this->getParams('entity_alias') . ':new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createForm($entity)->createView(),
        ));
    }

    /**
     * Finds and displays a MockblogCategory entity.
     *
     */
    public function showAction($id)
    {
        $entity = $this->getEntityService()->find($id);
        $deleteForm = $this->get(self::SERVICE_FORM_NAME)->deleteForm($id);

        return $this->render($this->getParams('entity_alias') . ':show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MockblogCategory entity.
     *
     */
    public function editAction($id)
    {
        $entity = $this->getEntityService()->setEntity()->find($id);
        $form = $this->get(self::SERVICE_FORM_NAME);
        $editForm = $form->editForm($entity);
        $deleteForm = $form->deleteForm($id);

        return $this->render($this->getParams('entity_alias') . ':edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing MockblogCategory entity.
     *
     */
    public function updateAction($id)
    {
        $entity = $this->getEntityService()->setEntity()->find($id);
        $form = $this->get(self::SERVICE_FORM_NAME);
        $deleteForm = $form->deleteForm($id);
        $editForm = $form->editForm($entity);

        if ($this->getEntityService()->save($editForm)) {
            return $this->redirect($this->generateUrl('tag_edit', array('id' => $id)));
        }

        return $this->render($this->getParams('entity_alias') . ':edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MockblogCategory entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->get(self::SERVICE_FORM_NAME)->deleteForm($id);
        $this->getEntityService()->delete($form);

        return $this->redirect($this->generateUrl('tag'));
    }

}
