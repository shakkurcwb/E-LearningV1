<?php

use App\Services\Education\Forms\StoreFormService;

use App\Libraries\Education\Forms\Type as FormType;
use App\Libraries\Education\Forms\State as FormState;

use App\Libraries\Education\Questions\Type as QuestionType;

use Illuminate\Database\Seeder;

class StudentAuditionFormTableSeeder extends Seeder
{
    public function run()
    {
        $form = new StoreFormService();
        $form->setAttributes([
            'user_id' => 1,
            'title' => 'Feedback do Aluno',
            'type' => FormType::AUDITION,
            'state' => FormState::PUBLISHED,
            'tags' => 'Student',
            'questions' => [
                [
                    'title' => 'Avalie a Plataforma',
                    'type' => QuestionType::SELECT,
                    'options' => [
                        [
                            'key' => 'excelente',
                            'value' => 'Excelente',
                        ],
                        [
                            'key' => 'otimo',
                            'value' => 'Otimo',
                        ],
                        [
                            'key' => 'regular',
                            'value' => 'Regular',
                        ],
                        [
                            'key' => 'ruim',
                            'value' => 'Ruim',
                        ],
                        [
                            'key' => 'pessimo',
                            'value' => 'Pessimo',
                        ],
                    ],
                    'is_required' => true,
                    'order' => 1,
                ],
                [
                    'title' => 'Avalie a Aula',
                    'type' => QuestionType::SELECT,
                    'options' => [
                        [
                            'key' => 'excelente',
                            'value' => 'Excelente',
                        ],
                        [
                            'key' => 'otimo',
                            'value' => 'Otimo',
                        ],
                        [
                            'key' => 'regular',
                            'value' => 'Regular',
                        ],
                        [
                            'key' => 'ruim',
                            'value' => 'Ruim',
                        ],
                        [
                            'key' => 'pessimo',
                            'value' => 'Pessimo',
                        ],
                    ],
                    'is_required' => true,
                    'order' => 2,
                ],
                [
                    'title' => 'Avalie o Tutor',
                    'type' => QuestionType::SELECT,
                    'options' => [
                        [
                            'key' => 'excelente',
                            'value' => 'Excelente',
                        ],
                        [
                            'key' => 'otimo',
                            'value' => 'Otimo',
                        ],
                        [
                            'key' => 'regular',
                            'value' => 'Regular',
                        ],
                        [
                            'key' => 'ruim',
                            'value' => 'Ruim',
                        ],
                        [
                            'key' => 'pessimo',
                            'value' => 'Pessimo',
                        ],
                    ],
                    'is_required' => true,
                    'order' => 3,
                ],
                [
                    'title' => 'Avalie sua Satisfação Geral',
                    'type' => QuestionType::SELECT,
                    'options' => [
                        [
                            'key' => 'excelente',
                            'value' => 'Excelente',
                        ],
                        [
                            'key' => 'otimo',
                            'value' => 'Otimo',
                        ],
                        [
                            'key' => 'regular',
                            'value' => 'Regular',
                        ],
                        [
                            'key' => 'ruim',
                            'value' => 'Ruim',
                        ],
                        [
                            'key' => 'pessimo',
                            'value' => 'Pessimo',
                        ],
                    ],
                    'is_required' => true,
                    'order' => 4,
                ],
            ],
        ]);
        $form = $form->execute();
    }
}