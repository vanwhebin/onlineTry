<?php $__env->startSection('content'); ?>
    <div class="site-content">
        <div class="container">
            <div class="row" style="transform: none;">
                <div class="content-column col-lg-9">
                    <div class="content-area">
                        <article class="post article-list ">
                            <header class="archive-header">
                                <h1><i class="fa fa-newspaper-o"></i> &nbsp;最新文章 </h1>
                                <div class="archive-header-info">
                                    5438下载站提供最新最酷的PC电脑软件工具、单机游戏MOD、浏览器插件、源码模板、电子数据、视频教程、手机APP、苹果应用、游戏工具等下载资源,更新快,种类全,所有软件均经过检测,安全无毒,为广大网民提供贴心,省心,放心的免费软件下载网站。
                                </div>
                                <br>
                                <div class="archive-header-info">今日更新
                                    <stong style="color: red;font-size: 18px;">3</stong>
                                    个资源 &nbsp; | &nbsp; 共
                                    <stong style="color: red;font-size: 18px;">2839</stong>
                                    个资源
                                </div>
                            </header>
                        </article>
                        <main class="site-main">
                            <div class="article-lists">
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <article class="post article-list ">
                                        <div class="entry-media">
                                            <a href="/post/3940.html" target="_blank">
                                                <img class="smallimage ls-is-cached lazyloaded"
                                                     data-src="<?php echo e($post->image); ?>"
                                                     src="<?php echo e($post->image); ?>"
                                                     alt="<?php echo e($post->title); ?>">
                                            </a>
                                        </div>
                                        <div class="entry-wrapper">

                                            <header class="entry-header" style="border: none">
                                                <h2 class="entry-title">
                                                    <a class="cat" href="/list/3.html"><?php echo e($post->category); ?></a>
                                                    <a href="/post/3940.html" title="<?php echo e($post->title); ?>"
                                                       rel="bookmark" target="_blank"><?php echo e($post->title); ?></a>
                                                </h2>
                                            </header>
                                            <div class="entry-excerpt u-text-format"><?php echo e(($post->desc)); ?></div>
                                            <div class="entry-footer">
                                                <a href="javascript:void(0)">
                                                    <time><?php echo e($post->created_at->diffForHumans()); ?></time>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <span><i class="fa fa-eye"></i> <?php echo e($post->views); ?></span>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <span><i class="fa fa-commenting-o"></i> <?php echo e($post->comments); ?></span>
                                                </a>

                                                <div class="entry-meta">
                                                    <span class="meta-category">
                                                        <a href="/tag/55m_5bqm5Li75Yqo5o6o6YCB.html" rel="category"
                                                           title="查看关于 百度主动推送 的文章" target="_blank"><i class="dot"></i>百度主动推送</a>
                                                        <a href="/tag/55m_5bqm5Li75Yqo5o6o6YCB5bel5YW3.html"
                                                           rel="category" title="查看关于 百度主动推送工具 的文章" target="_blank"><i
                                                                    class="dot"></i>百度主动推送工具</a>
                                                        <a href="/tag/55m_5bqm5o6o6YCB5bel5YW3.html" rel="category"
                                                           title="查看关于 百度推送工具 的文章" target="_blank"><i class="dot"></i>百度推送工具</a>
                                                        <a href="/tag/5o6o6YCB5bel5YW3.html" rel="category"
                                                           title="查看关于 推送工具 的文章" target="_blank"><i class="dot"></i>推送工具</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <article class="pag-list ">
                                <?php echo $__env->make('post.partials.widget-pagination', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </article>
                        </main>
                    </div>
                </div>

                <?php echo $__env->make('post.partials.page-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.master', ['meta_description' => '列表'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/onlineTry/resources/views/post/list.blade.php ENDPATH**/ ?>