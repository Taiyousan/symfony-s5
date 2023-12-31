<?php

namespace App\Form;

use App\Entity\Movie;
use App\Entity\Actor;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('director')
            ->add('country')
            ->add('title')
            ->add('description')
            ->add('releaseDate')
            ->add('duration')
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name', // Utilisez le champ 'name' de l'entité Category comme label
            ])
            ->add('actors', EntityType::class, [
                'class' => Actor::class,
                'choice_label' => 'firstName',
                'multiple' => true, // Permet de sélectionner plusieurs acteurs
                'expanded' => true, // Affiche les acteurs sous forme de checkbox
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
