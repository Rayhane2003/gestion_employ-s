<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Costs;

class CostsController extends Controller
{
   function store_data(Request $request){
      $empData = [
         'nom' => $request->nom,
         'prix' => $request->prix,
         'Quantity' => $request->Quantity,
         'date' =>date("Y-m-d"),
        
     ];
     Costs::create($empData);
     return response()->json([
         'status' => 200,
     ]);
 }

   public function getall()
    {
        try {
            $Costs = Costs::all();
        return response()->json([
            'status' => 200,
            'Costs' => $Costs
        ]);
          
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
       
    }

 

    public function update(Request $request)
    {
        $Costs = Costs::find($request->id);
        if ($Costs) {
            $Costs->nom  = $request->nom;
            $Costs->prix = $request->prix;
            $Costs-> Quantity = $request->Quantity;
            $Costs-> date = date("Y-m-d");
            $Costs->save();

            return response()->json([
                'status' => 200,
                'message' => 'Coûts mis à jour avec succès.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Coûts non trouvé'
            ]);
        }
    }

    public function delete(Request $request)
{
   
    $Costs = Costs::find($request->id);

    if ($Costs && $Costs->delete()) {
        return response()->json(['status' => 200, 'message' => 'Coûts a été supprimé avec succès.']);
    } else {
        return response()->json(['status' => 400, 'message' => 'Échec de la suppression.']);
    }

}
 public function index()
    {
        $equipe = DB::table('costs')
       ->orderBy('idCosts')
       ->get();
        return view('Costs');           
    }


}