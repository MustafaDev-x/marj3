@extends('layouts.layout')
@section('content')




<section class="new_vid container">
    <h2><b style="color: #333333">الدورات</b></h2>

    <div class="row mt-5">

        @foreach ($course as $courses )
        <div class="col-md-4 mt-5 ">
            <div class="mycard">
                <img class="card-img" src="{{asset('/storage/images/'. $courses->chanal->image) }}" alt="">
                <div class="container mt-2" style="height: 210px">
                    <h2 style="color: #333"><b>{{$courses->c_name}}</b></h2>


                    <a href="/?tag=">
                        <h6 style="color: #959595">{{$courses->chanal->name}}</h6>
                    </a>

                    @foreach ($courses->tag as $tags)
                    <a href="/?tag={{$tags->name}}">
                        <h6 class="btn btn-light" style="color: #959595; bordar: 0">{{$tags->name}}</h6>
                    </a>
                    @endforeach
                    <div class="" style="display: grid;"> <a class="btn mt-3" style="background-color: #2eb19f; border-radius: 10; color: #fff;  position: absolute;
                            bottom: 20px;" href="{{$courses->url}}">زيارة القناة</a>
                    </div> <br>
                </div>
            </div>

        </div>
        @endforeach
    </div>
</section>
@endsection