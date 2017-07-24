@extends('layouts.appAdmin')

@section('content')
    <section class="content-header">
        <h1>
            Update Department
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="{{ URL::to('department/'.$department->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="department_name" class="col-sm-2 control-label">Department Name </label>
                                <div class="col-sm-10">
                                    <input type="text" name="department_name" value="{{ $department->department_name }}" class="form-control"  placeholder="Department Name">
                                    <div class="notification-input  alert-danger"></div>
                                </div>
                            </div>
                            <input type="hidden" name ="id" value="">
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="submit" class="btn btn-info pull-right">Update</button>
                        </div>
                    </form>

                    {{--@if(Session::has('msg'))
                        <div class="alert alert-info">{{ Session::get('msg') }}</div>
                    @endif--}}
                    @include('partials.errors')
                </div>
            </div>
        </div>
    </section>
@endsection

