<?php

namespace App\Form;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Editor;
use App\Enum\BookStatus;
use Composer\XdebugHandler\Status;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre'
            ])
            ->add('isbn', TextType::class, [
                'label' => 'Numérotation Internationale du Livre'
            ])
            ->add('cover', UrlType::class, [
                'label' => 'Photo de couverture'
            ])
            ->add('editedAt', DateType::class, [
                'widget' => 'single_text',
                'input' => 'datetime_immutable',
                'label' => 'Date d\'édition'
            ])
            ->add('plot', TextareaType::class, [
                'label' => 'Intrigue'
            ])
            ->add('pageNumber', IntegerType::class,  [
                'label' => 'Nombre de pages'
            ])
            ->add('status', EnumType::class, [
                'label' => 'Statut',
                'class' => BookStatus::class,
                'expanded' => true,
                'choice_label' => function (BookStatus $choice) {
                    return $choice->getLabel();
                }
            ])
            ->add('editor', EntityType::class, [
                'class' => Editor::class,
                'choice_label' => 'name',
                'label' => 'Editeur'
            ])
            ->add('authors', EntityType::class, [
                'label' => 'Auteur(s)',
                'class' => Author::class,
                'choice_label' => 'name',
                'multiple' => true,
                'by_reference' => false //force doctrine à mettre à jour la relation
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}