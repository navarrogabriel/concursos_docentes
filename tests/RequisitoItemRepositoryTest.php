<?php

use App\Models\RequisitoItem;
use App\Repositories\RequisitoItemRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RequisitoItemRepositoryTest extends TestCase
{
    use MakeRequisitoItemTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RequisitoItemRepository
     */
    protected $requisitoItemRepo;

    public function setUp()
    {
        parent::setUp();
        $this->requisitoItemRepo = App::make(RequisitoItemRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRequisitoItem()
    {
        $requisitoItem = $this->fakeRequisitoItemData();
        $createdRequisitoItem = $this->requisitoItemRepo->create($requisitoItem);
        $createdRequisitoItem = $createdRequisitoItem->toArray();
        $this->assertArrayHasKey('id', $createdRequisitoItem);
        $this->assertNotNull($createdRequisitoItem['id'], 'Created RequisitoItem must have id specified');
        $this->assertNotNull(RequisitoItem::find($createdRequisitoItem['id']), 'RequisitoItem with given id must be in DB');
        $this->assertModelData($requisitoItem, $createdRequisitoItem);
    }

    /**
     * @test read
     */
    public function testReadRequisitoItem()
    {
        $requisitoItem = $this->makeRequisitoItem();
        $dbRequisitoItem = $this->requisitoItemRepo->find($requisitoItem->id);
        $dbRequisitoItem = $dbRequisitoItem->toArray();
        $this->assertModelData($requisitoItem->toArray(), $dbRequisitoItem);
    }

    /**
     * @test update
     */
    public function testUpdateRequisitoItem()
    {
        $requisitoItem = $this->makeRequisitoItem();
        $fakeRequisitoItem = $this->fakeRequisitoItemData();
        $updatedRequisitoItem = $this->requisitoItemRepo->update($fakeRequisitoItem, $requisitoItem->id);
        $this->assertModelData($fakeRequisitoItem, $updatedRequisitoItem->toArray());
        $dbRequisitoItem = $this->requisitoItemRepo->find($requisitoItem->id);
        $this->assertModelData($fakeRequisitoItem, $dbRequisitoItem->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRequisitoItem()
    {
        $requisitoItem = $this->makeRequisitoItem();
        $resp = $this->requisitoItemRepo->delete($requisitoItem->id);
        $this->assertTrue($resp);
        $this->assertNull(RequisitoItem::find($requisitoItem->id), 'RequisitoItem should not exist in DB');
    }
}
