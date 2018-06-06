<?php

use Faker\Factory as Faker;
use App\Models\Log;
use App\Repositories\LogRepository;

trait MakeLogTrait
{
    /**
     * Create fake instance of Log and save it in database
     *
     * @param array $logFields
     * @return Log
     */
    public function makeLog($logFields = [])
    {
        /** @var LogRepository $logRepo */
        $logRepo = App::make(LogRepository::class);
        $theme = $this->fakeLogData($logFields);
        return $logRepo->create($theme);
    }

    /**
     * Get fake instance of Log
     *
     * @param array $logFields
     * @return Log
     */
    public function fakeLog($logFields = [])
    {
        return new Log($this->fakeLogData($logFields));
    }

    /**
     * Get fake data of Log
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLogData($logFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'operacion' => $fake->word,
            'fecha' => $fake->date('Y-m-d H:i:s'),
            'tabla' => $fake->word,
            'item_id' => $fake->randomDigitNotNull
        ], $logFields);
    }
}
