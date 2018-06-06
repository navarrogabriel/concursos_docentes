<?php

use Faker\Factory as Faker;
use App\Models\ConcursoJurado;
use App\Repositories\ConcursoJuradoRepository;

trait MakeConcursoJuradoTrait
{
    /**
     * Create fake instance of ConcursoJurado and save it in database
     *
     * @param array $concursoJuradoFields
     * @return ConcursoJurado
     */
    public function makeConcursoJurado($concursoJuradoFields = [])
    {
        /** @var ConcursoJuradoRepository $concursoJuradoRepo */
        $concursoJuradoRepo = App::make(ConcursoJuradoRepository::class);
        $theme = $this->fakeConcursoJuradoData($concursoJuradoFields);
        return $concursoJuradoRepo->create($theme);
    }

    /**
     * Get fake instance of ConcursoJurado
     *
     * @param array $concursoJuradoFields
     * @return ConcursoJurado
     */
    public function fakeConcursoJurado($concursoJuradoFields = [])
    {
        return new ConcursoJurado($this->fakeConcursoJuradoData($concursoJuradoFields));
    }

    /**
     * Get fake data of ConcursoJurado
     *
     * @param array $postFields
     * @return array
     */
    public function fakeConcursoJuradoData($concursoJuradoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'jurado_id' => $fake->randomDigitNotNull,
            'nivel' => $fake->word,
            'tipo' => $fake->word
        ], $concursoJuradoFields);
    }
}
