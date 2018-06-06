<?php

use App\Models\Log;
use App\Repositories\LogRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LogRepositoryTest extends TestCase
{
    use MakeLogTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LogRepository
     */
    protected $logRepo;

    public function setUp()
    {
        parent::setUp();
        $this->logRepo = App::make(LogRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateLog()
    {
        $log = $this->fakeLogData();
        $createdLog = $this->logRepo->create($log);
        $createdLog = $createdLog->toArray();
        $this->assertArrayHasKey('id', $createdLog);
        $this->assertNotNull($createdLog['id'], 'Created Log must have id specified');
        $this->assertNotNull(Log::find($createdLog['id']), 'Log with given id must be in DB');
        $this->assertModelData($log, $createdLog);
    }

    /**
     * @test read
     */
    public function testReadLog()
    {
        $log = $this->makeLog();
        $dbLog = $this->logRepo->find($log->id);
        $dbLog = $dbLog->toArray();
        $this->assertModelData($log->toArray(), $dbLog);
    }

    /**
     * @test update
     */
    public function testUpdateLog()
    {
        $log = $this->makeLog();
        $fakeLog = $this->fakeLogData();
        $updatedLog = $this->logRepo->update($fakeLog, $log->id);
        $this->assertModelData($fakeLog, $updatedLog->toArray());
        $dbLog = $this->logRepo->find($log->id);
        $this->assertModelData($fakeLog, $dbLog->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteLog()
    {
        $log = $this->makeLog();
        $resp = $this->logRepo->delete($log->id);
        $this->assertTrue($resp);
        $this->assertNull(Log::find($log->id), 'Log should not exist in DB');
    }
}
