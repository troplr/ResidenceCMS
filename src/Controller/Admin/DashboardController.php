<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Locality;
use App\Entity\Operation;
use App\Entity\Page;
use App\Entity\Property;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

final class DashboardController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_dashboard")
     */
    public function index()
    {
        // Counting the number of properties
        $properties = $this->getDoctrine()
            ->getRepository(Property::class)->findCount();

        // Counting the number of localities
        $localities = $this->getDoctrine()
            ->getRepository(Locality::class)->findCount();

        // Counting the number of operations
        $operations = $this->getDoctrine()
            ->getRepository(Operation::class)->findCount();

        // Counting the number of categories
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)->findCount();

        // Counting the number of pages
        $pages = $this->getDoctrine()
            ->getRepository(Page::class)->findCount();

        // Counting the number of users
        $users = $this->getDoctrine()
            ->getRepository(User::class)->findCount();

        return $this->render('admin/dashboard/index.html.twig', [
            'number_of_properties' => $properties,
            'number_of_localities' => $localities,
            'number_of_operations' => $operations,
            'number_of_categories' => $categories,
            'number_of_pages' => $pages,
            'number_of_users' => $users,
        ]);
    }
}
