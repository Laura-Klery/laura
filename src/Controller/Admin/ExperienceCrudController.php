<?php

namespace App\Controller\Admin;

use App\Entity\Experience;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ExperienceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Experience::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', 'Index')->onlyOnIndex(),
            TextField::new('title', 'Titre'),
            TextEditorField::new('content', 'Contenu'),
            DateField::new('datedebut', 'Date de début'),
            DateField::new('datefin', 'Date de fin')
        ];
    }

}
