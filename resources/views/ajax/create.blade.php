@extends('layouts.appAdmin')

@section('content')
<script type="text/javascript">
    function deptToSec() {
        var dept = $('#departmentToSection').val();
        //alert(dept);
        $.ajax({
            //type:'POST',
            type:'GET',
            url:'http://localhost/wbits/geDepartment',
            /*data:'_token = <?php echo csrf_token() ?>',*/
            data: {dept:dept},
            success:function(data){
                $("#msg").html(data.msg);
            }
        });
    }
</script>

    <section class="content-header">
        <h1>
            ajax test
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="department_name" class="col-sm-2 control-label">Department Name </label>
                                <div class="col-sm-10">
                                    <select name="department_id" class="form-control" id="departmentToSection" onchange="deptToSec()">
                                        <option value="">--Select--</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label for="section_name" class="col-sm-2 control-label">Section Name </label>
                                <div class="col-sm-10">
                                    <div id="msg">

                                    </div>
                                </div>
                                {{--<div id="msg">

                                </div>--}}
                            </div>
                        </div>
                        {{--<div class="box-footer">
                            <button type="submit" name="submit" class="btn btn-info pull-right">Submit</button>
                        </div>--}}
                        {{--<input type="text" onchange="test()">--}}
                    </form>
                    @include('partials.errors')
                </div>
            </div>
        </div>
    </section>
@endsection

