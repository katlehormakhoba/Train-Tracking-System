

@if (Auth::check())
@if (Auth::user()->role->name == "ROLE_ADMIN")
<div class="left-sidebar mt-3">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li> 
                        <a href="{{route("dashboard")}}" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Dashboard</span></a>
                    </li>
                    <li> 
                        <a href="{{route("trains")}}" aria-expanded="false"><i class="fa fa-train"></i><span class="hide-menu">Trains</span></a>
                    </li>
                    <li> 
                        <a href="{{route("passengers")}}" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Passengers</span></a>
                    </li>
                    <li> 
                        <a href="{{route("tickets")}}" aria-expanded="false"><i class="fa fa-ticket"></i><span class="hide-menu">Tickets</span></a>
                    </li>
                    <li> 
                        <a href="{{route("stations")}}" aria-expanded="false"><i class="fa fa-train"></i><span class="hide-menu">Stations</span></a>
                    </li>
                    @if (Auth::user()->role->name == "ROLE_PASSENGER")
                        <li> 
                            <a href="{{route("cards")}}" aria-expanded="false"><i class="fa fa-credit-card"></i><span class="hide-menu">Cards</span></a>
                        </li>
                    @endif
                    <li> 
                        <a href="{{route("prices")}}" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">Prices</span></a>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
</div>  
@else
<div class="left-sidebar mt-3">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li> 
                        <a href="{{route("dashboard")}}" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Dashboard</span></a>
                    </li>
                    <li> 
                        <a href="{{route("trains")}}" aria-expanded="false"><i class="fa fa-train"></i><span class="hide-menu">Trains</span></a>
                    </li>
                    <li> 
                        <a href="{{route("tickets")}}" aria-expanded="false"><i class="fa fa-ticket"></i><span class="hide-menu">Tickets</span></a>
                    </li>
                    <li> 
                        <a href="{{route("stations")}}" aria-expanded="false"><i class="fa fa-train"></i><span class="hide-menu">Stations</span></a>
                    </li>
                    @if (Auth::user()->role->name == "ROLE_PASSENGER")
                    <li> 
                        <a href="{{route("cards")}}" aria-expanded="false"><i class="fa fa-credit-card"></i><span class="hide-menu">Cards</span></a>
                    </li>
                    @endif
                    <li> 
                        <a href="{{route("prices")}}" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">Prices</span></a>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
</div>  
@endif  
@endif

