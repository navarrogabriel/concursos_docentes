<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LlamadoApiTest extends TestCase
{
    use MakeLlamadoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLlamado()
    {
        $llamado = $this->fakeLlamadoData();
        $this->json('POST', '/api/v1/llamados', $llamado);

        $this->assertApiResponse($llamado);
    }

    /**
     * @test
     */
    public function testReadLlamado()
    {
        $llamado = $this->makeLlamado();
        $this->json('GET', '/api/v1/llamados/'.$llamado->id);

        $this->assertApiResponse($llamado->toArray());
    }

    /**
     * @test
     */
    public function testUpdateLlamado()
    {
        $llamado = $this->makeLlamado();
        $editedLlamado = $this->fakeLlamadoData();

        $this->json('PUT', '/api/v1/llamados/'.$llamado->id, $editedLlamado);

        $this->assertApiResponse($editedLlamado);
    }

    /**
     * @test
     */
    public function testDeleteLlamado()
    {
        $llamado = $this->makeLlamado();
        $this->json('DELETE', '/api/v1/llamados/'.$llamado->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/llamados/'.$llamado->id);

        $this->assertResponseStatus(404);
    }
}
