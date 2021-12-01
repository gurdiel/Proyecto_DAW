<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Docente;
use Illuminate\Database\Eloquent\Collection;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $docente = new Docente;

        $this->assertInstanceOf(Collection::class, $docente->clase);

        //Podemos comprobar que devuelve una colección de clases, es decir un docente tiene varias clases.
        //profundizando más seguramente para crear los archivos tenga una conveción de nombre para que se ejecute.

    }
}
