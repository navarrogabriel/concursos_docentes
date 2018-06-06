<?php

use App\Models\ConcursoJurado;
use App\Repositories\ConcursoJuradoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConcursoJuradoRepositoryTest extends TestCase
{
    use MakeConcursoJuradoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ConcursoJuradoRepository
     */
    protected $concursoJuradoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->concursoJuradoRepo = App::make(ConcursoJuradoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateConcursoJurado()
    {
        $concursoJurado = $this->fakeConcursoJuradoData();
        $createdConcursoJurado = $this->concursoJuradoRepo->create($concursoJurado);
        $createdConcursoJurado = $createdConcursoJurado->toArray();
        $this->assertArrayHasKey('id', $createdConcursoJurado);
        $this->assertNotNull($createdConcursoJurado['id'], 'Created ConcursoJurado must have id specified');
        $this->assertNotNull(ConcursoJurado::find($createdConcursoJurado['id']), 'ConcursoJurado with given id must be in DB');
        $this->assertModelData($concursoJurado, $createdConcursoJurado);
    }

    /**
     * @test read
     */
    public function testReadConcursoJurado()
    {
        $concursoJurado = $this->makeConcursoJurado();
        $dbConcursoJurado = $this->concursoJuradoRepo->find($concursoJurado->id);
        $dbConcursoJurado = $dbConcursoJurado->toArray();
        $this->assertModelData($concursoJurado->toArray(), $dbConcursoJurado);
    }

    /**
     * @test update
     */
    public function testUpdateConcursoJurado()
    {
        $concursoJurado = $this->makeConcursoJurado();
        $fakeConcursoJurado = $this->fakeConcursoJuradoData();
        $updatedConcursoJurado = $this->concursoJuradoRepo->update($fakeConcursoJurado, $concursoJurado->id);
        $this->assertModelData($fakeConcursoJurado, $updatedConcursoJurado->toArray());
        $dbConcursoJurado = $this->concursoJuradoRepo->find($concursoJurado->id);
        $this->assertModelData($fakeConcursoJurado, $dbConcursoJurado->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteConcursoJurado()
    {
        $concursoJurado = $this->makeConcursoJurado();
        $resp = $this->concursoJuradoRepo->delete($concursoJurado->id);
        $this->assertTrue($resp);
        $this->assertNull(ConcursoJurado::find($concursoJurado->id), 'ConcursoJurado should not exist in DB');
    }
}
