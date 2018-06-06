<?php

use App\Models\Postulante;
use App\Repositories\PostulanteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostulanteRepositoryTest extends TestCase
{
    use MakePostulanteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PostulanteRepository
     */
    protected $postulanteRepo;

    public function setUp()
    {
        parent::setUp();
        $this->postulanteRepo = App::make(PostulanteRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePostulante()
    {
        $postulante = $this->fakePostulanteData();
        $createdPostulante = $this->postulanteRepo->create($postulante);
        $createdPostulante = $createdPostulante->toArray();
        $this->assertArrayHasKey('id', $createdPostulante);
        $this->assertNotNull($createdPostulante['id'], 'Created Postulante must have id specified');
        $this->assertNotNull(Postulante::find($createdPostulante['id']), 'Postulante with given id must be in DB');
        $this->assertModelData($postulante, $createdPostulante);
    }

    /**
     * @test read
     */
    public function testReadPostulante()
    {
        $postulante = $this->makePostulante();
        $dbPostulante = $this->postulanteRepo->find($postulante->id);
        $dbPostulante = $dbPostulante->toArray();
        $this->assertModelData($postulante->toArray(), $dbPostulante);
    }

    /**
     * @test update
     */
    public function testUpdatePostulante()
    {
        $postulante = $this->makePostulante();
        $fakePostulante = $this->fakePostulanteData();
        $updatedPostulante = $this->postulanteRepo->update($fakePostulante, $postulante->id);
        $this->assertModelData($fakePostulante, $updatedPostulante->toArray());
        $dbPostulante = $this->postulanteRepo->find($postulante->id);
        $this->assertModelData($fakePostulante, $dbPostulante->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePostulante()
    {
        $postulante = $this->makePostulante();
        $resp = $this->postulanteRepo->delete($postulante->id);
        $this->assertTrue($resp);
        $this->assertNull(Postulante::find($postulante->id), 'Postulante should not exist in DB');
    }
}
