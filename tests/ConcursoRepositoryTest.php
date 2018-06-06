<?php

use App\Models\Concurso;
use App\Repositories\ConcursoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConcursoRepositoryTest extends TestCase
{
    use MakeConcursoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ConcursoRepository
     */
    protected $concursoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->concursoRepo = App::make(ConcursoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateConcurso()
    {
        $concurso = $this->fakeConcursoData();
        $createdConcurso = $this->concursoRepo->create($concurso);
        $createdConcurso = $createdConcurso->toArray();
        $this->assertArrayHasKey('id', $createdConcurso);
        $this->assertNotNull($createdConcurso['id'], 'Created Concurso must have id specified');
        $this->assertNotNull(Concurso::find($createdConcurso['id']), 'Concurso with given id must be in DB');
        $this->assertModelData($concurso, $createdConcurso);
    }

    /**
     * @test read
     */
    public function testReadConcurso()
    {
        $concurso = $this->makeConcurso();
        $dbConcurso = $this->concursoRepo->find($concurso->id);
        $dbConcurso = $dbConcurso->toArray();
        $this->assertModelData($concurso->toArray(), $dbConcurso);
    }

    /**
     * @test update
     */
    public function testUpdateConcurso()
    {
        $concurso = $this->makeConcurso();
        $fakeConcurso = $this->fakeConcursoData();
        $updatedConcurso = $this->concursoRepo->update($fakeConcurso, $concurso->id);
        $this->assertModelData($fakeConcurso, $updatedConcurso->toArray());
        $dbConcurso = $this->concursoRepo->find($concurso->id);
        $this->assertModelData($fakeConcurso, $dbConcurso->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteConcurso()
    {
        $concurso = $this->makeConcurso();
        $resp = $this->concursoRepo->delete($concurso->id);
        $this->assertTrue($resp);
        $this->assertNull(Concurso::find($concurso->id), 'Concurso should not exist in DB');
    }
}
