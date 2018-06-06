<?php

use Faker\Factory as Faker;
use App\Models\Universidad;
use App\Repositories\UniversidadRepository;

trait MakeUniversidadTrait
{
    /**
     * Create fake instance of Universidad and save it in database
     *
     * @param array $universidadFields
     * @return Universidad
     */
    public function makeUniversidad($universidadFields = [])
    {
        /** @var UniversidadRepository $universidadRepo */
        $universidadRepo = App::make(UniversidadRepository::class);
        $theme = $this->fakeUniversidadData($universidadFields);
        return $universidadRepo->create($theme);
    }

    /**
     * Get fake instance of Universidad
     *
     * @param array $universidadFields
     * @return Universidad
     */
    public function fakeUniversidad($universidadFields = [])
    {
        return new Universidad($this->fakeUniversidadData($universidadFields));
    }

    /**
     * Get fake data of Universidad
     *
     * @param array $postFields
     * @return array
     */
    public function fakeUniversidadData($universidadFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word
        ], $universidadFields);
    }
}
