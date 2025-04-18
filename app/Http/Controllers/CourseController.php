<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;

class CourseController extends Controller
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
    public function create()
    {
        $courses = [
            'Business Administration', 'Architecture', 'Biomedicine', 'Accounting Sciences', 'computer Science', 'Design', 'Right',
            'Economy', 'Physical education', 'Nursing', 'Civil Engineering', 'Computer Engineering', 'Software Engineering',
            'Electronic Engineering', 'Mechanical Engineering', 'Physiotherapy', 'Geology', 'Gastronomy', 'Journalism', 'Medicine',
            'Veterinary medicine', 'Meteorology', 'Nutrition', 'Oceanography', 'Dentistry', 'Pedagogy', 'Psychology',
            'Advertising and propaganda', 'Information System', 'There is no need for higher education training.',
            'Technologist in Systems Analysis and Development', 'Zootechnics'
        ];
        return view('courses.create', ['courses' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $storeCourseRequest)
    {
        Course::create(
            $storeCourseRequest->validated()
        );
        return redirect()->route('courses.create')->with('success','Course registered successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
