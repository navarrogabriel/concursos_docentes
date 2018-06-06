<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UniversidadApiTest extends TestCase
{
    use MakeUniversidadTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateUniversidad()
    {
        $universidad = $this->fakeUniversidadData();
        $this->json('POST', '/api/v1/universidads', $universidad);

        $this->assertApiResponse($universidad);
    }

    /**
     * @test
     */
    public function testReadUniversidad()
    {
        $universidad = $this->makeUniversidad();
        $this->json('GET', '/api/v1/universidads/'.$universidad->id);

        $this->assertApiResponse($universidad->toArray());
    }

    /**
     * @test
     */
    public function testUpdateUniversidad()
    {
        $universidad = $this->makeUniversidad();
        $editedUniversidad = $this->fakeUniversidadData();

        $this->json('PUT', '/api/v1/universidads/'.$universidad->id, $editedUniversidad);

        $this->assertApiResponse($editedUniversidad);
    }

    /**
     * @test
     */
    public function testDeleteUniversidad()
    {
        $universidad = $this->makeUniversidad();
        $this->json('DELETE', '/api/v1/universidads/'.$universidad->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/universidads/'.$universidad->id);

        $this->assertResponseStatus(404);
    }
}
