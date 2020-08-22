<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Member;
use App\Models\Project;
use App\Models\Reference;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResumeController extends Controller
{
    //Resume
    public  function  index(){

        $writer = Writer::where('email',session()->get('email'))->first();
        /*Kitap,yazı,video eklerken writer a ait id üzerinden kayıt yapacağız.
          Bu yüzden id sessiona kayıt ediyoruz.
        */
        session()->put('id',$writer->id);

        $educations = Education::get();
        $projects = Project::get();
        $references = Reference::get();
        $experiences = Experience::get();
        toastInfo('Genel bilgileriniz , özgeçmiş pasif hale getirseniz dahi yayınlanır.');
        return view('Panel.resume.index',compact('writer','educations','projects','references','experiences'));
    }
    public  function  create(){

        /*Kullanıcı kayıt olunca boş bir özgeçmişte oluşturmuştuk.
        Sessionda kayıtlı kullanıcıya ait özgeçmiş bilgilerini getiriyoruz.

        */
        $writer = Writer::where('email',session()->get('email'))->first();
        return view('Panel.resume.create.writer',compact('writer'));
    }
    public  function  add(Request $request){

        $writer = Writer::where('email',session()->get('email'))->first();
        //Adını ve emailini değiştirirse sessiona kayıtlı bilgileride değiştiriyotuz.
        $request->session()->put('fullname',$request->fullname);
        $request->session()->put('email',$request->email);
        //----------------------------------------------------
        $writer->fullname = $request->fullname;
        $writer->email = $request->email;
        $writer->phone = $request->phone;
        $writer->address = $request->address;
        $writer->birthday = $request->birthday;
        $writer->goals_writer = $request->goals_writer;
        $writer->about_writer = $request->about_writer;
        $writer->is_active= 1;
        $writer->info_public= 1;
        if($request->image==null){
           //default profil resmi ayarla
            $writer->img_url='uploads/resume/default-profil.png';

        }else{
            //resim adını düzenle
            $imageName = Str::slug($request->fullname,'-').'-profil.'.$request->image->getClientOriginalExtension();
            //Resimi klasöre kaydet
            $request->image->move(public_path('uploads/resume'),$imageName);
            //veritabanına kaydet
            $writer->img_url='uploads/resume/'.$imageName;
        }

        $writer->save();
        toastr()->success('Bilgileriniz başarıyla kaydedildi.');
        return redirect()->route('resume');

    }
    public  function  edit(){
        $writer = Writer::where('email',session()->get('email'))->first();
        return view('Panel.resume.update_writer',compact('writer'));

    }
    public  function  update(Request $request){

        $writer = Writer::where('email',session()->get('email'))->first();
        //Adını ve emailini değiştirme ihtimaline karşılık sessiona kayıtlı bilgileride değiştiriyoruz.
        $request->session()->put('fullname',$request->fullname);
        $request->session()->put('email',$request->email);
        //----------------------------------------------------

        $writer->fullname = $request->fullname;
        $writer->email = $request->email;
        $writer->phone = $request->phone;
        $writer->address = $request->address;
        $writer->birthday = $request->birthday;
        $writer->goals_writer = $request->goals_writer;
        $writer->about_writer = $request->about_writer;

        if($request->hasFile('image')){
            //resim adını düzenle
            $imageName = Str::slug($request->title,'-').'.'.$request->image->getClientOriginalExtension();
            //Resimi klasöre kaydet
            $request->image->move(public_path('uploads/resume'),$imageName);
            //veritabanına kaydet
            $writer->img_url='uploads/resume/'.$imageName;
        }
        $writer->save();
        toastr()->success('Genel bilgileriniz başarıyla güncellendi.');
        return redirect()->route('resume');

    }
    public  function  isActive(Request $request){
        $writer = Writer::find(1);
        $writer->is_active = $request->check == "true" ? 1: 0;
        $writer->save();


    }


    //Education

    public  function createEducation(){

        $educations = Education::get();
        return view('Panel.resume.create.education',compact('educations'));
    }

    public  function addEducation(Request $request){

        $education = new Education();
        $education->school_name = $request->name;
        $education->writer_id= 4;
        $education->writer_fullname= 'Nursel';
        $education->continues= 'Devam';
        $education->department = $request->department;
        $education->education_type = $request->type;
        $education->start_date = $request->start_date;
        $education->finish_date = $request->finish_date ;
        $education->isActive = 1;
        $education->public = 1;
        $education->save();
        toastr()->success('Eğitim başarıyla eklendi');
        return redirect()->back();
    }

    public function  getDataEducation(Request $request){


        $education= Education::findOrFail($request->id);
        return response()->json($education);
    }

    public  function  updateEducation(Request $request){
        $education = Education::findOrFail($request->id);
        $education->school_name = $request->name;
        $education->department = $request->department;
        $education->education_type = $request->type;
        $education->start_date = $request->start_date;
        $education->finish_date = $request->finish_date ;
        $education->save();
        toastr()->success('Eğitim başarıyla güncellendi.');
        return redirect()->back();
    }

    public  function  deleteEducation(Request $request){


         Education::findOrFail($request->id)->delete();
         toastr()->success('Eğitim başarıyla silindi');
        return redirect()->back();
    }

    //Experience

    public  function createExperience(){

        $experiences = Experience::get();
        return view('Panel.resume.create.experience',compact('experiences'));
    }

    public  function addExperience(Request $request){

        $experience = new Experience();
        $experience->company_name = $request->name;
        $experience->company_sector = $request->sector;
        $experience->job_title = $request->job_title;
        $experience->writer_id= 4;
        $experience->fullname= 'Nursel';
        $experience->continues= 'Devam';
        $experience->start_date = $request->start_date;
        $experience->finish_date = $request->finish_date ;
        $experience->isActive = 1;
        $experience->save();
        toastr()->success('İş deneyiminiz başarıyla eklendi.');
        return redirect()->back();
    }

    public function  getDataExperience(Request $request){


        $experience= Experience::findOrFail($request->id);
        return response()->json($experience);
    }

    public  function  updateExperience(Request $request){
        $experience = Experience::findOrFail($request->id);
        $experience->company_name = $request->name;
        $experience->company_sector = $request->sector;
        $experience->job_title = $request->job_title;
        $experience->start_date = $request->start_date;
        $experience->finish_date = $request->finish_date ;
        $experience->isActive = 1;
        $experience->save();
        toastr()->success('İş deneyiminiz başarıyla güncellendi.');
        return redirect()->back();
    }

    public  function  deleteExperience(Request $request){


        Experience::findOrFail($request->id)->delete();
        toastr()->success('İş deneyiminiz başarıyla silindi');
        return redirect()->back();
    }


    //Project

    public  function createProject(){

        $projects = Project::get();
        return view('Panel.resume.create.project',compact('projects'));
    }

    public  function addProject(Request $request){

        $project = new Project();
        $project->title = $request->name;
        $project->description = $request->description;
        $project->category = $request->category;
        $project->project_img_url = 'öflf';
        $project->writer_id= 4;
        $project->fullname= 'Nursel';
        $project->created_at = $request->created_at;
        $project->save();
        toastr()->success('Projeniz başarıyla eklendi.');
        return redirect()->back();
    }

    public function  getDataProject(Request $request){
        $project= Project::findOrFail($request->id);
        return response()->json($project);
    }

    public  function  updateProject(Request $request){
        $project = Project::findOrFail($request->id);
        $project->title = $request->name;
        $project->description = $request->description;
        $project->category = $request->category;
        $project->created_at = $request->created_at;
        $project->save();
        toastr()->success('Projeniz başarıyla güncellendi.');
        return redirect()->back();
    }

    public  function  deleteProject(Request $request){

        Project::findOrFail($request->id)->delete();
        toastr()->success('Projeniz başarıyla silindi');
        return redirect()->back();
    }

    //Reference
    public  function createReference(){

        $references = Reference::get();
        return view('Panel.resume.create.reference',compact('references'));
    }

    public  function addReference(Request $request){


        $reference = new Reference();
        $reference->fullname = $request->reference_fullname;
        $reference->email = $request->email;
        $reference->phone = $request->phone;
        $reference->comment_about_writer = $request->comment_about_writer;
        $reference->writer_id= 4;
        $reference->isActive= 1;
        $reference->save();
        toastr()->success('Referansınız başarıyla eklendi.');
        return redirect()->back();
    }

    public function  getDataReference(Request $request){
        $reference= Reference::findOrFail($request->id);
        return response()->json($reference);
    }

    public  function  updateReference(Request $request){


        $reference = Reference::findOrFail($request->id);
        $reference->fullname = $request->reference_fullname;
        $reference->email = $request->email;
        $reference->phone = $request->phone;
        $reference->comment_about_writer = $request->comment_about_writer;
        $reference->save();
        toastr()->success('Referansınız başarıyla güncellendi.');
        return redirect()->back();
    }

    public  function  deleteReference(Request $request){

        Reference::findOrFail($request->id)->delete();
        toastr()->success('Referansınız başarıyla silindi');
        return redirect()->back();
    }

}
