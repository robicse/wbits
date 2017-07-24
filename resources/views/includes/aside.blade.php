<?php
    $user_id = \Auth::user()->id;

    $users = DB::table('users')
            ->join('user_role', 'users.id', '=', 'user_role.user_id')
            ->join('roles', 'user_role.role_id', '=', 'roles.id')
            //->select('users.*', 'contacts.phone', 'orders.price')
            ->where('users.id', $user_id)
            ->select('roles.name')
            ->get();

    foreach ($users as $user) {
        $user_type = $user->name;
    }

?>
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="@if($user_type =='Admin'){{ "dashboard" }}@elseif($user_type =='User'){{ "home" }}@endif">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            @if($user_type == "Admin")
            {{--@if($roles->name == "Admin")--}}

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-wrench" aria-hidden="true"></i> <span>Configuration</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ URL::to('/department') }}"><i class="fa fa-tag" aria-hidden="true"></i> <span>Department</span></a></li>
                        <li class=""><a href="{{ URL::to('/section') }}"><i class="fa fa-tag" aria-hidden="true"></i> <span>Section</span></a></li>
                        <li class=""><a href="{{ URL::to('/ajax') }}"><i class="fa fa-tag" aria-hidden="true"></i> <span>Ajax</span></a></li>
                    </ul>
                </li>

            @else
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-clock-o" aria-hidden="true"></i> <span>Attendance</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="#"><i class="fa fa-life-ring" aria-hidden="true"></i> <span> Attendance Summary </span></a></li>

                    </ul>
                </li>
            @endif

        </ul>
    </section>
</aside>