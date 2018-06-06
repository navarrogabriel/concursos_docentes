<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RequisitoItemApiTest extends TestCase
{
    use MakeRequisitoItemTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRequisitoItem()
    {
        $requisitoItem = $this->fakeRequisitoItemData();
        $this->json('POST', '/api/v1/requisitoItems', $requisitoItem);

        $this->assertApiResponse($requisitoItem);
    }

    /**
     * @test
     */
    public function testReadRequisitoItem()
    {
        $requisitoItem = $this->makeRequisitoItem();
        $this->json('GET', '/api/v1/requisitoItems/'.$requisitoItem->id);

        $this->assertApiResponse($requisitoItem->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRequisitoItem()
    {
        $requisitoItem = $this->makeRequisitoItem();
        $editedRequisitoItem = $this->fakeRequisitoItemData();

        $this->json('PUT', '/api/v1/requisitoItems/'.$requisitoItem->id, $editedRequisitoItem);

        $this->assertApiResponse($editedRequisitoItem);
    }

    /**
     * @test
     */
    public function testDeleteRequisitoItem()
    {
        $requisitoItem = $this->makeRequisitoItem();
        $this->json('DELETE', '/api/v1/requisitoItems/'.$requisitoItem->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/requisitoItems/'.$requisitoItem->id);

        $this->assertResponseStatus(404);
    }
}
