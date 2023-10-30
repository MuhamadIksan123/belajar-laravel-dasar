<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    public function testConfig()
    {
        $firstname = config('contoh.author.first');
        $lastname = config('contoh.author.last');
        $email = config('contoh.email');
        $web = config('contoh.web');

        self::assertEquals('Eko', $firstname);
        self::assertEquals('Khannedy', $lastname);
        self::assertEquals('echo.khannedy@gmail.com', $email);
        self::assertEquals("https://www.programmerzamannow.com", $web);
    }
}
