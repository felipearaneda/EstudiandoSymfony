<?php

namespace App\Form;

use App\Entity\Clientes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('category', EntityType::class, array(
                //buscar entre opciones de la entidad
                'class' => Category::class,

                //Usa la propiedad clientes.nombre como la opción string visible
                'choice_label' => 'Nombre',
            ))

            ->add('nombre', TextType::class, [
                'label' => 'Nombre: ',
                'help' => 'Coloque un nombre válido!',
            ])
            ->add('apellido_paterno', TextType::class, [
                'label' => 'ApellidoPaterno:',
                'help' => 'Ingrese valor válido!',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Apellido Paterno'
                ],
            ])
            ->add('apellido_materno', TextType::class, [
                'label' => 'ApellidoMaterno:',
                'help' => 'Ingrese valor válido!',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Apellido Materno'
                ],
            ])
            ->add('fechaNac', DateType::class, [
                'label' => 'Fecha de nacimiento:',
                'help' => 'Ingrese fecha válida!',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'js-datepicker'
                ],
            ])
            ->add('ingresos', NumberType::class, [
                'label' => 'Ingresos de la persona',
                'help' => 'Colocar ingresos',
                'attr' => [
                    'class' => 'form-control'
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Clientes::class,
        ]);
    }
}


/* namespace App\Form;

use App\Entity\Clientes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Clientes2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('apellido_paterno')
            ->add('apellido_materno')
            ->add('fechaNac')
            ->add('ingresos')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Clientes::class,
        ]);
    }
}
 */