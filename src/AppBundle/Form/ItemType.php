<?php

namespace AppBundle\Form;

use AppBundle\Entity\Item;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ItemType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('save', 'submit');

        $builder
            ->add('itemOption', null, array(
                'property'    => 'name',
                'empty_value' => 'create new itemOption',
            ))
            ->add('itemOptionNew', new ItemOptionType(), array(
                'required' => false,
                'mapped'   => false,
            ))
        ;

        $builder->add('save', 'submit');

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function(FormEvent $event) {
            $data = $event->getData();
            $form = $event->getForm();

            if (empty($data['itemOption']) && !empty($data['itemOptionNew']['name'])) {
                $form->remove('itemOptionNew');

                $form->add('itemOptionNew', new ItemOptionType(), array(
                    'property_path' => 'itemOption',
                ));
            }
        });
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Item'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_item';
    }
}
