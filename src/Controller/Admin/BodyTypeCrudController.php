<?php

namespace App\Controller\Admin;

use App\Entity\BodyType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BodyTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BodyType::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
