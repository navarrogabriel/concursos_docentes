<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConcursoApiTest extends TestCase
{
    use MakeConcursoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateConcurso()
    {
        $concurso = $this->fakeConcursoData();
        $this->json('POST', '/api/v1/concursos', $concurso);

        $this->assertApiResponse($concurso);
    }

    /**
     * @test
     */
    public function testReadConcurso()
    {
        $concurso = $this->makeConcurso();
        $this->json('GET', '/api/v1/concursos/'.$concurso->id);

        $this->assertApiResponse($concurso->toArray());
    }

    /**
     * @test
     */
    public function testUpdateConcurso()
    {
        $concurso = $this->makeConcurso();
        $editedConcurso = $this->fakeConcursoData();

        $this->json('PUT', '/api/v1/concursos/'.$concurso->id, $editedConcurso);

        $this->assertApiResponse($editedConcurso);
    }

    /**
     * @test
     */
    public function testDeleteConcurso()
    {
        $concurso = $this->makeConcurso();
        $this->json('DELETE', '/api/v1/concursos/'.$concurso->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/concursos/'.$concurso->id);

        $this->assertResponseStatus(404);
    }
}
