<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use App\Models\Course;
use App\Http\Requests\StoreProfessionRequest;
use Illuminate\View\View;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('professions.create',
            [
                'courses' => Course::all(),
                'professions' => [
                    'Administrator', 'Attorney', 'Data Analyst', 'Systems analyst', 'Architect', 'Autopsy assistant', 'Back-end Developer',
                    'Biomedical', 'Chef', 'Counter', 'Database Administrator', 'Police chief', 'Dentist', 'Designer', 'Economist',
                    'Nurse', 'Civil Engineer', 'Computer Engineer', 'Software Engineer', 'Electrical Engineer', 'Mechanical Engineer',
                    'Physiotherapist', 'Front-end Developer', 'Full-stack Developer', 'Geologist', 'Journalist', 'Judge', 'Coroner',
                    'Veterinary doctor', 'Meteorologist', 'Nutritionist', 'Oceanographer', 'Personal Trainer', 'Teacher', 'Product Owner',
                    'Psychologist', 'Advertising', 'Scrum Master', 'Web Developer', 'Zootechnician'
                ]
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfessionRequest $storeProfessionRequest)
    {
        Profession::create(
            $storeProfessionRequest->validated()
        );
       return redirect()->route('professions.create')->with('success', 'Profession registered successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profession $profession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profession $profession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Profession $profession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profession $profession)
    {
        //
    }
}
