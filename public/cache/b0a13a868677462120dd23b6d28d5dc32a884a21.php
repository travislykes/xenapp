<?php $__env->startSection('content'); ?>
    <div class="mnmd-block  mnmd-block--fullwidth mnmd-post--grid-b">
        <div class="container">
            <div class="block-heading">
                <h4 class="block-heading__title">Aritlces</h4>
            </div>
            <div class="mnmd-block__inner">
                <div class="post-list">
                    <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="list-item col-md-4">
                            <article class="post post--vertical post--vertical-3i-large post__thumb-480">
                                <div class="post__thumb atbs-thumb-object-fit">
                                    <a href="/<?php echo e($article['slug']); ?>">
                                        <?php if(empty($article['images'])): ?>
                                        <img src="http://via.placeholder.com/450x400" alt="File not found">
                                        <?php else: ?>
                                            <img src="/images/<?php echo e($article['images']); ?>" alt="">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="post__text">
                                    <a href="#" class="post__cat">Category</a>
                                    <h3 class="post__title typescale-2_5"><a href="/<?php echo e($article['slug']); ?>"><?php echo e($article['title']); ?></a></h3>
                                    <div class="post__excerpt"><?php echo substr($article['body'], 0, 50); ?>..
                                    </div>
                                    <?php if(!empty($_SESSION['id']) && $article['user_id'] == $_SESSION['id']): ?>
                                    <a class="button" href="/edit-<?php echo e($article['slug']); ?>">Edit</a>
                                    <?php endif; ?>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="block-heading">
                            <h4 class="block-heading__title">No Aritlces Created</h4>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <nav class="mnmd-pagination pagination-circle">
                <div class="mnmd-pagination__links text-right">
                    <!--                                <a class="mnmd-pagination__item mnmd-pagination__item-prev" href="#"><i class="mdicon mdicon-arrow_back"></i> PREVIOUS</a>-->
                    <a class="mnmd-pagination__item" href="#">1</a>
                    <a class="mnmd-pagination__item" href="#">2</a>
                    <a class="mnmd-pagination__item" href="#">3</a>
                    <a class="mnmd-pagination__item mnmd-pagination__item-next" href="#">NEXT <i
                                class="mdicon mdicon-arrow_forward"></i></a>
                </div>
            </nav>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/views/homepage.blade.php ENDPATH**/ ?>