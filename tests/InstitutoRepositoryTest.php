<?php

use App\Models\Instituto;
use App\Repositories\InstitutoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InstitutoRepositoryTest extends TestCase
{
    use MakeInstitutoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var InstitutoRepository
     */
    protected $institutoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->institutoRepo = App::make(InstitutoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateInstituto()
    {
        $instituto = $this->fakeInstitutoData();
        $createdInstituto = $this->institutoRepo->create($instituto);
        $createdInstituto = $createdInstituto->toArray();
        $this->assertArrayHasKey('id', $createdInstituto);
        $this->assertNotNull($createdInstituto['id'], 'Created Instituto must have id specified');
        $this->assertNotNull(Instituto::find($createdInstituto['id']), 'Instituto with given id must be in DB');
        $this->assertModelData($instituto, $createdInstituto);
    }

    /**
     * @test read
     */
    public function testReadInstituto()
    {
        $instituto = $this->makeInstituto();
        $dbInstituto = $this->institutoRepo->find($instituto->id);
        $dbInstituto = $dbInstituto->toArray();
        $this->assertModelData($instituto->toArray(), $dbInstituto);
    }

    /**
     * @test update
     */
    public function testUpdateInstituto()
    {
        $instituto = $this->makeInstituto();
        $fakeInstituto = $this->fakeInstitutoData();
        $updatedInstituto = $this->institutoRepo->update($fakeInstituto, $instituto->id);
        $this->assertModelData($fakeInstituto, $updatedInstituto->toArray());
        $dbInstituto = $this->institutoRepo->find($instituto->id);
        $this->assertModelData($fakeInstituto, $dbInstituto->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteInstituto()
    {
        $instituto = $this->makeInstituto();
        $resp = $this->institutoRepo->delete($instituto->id);
        $this->assertTrue($resp);
        $this->assertNull(Instituto::find($instituto->id), 'Instituto should not exist in DB');
    }
}
