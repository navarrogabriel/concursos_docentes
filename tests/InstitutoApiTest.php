<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InstitutoApiTest extends TestCase
{
    use MakeInstitutoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateInstituto()
    {
        $instituto = $this->fakeInstitutoData();
        $this->json('POST', '/api/v1/institutos', $instituto);

        $this->assertApiResponse($instituto);
    }

    /**
     * @test
     */
    public function testReadInstituto()
    {
        $instituto = $this->makeInstituto();
        $this->json('GET', '/api/v1/institutos/'.$instituto->id);

        $this->assertApiResponse($instituto->toArray());
    }

    /**
     * @test
     */
    public function testUpdateInstituto()
    {
        $instituto = $this->makeInstituto();
        $editedInstituto = $this->fakeInstitutoData();

        $this->json('PUT', '/api/v1/institutos/'.$instituto->id, $editedInstituto);

        $this->assertApiResponse($editedInstituto);
    }

    /**
     * @test
     */
    public function testDeleteInstituto()
    {
        $instituto = $this->makeInstituto();
        $this->json('DELETE', '/api/v1/institutos/'.$instituto->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/institutos/'.$instituto->id);

        $this->assertResponseStatus(404);
    }
}
