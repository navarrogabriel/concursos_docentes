<?php

use Faker\Factory as Faker;
use App\Models\RequisitoItem;
use App\Repositories\RequisitoItemRepository;

trait MakeRequisitoItemTrait
{
    /**
     * Create fake instance of RequisitoItem and save it in database
     *
     * @param array $requisitoItemFields
     * @return RequisitoItem
     */
    public function makeRequisitoItem($requisitoItemFields = [])
    {
        /** @var RequisitoItemRepository $requisitoItemRepo */
        $requisitoItemRepo = App::make(RequisitoItemRepository::class);
        $theme = $this->fakeRequisitoItemData($requisitoItemFields);
        return $requisitoItemRepo->create($theme);
    }

    /**
     * Get fake instance of RequisitoItem
     *
     * @param array $requisitoItemFields
     * @return RequisitoItem
     */
    public function fakeRequisitoItem($requisitoItemFields = [])
    {
        return new RequisitoItem($this->fakeRequisitoItemData($requisitoItemFields));
    }

    /**
     * Get fake data of RequisitoItem
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRequisitoItemData($requisitoItemFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'requisito_id' => $fake->randomDigitNotNull,
            'descripcion' => $fake->word
        ], $requisitoItemFields);
    }
}
