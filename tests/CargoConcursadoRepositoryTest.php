<?php

use App\Models\CargoConcursado;
use App\Repositories\CargoConcursadoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CargoConcursadoRepositoryTest extends TestCase
{
    use MakeCargoConcursadoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CargoConcursadoRepository
     */
    protected $cargoConcursadoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cargoConcursadoRepo = App::make(CargoConcursadoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCargoConcursado()
    {
        $cargoConcursado = $this->fakeCargoConcursadoData();
        $createdCargoConcursado = $this->cargoConcursadoRepo->create($cargoConcursado);
        $createdCargoConcursado = $createdCargoConcursado->toArray();
        $this->assertArrayHasKey('id', $createdCargoConcursado);
        $this->assertNotNull($createdCargoConcursado['id'], 'Created CargoConcursado must have id specified');
        $this->assertNotNull(CargoConcursado::find($createdCargoConcursado['id']), 'CargoConcursado with given id must be in DB');
        $this->assertModelData($cargoConcursado, $createdCargoConcursado);
    }

    /**
     * @test read
     */
    public function testReadCargoConcursado()
    {
        $cargoConcursado = $this->makeCargoConcursado();
        $dbCargoConcursado = $this->cargoConcursadoRepo->find($cargoConcursado->id);
        $dbCargoConcursado = $dbCargoConcursado->toArray();
        $this->assertModelData($cargoConcursado->toArray(), $dbCargoConcursado);
    }

    /**
     * @test update
     */
    public function testUpdateCargoConcursado()
    {
        $cargoConcursado = $this->makeCargoConcursado();
        $fakeCargoConcursado = $this->fakeCargoConcursadoData();
        $updatedCargoConcursado = $this->cargoConcursadoRepo->update($fakeCargoConcursado, $cargoConcursado->id);
        $this->assertModelData($fakeCargoConcursado, $updatedCargoConcursado->toArray());
        $dbCargoConcursado = $this->cargoConcursadoRepo->find($cargoConcursado->id);
        $this->assertModelData($fakeCargoConcursado, $dbCargoConcursado->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCargoConcursado()
    {
        $cargoConcursado = $this->makeCargoConcursado();
        $resp = $this->cargoConcursadoRepo->delete($cargoConcursado->id);
        $this->assertTrue($resp);
        $this->assertNull(CargoConcursado::find($cargoConcursado->id), 'CargoConcursado should not exist in DB');
    }
}
