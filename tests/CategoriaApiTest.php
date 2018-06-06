<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoriaApiTest extends TestCase
{
    use MakeCategoriaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCategoria()
    {
        $categoria = $this->fakeCategoriaData();
        $this->json('POST', '/api/v1/categorias', $categoria);

        $this->assertApiResponse($categoria);
    }

    /**
     * @test
     */
    public function testReadCategoria()
    {
        $categoria = $this->makeCategoria();
        $this->json('GET', '/api/v1/categorias/'.$categoria->id);

        $this->assertApiResponse($categoria->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCategoria()
    {
        $categoria = $this->makeCategoria();
        $editedCategoria = $this->fakeCategoriaData();

        $this->json('PUT', '/api/v1/categorias/'.$categoria->id, $editedCategoria);

        $this->assertApiResponse($editedCategoria);
    }

    /**
     * @test
     */
    public function testDeleteCategoria()
    {
        $categoria = $this->makeCategoria();
        $this->json('DELETE', '/api/v1/categorias/'.$categoria->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/categorias/'.$categoria->id);

        $this->assertResponseStatus(404);
    }
}
