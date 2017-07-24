@extends('layouts.appAdmin')
@section('content')
    <section class="content-header">
        <h2>Upload File</h2>
    </section>

    <section class="content">
        <form class="form-horizontal" action="{{ route('post.upload') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label col-sm-2" for="file">Image:</label>
                <div class="col-sm-10">
                    <input type="file" name="image">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </form>



        {{-- <img src="{{ asset('storage/upload/car2.jpg') }}" alt="img_pro">--}}

        {{--<img src="{{ asset('storage/app/public/upload/car2.jpg') }}" alt="img_pro">--}}
        {{--<img src="{{ asset('storage/app/public/car2.jpg') }}" alt="img_pro">--}}
        {{--@if(isset($imagename))
            <img src="{{ asset('storage/app/public/'.$imagename) }}" alt="img_pro">
        @endif--}}





        @if (Session::has('msg'))
            <div class="alert alert-info">{{ Session::get('msg') }}</div>
        @endif

    </section>
@endsection






