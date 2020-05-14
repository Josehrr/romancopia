<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src="{{url('/static/images/logo.png')}}" class="img-fluid" alt="">
        </div>
        <div class="user">
            <span class="submitle">Hola:</span>
            <div class="name">
                {{ Auth::user()->name }} {{Auth::user()->lastname}}
                <a href="{{url('/logout')}}" title="Salir" data-toggle="tooltip" data-placement="top">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
            <div class="email">{{Auth::user()->email}}</div>
        </div>
    </div>

    <div class="main">
        <ul>
            <li>
                <a href="{{url('/admin')}}" class="lk-dashboard"><i class="fas fa-house-damage"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{url('/admin/products')}}" class="lk-products lk-product_add lk-product_edit lk_product_gallery_add">
                    <i class="fas fa-boxes"></i> Productos
                </a>
            </li>
            <li>
                <a href="{{url('/admin/categories/0')}}" class="lk-categories lk-category_add lk-category_edit lk-category_delete">
                    <i class="far fa-folder-open" ></i> Categorías
                </a>
            </li>
            <li>
                <a href="{{url('/admin/users/all')}}" class="lk-users lk-user_edit"><i class="fas fa-user-friends"></i> Usuarios</a>
            </li>
        </ul>
    </div>
    <!-- /.main -->
</div>
<!-- /.sidebar -->
