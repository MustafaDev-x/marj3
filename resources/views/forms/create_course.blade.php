@extends('layouts.layout')
@section('content')

<section class="new_vid container">
  <h2><b style="color: #333333">انشاء دورة جديدة</b></h2>
  <hr>
  <form method="POST" action="/course/create">
    @csrf
    <div class="form-group">
      <label>اسم الدورة</label>
      <input type="text" class="form-control" name="c_name">
    </div>
    <label>اسم الدورة</label>
    <input type="text" class="form-control" name="slug">
    </div>

    <label>القناة</label>
    <select name="chanal_id" class="form-control form-control-sm">
      @foreach ($chanal as $chanals)
      <option name="chanal_id" value="{{$chanals->id}}">{{$chanals->name}}</option>
      @endforeach
    </select>
    <br>
    <div classa="form-group">
      <label>رابط الكورس</label>
      <input type="text" class="form-control" name="url">
    </div> <br>

    <div class="form-group">
      <label>tags</label><br>
      <br>
      <select name="tags[]" id="" multiple>
        @foreach ($tag as $tags)
        <option name="tag" value="{{$tags->id}}"> {{$tags->name}}
          @endforeach
      </select>
    </div>

    </div>
    <div style="display: grid; justify-content: center;">
      <button type="submit" class="btn btn-info">حفظ</button>
    </div>
  </form>

</section>
@endsection