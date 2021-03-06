    <div id="callfade" class="forfade"></div>
    <div class="clear"></div>

    <div>
        <img id="loginlogo" src="{{asset('image/logo-salesvision (2).png')}}" />
    </div>
    <nav class="bar">
        <button type="button" class="btn btn-link mainbutton" ng-click="callProject()" style="position:absolute;top:3%;left:100px;" id="projnav">Projects</button>
        <button type="button" class="btn btn-link mainbutton" style="position:absolute;top:3%;left:250px;" ng-click="callCompany()" id="comnav">Companies</button>
        <button type="button" class="btn btn-link mainbutton" style="position:absolute;top:3%;left:400px;" ng-click="callContact()" id="contnav">Contacts</button>
        <button type="button" class="btn btn-link mainbutton" style="position:absolute;top:3%;left:550px;" ng-click="callSalesperson()" id="salesnav">Sales Persons</button>
        <button type="button" class="btn btn-link mainbutton" style="position:absolute;top:3%;left:700px;" ng-click="callDashboard()"
            id="dash">Dashboard</button>
        
        <div class="dropdown navdropdown" style="top:3%;left:88%;" ng-controller="MyControllerModal">
            <button type="button" class="btn btn-link mainbutton1" id="usernamebtn">{{Auth::user()->first_name}}</button>
            <div class="dropdown-content">
                <a href="#" ng-click="openchangepassword('sm')">Change password</a>
                <a href="{{ route('log_out') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('log_out') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                </form>
            </div>
        </div>

        <div class="dropdown navdropdown" style="top:3%;left:84.3%;">
            <button class="btn-link mainbutton1 barIcon">
                <span class="glyphicon glyphicon-plus-sign" style="color:white; font-size:20px; padding-top:5px;"></span>
            </button>
            <div class="dropdown-content" role="menu" aria-labelledby="dropdownMenu" ng-controller="MyControllerModal">
                <div class="dropdown-submenu">
                    <a tabindex="-1" href="#">Add Project</a>
                    <div class="dropdown-content">

                        <a tabindex="-1" href="#" ng-click="openL('md')">Lead</a>
                        <a href="#" ng-click="openD('md')">Deal</a>

                    </div>
                </div>
                <!--not required for now
                <a href="#" ng-click="opencontact('md')">Add Contact</a>
                !-->
                <a href="#" ng-click="opensalesperson('md')">Add Sales Person</a>
            </div>
        </div>

        <div class="dropdown navdropdown" style="top:3%;left:80.5%;" ng-controller="MyControllerModal">
            <button class="btn-link mainbutton1 barIcon">
                <span>
                    <img src="{{asset('image/Settings.png')}}" style="height:22px; width:22px;">
                </span>
            </button>
            <div class="dropdown-content">
                <a href="#" ng-click="openindustry('sm')">Edit industry</a>
                <a href="#" ng-click="openproduct('sm')">Edit product</a>
            </div>
        </div>
    </nav>