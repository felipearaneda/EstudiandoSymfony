<?php

namespace App\Form;

use App\Entity\Clientes;
use App\Entity\Categoria;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ClientesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('nombre_archivo', FileType::class, [
            'label' => '(Archivo PDF)',

            // unmapped means that this field is not associated to any entity property
            'mapped' => false,

            // make it optional so you don't have to re-upload the PDF file
            // everytime you edit the Product details
            'required' => false,

            // unmapped fields can't define their validation using annotations
            // in the associated entity, so you can use the PHP constraint classes
            'constraints' => [
                new File([
                    'maxSize' => '1024k',
                    'mimeTypes' => [
                        'application/pdf',
                        'application/x-pdf',
                    ],
                    'mimeTypesMessage' => 'Por favor suba un archivo PDF válido',
                ])
            ],
        ])

            ->add('categoria', EntityType::class, array(
                //busca por opciones desde esta entidad
                'class' => Categoria::class,

                //Usa la propiedad clientes.nombre como la opción de string visible
                'choice_label' => 'nombre',
                
                //para renderizar un select box, checkbox o radio
                'multiple' => false,

                //para mandar propiedades a HTML
                'attr' => array('class' => 'form-control')
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