@extends('layouts.layout')
@section('content')

<section class="new_vid container">
  <h2><b style="color: #333333">{{$chanal->name}} تعديل القناة </b></h2>
  <hr>

  <img class="card-img" src="{{asset('/storage/images/'. $chanal->image) }}" style="height: 200px; width:" alt="">
  <form method="POST" action="/chanal/{{$chanal->id}}" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="form-group" dir="rtl">
      <label>صورة القناة</label>
      <input type="file" accept="image" class="form-control" name="image">
    </div>

    <div class="form-group">
      <label>اسم القناة</label>
      <input type="text" class="form-control" name="name" value="{{$chanal->name}}">
    </div>

    <label>slug</label>
    <input type="text" class="form-control" name="slug" value="{{$chanal->slug}}">
    </div>

    <br>
    <div classa="form-group">
      <label>رابط القناة</label>
      <input type="text" class="form-control" name="url" value="{{$chanal->url}}">
    </div>

    <div class="form-group">
      <label>tags</label><br>
      <br>
      <select name="tags[]" id="" multiple>
        @foreach ($tag as $tags)
        <option name="tag" value="{{$tags->id}}"> {{$tags->name}}
          @endforeach
      </select>
    </div><br>
    <div style="display: grid; justify-content: center;">
      <button type="submit" class="btn btn-info">حفظ</button>
    </div>
  </form>

</section>
@endsection