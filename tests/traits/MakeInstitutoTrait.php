<?php

use Faker\Factory as Faker;
use App\Models\Instituto;
use App\Repositories\InstitutoRepository;

trait MakeInstitutoTrait
{
    /**
     * Create fake instance of Instituto and save it in database
     *
     * @param array $institutoFields
     * @return Instituto
     */
    public function makeInstituto($institutoFields = [])
    {
        /** @var InstitutoRepository $institutoRepo */
        $institutoRepo = App::make(InstitutoRepository::class);
        $theme = $this->fakeInstitutoData($institutoFields);
        return $institutoRepo->create($theme);
    }

    /**
     * Get fake instance of Instituto
     *
     * @param array $institutoFields
     * @return Instituto
     */
    public function fakeInstituto($institutoFields = [])
    {
        return new Instituto($this->fakeInstitutoData($institutoFields));
    }

    /**
     * Get fake data of Instituto
     *
     * @param array $postFields
     * @return array
     */
    public function fakeInstitutoData($institutoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word
        ], $institutoFields);
    }
}
