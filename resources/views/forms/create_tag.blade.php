@extends('layouts.layout')
@section('content')

<section class="new_vid container">
    <h2><b style="color: #333333">القنوات</b></h2>
    <hr>
    <form method="POST" action="/tag/create">
        @csrf
        <div class="form-group">
            <label>Tag name</label>
            <input type="text" class="form-control" name="name">
        </div>

        <br>
        <div style="display: grid; justify-content: center;">
            <button type="submit" class="btn btn-info">حفظ</button>
        </div>
    </form>

</section>
@endsection