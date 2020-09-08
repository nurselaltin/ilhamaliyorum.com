<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Dotenv\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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


        $result = $this->reChapta($_POST['g-recaptcha-response']);

        //reChapta kısmını işaretemiş mi?

        if($_POST['g-recaptcha-response']== null){
            toastr()->error('Lütfen \'Ben robot değilim\' kısmını işrateleyiniz!');
            return redirect()->back();
        }else{
            if($result["success"] == 1){

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

                    //------------------------------------------------------
                    //Writer tablosuna da kayıt edelim ki default bir özgeçmiş olsun elimizde.Kullanıcı eğer blog,video,kitap eklemek isterse  writer tablosuna kaydettiğimiz
                    //lazım olacak.
                    $writer = new Writer();
                    $writer->fullname = $request->fullname;
                    $writer->email = $request->email;
                    $writer->save();
                    //-----------------------------------------------------
                    toastr()->success('Başarıyla kayıt oldunuz!');
                    return redirect()->route('login.page');
                }

            }else{

                toastr()->error('Kayıt olurken bir hata oluştu ,lütfen tekrar deneyiniz.');
                return redirect()->back();
            }
        }


    }

    public  function loginPage(){
        return view('Panel.login.signIn');
    }

    public  function  reChapta($sitekey){

        //sitekey ve secret key bilgilerini diziye atıyoruz.

        $keys = [
            'secret'  => '6Lf7U8kZAAAAAHxIDmN-t-qhafz_fxmcDR_kgtvP',
            'response' =>$sitekey
        ];

        //google apı url


        $api_url = curl_init('https://www.google.com/recaptcha/api/siteverify');
        curl_setopt_array($api_url,[
            CURLOPT_POST =>true,
            CURLOPT_POSTFIELDS =>http_build_query($keys),
            CURLOPT_RETURNTRANSFER => true
        ]);

        //json formatında dönecek
        $result = curl_exec($api_url);

        //json formatını çözümle
        return json_decode($result,true);


    }

    public function  login(Request $request){



        $result = $this->reChapta($_POST['g-recaptcha-response']);

        //reChapta kısmını işaretemiş mi?

        if($_POST['g-recaptcha-response']== null){
            toastr()->error('Lütfen \'Ben robot değilim\' kısmını işrateleyiniz!');
            return redirect()->back();
        }else{
            if($result["success"] == 1){
                //Kontrol et
                $member = Member::whereEmail($request->email)->first();
                $message='';
                if(Auth::attempt(['email' => $request->email, 'password' =>$request->password])){
                    if(Hash::check($request->password,$member->password)){

                        toastr()->success('Hoşgeldin '.$member->fullname);
                        //Kullanıcı bilgilerini sessiona kaydet.
                        session()->put('fullname',$member->fullname);
                        session()->put('email',$member->email);

                        $writer = Writer::where('email',$member->email)->first();
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

            }else{

                toastr()->error('Giriş yaparken bir hata oluştu ,lütfen tekrar deneyiniz.');
                return redirect()->back();
            }
        }



    }

    public  function  logout(){
        Auth::logout();
        return redirect()->route('login.page');
    }

    public  function  forgotPassword(){

        return view('Panel.login.forgot-password');
    }

    public  function  isExistEmail(Request $request){

      //Kullanıcı var mı önce onu kontrol et
        $user = Member::where('email','=',$request->email)->first();

        if(!$user){
            toastr()->warning('Geçersiz email!');
        }else{
            //Token oluştur
            $token = rand();
            $user->token = $token;
            $user->save();

            //Mail hesabına token gönder.
            Mail::send('Panel.login.reset',
                ['user'=>$user,'token'=>$token],
                function ($message) use($user){
                     $message->to($user->email);
                     $message->from('ilhamaliyorum@gmail.com');
                     $message->subject("$user->fullname, şifrenizi resetleyin");
                } );


            toastr()->success('Link başarıyla email hesabınıza gönderildi!');

        }

        return redirect()->back();

    }

    public  function  userProfile(){

        $writer_id = session()->get('id');
        $writer = Writer::find($writer_id);
        return view('Panel.user-profile.index',compact('writer'));
    }

    public function  updateProfile(Request $request){
        //Validation işlemlerini yap
        $request->validate([
            'password' => 'min:6',
            're_password' => 'same:password'
        ]);

        $user = Member::whereEmail($request->email)->first();
        if($user){
            $user->fullname = $request->fullname;
            $user->email = $request->email;
            $user->password=Hash::make($request->password);
            $user->save();

            //Writer  tablosundaki kullanıcı bilgilerinide güncelleyelim
            $writer =Writer::find(session()->get('id'));
            $writer->fullname = $request->fullname;
            $writer->email = $request->email;
            $writer->save();
            //-----------------------------------------------------

            //Kullanıcı bilgilerini sessiona kaydet.
            session()->put('fullname',$user->fullname);
            session()->put('email',$user->email);

            toastr()->success('Bilgileriniz başarıyla güncellendi!');
            return redirect()->route('dashboard');
        }

        toastr()->success('Şifreleriniz uyuşmuyor!');
        return redirect()->back();

    }







}
