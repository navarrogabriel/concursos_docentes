<?php

use Faker\Factory as Faker;
use App\Models\Jurado;
use App\Repositories\JuradoRepository;

trait MakeJuradoTrait
{
    /**
     * Create fake instance of Jurado and save it in database
     *
     * @param array $juradoFields
     * @return Jurado
     */
    public function makeJurado($juradoFields = [])
    {
        /** @var JuradoRepository $juradoRepo */
        $juradoRepo = App::make(JuradoRepository::class);
        $theme = $this->fakeJuradoData($juradoFields);
        return $juradoRepo->create($theme);
    }

    /**
     * Get fake instance of Jurado
     *
     * @param array $juradoFields
     * @return Jurado
     */
    public function fakeJurado($juradoFields = [])
    {
        return new Jurado($this->fakeJuradoData($juradoFields));
    }

    /**
     * Get fake data of Jurado
     *
     * @param array $postFields
     * @return array
     */
    public function fakeJuradoData($juradoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'categoria_id' => $fake->randomDigitNotNull,
            'nombres' => $fake->word,
            'apellidos' => $fake->word,
            'documento' => $fake->word,
            'telefono' => $fake->word,
            'celular' => $fake->word,
            'email' => $fake->word,
            'direccion' => $fake->word
        ], $juradoFields);
    }
}
