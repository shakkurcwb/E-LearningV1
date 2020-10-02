<?php

use App\Services\Education\Forms\StoreFormService;

use App\Libraries\Education\Forms\Type as FormType;
use App\Libraries\Education\Forms\State as FormState;

use App\Libraries\Education\Questions\Type as QuestionType;

use Illuminate\Database\Seeder;

class TutorAdmissionFormTableSeeder extends Seeder
{
    public function run()
    {
        $form = new StoreFormService();
        $form->setAttributes([
            'user_id' => 1,
            'title' => 'Questionario do Tutor',
            'type' => FormType::ADMISSION,
            'state' => FormState::PUBLISHED,
            'tags' => 'Tutor',
            'questions' => [
                [
                    'title' => 'Como você aprendeu o inglês?',
                    'type' => QuestionType::SELECT,
                    'options' => [
                        [
                            'key' => 'particular',
                            'value' => 'Professor Particular',
                        ],
                        [
                            'key' => 'escola',
                            'value' => 'Escola de Idiomas',
                        ],
                        [
                            'key' => 'intercambio',
                            'value' => 'Intercâmbio',
                        ],
                        [
                            'key' => 'sozinho',
                            'value' => 'Estudo Sozinho',
                        ],
                    ],
                    'is_required' => true,
                    'order' => 1,
                ],
                [
                    'title' => 'Quanto tempo demorou para chegar ao nível atual?',
                    'type' => QuestionType::SELECT,
                    'options' => [
                        [
                            'key' => 'menos_um_ano',
                            'value' => 'Menos de Um Ano',
                        ],
                        [
                            'key' => 'um_a_dois_anos',
                            'value' => 'Um a Dois Anos',
                        ],
                        [
                            'key' => 'dois_a_tres_anos',
                            'value' => 'Dois a Três Anos',
                        ],
                        [
                            'key' => 'mais_de_tres_anos',
                            'value' => 'Mais de Três Anos',
                        ],
                    ],
                    'is_required' => true,
                    'order' => 2,
                ],
                [
                    'title' => 'Quais são suas experiências práticas com o inglês?',
                    'type' => QuestionType::CHECK,
                    'is_matchable' => 1,
                    'show_matches' => false,
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
                            'key' => 'estudo',
                            'value' => 'Estudo Fora do País',
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
                    'title' => 'Para quais níveis você deseja dar aula?',
                    'type' => QuestionType::CHECK,
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
                            'value' => 'Business',
                        ],
                    ],
                    'is_required' => true,
                    'order' => 4,
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
                    'order' => 5,
                ],
                [
                    'title' => 'Já teve alguma experiência internacional? Se sim, em quais regiões?',
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
                    'order' => 6,
                ],
            ],
        ]);
        $form = $form->execute();
    }
}