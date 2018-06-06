<?php

use App\Models\Asignatura;
use App\Repositories\AsignaturaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsignaturaRepositoryTest extends TestCase
{
    use MakeAsignaturaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AsignaturaRepository
     */
    protected $asignaturaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->asignaturaRepo = App::make(AsignaturaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAsignatura()
    {
        $asignatura = $this->fakeAsignaturaData();
        $createdAsignatura = $this->asignaturaRepo->create($asignatura);
        $createdAsignatura = $createdAsignatura->toArray();
        $this->assertArrayHasKey('id', $createdAsignatura);
        $this->assertNotNull($createdAsignatura['id'], 'Created Asignatura must have id specified');
        $this->assertNotNull(Asignatura::find($createdAsignatura['id']), 'Asignatura with given id must be in DB');
        $this->assertModelData($asignatura, $createdAsignatura);
    }

    /**
     * @test read
     */
    public function testReadAsignatura()
    {
        $asignatura = $this->makeAsignatura();
        $dbAsignatura = $this->asignaturaRepo->find($asignatura->id);
        $dbAsignatura = $dbAsignatura->toArray();
        $this->assertModelData($asignatura->toArray(), $dbAsignatura);
    }

    /**
     * @test update
     */
    public function testUpdateAsignatura()
    {
        $asignatura = $this->makeAsignatura();
        $fakeAsignatura = $this->fakeAsignaturaData();
        $updatedAsignatura = $this->asignaturaRepo->update($fakeAsignatura, $asignatura->id);
        $this->assertModelData($fakeAsignatura, $updatedAsignatura->toArray());
        $dbAsignatura = $this->asignaturaRepo->find($asignatura->id);
        $this->assertModelData($fakeAsignatura, $dbAsignatura->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAsignatura()
    {
        $asignatura = $this->makeAsignatura();
        $resp = $this->asignaturaRepo->delete($asignatura->id);
        $this->assertTrue($resp);
        $this->assertNull(Asignatura::find($asignatura->id), 'Asignatura should not exist in DB');
    }
}
