<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConcursoPostulanteApiTest extends TestCase
{
    use MakeConcursoPostulanteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateConcursoPostulante()
    {
        $concursoPostulante = $this->fakeConcursoPostulanteData();
        $this->json('POST', '/api/v1/concursoPostulantes', $concursoPostulante);

        $this->assertApiResponse($concursoPostulante);
    }

    /**
     * @test
     */
    public function testReadConcursoPostulante()
    {
        $concursoPostulante = $this->makeConcursoPostulante();
        $this->json('GET', '/api/v1/concursoPostulantes/'.$concursoPostulante->id);

        $this->assertApiResponse($concursoPostulante->toArray());
    }

    /**
     * @test
     */
    public function testUpdateConcursoPostulante()
    {
        $concursoPostulante = $this->makeConcursoPostulante();
        $editedConcursoPostulante = $this->fakeConcursoPostulanteData();

        $this->json('PUT', '/api/v1/concursoPostulantes/'.$concursoPostulante->id, $editedConcursoPostulante);

        $this->assertApiResponse($editedConcursoPostulante);
    }

    /**
     * @test
     */
    public function testDeleteConcursoPostulante()
    {
        $concursoPostulante = $this->makeConcursoPostulante();
        $this->json('DELETE', '/api/v1/concursoPostulantes/'.$concursoPostulante->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/concursoPostulantes/'.$concursoPostulante->id);

        $this->assertResponseStatus(404);
    }
}
