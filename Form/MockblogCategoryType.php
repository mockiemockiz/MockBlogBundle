<?php

namespace MockBlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Routing\Router;

class MockblogCategoryType extends AbstractType
{

    /**
     * @var FormFactory
     */
    private $formFactory;

    /**
     * @var Router
     */
    private $route;

    /**
     * @var array
     */
    private $params;

    public function __construct($params)
    {
        $this->formFactory = $params['form_factory'];
        $this->route = $params['router'];
        $this->params = $params['params'];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mockblogcategory';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
//            ->add('parentId')
            ->add('slug')
            ->add('picture')
            ->add('parent', 'entity', ['class' => $this->params['entity_alias'], 'property' => 'name'])
            ->add('submit', 'submit', array('label' => 'Create'))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MockBlogBundle\Entity\MockblogCategory'
        ));
    }

    public function createForm($entity)
    {
        return $this->formFactory->create(
            $this->getName(), $entity, array(
                'action' => $this->route->generate('mockblogcategory_create'),
                'method' => 'POST',
            )
        );
    }

    public function editForm($entity)
    {
        $form = $this->formFactory->create( $this, $entity, array(
            'action' => $this->route->generate('mockblogcategory_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    public function deleteForm($id)
    {
        return $this->formFactory->createBuilder()
            ->setAction($this->route->generate('mockblogcategory_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }


}
