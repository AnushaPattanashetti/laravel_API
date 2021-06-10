<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Signup;
use Illuminate\Support\Facades\DB;


class APIController extends Controller
{
    public function create(Request $request){
        // return response()->json("value");
        $user = new Signup();
        $user->username = $request->username;
        $user->password = $request->password; 
        $user->save();

        $id = $user->id;
        
        $data= array();
       

        if($id>0){
            $data["userid"] = $id ;
            $data["message"]  =  "Profile created successfully !";
        

        }
        else{
            $data["message"]  =  "Cannot create user ";


        }
 
        return response()->json($data);

    }
    public function login(Request $request){
        $query  = DB::table("signups")
                    ->select('id')
                    ->where('username',$request->username)
                    ->where('password',$request->password)
                    ->get();

        $data = array();


        if(count($query)> 0){
                $data = $query;
                $data['message'] = "Login successful !";
            
        }
        else{
            $data["message"] = "Login not successfull ";
        }
        return response()->json($data);
        
        
    }

    public function update(Request $request){
        $query = DB::table('signups')
                ->where('username',$request->username)
                ->update(['password'=>$request->update_password]);
                
        $data = array();

        if($query ==1){

            $data['message'] = "Values updated successfully !";
        }
        else{
            $data['message'] = "Cannot update records";
            
        }
        return response()->json($data);


        
    }
}
