<?php

namespace Tests\Feature;

use Tests\TestCase;

class LandingPageTest extends TestCase
{
    public function test_landing_page_loads_with_config_slides(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('KIW COMMERCIAL');
        $response->assertSee('WEBSITE & PROFIL');
        $response->assertSee('KONTAK & MEDIA SOSIAL');
    }
}
