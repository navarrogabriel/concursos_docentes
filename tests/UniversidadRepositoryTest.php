<?php

use App\Models\Universidad;
use App\Repositories\UniversidadRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UniversidadRepositoryTest extends TestCase
{
    use MakeUniversidadTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var UniversidadRepository
     */
    protected $universidadRepo;

    public function setUp()
    {
        parent::setUp();
        $this->universidadRepo = App::make(UniversidadRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateUniversidad()
    {
        $universidad = $this->fakeUniversidadData();
        $createdUniversidad = $this->universidadRepo->create($universidad);
        $createdUniversidad = $createdUniversidad->toArray();
        $this->assertArrayHasKey('id', $createdUniversidad);
        $this->assertNotNull($createdUniversidad['id'], 'Created Universidad must have id specified');
        $this->assertNotNull(Universidad::find($createdUniversidad['id']), 'Universidad with given id must be in DB');
        $this->assertModelData($universidad, $createdUniversidad);
    }

    /**
     * @test read
     */
    public function testReadUniversidad()
    {
        $universidad = $this->makeUniversidad();
        $dbUniversidad = $this->universidadRepo->find($universidad->id);
        $dbUniversidad = $dbUniversidad->toArray();
        $this->assertModelData($universidad->toArray(), $dbUniversidad);
    }

    /**
     * @test update
     */
    public function testUpdateUniversidad()
    {
        $universidad = $this->makeUniversidad();
        $fakeUniversidad = $this->fakeUniversidadData();
        $updatedUniversidad = $this->universidadRepo->update($fakeUniversidad, $universidad->id);
        $this->assertModelData($fakeUniversidad, $updatedUniversidad->toArray());
        $dbUniversidad = $this->universidadRepo->find($universidad->id);
        $this->assertModelData($fakeUniversidad, $dbUniversidad->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteUniversidad()
    {
        $universidad = $this->makeUniversidad();
        $resp = $this->universidadRepo->delete($universidad->id);
        $this->assertTrue($resp);
        $this->assertNull(Universidad::find($universidad->id), 'Universidad should not exist in DB');
    }
}
