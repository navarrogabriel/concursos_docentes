<?php

use Faker\Factory as Faker;
use App\Models\RequisitoPostulante;
use App\Repositories\RequisitoPostulanteRepository;

trait MakeRequisitoPostulanteTrait
{
    /**
     * Create fake instance of RequisitoPostulante and save it in database
     *
     * @param array $requisitoPostulanteFields
     * @return RequisitoPostulante
     */
    public function makeRequisitoPostulante($requisitoPostulanteFields = [])
    {
        /** @var RequisitoPostulanteRepository $requisitoPostulanteRepo */
        $requisitoPostulanteRepo = App::make(RequisitoPostulanteRepository::class);
        $theme = $this->fakeRequisitoPostulanteData($requisitoPostulanteFields);
        return $requisitoPostulanteRepo->create($theme);
    }

    /**
     * Get fake instance of RequisitoPostulante
     *
     * @param array $requisitoPostulanteFields
     * @return RequisitoPostulante
     */
    public function fakeRequisitoPostulante($requisitoPostulanteFields = [])
    {
        return new RequisitoPostulante($this->fakeRequisitoPostulanteData($requisitoPostulanteFields));
    }

    /**
     * Get fake data of RequisitoPostulante
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRequisitoPostulanteData($requisitoPostulanteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'postulante_id' => $fake->randomDigitNotNull,
            'requisitoEstado' => $fake->word
        ], $requisitoPostulanteFields);
    }
}
