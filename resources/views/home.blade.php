@extends('layouts.layout')
@section('content')

<section class="container">
    <p class="home">موقع <svg xmlns="http://www.w3.org/2000/svg" width="100" height="57" viewBox="0 0 237 87">
            <text id="_مرجع_" data-name="&lt;/مرجع&gt;" transform="translate(0 62)" fill="#2eb19f" font-size="60"
                font-family="URWDINArabic-Bold, URW DIN Arabic" font-weight="700">
                <tspan x="0" y="0">&lt;/</tspan>
                <tspan y="0">مرجع</tspan>
                <tspan y="0">&gt;</tspan>
            </text>
        </svg> يرتب ويصنف لك الدورات والقنوات التي تقدم دورات في شتى مجالات الحاسب ولغات البرمجة على منصة اليوتيوب</p>
</section>
<section class="two container">


    <div>
        <form action="" class="container row ml-0 mr-0 search">
            <div class="col-md-2"></div>
            <input class="form-control col-md-8 " style="height: 50px; border-radius: 10px;" type="text" name="">
            <button class="btn btn-link col-md-2 text-center h3se" type="submit"
                style="color: #fff; font-size: 25px"><b>ابحث</b></button>
        </form>
    </div>

</section>

<section class="new_vid container">
    <h2><b style="color: #333333">احدث الدورات</b></h2>

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



<section class="new_vid container">
    <h2><b style="color: #333333">القنوات</b></h2>

    <div class="row mt-5">
        @foreach ($chanal as $chanals)
        <div class="col-md-4 mt-5 ">
            <div class="mycard">
                <img class="card-img" src="{{asset('/storage/images/'. $chanals->image) }}" alt="">
                <div class="container mt-2" style="height: 210px">
                    <h2 style="color: #333"><b>{{$chanals->name}}</b></h2>
                    <h6 style="color: #959595; bordar: 0">
                        {{count($courseCount)}} عدد الدورات
                    </h6>
                    @foreach ($chanals->tag as $tags)
                    <a href="/?tag={{$tags->name}}">
                        <h6 class="btn btn-light" style="color: #959595; bordar: 0">{{$tags->name}}</h6>
                    </a>
                    @endforeach
                    <div class="" style="display: flex;">
                        <a class="btn mt-3" style="background-color: #2eb19f; border-radius: 10; color: #fff; position: absolute;
                        bottom: 20px;" href="/chanals/{{ $chanals->id }}">مشاهدة الدورات</a>
                    </div> <br>
                </div>
            </div>

        </div>
        @endforeach

    </div>

</section>

@if ($chanal->hasPages())


<div class="mt-2">
    <ul class="pagination pagination-sm mt-5" style="justify-content: center;">

        <li class="page-item " aria-current="page">
            <a class="page-link" href="{{$chanal->previousPageUrl()}}">
                <<</a> </li> @if ($chanal->currentPage()>= 2)
        <li class="page-item"><a class="page-link" href="{{$chanal->previousPageUrl()}}">{{$chanal->currentPage()-1}}
            </a>
        </li>
        @endif
        <li class="page-item active"><a class="page-link" style=" background-color: #2eb19f;
            border-color: #2eb19f;" href="?page={{$chanal->currentPage()}}">{{$chanal->currentPage()}}</a>
        </li>
        @if ($chanal->hasMorePages())
        <li class="page-item"><a class="page-link"
                href="?page={{$chanal->currentPage()+1}}">{{$chanal->currentPage()+1}}</a></li>


        <li class="page-item"><a class="page-link" href="{{$chanal->nextPageUrl()}}">>></a></li>

        @endif

    </ul>
</div>

@endif
@endsection