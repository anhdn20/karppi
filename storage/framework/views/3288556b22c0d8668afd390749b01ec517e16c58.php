<?php if($banner != null && $banner->image != null): ?>
    <img class="lazy" src="<?php echo e(asset('uploads/'.$banner->image)); ?>" alt="<?php echo e($banner->title); ?>" loading="lazy">
    <div class="text">
        <div class="title">
            <h1><?php echo e($banner->title); ?></h1>
            <div class="sub_title">
                <p><?php echo e($banner->sub_title); ?></p>
            </div>

        </div>
        <?php if($banner->text_btn != null): ?>
            <a href="<?php echo e($banner->url_direction ?? '#'); ?>" class="btn" tabindex="0" rel="nofollow">
                <?php echo e($banner->text_btn); ?>

            </a>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\karppi\resources\views/components/banner.blade.php ENDPATH**/ ?>