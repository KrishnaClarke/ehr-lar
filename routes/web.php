<?php

use App\Http\Controllers\PatientToDoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientRecordController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\PatientToNurseController;
use App\Http\Controllers\RemovePatientFromBedController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/patients', [PatientController::class, 'index']);
Route::get('/patients/create', [PatientController::class, 'create' ]);
Route::post('/patients', [PatientController::class, 'store' ] );
Route::get('/patients/{id}', [PatientController::class, 'show']);
Route::delete('/patients/{id}', [PatientController::class, 'destroy'] );
Route::put('/patients/{patient}', [PatientController::class, 'update'])->name('patients.update');


Route::get('/doctors', [DoctorController::class, 'index']);
Route::get('/doctors/create', [DoctorController::class, 'create' ]);
Route::post('/doctors', [DoctorController::class, 'store' ] );
Route::get('/doctors/{id}', [DoctorController::class, 'show']);
Route::delete('/doctors/{id}', [DoctorController::class, 'destroy'] );
Route::put('/doctors/{doctor}', [DoctorController::class, 'update'])->name('doctors.update');


Route::get('/nurses', [NurseController::class, 'index']);
Route::get('/nurses/create', [NurseController::class, 'create' ]);
Route::post('/nurses', [NurseController::class, 'store' ] );
Route::get('/nurses/{id}', [NurseController::class, 'show']);
Route::delete('/nurses/{id}', [NurseController::class, 'destroy'] );
Route::delete('/nurses/{nurse}', [NurseController::class, 'destroy']);
Route::put('/nurses/{nurse}', [NurseController::class, 'update'])->name('nurses.update');


Route::get('/beds', [BedController::class, 'index']);
Route::get('/beds/create', [BedController::class, 'create' ]);
Route::post('/beds', [BedController::class, 'store' ] );
Route::get('/beds/{id}', [BedController::class, 'show']);
Route::delete('/beds/{id}', [BedController::class, 'destroy'] );
Route::put('/beds/update', [BedController::class, 'update'])->name('beds.update');


Route::get('/statistics', [StatisticsController::class, 'index']);

Route::get('/assign/assign-patient', [AssignmentController::class,'showAssignPatientForm'])->name('assign-patient');
Route::get('/assign/assign-doctor', [AssignmentController::class, 'showAssignDoctorForm'])->name('assign-doctor');
Route::get('/assign-patient-to-nurse', [AssignmentController::class,'showAssignPatientToNurseForm'])->name('assign-patient-to-nurse');
Route::get('/assign/assign-nurse-to-patient', [AssignmentController::class, 'showAssignNurseToPatientForm'])->name('assign-nurse-to-patient');

Route::post('/assign/assign-doctor', [AssignmentController::class, 'assignDoctorToPatient'])->name('assign-doctor-submit');

Route::post('/assign/assign-patient', [AssignmentController::class, 'assignPatientToDoctor'])->name('assign-patient-submit');
Route::post('/assign/assign-doctor', [AssignmentController::class,'assignDoctorToPatient'])->name('assign-doctor-submit');
Route::post('/assign-nurse-to-patient', [AssignmentController::class,'assignNurseToPatient'])->name('assign-nurse-to-patient-submit');
Route::post('/assign-patient-to-nurse', [AssignmentController::class,'assignPatientToNurse'])->name('assign-patient-to-nurse-submit');


Route::get('/assign/assign-bed-to-patient', [AssignmentController::class, 'showAssignBedToPatient'])->name('assign-bed-to-patient');
Route::post('/assign/assign-bed-to-patient', [AssignmentController::class, 'assignBedToPatient'])->name('assign-bed-to-patient-submit');


Route::get('/updates', [PatientToDoctorController::class, 'index'])->name('update-doc');
Route::get('/update/update-doc', [PatientToDoctorController::class, 'show'])->name('update-doc');
Route::put('/update/update-doc', [PatientToDoctorController::class, 'update'])->name('update-doc-submit');

Route::get('update/update-nurse', [PatientToNurseController::class, 'show'])->name('update-patient-to-nurse');
Route::put('update/update-nurse', [PatientToNurseController::class, 'update'])->name('update-patient-to-nurse-submit');

Route::get('update/update-bed', [RemovePatientFromBedController::class, 'show'])->name('update-bed');
Route::post('update/update-bed', [RemovePatientFromBedController::class, 'remove'])->name('update-bed-submit');