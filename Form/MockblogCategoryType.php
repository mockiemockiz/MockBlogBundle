<?php

namespace MockBlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MockblogCategoryType extends AbstractType
{
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
            ->add('parent', 'entity', ['class' => 'MockBlogBundle:MockblogCategory','property' => 'name'])
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

    /**
     * @return string
     */
    public function getName()
    {
        return 'mockblogbundle_mockblogcategory';
    }
}
