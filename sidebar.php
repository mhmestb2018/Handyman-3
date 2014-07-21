<div class="home-right">
    <div id="sidebar">
        <div class="panel__inner sidebar__inner">
            <?php if (is_active_sidebar('site-sidebar')) : ?>
                <?php dynamic_sidebar('site-sidebar'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>