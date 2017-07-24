@extends('layouts.appAdmin')

@section('content')
    <section class="content-header">
        <h1>
            Create Section
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="{{ URL::to('section') }}" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="department_name" class="col-sm-2 control-label">Department Name </label>
                                <div class="col-sm-10">
                                    <select name="department_id" class="form-control">
                                        <option value="">--Select--</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br/>
                                <label for="section_name" class="col-sm-2 control-label">Section Name </label>
                                <div class="col-sm-10">
                                    <input type="text" name="section_name" value="" class="form-control"  placeholder="Section Name">
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

