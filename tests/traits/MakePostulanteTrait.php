<?php

use Faker\Factory as Faker;
use App\Models\Postulante;
use App\Repositories\PostulanteRepository;

trait MakePostulanteTrait
{
    /**
     * Create fake instance of Postulante and save it in database
     *
     * @param array $postulanteFields
     * @return Postulante
     */
    public function makePostulante($postulanteFields = [])
    {
        /** @var PostulanteRepository $postulanteRepo */
        $postulanteRepo = App::make(PostulanteRepository::class);
        $theme = $this->fakePostulanteData($postulanteFields);
        return $postulanteRepo->create($theme);
    }

    /**
     * Get fake instance of Postulante
     *
     * @param array $postulanteFields
     * @return Postulante
     */
    public function fakePostulante($postulanteFields = [])
    {
        return new Postulante($this->fakePostulanteData($postulanteFields));
    }

    /**
     * Get fake data of Postulante
     *
     * @param array $postFields
     * @return array
     */
    public function fakePostulanteData($postulanteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombres' => $fake->word,
            'apellidos' => $fake->word,
            'documento' => $fake->word,
            'telefono' => $fake->word,
            'celular' => $fake->word,
            'email' => $fake->word,
            'direccion' => $fake->word
        ], $postulanteFields);
    }
}
