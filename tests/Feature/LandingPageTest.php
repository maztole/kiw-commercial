<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
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

    public function test_landing_page_renders_selected_admin_theme(): void
    {
        SiteSetting::set('theme_style', 'emerald_green');
        SiteSetting::set('theme_primary', '#10b981');
        SiteSetting::set('theme_card_bg', '#064e3b');
        SiteSetting::set('theme_card_radius', 'rounded-[36px]');

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('--theme-card-bg: #064e3b', false);
        $response->assertSee('--theme-primary: #10b981', false);
        $response->assertSee('rounded-[36px]', false);
    }
}
