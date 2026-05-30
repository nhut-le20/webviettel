<?php if (!isset($currentPage)) { $currentPage = ''; } ?>
<nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="<?php echo appUrl(); ?>">
            Viettel <span class="text-accent">Digital</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Mở menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(activeClass($currentPage, 'home')); ?>" href="<?php echo appUrl(); ?>">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo appUrl('#solutions'); ?>">Giải pháp</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(activeClass($currentPage, 'services')); ?>" href="<?php echo appUrl('services'); ?>">Dịch vụ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(activeClass($currentPage, 'blog')); ?>" href="<?php echo appUrl('blog'); ?>">Tin tức</a>
                </li>
            </ul>
            <div class="d-flex align-items-center ms-lg-3">
                <a class="btn btn-tech btn-lg px-4" href="<?php echo appUrl('contact'); ?>">Tư vấn ngay</a>
            </div>
        </div>
    </div>
</nav>
