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

        $writer = Writer::find(1);
        $educations = Education::get();
        $projects = Project::get();
        $references = Reference::get();
        $experiences = Experience::get();
        return view('Panel.resume.index',compact('writer','educations','projects','references','experiences'));
    }
    public  function  create(){
        $member= Member::find(1);
        return view('Panel.resume.create.writer',compact('member'));
    }
    public  function  add(Request $request){


        
        $writer = new Writer();
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
        return redirect()->route('dashboard');

    }
    public  function  edit($id){

        $writer = Book::findOrFail($id);
        $categories = Category::whereIsActive(1)->get();
        return view('Panel.book.update',compact('book','categories'));

    }
    public  function  update(Request $request,$id){

        $writer = Book::findOrFail($id);
        $category=Category::findOrFail($request->category);

        $writer->title = $request->title;
        $writer->url = Str::slug(strtolower($request->title),'-');
        $writer->description = $request->description;
        $writer->writer_fullname = $request->writer;
        $writer->category= $category->title;

        if($request->hasFile('image')){
            //resim adını düzenle
            $imageName = Str::slug($request->title,'-').'.'.$request->image->getClientOriginalExtension();
            //Resimi klasöre kaydet
            $request->image->move(public_path('uploads/book'),$imageName);
            //veritabanına kaydet
            $writer->img_url='uploads/book/'.$imageName;
        }
        $writer->save();
        toastr()->success('Kitap başarıyla güncellendi.');
        return redirect()->route('book');

    }
    public  function  switch(Request $request){
        $writer = Book::find($request->id);
        $writer->is_active = $request->isActive == "true" ? 1: 0;
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

}
