<!-- ========== Left Sidebar Start ========== -->

<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Men&uacute; Principal</li>
                @forelse ($menus as $key => $item)
                    @if ($item["padre_id"]!=0)
                        @break
                    @endif
                    @include('layouts.menu-items',["item" => $item])
                @empty                    
                @endforelse
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->