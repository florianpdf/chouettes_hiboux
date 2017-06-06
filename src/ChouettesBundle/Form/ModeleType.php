<?php

namespace ChouettesBundle\Form;

use ChouettesBundle\ChouettesBundle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\Tests\Model;


class ModeleType extends AbstractType
{
/**
 * @param FormBuilderInterface $builder
 * @param array $options
 */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('contenu', TextareaType::class, array('attr' => array('class' => 'tinymce')))
//            ->add('lien')
            ->add('add_block')
            ->add('categorie', EntityType::class, array(
                'class' => 'ChouettesBundle:Categorie',
                'choice_label' => 'nom',
                'placeholder' => 'Selectionnez une categorie',
                'required' => true
            ))
            ->add('image', ImageType::class)
        ;
    }
    
/**
 * @param OptionsResolver $resolver
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ChouettesBundle\Entity\Modele'
        ));
    }
}
