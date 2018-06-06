<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RequisitoApiTest extends TestCase
{
    use MakeRequisitoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRequisito()
    {
        $requisito = $this->fakeRequisitoData();
        $this->json('POST', '/api/v1/requisitos', $requisito);

        $this->assertApiResponse($requisito);
    }

    /**
     * @test
     */
    public function testReadRequisito()
    {
        $requisito = $this->makeRequisito();
        $this->json('GET', '/api/v1/requisitos/'.$requisito->id);

        $this->assertApiResponse($requisito->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRequisito()
    {
        $requisito = $this->makeRequisito();
        $editedRequisito = $this->fakeRequisitoData();

        $this->json('PUT', '/api/v1/requisitos/'.$requisito->id, $editedRequisito);

        $this->assertApiResponse($editedRequisito);
    }

    /**
     * @test
     */
    public function testDeleteRequisito()
    {
        $requisito = $this->makeRequisito();
        $this->json('DELETE', '/api/v1/requisitos/'.$requisito->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/requisitos/'.$requisito->id);

        $this->assertResponseStatus(404);
    }
}
