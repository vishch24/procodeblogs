<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    #[Test]
    public function it_loads_the_home_page_successfully()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('ProcodeBlogs'); // Or some text you expect on the page
    }
}
