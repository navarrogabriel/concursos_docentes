<?php

use App\Models\ConcursoPostulante;
use App\Repositories\ConcursoPostulanteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConcursoPostulanteRepositoryTest extends TestCase
{
    use MakeConcursoPostulanteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ConcursoPostulanteRepository
     */
    protected $concursoPostulanteRepo;

    public function setUp()
    {
        parent::setUp();
        $this->concursoPostulanteRepo = App::make(ConcursoPostulanteRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateConcursoPostulante()
    {
        $concursoPostulante = $this->fakeConcursoPostulanteData();
        $createdConcursoPostulante = $this->concursoPostulanteRepo->create($concursoPostulante);
        $createdConcursoPostulante = $createdConcursoPostulante->toArray();
        $this->assertArrayHasKey('id', $createdConcursoPostulante);
        $this->assertNotNull($createdConcursoPostulante['id'], 'Created ConcursoPostulante must have id specified');
        $this->assertNotNull(ConcursoPostulante::find($createdConcursoPostulante['id']), 'ConcursoPostulante with given id must be in DB');
        $this->assertModelData($concursoPostulante, $createdConcursoPostulante);
    }

    /**
     * @test read
     */
    public function testReadConcursoPostulante()
    {
        $concursoPostulante = $this->makeConcursoPostulante();
        $dbConcursoPostulante = $this->concursoPostulanteRepo->find($concursoPostulante->id);
        $dbConcursoPostulante = $dbConcursoPostulante->toArray();
        $this->assertModelData($concursoPostulante->toArray(), $dbConcursoPostulante);
    }

    /**
     * @test update
     */
    public function testUpdateConcursoPostulante()
    {
        $concursoPostulante = $this->makeConcursoPostulante();
        $fakeConcursoPostulante = $this->fakeConcursoPostulanteData();
        $updatedConcursoPostulante = $this->concursoPostulanteRepo->update($fakeConcursoPostulante, $concursoPostulante->id);
        $this->assertModelData($fakeConcursoPostulante, $updatedConcursoPostulante->toArray());
        $dbConcursoPostulante = $this->concursoPostulanteRepo->find($concursoPostulante->id);
        $this->assertModelData($fakeConcursoPostulante, $dbConcursoPostulante->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteConcursoPostulante()
    {
        $concursoPostulante = $this->makeConcursoPostulante();
        $resp = $this->concursoPostulanteRepo->delete($concursoPostulante->id);
        $this->assertTrue($resp);
        $this->assertNull(ConcursoPostulante::find($concursoPostulante->id), 'ConcursoPostulante should not exist in DB');
    }
}
