<?php

use Faker\Factory as Faker;
use App\Models\Requisito;
use App\Repositories\RequisitoRepository;

trait MakeRequisitoTrait
{
    /**
     * Create fake instance of Requisito and save it in database
     *
     * @param array $requisitoFields
     * @return Requisito
     */
    public function makeRequisito($requisitoFields = [])
    {
        /** @var RequisitoRepository $requisitoRepo */
        $requisitoRepo = App::make(RequisitoRepository::class);
        $theme = $this->fakeRequisitoData($requisitoFields);
        return $requisitoRepo->create($theme);
    }

    /**
     * Get fake instance of Requisito
     *
     * @param array $requisitoFields
     * @return Requisito
     */
    public function fakeRequisito($requisitoFields = [])
    {
        return new Requisito($this->fakeRequisitoData($requisitoFields));
    }

    /**
     * Get fake data of Requisito
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRequisitoData($requisitoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'categoria_id' => $fake->randomDigitNotNull,
            'perfil_id' => $fake->randomDigitNotNull,
            'dedicacion' => $fake->word,
            'descripcion' => $fake->word
        ], $requisitoFields);
    }
}
