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
                    <h5 class="m-0 font-weight-bold text-primary text-center"><span>REFERANS GÜNCELLE</span>
                    </h5>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('update.reference')}}" enctype="multipart/form-data" >
                        @csrf
                        <input type="hidden" id="reference-id" name="id">
                        <div class="form-group">
                            <label >REFERANS ADI</label>
                            <input type="text" name="reference_fullname" id="reference_fullname" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label >EMAİL</label>
                            <input type="email" name="email" id="email" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>TELEFON</label>
                            <input id="phone" type="phone" name="phone" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>REFERANS YORUMU</label>
                            <textarea name="comment_about_writer"  id="comment_about_writer" class="form-control"  rows="5"></textarea>
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
                        <h5 class="m-3 font-weight-bold text-primary text-center"><span>REFERANSLARINI</span>
                        </h5>
                    </div>
                    @if($references)
                        @foreach($references as $reference)
                            <div class="col-xl-8 col-md-8 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class=" mb-0 font-weight-bold text-primary text-uppercase mb-1">{{$reference->fullname}}</div>
                                                <div class=" mb-0 font-weight-bold ">{{$reference->email}} {{$reference->phone}}</div>
                                                <div class=" mb-0 font-weight-bold ">{{$reference->comment_about_writer}}</div>
                                                <p class=" mb-0 font-weight-bold ">{{$reference->description}}</p>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user-circle fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a id="{{$reference->id}}" data-toggle="modal" data-target="#ornekModal" title="Düzenle" class="edit-reference btn btn-sm  text-white btn-primary"><i class="fa fa-pen"></i></a>
                                        <a  href="{{route('delete.project',$reference->id)}}" class=" btn btn-sm btn-danger text-white remove-click" title="Sil"><i class="fa fa-times"></i></a>
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
                        <h5 class="m-0 font-weight-bold text-primary text-center"><span>REFERANS EKLE</span>
                        </h5>
                    </div>
                    </div>
                <div class="modal-body">
                    <form method="post" action="{{route('add.reference')}}" enctype="multipart/form-data" >
                        @csrf
                        <input type="hidden" id="project-id" name="id">
                        <div class="form-group">
                            <label >REFERANS ADI</label>
                            <input type="text" name="reference_fullname" id="reference_fullname" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label >EMAİL</label>
                            <input type="email" name="email" id="email" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>TELEFON</label>
                            <input id="phone" type="phone" name="phone" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>REFERANS YORUMU</label>
                            <textarea name="comment_about_writer"  id="comment_about_writer" class="form-control"  rows="5"></textarea>
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
            $('.edit-reference').click(function () {
                //Ajax ile id gönder,id ait verileri al ve modal içine göm
                id=$(this)[0].getAttribute('id');
                $.ajax({
                    type: "GET",
                    url: '{{route('reference.getdata')}}',
                    data: {id:id},
                    success: function (data)
                    {
                       console.log(data);
                       $('#reference_fullname').val(data.fullname);
                        $('#reference-id').val(data.id);
                       $('#email').val(data.email);
                       $('#phone').val(data.phone);
                       $('#comment_about_writer').val(data.comment_about_writer);
                    },

                });
            });


        });
    </script>

@endsection
