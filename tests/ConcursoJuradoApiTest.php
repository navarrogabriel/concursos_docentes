<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConcursoJuradoApiTest extends TestCase
{
    use MakeConcursoJuradoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateConcursoJurado()
    {
        $concursoJurado = $this->fakeConcursoJuradoData();
        $this->json('POST', '/api/v1/concursoJurados', $concursoJurado);

        $this->assertApiResponse($concursoJurado);
    }

    /**
     * @test
     */
    public function testReadConcursoJurado()
    {
        $concursoJurado = $this->makeConcursoJurado();
        $this->json('GET', '/api/v1/concursoJurados/'.$concursoJurado->id);

        $this->assertApiResponse($concursoJurado->toArray());
    }

    /**
     * @test
     */
    public function testUpdateConcursoJurado()
    {
        $concursoJurado = $this->makeConcursoJurado();
        $editedConcursoJurado = $this->fakeConcursoJuradoData();

        $this->json('PUT', '/api/v1/concursoJurados/'.$concursoJurado->id, $editedConcursoJurado);

        $this->assertApiResponse($editedConcursoJurado);
    }

    /**
     * @test
     */
    public function testDeleteConcursoJurado()
    {
        $concursoJurado = $this->makeConcursoJurado();
        $this->json('DELETE', '/api/v1/concursoJurados/'.$concursoJurado->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/concursoJurados/'.$concursoJurado->id);

        $this->assertResponseStatus(404);
    }
}
