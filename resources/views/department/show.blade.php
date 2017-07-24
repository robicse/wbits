@extends('layouts.appAdmin')

@section('content')
    <section class="content-header">
        <h1>
            show Department details
        </h1>
    </section>



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped display nowrap">
                            <thead>
                            <tr>
                                <th>Department Name</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($departments as $department)
                                <tr>
                                    <td>{{ $department->department_name }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



