<?php

use App\Models\Jurado;
use App\Repositories\JuradoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JuradoRepositoryTest extends TestCase
{
    use MakeJuradoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var JuradoRepository
     */
    protected $juradoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->juradoRepo = App::make(JuradoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateJurado()
    {
        $jurado = $this->fakeJuradoData();
        $createdJurado = $this->juradoRepo->create($jurado);
        $createdJurado = $createdJurado->toArray();
        $this->assertArrayHasKey('id', $createdJurado);
        $this->assertNotNull($createdJurado['id'], 'Created Jurado must have id specified');
        $this->assertNotNull(Jurado::find($createdJurado['id']), 'Jurado with given id must be in DB');
        $this->assertModelData($jurado, $createdJurado);
    }

    /**
     * @test read
     */
    public function testReadJurado()
    {
        $jurado = $this->makeJurado();
        $dbJurado = $this->juradoRepo->find($jurado->id);
        $dbJurado = $dbJurado->toArray();
        $this->assertModelData($jurado->toArray(), $dbJurado);
    }

    /**
     * @test update
     */
    public function testUpdateJurado()
    {
        $jurado = $this->makeJurado();
        $fakeJurado = $this->fakeJuradoData();
        $updatedJurado = $this->juradoRepo->update($fakeJurado, $jurado->id);
        $this->assertModelData($fakeJurado, $updatedJurado->toArray());
        $dbJurado = $this->juradoRepo->find($jurado->id);
        $this->assertModelData($fakeJurado, $dbJurado->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteJurado()
    {
        $jurado = $this->makeJurado();
        $resp = $this->juradoRepo->delete($jurado->id);
        $this->assertTrue($resp);
        $this->assertNull(Jurado::find($jurado->id), 'Jurado should not exist in DB');
    }
}
