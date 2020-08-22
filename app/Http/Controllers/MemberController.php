<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Dotenv\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Member;
use Schema;
class MemberController extends Controller
{

    public  function  index_register(){

        return view('Panel.login.register');
    }

    public  function  register(Request $request){


        //Validation işlemlerini yap
        $request->validate([
            'password' => 'min:6',
            're_password' => 'same:password'
        ]);
        //Aynı bilgilere ait kullanıcı var mı kontrol et
        $member = Member::where('email' , '=' , $request->email)->exists();

        if($member){
            toastr()->warning('Aynı bilgilere sahip başka bir kullanıcı sistemde kayıtlı!');
            return redirect()->back();
        }else{
            $member = new Member();
            $member->fullname=$request->fullname;
            $member->email=$request->email;
            $member->username=Str::slug(strtolower($request->fullname),'-');
            $member->userType=0;
            $member->isActive=1;
            $member->password=Hash::make($request->password);
            $member->save();
            //Kullanıcı bilgilerini sessiona kaydet
            $request->session()->put('fullname',$request->fullname);
            $request->session()->put('email',$request->email);
            //------------------------------------------------------
            //Writer tablosuna da kaydet
            $writer = new Writer();
            $writer->fullname = $request->fullname;
            $writer->email = $request->email;
            $writer->save();
            //-----------------------------------------------------
            toastr()->success('Başarıyla kayıt oldunuz!');
            return redirect()->route('login.page');
        }
    }

    public  function loginPage(){
        return view('Panel.login.signIn');
    }

    public function  login(Request $request){

        //Kontrol et
        $member = Member::whereEmail($request->email)->first();
        $message='';
        if($member){
            if(Hash::check($request->password,$member->password)){

                 toastr()->success('Hoşgeldin '.$member->fullname);
                 //Kullanıcı bilgilerini sessiona kaydet.
                 session()->put('fullname',$member->fullname);
                 session()->put('email',$member->email);

                $writer = Writer::where('email',session()->get('email'))->first();
                /*Kitap,yazı,video eklerken writer a ait id üzerinden kayıt yapacağız.
                  Bu yüzden id sessiona kayıt ediyoruz.
                */
                session()->put('id',$writer->id);


                 return redirect()->route('dashboard');
            }else{

                 $message = 'Şifre hatalı!';
            }
        }else{

            $message = 'Email hatalı!';
        }

        toastr()->error($message);
        return redirect()->back();



    }





}
