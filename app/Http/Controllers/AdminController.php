<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = [
            'id' => "2018-106296",
        ];

        return view('admin.dashboard')->with('data', $data);
    }

    public function candidates()
    {
        $data = [
            [
                'name' => "President",
                'candidates' => [
                    [
                        "name" => "John Doesss",
                        "image" => "https://picsum.photos/id/237/1200",
                        "isHidden"=>true,
                        "strand" => [
                            [
                                "name" => "PES",
                            ]
                        ]
                    ],
                    [
                        "name" => "John Doe",
                        "image" => "https://picsum.photos/id/237/1200",
                        "strand" => [
                            [
                                "name" => "PES",
                            ]
                        ]
                    ],
                    [
                        "name" => "John Doe",
                        "image" => "https://picsum.photos/id/237/1200",
                        "strand" => [
                            [
                                "name" => "PES",
                            ]
                        ]
                    ]
                ]
            ],
            [
                'name' => "Vice President",
                'candidates' => [
                    [
                        "name" => "John Deer",
                        "image" => "https://picsum.photos/id/237/1200",
                        "strand" => [
                            [
                                "name" => "MAD",
                            ]
                        ]
                    ]
                ]
            ],
            [
                'name' => "Secretary",
                'candidates' => [
                    [
                        "name" => "John Ding DOng",
                        "image" => "https://picsum.photos/id/237/1200",
                        "strand" => [
                            [
                                "name" => "MOAR",
                            ]
                        ]
                    ]
                ]
            ],
            [
                'name' => "Auditor",
                'candidates' => []
            ],

        ];

        return view('admin.candidates')->with('positions', $data);
    }

    public function candidatesAdd()
    {
        return view('admin.candidates-add');
    }

    public function candidatesUpdate()
    {
        return view('admin.candidates-update');
    }

    public function registry()
    {
        return view('admin.registry');
    }

    public function registryStudent()
    {
        return view('admin.registryStudent');
    }

    public function registryStudentList()
    {
        $students = [
            [
                'status'=>"Voted",
                'cn' => '1',
                'student_number'=>'2018-696969',
                'full_name' => 'Jogn B. Doe',
                'password'=>'1212142346'
            ],
            [
                'status'=>"Voted",
                'cn' => '1',
                'student_number'=>'2018-696969',
                'full_name' => 'Jogn B. Doe',
                'password'=>'1212142346'
            ],
            [
                'status'=>"Voted",
                'cn' => '1',
                'student_number'=>'2018-696969',
                'full_name' => 'Jogn B. Doe',
                'password'=>'1212142346'
            ],
        ];
        return view('admin.registryStudentList',['students'=>$students]);
    }

    public function registrySection()
    {
        return view('admin.registrySection');
    }

    public function registrySectionList()
    {
        $sections = [
            [
                'level'=>"11",
                'strand' => 'abm',
                'section'=>'1',
            ],
            [
                'level'=>"11",
                'strand' => 'abm',
                'section'=>'1',
            ],
            [
                'level'=>"11",
                'strand' => 'abm',
                'section'=>'1',
            ],
        ];
        return view('admin.registrySectionList',['sections'=>$sections]);
    }

    public function results()
    {
        $data = [
            [
                'name' => "President",
                'candidates' => [
                    [
                        "name" => "John Doesss",
                        "strand" => [
                            [
                                "name" => "PES",
                            ]
                        ],
                        "votes" => 20,
                    ],
                    [
                        "name" => "John Doe",
                        "strand" => [
                            [
                                "name" => "PES",
                            ]
                        ],
                        "votes" => 20,
                    ],
                    [
                        "name" => "John Doe",
                        "strand" => [
                            [
                                "name" => "PES",
                            ]
                        ],
                        "votes" => 20,
                    ]
                ]
            ],
            [
                'name' => "Vice President",
                'candidates' => [
                    [
                        "name" => "John Deer",
                        "strand" => [
                            [
                                "name" => "MAD",
                            ]
                        ],
                        "votes" => 20,
                    ]
                ]
            ],
            [
                'name' => "Secretary",
                'candidates' => [
                    [
                        "name" => "John Ding DOng",
                        "strand" => [
                            [
                                "name" => "MOAR",
                            ]
                        ],
                        "votes" => 20,
                    ]
                ]
            ],
            [
                'name' => "Auditor",
                'candidates' => []
            ],
        ];

        return view('admin.results',['positions'=>$data]);
    }

    public function resultsDoc()
    {
        return view('admin.results-doc');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function settingsPrompt()
    {
        return view('admin.settings-prompt');
    }

    public function settingsForm()
    {
        return view('admin.settings-form');
    }
}
