<?php

use App\Models\Categoria;
use App\Repositories\CategoriaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoriaRepositoryTest extends TestCase
{
    use MakeCategoriaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CategoriaRepository
     */
    protected $categoriaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->categoriaRepo = App::make(CategoriaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCategoria()
    {
        $categoria = $this->fakeCategoriaData();
        $createdCategoria = $this->categoriaRepo->create($categoria);
        $createdCategoria = $createdCategoria->toArray();
        $this->assertArrayHasKey('id', $createdCategoria);
        $this->assertNotNull($createdCategoria['id'], 'Created Categoria must have id specified');
        $this->assertNotNull(Categoria::find($createdCategoria['id']), 'Categoria with given id must be in DB');
        $this->assertModelData($categoria, $createdCategoria);
    }

    /**
     * @test read
     */
    public function testReadCategoria()
    {
        $categoria = $this->makeCategoria();
        $dbCategoria = $this->categoriaRepo->find($categoria->id);
        $dbCategoria = $dbCategoria->toArray();
        $this->assertModelData($categoria->toArray(), $dbCategoria);
    }

    /**
     * @test update
     */
    public function testUpdateCategoria()
    {
        $categoria = $this->makeCategoria();
        $fakeCategoria = $this->fakeCategoriaData();
        $updatedCategoria = $this->categoriaRepo->update($fakeCategoria, $categoria->id);
        $this->assertModelData($fakeCategoria, $updatedCategoria->toArray());
        $dbCategoria = $this->categoriaRepo->find($categoria->id);
        $this->assertModelData($fakeCategoria, $dbCategoria->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCategoria()
    {
        $categoria = $this->makeCategoria();
        $resp = $this->categoriaRepo->delete($categoria->id);
        $this->assertTrue($resp);
        $this->assertNull(Categoria::find($categoria->id), 'Categoria should not exist in DB');
    }
}
