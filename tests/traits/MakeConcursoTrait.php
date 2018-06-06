<?php

use Faker\Factory as Faker;
use App\Models\Concurso;
use App\Repositories\ConcursoRepository;

trait MakeConcursoTrait
{
    /**
     * Create fake instance of Concurso and save it in database
     *
     * @param array $concursoFields
     * @return Concurso
     */
    public function makeConcurso($concursoFields = [])
    {
        /** @var ConcursoRepository $concursoRepo */
        $concursoRepo = App::make(ConcursoRepository::class);
        $theme = $this->fakeConcursoData($concursoFields);
        return $concursoRepo->create($theme);
    }

    /**
     * Get fake instance of Concurso
     *
     * @param array $concursoFields
     * @return Concurso
     */
    public function fakeConcurso($concursoFields = [])
    {
        return new Concurso($this->fakeConcursoData($concursoFields));
    }

    /**
     * Get fake data of Concurso
     *
     * @param array $postFields
     * @return array
     */
    public function fakeConcursoData($concursoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'asignatura_id' => $fake->randomDigitNotNull,
            'perfil_id' => $fake->randomDigitNotNull,
            'categoria_id' => $fake->randomDigitNotNull,
            'referenciaGeneral' => $fake->word,
            'referenciaInstituto' => $fake->word,
            'cargos' => $fake->word,
            'lineaDesarrollo' => $fake->word,
            'requisitos' => $fake->word,
            'expediente' => $fake->word,
            'fechaSustanciacion' => $fake->date('Y-m-d H:i:s'),
            'usuarioSustanciacion' => $fake->randomDigitNotNull,
            'usuarioCierre' => $fake->randomDigitNotNull,
            'observaciones' => $fake->word,
            'fechaInicio' => $fake->date('Y-m-d H:i:s'),
            'fechaFin' => $fake->date('Y-m-d H:i:s'),
            'estado' => $fake->word,
            'dedicacion' => $fake->word,
            'dictamen' => $fake->word
        ], $concursoFields);
    }
}
