<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <script src="{{ asset('js/app.js') }}"></script>
       
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
      
    </head>
    <body>
    <div class="container">
        <nav class="navbar navbar-light bg-light mb-3">
            <a class="navbar-brand" href="#">
            <img src="{{ asset('img/icon.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
              <strong>Yapılacaklar Uygulaması</strong>
            </a>
          </nav>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Mevcut Görevler</strong>
                    </div>
                    <div class="card-body">
                    <table class="table">
                        <tbody>
                            @foreach ($yapilacaklar as $yapilacak)
                            <tr>
                                
                                <td><strong>{{$yapilacak->task_name}}</strong></td>
                                <td>
                                    @if ($yapilacak->status == "Tamamlandı")
                                        <span class="badge badge-pill badge-success">Tamamlandı</span>
                                    @endif
                                    @if ($yapilacak->status == "Beklemede")
                                        <span class="badge badge-pill badge-warning">Beklemede</span>
                                    @endif
                                    @if ($yapilacak->status == "İptal")
                                        <span class="badge badge-pill badge-danger">İptal Edildi</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#id-{{$yapilacak->id}}">
                                            Detay
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal  fade" id="id-{{$yapilacak->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle"><strong>{{$yapilacak->task_name}}</strong></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{$yapilacak->task_description}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    <div class="btn-group" >
                                                <button id="btnGroupDrop1" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                İşlemler
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <a class="dropdown-item" href="/islem/tamamla/{{$yapilacak->id}}">Tamamla</a>
                                                <a class="dropdown-item" href="/islem/bekleme/{{$yapilacak->id}}">Beklemeye al</a>
                                                <a class="dropdown-item" href="/islem/iptal/{{$yapilacak->id}}">İptal et</a>
                                                <a class="dropdown-item" href="/islem/sil/{{$yapilacak->id}}">Sil</a>
                                                </div>
                                    </div>
                                    
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Yeni Görev</strong>
                    </div>
                    <div class="card-body">
                        @if (count($errors)>0)
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (isset($islem) && $islem )
                            <div class="alert alert-success" role="alert">
                                
                                 <li>İşlem Başarılı</li>
                                
                            </div>
                        @endif
                    <form method="post" action=""> 
                        @csrf  {{ csrf_field() }}
                    <div class="form-group {{$errors->has('baslik') ? 'has-error': '' }}">
                            <label for="baslik">Başlık</label>
                            <input type="text" class="form-control {{$errors->has('baslik') ? 'is-invalid': '' }}" id="baslik" name="baslik" value="{{ old('baslik') }}">
                        </div>
                        <div class="form-group ">
                            <label for="tanim">İş tanımı</label>
                            <textarea class="form-control {{$errors->has('tanim') ? 'is-invalid': '' }}" id="tanim" name="tanim" rows="3">{{ old('tanim') }}</textarea>
                        </div>
                        <div class="form-group ">
                            <input type="submit" class="btn btn-success " name="ekle" value="Ekle">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
