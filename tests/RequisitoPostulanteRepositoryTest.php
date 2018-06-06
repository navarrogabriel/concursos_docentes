<?php

use App\Models\RequisitoPostulante;
use App\Repositories\RequisitoPostulanteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RequisitoPostulanteRepositoryTest extends TestCase
{
    use MakeRequisitoPostulanteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RequisitoPostulanteRepository
     */
    protected $requisitoPostulanteRepo;

    public function setUp()
    {
        parent::setUp();
        $this->requisitoPostulanteRepo = App::make(RequisitoPostulanteRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRequisitoPostulante()
    {
        $requisitoPostulante = $this->fakeRequisitoPostulanteData();
        $createdRequisitoPostulante = $this->requisitoPostulanteRepo->create($requisitoPostulante);
        $createdRequisitoPostulante = $createdRequisitoPostulante->toArray();
        $this->assertArrayHasKey('id', $createdRequisitoPostulante);
        $this->assertNotNull($createdRequisitoPostulante['id'], 'Created RequisitoPostulante must have id specified');
        $this->assertNotNull(RequisitoPostulante::find($createdRequisitoPostulante['id']), 'RequisitoPostulante with given id must be in DB');
        $this->assertModelData($requisitoPostulante, $createdRequisitoPostulante);
    }

    /**
     * @test read
     */
    public function testReadRequisitoPostulante()
    {
        $requisitoPostulante = $this->makeRequisitoPostulante();
        $dbRequisitoPostulante = $this->requisitoPostulanteRepo->find($requisitoPostulante->id);
        $dbRequisitoPostulante = $dbRequisitoPostulante->toArray();
        $this->assertModelData($requisitoPostulante->toArray(), $dbRequisitoPostulante);
    }

    /**
     * @test update
     */
    public function testUpdateRequisitoPostulante()
    {
        $requisitoPostulante = $this->makeRequisitoPostulante();
        $fakeRequisitoPostulante = $this->fakeRequisitoPostulanteData();
        $updatedRequisitoPostulante = $this->requisitoPostulanteRepo->update($fakeRequisitoPostulante, $requisitoPostulante->id);
        $this->assertModelData($fakeRequisitoPostulante, $updatedRequisitoPostulante->toArray());
        $dbRequisitoPostulante = $this->requisitoPostulanteRepo->find($requisitoPostulante->id);
        $this->assertModelData($fakeRequisitoPostulante, $dbRequisitoPostulante->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRequisitoPostulante()
    {
        $requisitoPostulante = $this->makeRequisitoPostulante();
        $resp = $this->requisitoPostulanteRepo->delete($requisitoPostulante->id);
        $this->assertTrue($resp);
        $this->assertNull(RequisitoPostulante::find($requisitoPostulante->id), 'RequisitoPostulante should not exist in DB');
    }
}
