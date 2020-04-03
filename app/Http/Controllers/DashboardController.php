<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function instructions()
    {
        return view('dashboard/instructions');
    }

    public function logout()
    {
        return view('dashboard.logout');
    }

    public function overview()
    {
        $data = [];
        $candidates = [
            [
                "id" => 1,
                "name" => 'Geralt Dean',
                "type" => "president",
            ],
            [
                "id" => 2,
                "name" => 'Geralt Dean',
                "type" => "vice_president",
            ],
            [
                "id" => 3,
                "name" => 'Abstained',
                "type" => "secretary",
            ],
            [
                "id" => 4,
                "name" => 'Geralt Dean',
                "type" => "treasurer",
            ],
            [
                "id" => 5,
                "name" => 'Geralt Dean',
                "type" => "auditor",
            ],
        ];
        $data = [
            'candidates' => $candidates
        ];
        return view('dashboard.overview', $data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $candidates = [
            [
                "id" => 1,
                "img" => 'https://picsum.photos/id/237/1200',
                "name" => 'Geralt Dean',
                "type" => "president",
            ],
            [
                "id" => 2,
                "img" => 'https://picsum.photos/id/237/1200',
                "name" => 'John Doe',
                "type" => "president",
            ],
            [
                "id" => 3,
                "img" => 'https://picsum.photos/id/237/1200',
                "name" => 'Mary Jane',
                "type" => "president",
            ],
            [
                "id" => 4,
                "img" => 'https://picsum.photos/id/237/1200',
                "name" => 'Geralt Dean',
                "type" => "vice_president",
            ],
            [
                "id" => 5,
                "img" => 'https://picsum.photos/id/237/1200',
                "name" => 'Geralt Dean',
                "type" => "secretary",
            ],
            [
                "id" => 6,
                "img" => 'https://picsum.photos/id/237/1200',
                "name" => 'Geralt Dean',
                "type" => "treasurer",
            ],
            [
                "id" => 7,
                "img" => 'https://picsum.photos/id/237/1200',
                "name" => 'Geralt Dean',
                "type" => "auditor",
            ],
        ];
        $data = [
            'candidates' => $candidates
        ];
        return view('dashboard.vote', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
