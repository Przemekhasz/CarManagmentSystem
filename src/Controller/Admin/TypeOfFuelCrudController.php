<?php

namespace App\Controller\Admin;

use App\Entity\TypeOfFuel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeOfFuelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeOfFuel::class;
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
