<?php

namespace App\Tests\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

final class DashboardControllerTest extends WebTestCase
{
    private const PHP_AUTH_USER = 'admin';
    private const PHP_AUTH_PW = 'admin';

    public function testAdminDashboard()
    {
        $client = static::createClient([], [
            'PHP_AUTH_USER' => self::PHP_AUTH_USER,
            'PHP_AUTH_PW' => self::PHP_AUTH_PW,
        ]);

        $client->request('GET', '/admin');

        $this->assertSame(
            Response::HTTP_OK,
            $client->getResponse()->getStatusCode(),
            sprintf('The %s URL loads correctly.', '/admin')
        );
    }
}
