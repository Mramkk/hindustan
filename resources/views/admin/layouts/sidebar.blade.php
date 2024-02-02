<div class="sidebar-wrapper" data-simplebar="true" style="background: #edf8ff">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('public/assets/admin/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <a href="{{route('dashboard')}}"><h4 class="logo-text">HA</h4></a>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow text-primary">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul>
                <li> <a href="{{route('dashboard')}}"><i class='bx bx-radio-circle'></i>Home</a>
                </li>
                <li> <a href="#"><i class='bx bx-radio-circle'></i>Slider</a>
                </li>
                <li> <a href="#"><i class='bx bx-radio-circle'></i>Popup Alert</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow text-info">
                <div class="parent-icon"><i class='bx bxs-purchase-tag' ></i>
                </div>
                <div class="menu-title">Producs</div>
            </a>
            <ul>
                <li> <a href="{{route('category')}}"><i class='bx bx-radio-circle'></i>Product Categories</a>
                </li>
                <li> <a href="{{route('brand')}}"><i class='bx bx-radio-circle'></i>Product Brands</a>
                </li>
                <li> <a href="{{route('unit')}}"><i class='bx bx-radio-circle'></i>Product Units</a>
                </li>
                <li> <a href="{{route('product.table')}}"><i class='bx bx-radio-circle'></i>Product List</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow text-danger">
                <div class="parent-icon"><i class='bx bxs-shopping-bags' ></i>
                </div>
                <div class="menu-title">Return</div>
            </a>
            <ul>
                <li> <a href="#"><i class='bx bx-radio-circle'></i>Sale Return</a>
                </li>
                <li> <a href="#"><i class='bx bx-radio-circle'></i>Purchase Return</a>
                </li>
                <li> <a href="#"><i class='bx bx-radio-circle'></i>Sale Return List</a>
                </li>
                <li> <a href="#"><i class='bx bx-radio-circle'></i>Purchase Return List</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow text-success">
                <div class="parent-icon"><i class='bx bxs-wallet-alt' ></i>
                </div>
                <div class="menu-title">Payments History</div>
            </a>
            <ul>
                <li> <a href="#"><i class='bx bx-radio-circle'></i>All Transactions</a>
                </li>
            </ul>
        </li>


        <li>
            <a href="{{route('logout')}}" class="text-danger">
                <div class="parent-icon"><i class='bx bx-power-off'></i>
                </div>
                <div class="menu-title">Logout</div>
            </a>
        </li>
        {{-- <li class="menu-label">UI Elements</li>
        <li>
            <a href="widgets.html">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Widgets</div>
            </a>
        </li> --}}


    </ul>
    <!--end navigation-->
</div>
