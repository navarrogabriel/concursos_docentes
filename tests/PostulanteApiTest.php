<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostulanteApiTest extends TestCase
{
    use MakePostulanteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePostulante()
    {
        $postulante = $this->fakePostulanteData();
        $this->json('POST', '/api/v1/postulantes', $postulante);

        $this->assertApiResponse($postulante);
    }

    /**
     * @test
     */
    public function testReadPostulante()
    {
        $postulante = $this->makePostulante();
        $this->json('GET', '/api/v1/postulantes/'.$postulante->id);

        $this->assertApiResponse($postulante->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePostulante()
    {
        $postulante = $this->makePostulante();
        $editedPostulante = $this->fakePostulanteData();

        $this->json('PUT', '/api/v1/postulantes/'.$postulante->id, $editedPostulante);

        $this->assertApiResponse($editedPostulante);
    }

    /**
     * @test
     */
    public function testDeletePostulante()
    {
        $postulante = $this->makePostulante();
        $this->json('DELETE', '/api/v1/postulantes/'.$postulante->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/postulantes/'.$postulante->id);

        $this->assertResponseStatus(404);
    }
}
