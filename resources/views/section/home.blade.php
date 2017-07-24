@extends('layouts.appAdmin')

@section('content')
    <section class="content-header">
        <h1>Section</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-right">
                            <a class="btn btn-info btn-sx" href="{{ URL::to('section/create') }}"> <i class="fa fa-plus" aria-hidden="true"></i> Add Section</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped display nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Department Name</th>
                                <th>Section Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($sections as $section)

                                <?php

                                    $department = DB::select('select * from departments where id = ?', ["$section->department_id"]);
                                foreach ($department as $dpet){
                                    $department_name = $dpet->department_name;
                                }
                                ?>
                                <tr>
                                    <td>{{ $section->id }}</td>
                                    <td>{{ $department_name }}</td>
                                    <td>{{ $section->section_name }}</td>
                                    <td>

                                        <form class="form-group" action="{{ URL::to('section/'.$section->id)  }}" method="post">
                                            {{csrf_field()}}
                                            {{ method_field('DELETE')}}
                                            <a class="btn btn-xs btn-info" href="{{ URL::to('section/'.$section->id.'/edit') }}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <button class="btn btn-xs btn-danger" onclick="return confirmSubmit()" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    @include('partials.errors')
                    @include('partials.message')
                </div>
            </div>
        </div>
    </section>
@endsection