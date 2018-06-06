<?php

use Faker\Factory as Faker;
use App\Models\Categoria;
use App\Repositories\CategoriaRepository;

trait MakeCategoriaTrait
{
    /**
     * Create fake instance of Categoria and save it in database
     *
     * @param array $categoriaFields
     * @return Categoria
     */
    public function makeCategoria($categoriaFields = [])
    {
        /** @var CategoriaRepository $categoriaRepo */
        $categoriaRepo = App::make(CategoriaRepository::class);
        $theme = $this->fakeCategoriaData($categoriaFields);
        return $categoriaRepo->create($theme);
    }

    /**
     * Get fake instance of Categoria
     *
     * @param array $categoriaFields
     * @return Categoria
     */
    public function fakeCategoria($categoriaFields = [])
    {
        return new Categoria($this->fakeCategoriaData($categoriaFields));
    }

    /**
     * Get fake data of Categoria
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCategoriaData($categoriaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'nivel' => $fake->word
        ], $categoriaFields);
    }
}
