@extends('layouts.layout')


@section('content')
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-12">


            <div class="row ">


                <div class="col-md-12 mb-3">

                    <div class="add">
                        <div class="container mt-2">
                            <h2 style="padding-top: 5%; font-size: 50px"><b>عدد القنوات</b></h2>
                            <h2>{{$chanal->count()}}</h2>
                            <h2><b>عدد الدورات</b></h2>
                            <h3>{{$course->count()}}</h3>
                        </div>
                    </div>

                </div>

                <div class="col-md-4 ">
                    <a class="add" href="/chanal/create">
                        <div class="add">
                            <div class="container mt-2">
                                <h1 style="padding-top: 15%; font-size: 70px"><b>+</b></h1>
                                <h2><b>قناة جديدة</b></h2>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 ">
                    <a class="add" href="/course/create">
                        <div class="add">
                            <div class="container mt-2">
                                <h1 style="padding-top: 15%; font-size: 70px"><b>+</b></h1>
                                <h2><b>دورة جديدة</b></h2>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 ">
                    <a class="add" href="/tag/create">
                        <div class="add">
                            <div class="container mt-2">
                                <h1 style="padding-top: 15%; font-size: 70px"><b>+</b></h1>
                                <h2><b>add tag</b></h2>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-6 mt-5">
        <h3 class="text-center">({{$chanal->count()}}) القنوات</h3>
        <table class="table pt-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">name</th>
                    <th scope="col">url</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chanal as $chanals)
                <tr>
                    <th scope="row">{{$chanals->id}}</th>
                    <td>{{$chanals->name}}</td>
                    <td>{{$chanals->url}}</td>
                    <td><a href="/chanal/{{$chanals->id}}/edit" class="btn btn-light">edit</a></td>
                    <td><a href="/deleteChanal/{{$chanals->id}}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="col-md-6 mt-5">
        <h3 class="text-center">({{$course->count()}}) الدورات</h3>
        <table class="table pt-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">name</th>
                    <th scope="col">url</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($course as $courses)
                <tr>
                    <th scope="row">{{$courses->id}}</th>
                    <td>{{$courses->c_name}}</td>
                    <td>{{$courses->url}}</td>
                    <td><a href="/course/{{$courses->id}}/edit" class="btn btn-light">edit</a></td>
                    <td><a href="/deleteCourse/{{$courses->id}}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="col-md-6 mt-5">
        <h3 class="text-center">Tags ({{$tag->count()}})</h3>
        <table class="table pt-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">name</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($tag as $tags)
                <tr>
                    <th scope="row">{{$tags->id}}</th>
                    <td>{{$tags->name}}</td>

                    <td><a href="/tag/{{$tags->id}}/edit" class="btn btn-light">edit</a></td>
                    <td><a href="/deleteTag/{{$tags->id}}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>






@endsection