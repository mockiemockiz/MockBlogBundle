<?php

namespace MockBlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use MockBlogBundle\Entity\MockblogCategory;
use MockBlogBundle\Form\MockblogCategoryType;

/**
 * MockblogCategory controller.
 *
 */
class MockblogCategoryController extends Controller
{

    /**
     * Lists all MockblogCategory entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MockBlogBundle:MockblogCategory')->findAll();

        return $this->render('MockBlogBundle:MockblogCategory:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new MockblogCategory entity.
     *
     */
    public function createAction(Request $request)
    {
        $service = $this->get('category_factory');
        $entity = $service->setEntity()->getEntity();
        $form = $this->createCreateForm($entity);
        $id = $service->create($form, $request);

        if ($id) {
            return $this->redirect($this->generateUrl('mockblogcategory_show', array('id' => $id)));
        }

        return $this->render('MockBlogBundle:MockblogCategory:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a MockblogCategory entity.
     *
     * @param MockblogCategory $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(MockblogCategory $entity)
    {
        $form = $this->createForm(new MockblogCategoryType(), $entity, array(
            'action' => $this->generateUrl('mockblogcategory_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new MockblogCategory entity.
     *
     */
    public function newAction()
    {
        $service = $this->get('category_factory');
        $entity = $service->setEntity()->getEntity();
        $form = $this->createCreateForm($entity);

        return $this->render('MockBlogBundle:MockblogCategory:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MockblogCategory entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MockBlogBundle:MockblogCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MockblogCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MockBlogBundle:MockblogCategory:show.html.twig', array(
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
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MockBlogBundle:MockblogCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MockblogCategory entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MockBlogBundle:MockblogCategory:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a MockblogCategory entity.
    *
    * @param MockblogCategory $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(MockblogCategory $entity)
    {
        $form = $this->createForm(new MockblogCategoryType(), $entity, array(
            'action' => $this->generateUrl('mockblogcategory_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing MockblogCategory entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MockBlogBundle:MockblogCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MockblogCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mockblogcategory_edit', array('id' => $id)));
        }

        return $this->render('MockBlogBundle:MockblogCategory:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a MockblogCategory entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MockBlogBundle:MockblogCategory')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MockblogCategory entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mockblogcategory'));
    }

    /**
     * Creates a form to delete a MockblogCategory entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mockblogcategory_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
