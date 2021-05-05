<div class="sidebar-column col-lg-3"
     style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

    <div class="theiaStickySidebar"
         style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 768.188px;">
        <aside class="widget-area">
            <?php if(!empty($posts)): ?>
                <?php echo $__env->make('post.partials.widget-hot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('post.partials.widget-tags', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('post.partials.widget-recommends', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('post.partials.widget-latest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('post.partials.widget-tags', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('post.partials.widget-hot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </aside>
    </div>
</div><?php /**PATH /var/www/onlineTry/resources/views/post/partials/page-sidebar.blade.php ENDPATH**/ ?>