<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        /*$response = $this->get('/admin/mensajes')->assertStatus(200);
        
        $response = $this->get('/admin/users')->assertStatus(200);

        $response = $this->get('/admin/users/create')->assertStatus(200)->assertSee('Docente');

        */
        $response = $this->get('/login');
        
        $response->assertStatus(200)
                ->assertSee('Credenciales');
                
                //La url home existe y cargo correctamente, además leemos credenciales.
                //tiene que coincidir con mayusculas y todo.
    }
}
