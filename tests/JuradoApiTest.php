<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JuradoApiTest extends TestCase
{
    use MakeJuradoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateJurado()
    {
        $jurado = $this->fakeJuradoData();
        $this->json('POST', '/api/v1/jurados', $jurado);

        $this->assertApiResponse($jurado);
    }

    /**
     * @test
     */
    public function testReadJurado()
    {
        $jurado = $this->makeJurado();
        $this->json('GET', '/api/v1/jurados/'.$jurado->id);

        $this->assertApiResponse($jurado->toArray());
    }

    /**
     * @test
     */
    public function testUpdateJurado()
    {
        $jurado = $this->makeJurado();
        $editedJurado = $this->fakeJuradoData();

        $this->json('PUT', '/api/v1/jurados/'.$jurado->id, $editedJurado);

        $this->assertApiResponse($editedJurado);
    }

    /**
     * @test
     */
    public function testDeleteJurado()
    {
        $jurado = $this->makeJurado();
        $this->json('DELETE', '/api/v1/jurados/'.$jurado->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/jurados/'.$jurado->id);

        $this->assertResponseStatus(404);
    }
}
