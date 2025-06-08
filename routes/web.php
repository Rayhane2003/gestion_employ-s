<?php
use App\Models\Team;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PointageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalaireController;
use App\Http\Controllers\ConnecterController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CostsController;
use App\Http\Controllers\DetailsController;
Route::get('/login', function () {
    return view('authentication-login');
})->name('login'); 
Route::get('/', function () {
    return view('authentication-login');
});
Route::get('/index',[BudgetController::class, 'index1']
   
)->name('index'); 
Route::get('/employe', [EmployeController::class, 'index'])->name('employe');

Route::get('/pointage', function () {
    return view('tracking');
})->name('pointage'); 
Route::get('/projet', function () {
    return view('project');
})->name('projet'); 

Route::get('/rapport', function () {
    return view('report');
})->name('rapport');

Route::get('/connection', function () {
    return view('authentication-login');
})->name('connection'); 
Route::get('/inscription', function () {
    return view('authentication-register');
})->name('inscription'); 
Route::post('/store', [EmployeController::class, 'store_dacoststa'])->name('store');
Route::post('/ajax-action', [EmployeController::class, 'getall'])->name('ajax-action');
Route::POST('/employe/update', [EmployeController::class, 'update'])->name('updateEmploye');
Route::delete('/employe/delete', [EmployeController::class, 'delete'])->name('deleteEmploye');
Route::get('/count', [BudgetController::class, 'costs1'])->name('count');
Route::get('/employeeDetails/{id}', [DetailsController::class, 'employe'])->name('employeeDetails');
Route::get('/congeDétails/{id}', [DetailsController::class, 'conge'])->name('congeDétails');
Route::get('/rapportDétails/{id}', [DetailsController::class, 'rapport'])->name('rapportDétails');
Route::get('/equipeDétails/{id}', [DetailsController::class, 'equipe'])->name('equipeDétails');
Route::get('/projetDétails/{id}', [DetailsController::class, 'projet'])->name('projetDétails');
Route::get('/pointageDétails/{id}', [DetailsController::class, 'pointage'])->name('pointageDétails');
Route::get('/costs', [CostsController::class, 'index'])->name('costs');
Route::post('/costs', [CostsController::class, 'store_data'])->name('addcosts');
Route::post('/ajax-costs', [CostsController::class, 'getall'])->name('costs-action');
Route::POST('/costs/update', [CostsController::class, 'update'])->name('updatecosts');
Route::delete('/costs/delete', [CostsController::class, 'delete'])->name('deletecosts');

Route::get('/budget', [BudgetController::class, 'index'])->name('budget');
Route::post('/budget', [BudgetController::class, 'store_data'])->name('addbudget');
Route::post('/ajax-budget', [BudgetController::class, 'getall'])->name('budget-action');
Route::POST('/budget/update', [BudgetController::class, 'update'])->name('updatebudget');
Route::delete('/budget/delete', [BudgetController::class, 'delete'])->name('deletebudget');


Route::POST('/employe/addequipe', [EmployeController::class, 'addequipe'])->name('addequipe');
// Route::get('/employee/show', [EmployeController::class, 'show'])->name('show');
Route::get('/details', function () {
    return view('show');
})->name('details'); 

Route::post('/add_leave', [LeaveController::class, 'store_leave'])->name('add_leave');
Route::get('conge', [LeaveController::class, 'index'])->name('conge');
Route::post('conge', [LeaveController::class, 'getall'])->name('congeTable');
Route::POST('/conge/update', [LeaveController::class, 'update'])->name('update');
Route::delete('/conge/delete', [LeaveController::class, 'delete'])->name('delete');
Route::post('/add_Pointage', [PointageController::class, 'store_Pointage'])->name('add_Pointage');
Route::get('pointage', [PointageController::class, 'index'])->name('pointage');
Route::post('pointage', [PointageController::class, 'getall'])->name('congeTable');
Route::POST('/pointage/update', [PointageController::class, 'update'])->name('update_Pointage');
Route::delete('/pointage/delete', [PointageController::class, 'delete'])->name('delete_Pointage'); 


Route::post('/add_project', [ProjectController::class, 'store_project'])->name('add_project');
Route::get('projet', [ProjectController::class, 'index'])->name('projet');
Route::post('projet', [ProjectController::class, 'getall'])->name('projetTable');
Route::post('equipe', [ProjectController::class, 'getallTeams'])->name('equipeTable');
Route::get('salaire', [SalaireController::class, 'index'])->name('salaire');

Route::post('/rech_salaire', [SalaireController::class, 'index'])->name('rech_salaire');

 Route::POST('/projet/update', [ProjectController::class, 'update'])->name('updateProject');
 Route::delete('/projet/delete', [ProjectController::class, 'delete'])->name('deleteProject');
Route::post('/add_team', [TeamController::class, 'store_team'])->name('add_team');
Route::post('equipe', [ProjectController::class, 'getallTeams'])->name('equipeTable');
Route::POST('/equipe/update', [TeamController::class, 'updateTeam'])->name('updateTeam');
Route::delete('/equipe/delete', [TeamController::class, 'delete'])->name('deleteTeam');
Route::post('/index', [ConnecterController::class, 'connecter'])->name('connecter');
Route::post('/add_report', [ReportController::class, 'store_report'])->name('add_report');
Route::post('rapport', [ReportController::class, 'getall'])->name('rapportTable');
Route::POST('/rapport/update', [ReportController::class, 'update'])->name('update_Rapport');
Route::delete('/rapport/delete', [ReportController::class, 'delete'])->name('delete_Rapport'); 
 


