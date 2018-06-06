<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsignaturaApiTest extends TestCase
{
    use MakeAsignaturaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAsignatura()
    {
        $asignatura = $this->fakeAsignaturaData();
        $this->json('POST', '/api/v1/asignaturas', $asignatura);

        $this->assertApiResponse($asignatura);
    }

    /**
     * @test
     */
    public function testReadAsignatura()
    {
        $asignatura = $this->makeAsignatura();
        $this->json('GET', '/api/v1/asignaturas/'.$asignatura->id);

        $this->assertApiResponse($asignatura->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAsignatura()
    {
        $asignatura = $this->makeAsignatura();
        $editedAsignatura = $this->fakeAsignaturaData();

        $this->json('PUT', '/api/v1/asignaturas/'.$asignatura->id, $editedAsignatura);

        $this->assertApiResponse($editedAsignatura);
    }

    /**
     * @test
     */
    public function testDeleteAsignatura()
    {
        $asignatura = $this->makeAsignatura();
        $this->json('DELETE', '/api/v1/asignaturas/'.$asignatura->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/asignaturas/'.$asignatura->id);

        $this->assertResponseStatus(404);
    }
}
