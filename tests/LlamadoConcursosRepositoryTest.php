<?php

use App\Models\LlamadoConcursos;
use App\Repositories\LlamadoConcursosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LlamadoConcursosRepositoryTest extends TestCase
{
    use MakeLlamadoConcursosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LlamadoConcursosRepository
     */
    protected $llamadoConcursosRepo;

    public function setUp()
    {
        parent::setUp();
        $this->llamadoConcursosRepo = App::make(LlamadoConcursosRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateLlamadoConcursos()
    {
        $llamadoConcursos = $this->fakeLlamadoConcursosData();
        $createdLlamadoConcursos = $this->llamadoConcursosRepo->create($llamadoConcursos);
        $createdLlamadoConcursos = $createdLlamadoConcursos->toArray();
        $this->assertArrayHasKey('id', $createdLlamadoConcursos);
        $this->assertNotNull($createdLlamadoConcursos['id'], 'Created LlamadoConcursos must have id specified');
        $this->assertNotNull(LlamadoConcursos::find($createdLlamadoConcursos['id']), 'LlamadoConcursos with given id must be in DB');
        $this->assertModelData($llamadoConcursos, $createdLlamadoConcursos);
    }

    /**
     * @test read
     */
    public function testReadLlamadoConcursos()
    {
        $llamadoConcursos = $this->makeLlamadoConcursos();
        $dbLlamadoConcursos = $this->llamadoConcursosRepo->find($llamadoConcursos->id);
        $dbLlamadoConcursos = $dbLlamadoConcursos->toArray();
        $this->assertModelData($llamadoConcursos->toArray(), $dbLlamadoConcursos);
    }

    /**
     * @test update
     */
    public function testUpdateLlamadoConcursos()
    {
        $llamadoConcursos = $this->makeLlamadoConcursos();
        $fakeLlamadoConcursos = $this->fakeLlamadoConcursosData();
        $updatedLlamadoConcursos = $this->llamadoConcursosRepo->update($fakeLlamadoConcursos, $llamadoConcursos->id);
        $this->assertModelData($fakeLlamadoConcursos, $updatedLlamadoConcursos->toArray());
        $dbLlamadoConcursos = $this->llamadoConcursosRepo->find($llamadoConcursos->id);
        $this->assertModelData($fakeLlamadoConcursos, $dbLlamadoConcursos->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteLlamadoConcursos()
    {
        $llamadoConcursos = $this->makeLlamadoConcursos();
        $resp = $this->llamadoConcursosRepo->delete($llamadoConcursos->id);
        $this->assertTrue($resp);
        $this->assertNull(LlamadoConcursos::find($llamadoConcursos->id), 'LlamadoConcursos should not exist in DB');
    }
}
