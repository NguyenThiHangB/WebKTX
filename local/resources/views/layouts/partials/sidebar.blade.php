<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            <li><a><i class="fa fa-users"></i>{{ __('labels.employee_manager') }}<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('employees.index') }}">{{ __('titles.list_employee') }}</a></li>
                    <li><a href="{{ route('positions.index') }}">{{ __('labels.position_manager') }}</a></li>
                    <li><a href="#">Ca trực</a></li>
                    <li><a href="#">Tài khoản</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-graduation-cap"></i>{{ __('labels.student_manager') }}<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('students.index') }}">Danh sách sinh viên</a></li>
                    <li><a href="#">Sinh viên đăng ký online</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-file-text"></i>{{ __('labels.contract_manager') }}<span class="fa fa-chevron-down"></span></a>
            </li>
            <li><a><i class="fa fa-home"></i>{{ __('labels.region_manager') }}<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('regions.index') }}">{{ __('titles.list_region') }}</a></li>
                    <li><a href="{{ route('rows.index') }}">{{ __('labels.row_manager') }}</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-th-large"></i>{{ __('labels.room_manager') }}<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('rooms.index') }}">{{ __('titles.list_room') }}</a></li>
                    <li><a href="{{ route('typerooms.index') }}">{{ __('labels.type_room_manager') }}</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-briefcase"></i> Quản lý cơ sở vật chất <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Danh sách cơ sở vật chất</a></li>
                    <li><a href="#">Cơ sở vật chất yêu cầu</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-files-o"></i> Quản lý hóa đơn <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Hóa đơn điện, nước</a></li>
                    <li><a href="#">Hóa đơn phòng</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-money"></i> Quản lý đơn giá<span class="fa fa-chevron-down"></span></a>
            </li>
        </ul>
    </div>
</div>
