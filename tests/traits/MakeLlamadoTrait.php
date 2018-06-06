<?php

use Faker\Factory as Faker;
use App\Models\Llamado;
use App\Repositories\LlamadoRepository;

trait MakeLlamadoTrait
{
    /**
     * Create fake instance of Llamado and save it in database
     *
     * @param array $llamadoFields
     * @return Llamado
     */
    public function makeLlamado($llamadoFields = [])
    {
        /** @var LlamadoRepository $llamadoRepo */
        $llamadoRepo = App::make(LlamadoRepository::class);
        $theme = $this->fakeLlamadoData($llamadoFields);
        return $llamadoRepo->create($theme);
    }

    /**
     * Get fake instance of Llamado
     *
     * @param array $llamadoFields
     * @return Llamado
     */
    public function fakeLlamado($llamadoFields = [])
    {
        return new Llamado($this->fakeLlamadoData($llamadoFields));
    }

    /**
     * Get fake data of Llamado
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLlamadoData($llamadoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'codigo' => $fake->word,
            'año' => $fake->word,
            'fechaInicio' => $fake->date('Y-m-d H:i:s'),
            'fechaFin' => $fake->date('Y-m-d H:i:s')
        ], $llamadoFields);
    }
}
