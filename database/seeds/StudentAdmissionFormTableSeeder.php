<?php

use App\Services\Education\Forms\StoreFormService;

use App\Libraries\Education\Forms\Type as FormType;
use App\Libraries\Education\Forms\State as FormState;

use App\Libraries\Education\Questions\Type as QuestionType;

use Illuminate\Database\Seeder;

class StudentAdmissionFormTableSeeder extends Seeder
{
    public function run()
    {
        $form = new StoreFormService();
        $form->setAttributes([
            'user_id' => 1,
            'title' => 'Questionario do Aluno',
            'type' => FormType::ADMISSION,
            'state' => FormState::PUBLISHED,
            'tags' => 'Student',
            'questions' => [
                [
                    'title' => 'Você já estudou inglês antes?',
                    'type' => QuestionType::SELECT,
                    'options' => [
                        [
                            'key' => 'particular',
                            'value' => 'Sim, com Professor Particular',
                        ],
                        [
                            'key' => 'escola',
                            'value' => 'Sim, em Escola de Idiomas',
                        ],
                        [
                            'key' => 'intercambio',
                            'value' => 'Sim, fiz Intercâmbio',
                        ],
                        [
                            'key' => 'sozinho',
                            'value' => 'Estudo Sozinho',
                        ],
                        [
                            'key' => 'nunca',
                            'value' => 'Nunca Estudei',
                        ],
                    ],
                    'is_required' => true,
                    'order' => 1,
                ],
                [
                    'title' => 'Você se considera em qual nível no inglês?',
                    'type' => QuestionType::SELECT,
                    'is_matchable' => 1,
                    'show_matches' => false,
                    'options' => [
                        [
                            'key' => 'basico',
                            'value' => 'Básico',
                        ],
                        [
                            'key' => 'intermediario',
                            'value' => 'Intermediário',
                        ],
                        [
                            'key' => 'avancado',
                            'value' => 'Avançado',
                        ],
                        [
                            'key' => 'fluente',
                            'value' => 'Fluente',
                        ],
                    ],
                    'is_required' => true,
                    'order' => 2,
                ],
                [
                    'title' => 'Quais são suas motivações para aprender inglês?',
                    'type' => QuestionType::CHECK,
                    'options' => [
                        [
                            'key' => 'trabalho',
                            'value' => 'Aplicar em meu Trabalho',
                        ],
                        [
                            'key' => 'viagem',
                            'value' => 'Viagem para outros Países',
                        ],
                        [
                            'key' => 'gosto',
                            'value' => 'Eu Gosto do Idioma',
                        ],
                        [
                            'key' => 'desafio',
                            'value' => 'É um Desafio Pessoal',
                        ],
                        [
                            'key' => 'outros',
                            'value' => 'Outras Motivações',
                        ],
                    ],
                    'is_required' => true,
                    'order' => 3,
                ],
                [
                    'title' => 'Quais seus ramos de atuação profissional?',
                    'type' => QuestionType::CHECK,
                    'is_matchable' => 1,
                    'show_matches' => true,
                    'options' => [
                        [
                            'key' => 'industria',
                            'value' => 'Indústria',
                        ],
                        [
                            'key' => 'construcao',
                            'value' => 'Construção Civil',
                        ],
                        [
                            'key' => 'direito',
                            'value' => 'Direito',
                        ],
                        [
                            'key' => 'saude',
                            'value' => 'Saúde',
                        ],
                        [
                            'key' => 'financeiro',
                            'value' => 'Financeiro',
                        ],
                        [
                            'key' => 'contabil',
                            'value' => 'Contábil',
                        ],
                        [
                            'key' => 'tecnologia',
                            'value' => 'Tecnologia',
                        ],
                        [
                            'key' => 'comercio',
                            'value' => 'Comércio',
                        ],
                        [
                            'key' => 'administracao',
                            'value' => 'Administração',
                        ],
                        [
                            'key' => 'relacoes_internacionais',
                            'value' => 'Relações Internacionais',
                        ],
                    ],
                    'is_required' => true,
                    'order' => 4,
                ],
                [
                    'title' => 'Você tem vontade de fazer intercâmbio? Se sim, para quais regiões?',
                    'type' => QuestionType::CHECK,
                    'options' => [
                        [
                            'key' => 'nao',
                            'value' => 'Não Tenho Interesse',
                        ],
                        [
                            'key' => 'america_sul',
                            'value' => 'América do Sul',
                        ],
                        [
                            'key' => 'america_central',
                            'value' => 'América Central',
                        ],
                        [
                            'key' => 'america_norte',
                            'value' => 'América do Norte',
                        ],
                        [
                            'key' => 'europa',
                            'value' => 'Europa',
                        ],
                        [
                            'key' => 'africa',
                            'value' => 'África',
                        ],
                        [
                            'key' => 'asia',
                            'value' => 'Ásia',
                        ],
                        [
                            'key' => 'oceania',
                            'value' => 'Oceania',
                        ],
                    ],
                    'is_required' => true,
                    'order' => 5,
                ],
            ],
        ]);
        $form = $form->execute();
    }
}