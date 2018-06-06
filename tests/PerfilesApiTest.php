<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PerfilesApiTest extends TestCase
{
    use MakePerfilesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePerfiles()
    {
        $perfiles = $this->fakePerfilesData();
        $this->json('POST', '/api/v1/perfiles', $perfiles);

        $this->assertApiResponse($perfiles);
    }

    /**
     * @test
     */
    public function testReadPerfiles()
    {
        $perfiles = $this->makePerfiles();
        $this->json('GET', '/api/v1/perfiles/'.$perfiles->id);

        $this->assertApiResponse($perfiles->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePerfiles()
    {
        $perfiles = $this->makePerfiles();
        $editedPerfiles = $this->fakePerfilesData();

        $this->json('PUT', '/api/v1/perfiles/'.$perfiles->id, $editedPerfiles);

        $this->assertApiResponse($editedPerfiles);
    }

    /**
     * @test
     */
    public function testDeletePerfiles()
    {
        $perfiles = $this->makePerfiles();
        $this->json('DELETE', '/api/v1/perfiles/'.$perfiles->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/perfiles/'.$perfiles->id);

        $this->assertResponseStatus(404);
    }
}
