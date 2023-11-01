<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class FacadeTest extends TestCase
{
    public function testConfig()
    {
        $fistName1 = config('contoh.author.first');
        $fistName2 = Config::get('contoh.author.first');

        self::assertEquals($fistName1, $fistName2);

        var_dump(Config::all());
    }

    public function testConfigDependency()
    {
        $config = $this->app->make('config');
        $fistName3 = $config->get('contoh.author.first');

        $fistName1 = config('contoh.author.first');
        $fistName2 = Config::get('contoh.author.first');

        self::assertEquals($fistName1, $fistName2);
        self::assertEquals($fistName1, $fistName3);

        var_dump($config->all());
    }

    public function testFecadeMock()
    {
        Config::shouldReceive('get')
        ->with('contoh.author.first')
        ->andReturn('Eko Keren');

        $firstName = Config::get('contoh.author.first');

        self::assertEquals('Eko Keren', $firstName);
    }
}
