<?php

use Faker\Factory as Faker;
use App\Models\LlamadoConcursos;
use App\Repositories\LlamadoConcursosRepository;

trait MakeLlamadoConcursosTrait
{
    /**
     * Create fake instance of LlamadoConcursos and save it in database
     *
     * @param array $llamadoConcursosFields
     * @return LlamadoConcursos
     */
    public function makeLlamadoConcursos($llamadoConcursosFields = [])
    {
        /** @var LlamadoConcursosRepository $llamadoConcursosRepo */
        $llamadoConcursosRepo = App::make(LlamadoConcursosRepository::class);
        $theme = $this->fakeLlamadoConcursosData($llamadoConcursosFields);
        return $llamadoConcursosRepo->create($theme);
    }

    /**
     * Get fake instance of LlamadoConcursos
     *
     * @param array $llamadoConcursosFields
     * @return LlamadoConcursos
     */
    public function fakeLlamadoConcursos($llamadoConcursosFields = [])
    {
        return new LlamadoConcursos($this->fakeLlamadoConcursosData($llamadoConcursosFields));
    }

    /**
     * Get fake data of LlamadoConcursos
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLlamadoConcursosData($llamadoConcursosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'concurso_id' => $fake->randomDigitNotNull
        ], $llamadoConcursosFields);
    }
}
