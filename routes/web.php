<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientToDoctorController;
use App\Http\Controllers\PatientToNurseController;
use App\Http\Controllers\RemovePatientFromBedController;
use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Everything below contains (demo) patient data, so it sits behind the staff login.
Route::middleware('staff')->group(function () {
    Route::get('/statistics', [StatisticsController::class, 'index']);

    Route::get('/patients', [PatientController::class, 'index']);
    Route::get('/patients/create', [PatientController::class, 'create']);
    Route::post('/patients', [PatientController::class, 'store']);
    Route::get('/patients/{patient}', [PatientController::class, 'show'])->whereNumber('patient');
    Route::get('/patients/{patient}/edit', [PatientController::class, 'edit'])->whereNumber('patient');
    Route::put('/patients/{patient}', [PatientController::class, 'update'])->whereNumber('patient')->name('patients.update');
    Route::post('/patients/{patient}/discharge', [PatientController::class, 'discharge'])->whereNumber('patient');

    Route::get('/doctors', [DoctorController::class, 'index']);
    Route::get('/doctors/create', [DoctorController::class, 'create']);
    Route::post('/doctors', [DoctorController::class, 'store']);
    Route::get('/doctors/{doctor}', [DoctorController::class, 'show'])->whereNumber('doctor');
    Route::get('/doctors/{doctor}/edit', [DoctorController::class, 'edit'])->whereNumber('doctor');
    Route::put('/doctors/{doctor}', [DoctorController::class, 'update'])->whereNumber('doctor')->name('doctors.update');
    Route::delete('/doctors/{doctor}', [DoctorController::class, 'destroy'])->whereNumber('doctor');

    Route::get('/nurses', [NurseController::class, 'index']);
    Route::get('/nurses/create', [NurseController::class, 'create']);
    Route::post('/nurses', [NurseController::class, 'store']);
    Route::get('/nurses/{nurse}', [NurseController::class, 'show'])->whereNumber('nurse');
    Route::get('/nurses/{nurse}/edit', [NurseController::class, 'edit'])->whereNumber('nurse');
    Route::put('/nurses/{nurse}', [NurseController::class, 'update'])->whereNumber('nurse')->name('nurses.update');
    Route::delete('/nurses/{nurse}', [NurseController::class, 'destroy'])->whereNumber('nurse');

    Route::get('/beds', [BedController::class, 'index']);
    Route::get('/beds/create', [BedController::class, 'create']);
    Route::post('/beds', [BedController::class, 'store']);
    Route::get('/beds/{bed}', [BedController::class, 'show'])->whereNumber('bed');
    Route::delete('/beds/{bed}', [BedController::class, 'destroy'])->whereNumber('bed');

    // Assignments
    Route::get('/assign/assign-doctor', [AssignmentController::class, 'showAssignDoctorForm']);
    Route::post('/assign/assign-doctor', [AssignmentController::class, 'assignDoctorToPatient'])->name('assign-doctor-submit');
    Route::get('/assign/assign-patient', [AssignmentController::class, 'showAssignPatientForm']);
    Route::post('/assign/assign-patient', [AssignmentController::class, 'assignDoctorToPatient'])->name('assign-patient-submit');
    Route::get('/assign/assign-nurse-to-patient', [AssignmentController::class, 'showAssignNurseToPatientForm']);
    Route::post('/assign/assign-nurse-to-patient', [AssignmentController::class, 'assignNurseToPatient'])->name('assign-nurse-to-patient-submit');
    Route::get('/assign/assign-patient-to-nurse', [AssignmentController::class, 'showAssignPatientToNurseForm']);
    Route::post('/assign/assign-patient-to-nurse', [AssignmentController::class, 'assignNurseToPatient'])->name('assign-patient-to-nurse-submit');
    Route::get('/assign/assign-bed-to-patient', [AssignmentController::class, 'showAssignBedToPatient']);
    Route::post('/assign/assign-bed-to-patient', [AssignmentController::class, 'assignBedToPatient'])->name('assign-bed-to-patient-submit');

    // Ending assignments / freeing beds
    Route::get('/updates', [PatientToDoctorController::class, 'index']);
    Route::get('/update/update-doc', [PatientToDoctorController::class, 'show']);
    Route::put('/update/update-doc', [PatientToDoctorController::class, 'update'])->name('update-doc-submit');
    Route::get('/update/update-nurse', [PatientToNurseController::class, 'show']);
    Route::put('/update/update-nurse', [PatientToNurseController::class, 'update'])->name('update-patient-to-nurse-submit');
    Route::get('/update/update-bed', [RemovePatientFromBedController::class, 'show']);
    Route::post('/update/update-bed', [RemovePatientFromBedController::class, 'remove'])->name('update-bed-submit');
});
