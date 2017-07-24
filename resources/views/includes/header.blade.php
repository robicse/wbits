<?php
 $image = isset($image->imagename) ? $image->imagename : 'demo.png';

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

<header class="main-header">
    <a href="@if($user_type =='Admin'){{ "dashboard" }}@elseif($user_type =='User'){{ "home" }}@endif" class="logo">
        <span class="logo-mini"><b>WB</b>ITS</span>
        <span class="logo-lg"><b>WB</b>ITS</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('storage/app/public/'.$image) }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ asset('storage/app/public/'.$image) }}" class="img-circle" alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                            </p>
                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                {{--@if(Request::segment(1) == "dashboard")--}}
                                    <a href="{{ route('upload') }}" class="btn btn-default btn-flat">Rdit Profile</a>
                                {{--@endif--}}
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>