@extends('layouts.appAdmin')

@section('content')
    <section class="content-header">
        <h1>
            Create Department
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="{{ URL::to('department') }}" method="post">
                        {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="department_name" class="col-sm-2 control-label">Department Name </label>
                            <div class="col-sm-10">
                                <input type="text" name="department_name" value="" class="form-control"  placeholder="Department Name">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-info pull-right">Submit</button>
                    </div>
                    </form>
                    @include('partials.errors')
                </div>
            </div>
        </div>
    </section>
@endsection

