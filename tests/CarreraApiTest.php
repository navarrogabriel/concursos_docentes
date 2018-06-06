<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CarreraApiTest extends TestCase
{
    use MakeCarreraTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCarrera()
    {
        $carrera = $this->fakeCarreraData();
        $this->json('POST', '/api/v1/carreras', $carrera);

        $this->assertApiResponse($carrera);
    }

    /**
     * @test
     */
    public function testReadCarrera()
    {
        $carrera = $this->makeCarrera();
        $this->json('GET', '/api/v1/carreras/'.$carrera->id);

        $this->assertApiResponse($carrera->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCarrera()
    {
        $carrera = $this->makeCarrera();
        $editedCarrera = $this->fakeCarreraData();

        $this->json('PUT', '/api/v1/carreras/'.$carrera->id, $editedCarrera);

        $this->assertApiResponse($editedCarrera);
    }

    /**
     * @test
     */
    public function testDeleteCarrera()
    {
        $carrera = $this->makeCarrera();
        $this->json('DELETE', '/api/v1/carreras/'.$carrera->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/carreras/'.$carrera->id);

        $this->assertResponseStatus(404);
    }
}
