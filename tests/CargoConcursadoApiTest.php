<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CargoConcursadoApiTest extends TestCase
{
    use MakeCargoConcursadoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCargoConcursado()
    {
        $cargoConcursado = $this->fakeCargoConcursadoData();
        $this->json('POST', '/api/v1/cargoConcursados', $cargoConcursado);

        $this->assertApiResponse($cargoConcursado);
    }

    /**
     * @test
     */
    public function testReadCargoConcursado()
    {
        $cargoConcursado = $this->makeCargoConcursado();
        $this->json('GET', '/api/v1/cargoConcursados/'.$cargoConcursado->id);

        $this->assertApiResponse($cargoConcursado->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCargoConcursado()
    {
        $cargoConcursado = $this->makeCargoConcursado();
        $editedCargoConcursado = $this->fakeCargoConcursadoData();

        $this->json('PUT', '/api/v1/cargoConcursados/'.$cargoConcursado->id, $editedCargoConcursado);

        $this->assertApiResponse($editedCargoConcursado);
    }

    /**
     * @test
     */
    public function testDeleteCargoConcursado()
    {
        $cargoConcursado = $this->makeCargoConcursado();
        $this->json('DELETE', '/api/v1/cargoConcursados/'.$cargoConcursado->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cargoConcursados/'.$cargoConcursado->id);

        $this->assertResponseStatus(404);
    }
}
