<?php

namespace ChouettesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageType extends AbstractType
{
/**
 * {@inheritdoc}
 */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('file', FileType::class, array('label' => 'Image', 'required' => false, 'attr' => array('accept' => 'image/*')))
        ->add('alt');
    }
    
/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ChouettesBundle\Entity\Image'
        ));
    }

/**
 * {@inheritdoc}
 */
    public function getBlockPrefix()
    {
        return 'chouettesbundle_image';
    }
}
