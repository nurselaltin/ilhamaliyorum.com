@extends('Panel.layouts.master')
@section('title','Makale Oluştur')
@section('content')
    <!-- UPDATE MODAL -->
    <div class="modal fade" tabindex="-1" role="dialog" id="ornekModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class=" py-3">
                    <h5 class="m-0 font-weight-bold text-primary text-center"><span>PROJE GÜNCELLE</span>
                    </h5>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('update.project')}}" enctype="multipart/form-data" >
                        @csrf
                        <input type="hidden" id="project-id" name="id">
                        <div class="form-group">
                            <label >PROJE ADI</label>
                            <input type="text" name="name" id="project-name" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>PROJE İÇERİĞİ</label>
                            <textarea name="description"  id="description" class="form-control"  rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label >PROJE KATEGORİSİ</label>
                            <input type="text" name="category" id="project-category" class="form-control" required/>
                        </div>
                        <div class="alert alert-danger">
                            <span>Yazılım,Bilim,Diğer vb.</span>
                        </div>
                        <div class="form-group">
                            <label>PROJE TARİHİ</label>
                            <input id="created_at" type="date" name="created_at" class="form-control" required/>
                        </div>
                        <div class="modal-footer">
                            <a href="{{route('resume')}}" type="button" class="btn btn-default" data-dismiss="modal">Kapat</a>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Güncelle</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-5">
                <div class="card-body">
                    <div class=" py-3">
                        <h5 class="m-3 font-weight-bold text-primary text-center"><span>PROJELERİNİZ</span>
                        </h5>
                    </div>
                    @if($projects)
                        @foreach($projects as $project)
                            <div class="col-xl-8 col-md-8 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$project->title}}</div>
                                                <div class=" mb-0 font-weight-bold ">{{$project->category}}</div>
                                                <div class=" mb-0 font-weight-bold ">Tarih:{{$project->created_at}}</div>
                                                <p class=" mb-0 font-weight-bold ">{{$project->description}}</p>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-file-code fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a id="{{$project->id}}" data-toggle="modal" data-target="#ornekModal" title="Düzenle" class="edit-project btn btn-sm  text-white btn-primary"><i class="fa fa-pen"></i></a>
                                        <a  href="{{route('delete.project',$project->id)}}" class=" btn btn-sm btn-danger text-white remove-click" title="Sil"><i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <div class=" py-3">
                        <h5 class="m-0 font-weight-bold text-primary text-center"><span>PROJE EKLE</span>
                        </h5>
                    </div>
                    </div>
                <div class="modal-body">
                    <form method="post" action="{{route('add.project')}}" enctype="multipart/form-data" >
                        @csrf
                        <input type="hidden" id="experience-id" name="id">
                        <div class="form-group">
                            <label >PROJE ADI</label>
                            <input type="text" name="name" id="PROJECT-name" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>PROJE İÇERİĞİ</label>
                            <textarea name="description"  id="description" class="form-control"  rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label >PROJE KATEGORİSİ</label>
                            <input type="text" name="category" id="project-category" class="form-control" required/>
                        </div>
                        <div class="alert alert-danger">
                            <span>Yazılım,Bilim,Diğer vb.</span>
                        </div>
                        <div class="form-group">
                            <label>PROJE TARİHİ</label>
                            <input id="created_at" type="date" name="created_at" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <a href="{{route('resume')}}" type="button" class="btn btn-default" data-dismiss="modal">Kapat</a>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Ekle</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>


@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection
@section('js')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#editor').summernote(
                {
                    'height':300
                }
            );

            //Düzenle
            $('.edit-project').click(function () {
                //Ajax ile id gönder,id ait verileri al ve modal içine göm
                id=$(this)[0].getAttribute('id');
                $.ajax({
                    type: "GET",
                    url: '{{route('project.getdata')}}',
                    data: {id:id},
                    success: function (data)
                    {
                       console.log(data);
                       $('#project-name').val(data.title);
                       $('#project-id').val(data.id);
                       $('#description').val(data.description);
                       $('#project-category').val(data.category);
                       $('#created_at').val(data.created_at);
                    },

                });
            });


        });
    </script>

@endsection
