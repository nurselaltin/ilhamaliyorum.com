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
                    <h5 class="m-0 font-weight-bold text-primary text-center"><span>DENEYİM EKLE</span>
                    </h5>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('update.experience')}}" enctype="multipart/form-data" >
                        @csrf
                        <input type="hidden" id="experience-id" name="id">
                        <div class="form-group">
                            <label >ŞİRKET ADI</label>
                            <input type="text" name="name" id="company-name" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label >SEKTÖR</label>
                            <input type="text" name="sector" id="sector" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <span>Mühendis,stajyer vb.</span>
                            </div>
                            <label >MESLEK ADI</label>
                            <input type="text" name="job_title" id="job-title" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>Başlama Tarihi</label>
                            <input id="start-date" type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="alert alert-danger">
                            <span>Eğer devam ediyorsanız, tahmini mezun tarihinizi giriniz.</span>
                        </div>
                        <div class="form-group">
                            <label>Bitiş Tarihi</label>
                            <input id="finish-date" type="date" name="finish_date" class="form-control" required>
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
                        <h5 class="m-3 font-weight-bold text-primary text-center"><span>İŞ DENEYİMLERİNİZ</span>
                        </h5>
                    </div>
                    @if($experiences)
                        @foreach($experiences as $experience)
                            <div class="col-xl-8 col-md-8 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$experience->company_name}} - {{$experience->company_sector}}</div>
                                                <div class=" mb-0 font-weight-bold ">{{$experience->job_title}}</div>
                                                <div class=" mb-0 font-weight-bold ">Başlangıç:{{$experience->start_date}} </div>
                                                <div class=" mb-0 font-weight-bold ">Bitiş:{{$experience->finish_date}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a id="{{$experience->id}}" data-toggle="modal" data-target="#ornekModal" title="Düzenle" class="edit-experience btn btn-sm  text-white btn-primary"><i class="fa fa-pen"></i></a>
                                        <a  href="{{route('delete.experience',$experience->id)}}" class=" btn btn-sm btn-danger text-white remove-click" title="Sil"><i class="fa fa-times"></i></a>
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
                        <h5 class="m-0 font-weight-bold text-primary text-center"><span>DENEYİM EKLE</span>
                        </h5>
                    </div>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('add.experience')}}" enctype="multipart/form-data" >
                            @csrf
                            <input type="hidden" id="education-id" name="id">
                            <div class="form-group">
                                <label >ŞİRKET ADI</label>
                                <input type="text" name="name" id="company-name" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label >SEKTÖR</label>
                                <input type="text" name="sector" id="sector" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label >MESLEK ADI</label>
                                <input type="text" name="job_title" id="job-title" class="form-control" required/>
                            </div>
                            <div class="alert alert-danger">
                                <span>Mühendis,stajyer vb.</span>
                            </div>
                            <div class="form-group">
                                <label>Başlama Tarihi</label>
                                <input id="start-date" type="date" name="start_date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Bitiş Tarihi</label>
                                <input id="finish-date" type="date" name="finish_date" class="form-control" required>
                            </div>
                            <div class="alert alert-danger">
                                <span>Eğer devam ediyorsanız, tahmini mezun tarihinizi giriniz.</span>
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
            $('.edit-experience').click(function () {
                //Ajax ile id gönder,id ait verileri al ve modal içine göm
                id=$(this)[0].getAttribute('id');
                $.ajax({
                    type: "GET",
                    url: '{{route('experience.getdata')}}',
                    data: {id:id},
                    success: function (data)
                    {
                       console.log(data);
                       $('#company-name').val(data.company_name);
                       $('#experience-id').val(data.id);
                       $('#sector').val(data.company_sector);
                       $('#job-title').val(data.job_title);
                       $('#start-date').val(data.start_date);
                       $('#finish-date').val(data.finish_date);

                    },

                });
            });


        });
    </script>

@endsection
