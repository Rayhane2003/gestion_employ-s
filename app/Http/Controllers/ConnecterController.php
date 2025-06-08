<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
class ConnecterController extends Controller
{
public function connecter(Request $request)
    {
        $nom = $request->nom;
    $password = $request->password;
    // الحصول على المستخد حسب الاسم
    $user = DB::table('user')->where('nom', $nom)->first();
    // التحقق من وجود المستخدم وكلمة المرور
    if ($user && Hash::check($password, $user->mot_passe)) {
         Session::put('user_id', $user->id);
        Session::put('user_nom', $user->nom);
          $equipe = DB::table('equipe')
       ->orderBy('nomEquipe')
       ->get(['idEquipe','nomEquipe']);
    
        // يمكن هنا تخزين معلومات في session إن أردت
       $id = session('user_id');
       if($id==2)
        return view('employee', ['user' => $user, 'equipe'=>$equipe]);
    else
     return view('employee', ['user' => $user, 'equipe'=>$equipe]);
    } else {
        return back()->withErrors(['nom' => 'Nom d\'utilisateur ou mot de passe incorrect']);
    }
    }
}