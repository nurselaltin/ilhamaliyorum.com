@extends('Panel.layouts.master')
@section('title','Tüm Makaleler')
@section('content')
    <div class="modal fade" tabindex="-1" role="dialog" id="ornekModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label id="name"></label>
                            <input type="text" name="name" class="form-control" required/>
                        </div>
                        <div class="form-group" id="category">
                            <label>Proje Kategori</label>
                            <input type="text" name="category" class="form-control" required/>
                        </div>
                        <div class="form-group" id="department">
                            <label id="department">Bölüm</label>
                            <input type="text" name="department" class="form-control" required/>
                        </div>
                        <div class="form-group" id="type">
                            <label>Okul Tipi</label>
                            <select name="type" id="" class="form-control">
                                <option value="Lisans">Lisans</option>
                                <option value="Ön Lisans">Ön Lisans</option>
                                <option value="Açık Öğretim">Açık Öğretim</option>
                            </select>
                        </div>
                        <div class="alert alert-danger">
                            <span>Yıl şeklinde yazınız</span>
                        </div>
                        <div class="form-group">
                            <label>Başlama Tarihi</label>
                            <input type="text" name="start_date" class="form-control">
                        </div>
                        <div class="alert alert-danger">
                            <span>Yıl şeklinde yazınız.Eğer devam ediyorsanız 'Devam Ediyor' olarak yazınız</span>
                        </div>
                        <div class="form-group">
                            <label>Bitiş Tarihi</label>
                            <input type="text" name="start_date" class="form-control">
                        </div>
                        <div class="form-group" id="description">
                            <label>Proje İçeriği</label>
                            <textarea name="description"  id="editor" class="form-control"  rows="5"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Ekle</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <input  class="switch text-right" type="checkbox"  @if($writer->is_active == 1) checked @endif  data-on="Yayında"   book-id="{{$writer->id}}"  data-off="Pasif"  data-toggle="toggle" data-onstyle="success" data-offstyle="warning" data-class="fast"/>
            </div>
            <div class="text-center mb-4">
                <img src="{{$writer->img_url}}" class="rounded-circle" width="200px" height="200px" alt="...">
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="text-center">{{$writer->fullname}}</p>
                        <p class="text-center">{{$writer->email}}</p>
                        <p class="text-center">{{$writer->birthday}}</p>
                        @if($writer->phone)
                            <p class="text-center">{{$writer->phone}}</p>
                        @endif
                        @if($writer->phone)
                            <p class="text-center">{{$writer->address}}</p>
                        @endif

                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Hakkımda</h6>
                </div>
                <div class="card-body">
                  {{$writer->about_writer}}
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Hayal ve Hedeflerim</h6>
                </div>
                <div class="card-body">
                  {{$writer->goals_writer}}
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="m-0 font-weight-bold text-primary col-lg-2">EĞİTİM</h6>
                        <a  href="{{route('create.education')}}" class="education badge badge-success col-md-1" >Ekle</a>

                    </div>

                </div>
                <div class="card-body row">
                    @if($educations)
                        @foreach($educations as $education)
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$education->school_name}} - {{$education->department}} - {{$education->education_type}} </div>
                                                <div class=" mb-0 font-weight-bold ">Başlangıç:{{$education->start_date}} </div>
                                                <div class=" mb-0 font-weight-bold ">Bitiş:{{$education->finish_date}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-university fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="m-0 font-weight-bold text-primary col-lg-2">DENEYİM</h6>
                        <a  href="{{route('create.experience')}}" class="badge badge-success col-md-1">Ekle</a>
                    </div>
                </div>
                <div class="card-body row">
                    @if($experiences)
                       @foreach($experiences as $experience)
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$experience->company_name}} - {{$experience->company_sector}}</div>
                                                <div class=" mb-0 font-weight-bold ">{{$experience->job_title}}</div>
                                                <div class=" mb-0 font-weight-bold ">{{$experience->job_title}}</div>
                                                <div class=" mb-0 font-weight-bold ">Başlangıç:{{$experience->start_date}} </div>
                                                <div class=" mb-0 font-weight-bold ">Bitiş:{{$experience->finish_date}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       @endforeach
                    @endif
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="m-0 font-weight-bold text-primary col-lg-2">PROJELERİM</h6>
                        <a title-name="PROJE EKLE" data-toggle="modal" data-target="#ornekModal" class="project badge badge-success col-md-1">Ekle</a>
                    </div>
                </div>
                <div class="card-body row">
                    @if($projects)
                        @foreach($projects as $project)
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$project->title}}</div>
                                                <div class=" mb-0 font-weight-bold ">{{$project->category}}</div>
                                                <p class=" mb-0 font-weight-bold ">{{$project->description}}</p>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-file-code fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="m-0 font-weight-bold text-primary col-lg-2">REFERANSLARIM</h6>
                        <a href="#" class="badge badge-success col-md-1">Ekle</a>
                    </div>
                </div>
                <div class="card-body row">
                    @if($references)
                        @foreach($references as $reference)
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$reference->fuulname}} - {{$reference->phone}}</div>
                                                <div class="h5 mb-0 font-weight-bold ">{{$reference->email}}</div>
                                                <p class=" mb-0 font-weight-bold ">{{$reference->comment_about_writer}}</p>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>



@endsection
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@endsection