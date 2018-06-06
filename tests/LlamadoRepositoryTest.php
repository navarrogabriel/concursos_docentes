<?php

use App\Models\Llamado;
use App\Repositories\LlamadoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LlamadoRepositoryTest extends TestCase
{
    use MakeLlamadoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LlamadoRepository
     */
    protected $llamadoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->llamadoRepo = App::make(LlamadoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateLlamado()
    {
        $llamado = $this->fakeLlamadoData();
        $createdLlamado = $this->llamadoRepo->create($llamado);
        $createdLlamado = $createdLlamado->toArray();
        $this->assertArrayHasKey('id', $createdLlamado);
        $this->assertNotNull($createdLlamado['id'], 'Created Llamado must have id specified');
        $this->assertNotNull(Llamado::find($createdLlamado['id']), 'Llamado with given id must be in DB');
        $this->assertModelData($llamado, $createdLlamado);
    }

    /**
     * @test read
     */
    public function testReadLlamado()
    {
        $llamado = $this->makeLlamado();
        $dbLlamado = $this->llamadoRepo->find($llamado->id);
        $dbLlamado = $dbLlamado->toArray();
        $this->assertModelData($llamado->toArray(), $dbLlamado);
    }

    /**
     * @test update
     */
    public function testUpdateLlamado()
    {
        $llamado = $this->makeLlamado();
        $fakeLlamado = $this->fakeLlamadoData();
        $updatedLlamado = $this->llamadoRepo->update($fakeLlamado, $llamado->id);
        $this->assertModelData($fakeLlamado, $updatedLlamado->toArray());
        $dbLlamado = $this->llamadoRepo->find($llamado->id);
        $this->assertModelData($fakeLlamado, $dbLlamado->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteLlamado()
    {
        $llamado = $this->makeLlamado();
        $resp = $this->llamadoRepo->delete($llamado->id);
        $this->assertTrue($resp);
        $this->assertNull(Llamado::find($llamado->id), 'Llamado should not exist in DB');
    }
}
