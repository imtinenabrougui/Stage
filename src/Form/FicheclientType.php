<?php

namespace App\Form;

use App\Entity\Ficheclient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FicheclientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('dateOuverturecompte')
            ->add('agence')
            ->add('titreCivilite')
            ->add('nomPere')
            ->add('prenomPere')
            ->add('typeClient')
            ->add('typeDocument')
            ->add('numeroDocument')
            ->add('dateDelivrance')
            ->add('lieuDelevrance')
            ->add('nationalite')
            ->add('dateNaissance')
            ->add('paysNaissance')
            ->add('lieuNaissance')
            ->add('autreNationalite')
            ->add('etatCivil')
            ->add('nbrEnfant')
            ->add('numeroTelephone')
            ->add('adresse')
            ->add('codePostal')
            ->add('gouvernerat')
            ->add('pays')
            ->add('statusProfessionnel')
            ->add('positionProfessionnel')
            ->add('fonctionExercee')
            ->add('activiteProfessionnel')
            ->add('profession')
            ->add('adresseProfessionnelle')
            ->add('fonctionPublique')
            ->add('natureEmployeur')
            ->add('typeCompte')
            ->add('sourcesFonds')
            ->add('sourcePatirimoine')
            ->add('revenusAnnuels')
            ->add('chargeAnnuelles')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ficheclient::class,
        ]);
    }
}
