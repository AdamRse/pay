<?php

namespace App\Form;

use App\Entity\Address;
use App\Entity\Client;
use App\Entity\Order;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //->add('product')
            //->add('payment_method')
            // ->add('status')
            //->add('ts', null, [
            //     'widget' => 'single_text',
            // ])
            ->add('client', ClientType::class)
            ->add('biling', AddressType::class)
            ->add('shipping', AddressType::class)
            // ->add('client', EntityType::class, [
            //     'class' => Client::class,
            //     'choice_label' => 'id',
            // ])
            // ->add('biling', EntityType::class, [
            //     'class' => Address::class,
            //     'choice_label' => 'id',
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
            "allow_extra_fields" => true
        ]);
    }
}
