<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LlamadoConcursosApiTest extends TestCase
{
    use MakeLlamadoConcursosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLlamadoConcursos()
    {
        $llamadoConcursos = $this->fakeLlamadoConcursosData();
        $this->json('POST', '/api/v1/llamadoConcursos', $llamadoConcursos);

        $this->assertApiResponse($llamadoConcursos);
    }

    /**
     * @test
     */
    public function testReadLlamadoConcursos()
    {
        $llamadoConcursos = $this->makeLlamadoConcursos();
        $this->json('GET', '/api/v1/llamadoConcursos/'.$llamadoConcursos->id);

        $this->assertApiResponse($llamadoConcursos->toArray());
    }

    /**
     * @test
     */
    public function testUpdateLlamadoConcursos()
    {
        $llamadoConcursos = $this->makeLlamadoConcursos();
        $editedLlamadoConcursos = $this->fakeLlamadoConcursosData();

        $this->json('PUT', '/api/v1/llamadoConcursos/'.$llamadoConcursos->id, $editedLlamadoConcursos);

        $this->assertApiResponse($editedLlamadoConcursos);
    }

    /**
     * @test
     */
    public function testDeleteLlamadoConcursos()
    {
        $llamadoConcursos = $this->makeLlamadoConcursos();
        $this->json('DELETE', '/api/v1/llamadoConcursos/'.$llamadoConcursos->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/llamadoConcursos/'.$llamadoConcursos->id);

        $this->assertResponseStatus(404);
    }
}
