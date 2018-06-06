<?php

use App\Models\Carrera;
use App\Repositories\CarreraRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CarreraRepositoryTest extends TestCase
{
    use MakeCarreraTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CarreraRepository
     */
    protected $carreraRepo;

    public function setUp()
    {
        parent::setUp();
        $this->carreraRepo = App::make(CarreraRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCarrera()
    {
        $carrera = $this->fakeCarreraData();
        $createdCarrera = $this->carreraRepo->create($carrera);
        $createdCarrera = $createdCarrera->toArray();
        $this->assertArrayHasKey('id', $createdCarrera);
        $this->assertNotNull($createdCarrera['id'], 'Created Carrera must have id specified');
        $this->assertNotNull(Carrera::find($createdCarrera['id']), 'Carrera with given id must be in DB');
        $this->assertModelData($carrera, $createdCarrera);
    }

    /**
     * @test read
     */
    public function testReadCarrera()
    {
        $carrera = $this->makeCarrera();
        $dbCarrera = $this->carreraRepo->find($carrera->id);
        $dbCarrera = $dbCarrera->toArray();
        $this->assertModelData($carrera->toArray(), $dbCarrera);
    }

    /**
     * @test update
     */
    public function testUpdateCarrera()
    {
        $carrera = $this->makeCarrera();
        $fakeCarrera = $this->fakeCarreraData();
        $updatedCarrera = $this->carreraRepo->update($fakeCarrera, $carrera->id);
        $this->assertModelData($fakeCarrera, $updatedCarrera->toArray());
        $dbCarrera = $this->carreraRepo->find($carrera->id);
        $this->assertModelData($fakeCarrera, $dbCarrera->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCarrera()
    {
        $carrera = $this->makeCarrera();
        $resp = $this->carreraRepo->delete($carrera->id);
        $this->assertTrue($resp);
        $this->assertNull(Carrera::find($carrera->id), 'Carrera should not exist in DB');
    }
}
