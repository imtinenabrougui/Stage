<?php

namespace App\Form;

use App\Entity\Demande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cin')
            ->add('dateDelivrance')
            ->add('nom')
            ->add('prenom')
            ->add('dateNaissance')
            ->add('profession')
            ->add('etatCivil')
            ->add('adresse')
            ->add('identiteEmployeur')
            ->add('adresseEmployeur')
            ->add('numeroCompte')
            ->add('salaire')
            ->add('montantCredit')
            ->add('objetCredit')
            ->add('besoinsCourants')
            ->add('acquisitionVehicule')
            ->add('amenagement')
            ->add('attestationSalaire', FileType::class, [
                'attr' => ['style' => 'color:rgb(64,0,64);border:1px solid black;width:500px;margin-left:217px;margin-top:-15px'],
                'label' => 'attestationSalaire',
                'label_attr' => ['style' => 'font-weight:bold'],
                'mapped' => false,
                'required' => true,
                'constraints' => [
                    new File([
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/jpg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Insérer un attestationSalaire valide',
                    ]),
                ],
            ])
            ->add('copieCin', FileType::class, [
                'attr' => ['style' => 'color:rgb(64,0,64);border:1px solid black;width:500px;margin-left:217px;margin-top:-15px'],
                'label' => 'copieCin',
                'label_attr' => ['style' => 'font-weight:bold'],
                'mapped' => false,
                'required' => true,
                'constraints' => [
                    new File([
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/jpg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Insérer un copieCin valide',
                    ]),
                ],
            ])
            ->add('fichePaie', FileType::class, [
                'attr' => ['style' => 'color:rgb(64,0,64);border:1px solid black;width:500px;margin-left:217px;margin-top:-15px'],
                'label' => 'fichePaie',
                'label_attr' => ['style' => 'font-weight:bold'],
                'mapped' => false,
                'required' => true,
                'constraints' => [
                    new File([
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/jpg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Insérer un fichePaie valide',
                    ]),
                ],
            ])
           
            ->add('devis', FileType::class, [
                'attr' => ['style' => 'color:rgb(64,0,64);border:1px solid black;width:500px;margin-left:217px;margin-top:-15px'],
                'label' => 'devis',
                'label_attr' => ['style' => 'font-weight:bold'],
                'mapped' => false,
                'required' => true,
                'constraints' => [
                    new File([
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/jpg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Insérer un devis valide',
                    ]),
                ],
            ])
           
            
          
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Demande::class,
        ]);
    }
}
