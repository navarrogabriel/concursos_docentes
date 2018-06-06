<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LogApiTest extends TestCase
{
    use MakeLogTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLog()
    {
        $log = $this->fakeLogData();
        $this->json('POST', '/api/v1/logs', $log);

        $this->assertApiResponse($log);
    }

    /**
     * @test
     */
    public function testReadLog()
    {
        $log = $this->makeLog();
        $this->json('GET', '/api/v1/logs/'.$log->id);

        $this->assertApiResponse($log->toArray());
    }

    /**
     * @test
     */
    public function testUpdateLog()
    {
        $log = $this->makeLog();
        $editedLog = $this->fakeLogData();

        $this->json('PUT', '/api/v1/logs/'.$log->id, $editedLog);

        $this->assertApiResponse($editedLog);
    }

    /**
     * @test
     */
    public function testDeleteLog()
    {
        $log = $this->makeLog();
        $this->json('DELETE', '/api/v1/logs/'.$log->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/logs/'.$log->id);

        $this->assertResponseStatus(404);
    }
}
