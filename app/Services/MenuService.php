<?php

namespace App\Services;

use App\DomainParams\Candidates;
use Illuminate\Support\Facades\Auth;

class MenuService {
   private $data = [
                      ['label'=>'Dashboard', 'url'=>'/dashboard', 'img'=>'img/icons/grid.png','active'=>0],
                      ['label'=>'Vacancies/Jobs','url' => '/vacancy/list','img'=>'img/icons/old-fashion-briefcase.png', 'active'=>0, 'children'=>[
                                   ['label'=> 'Manage Vacancy', 'url'=>'/vacancy/list','img'=>'img/icons/teamwork.png','active'=>0],
                                   ['label'=> 'Create Vacancy', 'url'=>'/vacancy/add','img'=>'img/icons/add-plus-button.png','active'=>0],
                                   ['label'=> 'Vacancy Archive', 'url'=>'/vacancy/archive','img'=>'img/icons/archive-white-box.png','active'=>0],
                                   ['label'=> 'Test Task', 'url'=>'/vacancy/test-tasks/list','img'=>'img/icons/tasks-list.png','active'=>0],
                                   ['label'=> 'Welcome Messages', 'url'=>'/vacancy/welcome-messages/','img'=>'img/icons/two-speech-bubbles.png','active'=>0],
                                   ['label'=> 'Categories', 'url'=>'/vacancy/categories','img'=>'img/icons/tasks-list.png','active'=>0]
                                   ]
                       ],
                       ['label'=>'Candidates','url' => '/candidate/list','img'=>'img/icons/teamwork.png', 'active'=>0, 'children'=>[
                                   ['label'=> 'List of Candidate', 'url'=>'/candidate/list','img'=>'img/icons/bulleted-list-white.png','active'=>0],
                                   ['label'=> 'Add Candidate', 'url'=>'/candidate/add','img'=>'img/icons/add-plus-button.png','active'=>0],
                                   ['label'=> 'Type Candidate', 'url'=>'/candidate/type/list','img'=>'img/icons/bulleted-list-white.png','active'=>0]
                                   ]
                       ],
                        ['label'=>'Clients','url' => '/clients/list','img'=>'img/icons/teamwork.png', 'active'=>0, 'children'=>[
                           ['label'=> 'List of Clients', 'url'=>'/clients/list','img'=>'img/icons/bulleted-list-white.png','active'=>0],
                           ['label'=> 'Add Client', 'url'=>'/clients/add','img'=>'img/icons/add-plus-button.png','active'=>0]
                       ]
                       ],
                       ['label'=>'Messages', 'url'=>'/messages','img'=>'img/icons/close-envelope.png', 'active'=>0],
                       ['label'=>'Interviews Agenta', 'url'=>'/interview/list','img'=>'img/icons/meeting-room.png', 'active'=>0, 'children' => [
                           ['label'=> 'List of Interview', 'url'=>'/interview/list','img'=>'img/icons/bulleted-list-white.png','active'=>0],
                           ['label'=> 'Add Interview', 'url'=>'/interview/create','img'=>'img/icons/add-plus-button.png','active'=>0]
                       ]],
                       ['label'=>'Statistics', 'url'=>'/statistics','img'=>'img/icons/pie-chart.png', 'active'=>0],
                       ['label'=>'Recruiters', 'url'=>'/recruites','img'=>'img/icons/male-job-search-symbol.png', 'active'=>0]
                    ];
    private $data_roles = [
        ['label'=>'Dashboard', 'url'=>'/dashboard', 'img'=>'img/icons/grid.png','active'=>0],
        ['label'=>'Vacancies/Jobs','url' => '/vacancy/list','img'=>'img/icons/old-fashion-briefcase.png', 'active'=>0, 'children'=>[
            ['label'=> 'Manage Vacancy', 'url'=>'/vacancy/list','img'=>'img/icons/teamwork.png','active'=>0],
            ['label'=> 'Create Vacancy', 'url'=>'/vacancy/add','img'=>'img/icons/add-plus-button.png','active'=>0],
        ]
        ],
        ['label'=>'Candidates','url' => '/candidate/list','img'=>'img/icons/teamwork.png', 'active'=>0, 'children'=>[
            ['label'=> 'List of Candidate', 'url'=>'/candidate/list','img'=>'img/icons/bulleted-list-white.png','active'=>0],
        ]
        ],
    ];


    public function getMenu()
    {
        if(Auth::user()['role'] == Candidates::CLIENT_ROLE){
            return $this->data_roles;
        }
        return $this->data;
    }

    public function isCurrent($routName){
        foreach ($this->data as $key => $name ){
            if ($name['url'] == '/'.$routName) {
                $this->data[$key]['active'] = 1;
            }

            if (array_key_exists('children', $name)) {
                foreach ($name['children'] as $key2 => $subName) {
                    if ($subName['url'] == '/'. $routName) {
                        $this->data[$key]['active'] = 1;
                        $this->data[$key]['children'][$key2]['active'] = 1;
                    }
                }
            }
        }
    }


}