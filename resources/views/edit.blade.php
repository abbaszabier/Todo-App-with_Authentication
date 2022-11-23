@extends('layout.main')
@section('container')
    <div class="row justify-content-center">
        <div class="card col-lg-4 shadow mb-4" style="width: 450px; height:auto">
            <div class="row">
                <div class="col-md-12 mt-4 pe-4">

                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="float-end btn-danger" style="border: none; font-size:14px">Logout <i class="bi bi-box-arrow-right"></i></button>
                    </form>
                   
                </div>
            </div>
            <div class="container">
                <div class="row mt-3 mb-3">
                        <div class="col-md-2 pt-2" class="float-start" >
                            <img src="" id="myImage" alt="" style="width: 45px; height: 45px">
                        </div>
                        <div class="col-md-10">
                            <div class="datename mt-2">
                                <h6>{{ $today }}, {{ $date }}</h6>
                                @auth
                                <h5><label id="lblGreetings"></label>, {{ auth()->user()->name }}.</h5>
                                @endauth
                            </div>
                        </div>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Task</button>
                    </li>
                  </ul>
                <div style="height:260px; overflow-y:auto;">
                      <div class="tab-content" id="myTabContent" >
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0" >
                            @forelse ($homes as $home)
                            <div class="card mt-3" style="background-color:rgb(245, 245, 245);">
                                <div class="container-sm">
                                    <div class="main-todo pt-1 pb-1 ps-1">
                                        <div class="row">
                                            <div class="col-9 d-inline" >
                                                <h6 class="mt-2 " style="font-size: 16px; font-weight:400;">{{ $home->title }}</h6>
                                            </div>
                                            <div class="col-2 pt-1 pb-1 d-inline">
                                                <div class="row justify-content-between text-center">
                                                    <div class="col-6">
                                                        {{-- <form action="{{ $home->id }}" method="POST">
                                                            @csrf --}}
                                                            {{-- <button type="submit"  class="btn btn-sm btn-secondary btn-flat show_confirm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-pencil-fill" style="width: 10px; height:10px;"></i></button>   --}}
                                                        {{-- </form> --}}
                                                    </div>
                                                    <div class="col-6 sampah">
                                                        <form action="{{ route('home.destroy', $home->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"  class="btn btn-sm btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="bi bi-trash3-fill"></i></button>
                                                         </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            @empty
                                <div class="mt-5">
                                    <h3 style="color: rgb(223, 223, 223)" class="text-center">Empty</h3>
                                </div>
                            @endforelse
                        </div>
                        {{-- <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div> --}}
                    </div>
                </div>
                <hr class="mb-4">
                <form action="/home" method="POST">
                    @csrf
                    <div class="input-group mb-4">
                        <input type="title" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="What your to do now?" required autocomplete="title" autofocus>
                        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-send-fill"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="#" method="GET">
                @method('PUT')
                @csrf
                <div class="modal-content justify-content-center" style="width: 500px">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Todo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3 mt-3">
                            <input type="title" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="What your to do now?" required autocomplete="title" autofocus>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    <script>
        let currentTime = new Date().getHours();
        let img = document.getElementById('myImage')

        if (currentTime >= 0 && currentTime <= 12) {
        img.src = '/img/morning.png'
        } else if (currentTime >= 12 && currentTime <= 18) {
        img.src = '/img/sun.png'
        } else if (currentTime >= 19 && currentTime <= 23) {
        img.src = '/img/half-moon.png'
        }
    </script>

    <script>
        var myDate = new Date();
        var hrs = myDate.getHours();
    
        var greet;
    
        if (hrs < 12)
            greet = 'Good Morning';
        else if (hrs >= 12 && hrs <= 18)
            greet = 'Good Afternoon';
        else if (hrs >= 18 && hrs <= 24)
            greet = 'Good Evening';
    
        document.getElementById('lblGreetings').innerHTML =
            '' + greet;
    </script>
@endsection