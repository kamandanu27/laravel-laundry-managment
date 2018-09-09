@php
      $admin=App\User::validateRole("admin");
    @endphp
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{url('/')}}">
        Laundry Managmet System
    </a>
    <button aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right" data-target="#navbarResponsive" data-toggle="collapse" type="button">
        <span class="navbar-toggler-icon">
        </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-placement="right" data-toggle="tooltip" title="Dashboard">
                <a class="nav-link" href="{{url('/')}}">
                    <i class="fa fa-fw fa-dashboard">
                    </i>
                    <span class="nav-link-text">
                        Dashboard
                    </span>
                </a>
            </li>
           
            
             @if($admin)
            <li class="nav-item" data-placement="right" data-toggle="tooltip" title="Parent Section">
                <a class="nav-link nav-link-collapse collapsed" data-parent="#parentsection" data-toggle="collapse" href="#user">
                    <i class="fa fa-fw fa-wrench">
                    </i>
                    <span class="nav-link-text">
                        User
                    </span>
                </a>
                <ul class="sidenav-second-level collapse" id="user">
                    <li>
                        <a href="{{ route('user.index') }}">
                            User List
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item" data-placement="right" data-toggle="tooltip" title="Parent Section">
                <a class="nav-link nav-link-collapse collapsed" data-parent="#parentsection" data-toggle="collapse" href="#order">
                    <i class="fa fa-fw fa-wrench">
                    </i>
                    <span class="nav-link-text">
                        Customer with Laundry
                    </span>
                </a>
                <ul class="sidenav-second-level collapse" id="order">
                    <li>
                        <a href="{{ route('laundry.index') }}">
                            Laundry/Order List
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('orderconfirmlist') }}">
                           Laundry/Order Confirm List
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-placement="right" data-toggle="tooltip" title="Parent Section">
                <a class="nav-link nav-link-collapse collapsed" data-parent="#parentsection" data-toggle="collapse" href="#type">
                    <i class="fa fa-fw fa-wrench">
                    </i>
                    <span class="nav-link-text">
                        Laundry Type
                    </span>
                </a>
                <ul class="sidenav-second-level collapse" id="type">
                    <li>
                        <a href="{{ route('laundrytype.index') }}">
                            Laundry Type List
                        </a>
                    </li>
                </ul>
            </li>
            @else
            <li class="nav-item" data-placement="right" data-toggle="tooltip" title="Link">
                <a class="nav-link" href="#">
                    <i class="fa fa-fw fa-link">
                    </i>
                    <span class="nav-link-text">
                        Order
                    </span>
                </a>
            </li>
            @endif
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left">
                    </i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle mr-lg-2" data-toggle="dropdown" href="#" id="messagesDropdown">
                    <i class="fa fa-fw fa-envelope">
                    </i>
                    <span class="d-lg-none">
                        Messages
                        <span class="badge badge-pill badge-primary">
                            12 New
                        </span>
                    </span>
                    <span class="indicator text-primary d-none d-lg-block">
                        <i class="fa fa-fw fa-circle">
                        </i>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-target="#logout" data-toggle="modal">
                    <i class="fa fa-fw fa-sign-out">
                    </i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>