<?php

use App\Models\Perfiles;
use App\Repositories\PerfilesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PerfilesRepositoryTest extends TestCase
{
    use MakePerfilesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PerfilesRepository
     */
    protected $perfilesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->perfilesRepo = App::make(PerfilesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePerfiles()
    {
        $perfiles = $this->fakePerfilesData();
        $createdPerfiles = $this->perfilesRepo->create($perfiles);
        $createdPerfiles = $createdPerfiles->toArray();
        $this->assertArrayHasKey('id', $createdPerfiles);
        $this->assertNotNull($createdPerfiles['id'], 'Created Perfiles must have id specified');
        $this->assertNotNull(Perfiles::find($createdPerfiles['id']), 'Perfiles with given id must be in DB');
        $this->assertModelData($perfiles, $createdPerfiles);
    }

    /**
     * @test read
     */
    public function testReadPerfiles()
    {
        $perfiles = $this->makePerfiles();
        $dbPerfiles = $this->perfilesRepo->find($perfiles->id);
        $dbPerfiles = $dbPerfiles->toArray();
        $this->assertModelData($perfiles->toArray(), $dbPerfiles);
    }

    /**
     * @test update
     */
    public function testUpdatePerfiles()
    {
        $perfiles = $this->makePerfiles();
        $fakePerfiles = $this->fakePerfilesData();
        $updatedPerfiles = $this->perfilesRepo->update($fakePerfiles, $perfiles->id);
        $this->assertModelData($fakePerfiles, $updatedPerfiles->toArray());
        $dbPerfiles = $this->perfilesRepo->find($perfiles->id);
        $this->assertModelData($fakePerfiles, $dbPerfiles->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePerfiles()
    {
        $perfiles = $this->makePerfiles();
        $resp = $this->perfilesRepo->delete($perfiles->id);
        $this->assertTrue($resp);
        $this->assertNull(Perfiles::find($perfiles->id), 'Perfiles should not exist in DB');
    }
}
