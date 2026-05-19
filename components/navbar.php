<header class="site-header" data-navbar>
    <div class="container nav-wrap">
        <a class="brand" href="<?php echo e(APP_URL); ?>/">
            <span class="brand-mark" aria-hidden="true">V</span>
            <span><?php echo e(APP_NAME); ?></span>
        </a>
        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-nav" data-nav-toggle>
            <span class="sr-only">Mở menu</span>
            <span></span><span></span><span></span>
        </button>
        <nav id="primary-nav" class="primary-nav" aria-label="Điều hướng chính" data-nav-menu>
            <a class="<?php echo e(activeClass($currentPage, 'home')); ?>" href="<?php echo e(APP_URL); ?>/">Trang chủ</a>
            <a href="<?php echo e(APP_URL); ?>/#solutions">Giải pháp</a>
            <a class="<?php echo e(activeClass($currentPage, 'services')); ?>" href="<?php echo e(APP_URL); ?>/services">Dịch vụ</a>
            <a class="<?php echo e(activeClass($currentPage, 'pricing')); ?>" href="<?php echo e(APP_URL); ?>/pricing">Bảng giá</a>
            <a class="<?php echo e(activeClass($currentPage, 'blog')); ?>" href="<?php echo e(APP_URL); ?>/blog">Tin tức</a>
            <a class="<?php echo e(activeClass($currentPage, 'contact')); ?>" href="<?php echo e(APP_URL); ?>/contact">Liên hệ</a>
            <a class="btn btn-small" href="<?php echo e(APP_URL); ?>/contact">Đăng ký tư vấn</a>
        </nav>
    </div>
</header>
