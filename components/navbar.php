<?php if (!isset($currentPage)) { $currentPage = ''; } ?>
<header class="site-header" data-navbar>
    <div class="container nav-wrap">
        <a class="brand-logo" href="<?php echo e(appUrl()); ?>">
            <img
                class="brand-mark"
                src="<?php echo e(asset('images/logo-viettel.png')); ?>"
                alt="Viettel"
                width="100"
                height="40"
            >
            <span class="brand-label">Dịch vụ giải pháp</span>
        </a>
        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-nav" data-nav-toggle>
            <span class="sr-only">Mở menu</span>
            <span></span><span></span><span></span>
        </button>
        <nav id="primary-nav" class="primary-nav" aria-label="Điều hướng chính" data-nav-menu>
            <a class="<?php echo e(activeClass($currentPage, 'home')); ?>" href="<?php echo e(appUrl()); ?>">Trang chủ</a>
            <a href="<?php echo e(appUrl('#solutions')); ?>">Giải pháp</a>
            <a class="<?php echo e(activeClass($currentPage, 'services')); ?>" href="<?php echo e(appUrl('services')); ?>">Dịch vụ</a>
            <a class="<?php echo e(activeClass($currentPage, 'pricing')); ?>" href="<?php echo e(appUrl('pricing')); ?>">Bảng giá</a>
            <a class="<?php echo e(activeClass($currentPage, 'blog')); ?>" href="<?php echo e(appUrl('blog')); ?>">Tin tức</a>
        </nav>
    </div>
</header>
