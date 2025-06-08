<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Budget;

class BudgetController extends Controller
{
   function store_data(Request $request){
      $empData = [
         'budget' => $request->budget,
         'date' =>date("Y-m-d"),
     ];
     Budget::create($empData);
     return response()->json([
         'status' => 200,
     ]);
 }
   public function getall()
    {
        try {
            $Budget = Budget::all();
        return response()->json([
            'status' => 200,
            'Budget' => $Budget
        ]);
          
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
       
    }

 

    public function update(Request $request)
    {
        $Budget = Budget::find($request->id);
        if ($Budget) {
            $Budget->budget  = $request->budget;
            $Budget->date =date("Y-m-d");
          
           
             
            $Budget->save();

            return response()->json([
                'status' => 200,
                'message' => 'Budget mis à jour avec succès.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Budget non trouvé'
            ]);
        }
    }

    public function delete(Request $request)
{
   
    $Budget = Budget::find($request->id);

    if ($Budget && $Budget->delete()) {
        return response()->json(['status' => 200, 'message' => 'Budget a été supprimée avec succès.']);
    } else {
        return response()->json(['status' => 400, 'message' => 'Échec de la suppression.']);
    }

}
 public function index()
    {
        $equipe = DB::table('Budget')
       ->orderBy('date')
       ->get();
        return view('Budget');           
         
    }

public function index1()
{
    $today = date("Y-m-d");

    // عدد كل الموظفين النشطين
    $employe = DB::table('employe')
        ->where('statut', 'Actif')
        ->pluck('id'); // نحصل على القائمة بدلاً من count

    // الموظفون الحاضرون اليوم
    $pointage = DB::table('pointage')
        ->where('dateJour', $today)
        ->distinct()
        ->pluck('id_employe');

    // الموظفون في إجازة اليوم
    $conge = DB::table('conge')
        ->where(function ($query) use ($today) {
            $query->where('dateDebut', '<=', $today)
                  ->where('dateFin', '>=', $today);
        })
        ->distinct()
        ->pluck('id');

    // الموظفون الغائبون = الكل - الحاضرين - في إجازة
    $absentEmployes = $employe
        ->diff($pointage)
        ->diff($conge);

    $employeCount = $employe->count();
    $pointageCount = $pointage->count();
    $congeCount = $conge->count();
    $absentCount = $absentEmployes->count();

    return view('index', compact('employeCount', 'pointageCount', 'congeCount', 'absentCount'));
}
 // Controller (مثلاً BudgetController.php)
public function costs1(Request $request)
{ 

    $totalBudgets = DB::table('Budget')
        ->selectRaw('SUM(budget) as total_budget, DATE_FORMAT(date, "%Y") as year')
        ->groupBy('year')
        ->orderBy('year', 'asc')
        ->get();

    // مجموع التكلفة الشهري من جدول costs
    $monthly = DB::table('costs')
        ->selectRaw('SUM(prix * Quantity) as total, DATE_FORMAT(date, "%Y-%m") as month')
        ->groupBy('month')
        ->get();

    // بناء هيكل البيانات حسب السنة
    $data = [];
    $i=0;
      $remaining =0;
$i = 0;
$data = [];
foreach ($totalBudgets as $budgetYear) {
    $remaining = $budgetYear->total_budget;
    $year = $budgetYear->year;

    // فلترة مصاريف هذه السنة فقط
    $monthlyFiltered = $monthly->filter(function ($item) use ($year) {
        return strpos($item->month, $year) === 0;
    });

    // مصروفات الشهور (1 إلى 12)
    $expenses = array_fill(1, 12, 0.0);
    foreach ($monthlyFiltered as $monthItem) {
        $monthNumber = (int) \Carbon\Carbon::createFromFormat('Y-m', $monthItem->month)->format('n');
        $expenses[$monthNumber] += $monthItem->total;
    }

    // تحديد آخر شهر فيه صرف
    $lastMonthWithExpense = 0;
    foreach ($expenses as $month => $amount) {
        if ($amount > 0) {
            $lastMonthWithExpense = $month;
        }
    }

    // حساب الرصيد فقط حتى آخر شهر فيه صرف
    $monthlyData = [round($remaining, 2)]; // الرصيد الافتتاحي في بداية السنة

for ($m = 1; $m <= 12; $m++) {
    if ($m <= $lastMonthWithExpense) {
        $remaining -= $expenses[$m];
        $monthlyData[] = round($remaining, 2);
    } else {
        $monthlyData[] = null; // لا توجد بيانات بعد آخر صرف
    }
}

$data[] = array_merge([$year], $monthlyData);
}

return response()->json([
    'status' => 200,
    'data'   => $data,
]);



    }
  





}
