<?php

use Faker\Factory as Faker;
use App\Models\ConcursoPostulante;
use App\Repositories\ConcursoPostulanteRepository;

trait MakeConcursoPostulanteTrait
{
    /**
     * Create fake instance of ConcursoPostulante and save it in database
     *
     * @param array $concursoPostulanteFields
     * @return ConcursoPostulante
     */
    public function makeConcursoPostulante($concursoPostulanteFields = [])
    {
        /** @var ConcursoPostulanteRepository $concursoPostulanteRepo */
        $concursoPostulanteRepo = App::make(ConcursoPostulanteRepository::class);
        $theme = $this->fakeConcursoPostulanteData($concursoPostulanteFields);
        return $concursoPostulanteRepo->create($theme);
    }

    /**
     * Get fake instance of ConcursoPostulante
     *
     * @param array $concursoPostulanteFields
     * @return ConcursoPostulante
     */
    public function fakeConcursoPostulante($concursoPostulanteFields = [])
    {
        return new ConcursoPostulante($this->fakeConcursoPostulanteData($concursoPostulanteFields));
    }

    /**
     * Get fake data of ConcursoPostulante
     *
     * @param array $postFields
     * @return array
     */
    public function fakeConcursoPostulanteData($concursoPostulanteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'postulante_id' => $fake->randomDigitNotNull,
            'cumpleRequisitos' => $fake->word,
            'fechaPresentacion' => $fake->date('Y-m-d H:i:s'),
            'tipo' => $fake->word,
            'ordenMerito' => $fake->word
        ], $concursoPostulanteFields);
    }
}
