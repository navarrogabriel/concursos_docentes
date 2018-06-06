<?php

use Faker\Factory as Faker;
use App\Models\Asignatura;
use App\Repositories\AsignaturaRepository;

trait MakeAsignaturaTrait
{
    /**
     * Create fake instance of Asignatura and save it in database
     *
     * @param array $asignaturaFields
     * @return Asignatura
     */
    public function makeAsignatura($asignaturaFields = [])
    {
        /** @var AsignaturaRepository $asignaturaRepo */
        $asignaturaRepo = App::make(AsignaturaRepository::class);
        $theme = $this->fakeAsignaturaData($asignaturaFields);
        return $asignaturaRepo->create($theme);
    }

    /**
     * Get fake instance of Asignatura
     *
     * @param array $asignaturaFields
     * @return Asignatura
     */
    public function fakeAsignatura($asignaturaFields = [])
    {
        return new Asignatura($this->fakeAsignaturaData($asignaturaFields));
    }

    /**
     * Get fake data of Asignatura
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAsignaturaData($asignaturaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'area_id' => $fake->randomDigitNotNull
        ], $asignaturaFields);
    }
}
