<?php

use App\Models\Requisito;
use App\Repositories\RequisitoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RequisitoRepositoryTest extends TestCase
{
    use MakeRequisitoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RequisitoRepository
     */
    protected $requisitoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->requisitoRepo = App::make(RequisitoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRequisito()
    {
        $requisito = $this->fakeRequisitoData();
        $createdRequisito = $this->requisitoRepo->create($requisito);
        $createdRequisito = $createdRequisito->toArray();
        $this->assertArrayHasKey('id', $createdRequisito);
        $this->assertNotNull($createdRequisito['id'], 'Created Requisito must have id specified');
        $this->assertNotNull(Requisito::find($createdRequisito['id']), 'Requisito with given id must be in DB');
        $this->assertModelData($requisito, $createdRequisito);
    }

    /**
     * @test read
     */
    public function testReadRequisito()
    {
        $requisito = $this->makeRequisito();
        $dbRequisito = $this->requisitoRepo->find($requisito->id);
        $dbRequisito = $dbRequisito->toArray();
        $this->assertModelData($requisito->toArray(), $dbRequisito);
    }

    /**
     * @test update
     */
    public function testUpdateRequisito()
    {
        $requisito = $this->makeRequisito();
        $fakeRequisito = $this->fakeRequisitoData();
        $updatedRequisito = $this->requisitoRepo->update($fakeRequisito, $requisito->id);
        $this->assertModelData($fakeRequisito, $updatedRequisito->toArray());
        $dbRequisito = $this->requisitoRepo->find($requisito->id);
        $this->assertModelData($fakeRequisito, $dbRequisito->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRequisito()
    {
        $requisito = $this->makeRequisito();
        $resp = $this->requisitoRepo->delete($requisito->id);
        $this->assertTrue($resp);
        $this->assertNull(Requisito::find($requisito->id), 'Requisito should not exist in DB');
    }
}
