<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RequisitoPostulanteApiTest extends TestCase
{
    use MakeRequisitoPostulanteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRequisitoPostulante()
    {
        $requisitoPostulante = $this->fakeRequisitoPostulanteData();
        $this->json('POST', '/api/v1/requisitoPostulantes', $requisitoPostulante);

        $this->assertApiResponse($requisitoPostulante);
    }

    /**
     * @test
     */
    public function testReadRequisitoPostulante()
    {
        $requisitoPostulante = $this->makeRequisitoPostulante();
        $this->json('GET', '/api/v1/requisitoPostulantes/'.$requisitoPostulante->id);

        $this->assertApiResponse($requisitoPostulante->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRequisitoPostulante()
    {
        $requisitoPostulante = $this->makeRequisitoPostulante();
        $editedRequisitoPostulante = $this->fakeRequisitoPostulanteData();

        $this->json('PUT', '/api/v1/requisitoPostulantes/'.$requisitoPostulante->id, $editedRequisitoPostulante);

        $this->assertApiResponse($editedRequisitoPostulante);
    }

    /**
     * @test
     */
    public function testDeleteRequisitoPostulante()
    {
        $requisitoPostulante = $this->makeRequisitoPostulante();
        $this->json('DELETE', '/api/v1/requisitoPostulantes/'.$requisitoPostulante->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/requisitoPostulantes/'.$requisitoPostulante->id);

        $this->assertResponseStatus(404);
    }
}
