<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-single-04"></i><span
                        class="nav-text">Dashboard</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{route('dashboard.admin')}}">Admin Dashboard</a></li>
                    <li><a href="{{ asset('admin/index2.html') }}">Admin Dashboard 2</a></li>
                    <li><a href="{{route('homeClient')}}">Client Dashboard</a></li>
                </ul>
            </li>
            <li class="nav-label">Quản lý </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Người dùng</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('users.index') }}">Danh sách</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="bi bi-folder category-icon"></i><span class="nav-text">Thể Loại</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{route('categories.index')}}">Danh sách</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="bi bi-box"></i><span class="nav-text">Sản Phẩm</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{route('products.index')}}">Danh sách</a></li>
                </ul>
            </li>
            <li class="nav-label">Apps</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Apps</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ asset('admin/app-profile.html') }}">Profile</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ asset('admin/email-compose.html') }}">Compose</a></li>
                            <li><a href="{{ asset('admin/email-inbox.html') }}">Inbox</a></li>
                            <li><a href="{{ asset('admin/email-read.html') }}">Read</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ asset('admin/app-calender.html') }}">Calendar</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-chart-bar-33"></i><span class="nav-text">Charts</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ asset('admin/chart-flot.html') }}">Flot</a></li>
                    <li><a href="{{ asset('admin/chart-morris.html') }}">Morris</a></li>
                    <li><a href="{{ asset('admin/chart-chartjs.html') }}">Chartjs</a></li>
                    <li><a href="{{ asset('admin/chart-chartist.html') }}">Chartist</a></li>
                    <li><a href="{{ asset('admin/chart-sparkline.html') }}">Sparkline</a></li>
                    <li><a href="{{ asset('admin/chart-peity.html') }}">Peity</a></li>
                </ul>
            </li>

            <li class="nav-label">Components</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-world-2"></i><span class="nav-text">Bootstrap</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ asset('admin/ui-accordion.html') }}">Accordion</a></li>
                    <li><a href="{{ asset('admin/ui-alert.html') }}">Alert</a></li>
                    <li><a href="{{ asset('admin/ui-badge.html') }}">Badge</a></li>
                    <li><a href="{{ asset('admin/ui-button.html') }}">Button</a></li>
                    <li><a href="{{ asset('admin/ui-modal.html') }}">Modal</a></li>
                    <li><a href="{{ asset('admin/ui-button-group.html') }}">Button Group</a></li>
                    <li><a href="{{ asset('admin/ui-list-group.html') }}">List Group</a></li>
                    <li><a href="{{ asset('admin/ui-media-object.html') }}">Media Object</a></li>
                    <li><a href="{{ asset('admin/ui-card.html') }}">Cards</a></li>
                    <li><a href="{{ asset('admin/ui-carousel.html') }}">Carousel</a></li>
                    <li><a href="{{ asset('admin/ui-dropdown.html') }}">Dropdown</a></li>
                    <li><a href="{{ asset('admin/ui-popover.html') }}">Popover</a></li>
                    <li><a href="{{ asset('admin/ui-progressbar.html') }}">Progressbar</a></li>
                    <li><a href="{{ asset('admin/ui-tab.html') }}">Tab</a></li>
                    <li><a href="{{ asset('admin/ui-typography.html') }}">Typography</a></li>
                    <li><a href="{{ asset('admin/ui-pagination.html') }}">Pagination</a></li>
                    <li><a href="{{ asset('admin/ui-grid.html') }}">Grid</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-plug"></i><span
                        class="nav-text">Plugins</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ asset('admin/uc-select2.html') }}">Select 2</a></li>
                    <li><a href="{{ asset('admin/uc-nestable.html') }}">Nestedable</a></li>
                    <li><a href="{{ asset('admin/uc-noui-slider.html') }}">Noui Slider</a></li>
                    <li><a href="{{ asset('admin/uc-sweetalert.html') }}">Sweet Alert</a></li>
                    <li><a href="{{ asset('admin/uc-toastr.html') }}">Toastr</a></li>
                    <li><a href="{{ asset('admin/map-jqvmap.html') }}">Jqv Map</a></li>
                </ul>
            </li>
            <li><a href="{{ asset('admin/widget-basic.html') }}" aria-expanded="false"><i
                        class="icon icon-globe-2"></i><span class="nav-text">Widget</span></a></li>
            <li class="nav-label">Forms</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-form"></i><span class="nav-text">Forms</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ asset('admin/form-element.html') }}">Form Elements</a></li>
                    <li><a href="{{ asset('admin/form-wizard.html') }}">Wizard</a></li>
                    <li><a href="{{ asset('admin/form-editor-summernote.html') }}">Summernote</a></li>
                    <li><a href="{{ asset('admin/form-pickers.html') }}">Pickers</a></li>
                    <li><a href="{{ asset('admin/form-validation-jquery.html') }}">Jquery Validate</a></li>
                </ul>
            </li>
            <li class="nav-label">Table</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-layout-25"></i><span class="nav-text">Table</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ asset('admin/table-bootstrap-basic.html') }}">Bootstrap</a></li>
                    <li><a href="{{ asset('admin/table-datatable-basic.html') }}">Datatable</a></li>
                </ul>
            </li>

            <li class="nav-label">Extra</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-copy-06"></i><span class="nav-text">Pages</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ asset('admin/page-register.html') }}">Register</a></li>
                    <li><a href="{{ asset('admin/page-login.html') }}">Login</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ asset('admin/page-error-400.html') }}">Error 400</a></li>
                            <li><a href="{{ asset('admin/page-error-403.html') }}">Error 403</a></li>
                            <li><a href="{{ asset('admin/page-error-404.html') }}">Error 404</a></li>
                            <li><a href="{{ asset('admin/page-error-500.html') }}">Error 500</a></li>
                            <li><a href="{{ asset('admin/page-error-503.html') }}">Error 503</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ asset('admin/page-lock-screen.html') }}">Lock Screen</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
