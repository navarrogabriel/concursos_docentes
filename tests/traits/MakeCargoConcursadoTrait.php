<?php

use Faker\Factory as Faker;
use App\Models\CargoConcursado;
use App\Repositories\CargoConcursadoRepository;

trait MakeCargoConcursadoTrait
{
    /**
     * Create fake instance of CargoConcursado and save it in database
     *
     * @param array $cargoConcursadoFields
     * @return CargoConcursado
     */
    public function makeCargoConcursado($cargoConcursadoFields = [])
    {
        /** @var CargoConcursadoRepository $cargoConcursadoRepo */
        $cargoConcursadoRepo = App::make(CargoConcursadoRepository::class);
        $theme = $this->fakeCargoConcursadoData($cargoConcursadoFields);
        return $cargoConcursadoRepo->create($theme);
    }

    /**
     * Get fake instance of CargoConcursado
     *
     * @param array $cargoConcursadoFields
     * @return CargoConcursado
     */
    public function fakeCargoConcursado($cargoConcursadoFields = [])
    {
        return new CargoConcursado($this->fakeCargoConcursadoData($cargoConcursadoFields));
    }

    /**
     * Get fake data of CargoConcursado
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCargoConcursadoData($cargoConcursadoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'registro_id' => $fake->randomDigitNotNull,
            'universidad_id' => $fake->randomDigitNotNull,
            'categoria_id' => $fake->randomDigitNotNull,
            'dedicacion' => $fake->word,
            'registroTipo' => $fake->word
        ], $cargoConcursadoFields);
    }
}
