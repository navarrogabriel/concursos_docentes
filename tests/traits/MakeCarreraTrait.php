<?php

use Faker\Factory as Faker;
use App\Models\Carrera;
use App\Repositories\CarreraRepository;

trait MakeCarreraTrait
{
    /**
     * Create fake instance of Carrera and save it in database
     *
     * @param array $carreraFields
     * @return Carrera
     */
    public function makeCarrera($carreraFields = [])
    {
        /** @var CarreraRepository $carreraRepo */
        $carreraRepo = App::make(CarreraRepository::class);
        $theme = $this->fakeCarreraData($carreraFields);
        return $carreraRepo->create($theme);
    }

    /**
     * Get fake instance of Carrera
     *
     * @param array $carreraFields
     * @return Carrera
     */
    public function fakeCarrera($carreraFields = [])
    {
        return new Carrera($this->fakeCarreraData($carreraFields));
    }

    /**
     * Get fake data of Carrera
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCarreraData($carreraFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'instituto_id' => $fake->randomDigitNotNull
        ], $carreraFields);
    }
}
