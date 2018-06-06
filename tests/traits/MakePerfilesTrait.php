<?php

use Faker\Factory as Faker;
use App\Models\Perfiles;
use App\Repositories\PerfilesRepository;

trait MakePerfilesTrait
{
    /**
     * Create fake instance of Perfiles and save it in database
     *
     * @param array $perfilesFields
     * @return Perfiles
     */
    public function makePerfiles($perfilesFields = [])
    {
        /** @var PerfilesRepository $perfilesRepo */
        $perfilesRepo = App::make(PerfilesRepository::class);
        $theme = $this->fakePerfilesData($perfilesFields);
        return $perfilesRepo->create($theme);
    }

    /**
     * Get fake instance of Perfiles
     *
     * @param array $perfilesFields
     * @return Perfiles
     */
    public function fakePerfiles($perfilesFields = [])
    {
        return new Perfiles($this->fakePerfilesData($perfilesFields));
    }

    /**
     * Get fake data of Perfiles
     *
     * @param array $postFields
     * @return array
     */
    public function fakePerfilesData($perfilesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word
        ], $perfilesFields);
    }
}
