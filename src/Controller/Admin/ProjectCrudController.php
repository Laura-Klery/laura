<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', 'Index')->onlyOnIndex(),
            TextField::new('name', 'Nom'),
            TextEditorField::new('content', 'Contenu'),
            TextEditorField::new('resume', 'Petite Description'),
            ImageField::new('picture', 'Photo')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads'),
            AssociationField::new('tag', 'Langage'),
        ];
    }

}
