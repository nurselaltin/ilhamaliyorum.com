@extends('Panel.layouts.master')
@section('title','Tüm Makaleler')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><span> makale bulundu</span>
                <a href="" class="btn btn-warning btn-sm"><i class="fa fa-trash">Silinen Kitaplar</i></a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Kategori</th>
                        <th>Kitap Adı</th>
                        <th>Açıklama</th>
                        <th>Yazar</th>
                        <th>Tarih</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td><img src="{{$book->img_url}}" width="200"></td>
                            <td>{{$book->category}}</td>
                            <td>{{$book->title}}</td>
                            <td>{{$book->description}}</td>
                            <td>{{$book->writer_fullname}}</td>
                            <td>{{$book->created_at->diffForHumans()}}</td>
                            <td>
                                <input  class="switch" type="checkbox"  @if($book->is_active == 1) checked @endif  data-on="Aktif"   book-id="{{$book->id}}"  data-off="Pasif"  data-toggle="toggle" data-onstyle="success" data-offstyle="warning" data-class="fast">
                            </td>
                            <td>
                                <a target="_blank" href=""  title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                <a href="" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
      $(function () {
          $('.switch').change(function () {
              id = $(this)[0].getAttribute('book-id');
              isActive = $(this).prop(checked);
              //get metoduyla veriyi controller gönder
              $.get( "{{route('switch.book')}}",{id:id,isActive:isActive}, function( data ) {
                  console.log(data);
              });

          });

      })
    </script>
@endsection
