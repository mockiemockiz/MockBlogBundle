<?php

namespace MockBlogBundle\Form;

use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MockblogTagType extends AbstractType
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
        return 'mockblogbundle_mockblogtag';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('created')
            ->add('name', null, ['required' => false])
            ->add('slug', null, ['required' => false])
//            ->add('totalPost')
//            ->add('user')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MockBlogBundle\Entity\MockblogTag'
        ));
    }


    public function createForm($entity)
    {
        $form = $this->formFactory->create(
            $this->getName(), $entity, array(
                'action' => $this->route->generate('tag_create'),
                'method' => 'POST',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    public function editForm($entity)
    {
        $form = $this->formFactory->create( $this, $entity, array(
            'action' => $this->route->generate('tag_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    public function deleteForm($id)
    {
        return $this->formFactory->createBuilder()
            ->setAction($this->route->generate('tag_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
