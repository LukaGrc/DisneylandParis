<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'withoutheader' => true,
            'active' => 'Home',
            'activeSub' => null,
        ]);
    }

    #[Route('/admin/users', name: 'app_admin_users')]
    public function users(): Response
    {
        return $this->render('admin/index.html.twig', [
            'withoutheader' => true,
            'active' => 'Users',
            'activeSub' => null,
        ]);
    }

    #[Route('/admin/users/search', name: 'app_admin_users_search')]
    public function usersSearch(): Response
    {
        return $this->render('admin/index.html.twig', [
            'withoutheader' => true,
            'active' => 'Users',
            'activeSub' => 'Search',
        ]);
    }

    #[Route('/admin/users/admins', name: 'app_admin_users_admins')]
    public function usersAdmin(): Response
    {
        return $this->render('admin/index.html.twig', [
            'withoutheader' => true,
            'active' => 'Users',
            'activeSub' => 'Admins',
        ]);
    }

    #[Route('/admin/destinations', name: 'app_admin_destinations')]
    public function destinations(): Response
    {
        return $this->render('admin/index.html.twig', [
            'withoutheader' => true,
            'active' => 'Destinations',
            'activeSub' => null,
        ]);
    }

    #[Route('/admin/destinations/lands', name: 'app_admin_destinations_lands')]
    public function destinationsLands(): Response
    {
        return $this->render('admin/index.html.twig', [
            'withoutheader' => true,
            'active' => 'Destinations',
            'activeSub' => 'Lands',
        ]);
    }

    #[Route('/admin/hotels', name: 'app_admin_hotels')]
    public function hotels(): Response
    {
        return $this->render('admin/index.html.twig', [
            'withoutheader' => true,
            'active' => 'Hotels',
            'activeSub' => null,
        ]);
    }

    #[Route('/admin/hotels/add', name: 'app_admin_hotels_add')]
    public function hotelsAdd(): Response
    {
        return $this->render('admin/index.html.twig', [
            'withoutheader' => true,
            'active' => 'Hotels',
            'activeSub' => 'Add',
        ]);
    }

    #[Route('/admin/hotels/bookings', name: 'app_admin_hotels_bookings')]
    public function hotelsBookings(): Response
    {
        return $this->render('admin/index.html.twig', [
            'withoutheader' => true,
            'active' => 'Hotels',
            'activeSub' => 'Bookings',
        ]);
    }

    #[Route('/admin/attractions', name: 'app_admin_attractions')]
    public function attractions(): Response
    {
        return $this->render('admin/index.html.twig', [
            'withoutheader' => true,
            'active' => 'Attractions',
            'activeSub' => null,
        ]);
    }

    #[Route('/admin/attractions/categories', name: 'app_admin_attractions_categories')]
    public function attractionsCategories(): Response
    {
        return $this->render('admin/index.html.twig', [
            'withoutheader' => true,
            'active' => 'Attractions',
            'activeSub' => 'Categories',
        ]);
    }

    #[Route('/admin/attractions/add', name: 'app_admin_attractions_add')]
    public function attractionsAdd(): Response
    {
        return $this->render('admin/index.html.twig', [
            'withoutheader' => true,
            'active' => 'Attractions',
            'activeSub' => 'Add',
        ]);
    }

    #[Route('/admin/restaurants', name: 'app_admin_restaurants')]
    public function restaurants(): Response
    {
        return $this->render('admin/index.html.twig', [
            'withoutheader' => true,
            'active' => 'Restaurants',
            'activeSub' => null,
        ]);
    }

    #[Route('/admin/restaurants/add', name: 'app_admin_restaurants_add')]
    public function restaurantsAdd(): Response
    {
        return $this->render('admin/index.html.twig', [
            'withoutheader' => true,
            'active' => 'Restaurants',
            'activeSub' => 'Add',
        ]);
    }

    #[Route('/admin/ticketing', name: 'app_admin_ticketing')]
    public function ticketing(): Response
    {
        return $this->render('admin/index.html.twig', [
            'withoutheader' => true,
            'active' => 'Ticketing',
            'activeSub' => null,
        ]);
    }

    #[Route('/admin/ticketing/invoices', name: 'app_admin_ticketing_invoices')]
    public function ticketingInvoices(): Response
    {
        return $this->render('admin/index.html.twig', [
            'withoutheader' => true,
            'active' => 'Ticketing',
            'activeSub' => 'Invoices',
        ]);
    }

    #[Route('/admin/stats', name: 'app_admin_stats')]
    public function stats(): Response
    {
        return $this->render('admin/index.html.twig', [
            'withoutheader' => true,
            'active' => 'Stats',
            'activeSub' => null,
        ]);
    }
}
