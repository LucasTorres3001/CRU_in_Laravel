<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Photo;
use App\Models\Profession;
use App\Models\Location;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\StorePhotosRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\UpdatePhotosRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');
        if ($search):
            $employees = Employee::where('cpf','LIKE',"%{$search}%")->get();
        else:
            $employees = Employee::all();
        endif;
        return view('/home',
            [
                'employees' => $employees,
                'search' => $search
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create',
            [
                'locations' => Location::all(),
                'professions' => Profession::all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $storeEmployeeRequest, StorePhotosRequest $storePhotosRequest)
    {
        $employee = Employee::create(
            $storeEmployeeRequest->validated()
        );
        if ($storePhotosRequest->hasFile('photos')):
            foreach ($storePhotosRequest->file('photos') as $photo):
                $photoName = sha1($photo->getClientOriginalName().time()).".{$photo->getClientOriginalExtension()}";
                $photo->move(public_path('employees/img/'), $photoName);
                $employee->photos()->create(
                    ['file_path' => $photoName]
                );
            endforeach;
        endif;
        return redirect()->route('employees.create')->with('success', 'Employee successfully registered!');
    }

    public function dashboard()
    {
        return view('employees.dashboard', ['employees' => Employee::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        return view('employees.edit',
            [
                'employee' => Employee::where('slug', $slug)->firstOrFail(),
                'locations' => Location::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $updateEmployeeRequest, UpdatePhotosRequest $updatePhotosRequest, string $slug)
    {
        $employee = Employee::where('slug', $slug)->firstOrFail();
        $employee->update(
            $updateEmployeeRequest->validated()
        );
        if ($updatePhotosRequest->hasFile('new_photos')):
            if ($employee->photos->count() > 0):
                foreach ($employee->photos as $photo):
                    $imagePath = public_path('\\employees\img\\'.$photo->file_path);
                    if (is_file($imagePath)):
                        unlink($imagePath);
                    endif;
                endforeach;
                $employee->photos()->delete();
            endif;
            foreach ($updatePhotosRequest->file('new_photos') as $photos):
                $photoName = sha1($photos->getClientOriginalName().time()).".{$photos->getClientOriginalExtension()}";
                $photos->move(public_path('employees/img/'), $photoName);
                $employee->photos()->create(
                    ['file_path' => $photoName]
                );
            endforeach;
        endif;
        return redirect()->route('employees.dashboard')->with('success', 'Employee data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        Employee::where('slug', $slug)->firstOrFail()->delete();
        return redirect()->route('employees.dashboard')->with('success', 'User deleted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $employee = Employee::where('slug', $slug)->firstOrFail();
        return view('employees.show',
            [
                'employee' => $employee
            ]
        );
    }
}
