<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DashboardController extends AbstractDashboardController
{
    // public function __construct(private CrudUrlGenerator $crudUrlGenerator, private ContainerBagInterface $params) {}

    /**
     * @Route("/admin", name="dashboard")
     * @return Response
     */
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(CarCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        $prj_name = "Car Managment System";
        return Dashboard::new()
            ->setTitle(sprintf('Panel :: %s', $prj_name));
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::subMenu('Car menu', 'fa fa-list')->setSubItems([
            MenuItem::linkToCrud('Car', 'fas fa-list', Car::class),
            MenuItem::linkToCrud('Car', 'fas fa-list', Car::class),
            MenuItem::linkToCrud('Car', 'fas fa-list', Car::class),
            MenuItem::linkToCrud('Car', 'fas fa-list', Car::class),
            MenuItem::linkToCrud('Car', 'fas fa-list', Car::class),
            MenuItem::linkToCrud('Car', 'fas fa-list', Car::class),
            MenuItem::linkToCrud('Car', 'fas fa-list', Car::class)
        ]);
    }
}
