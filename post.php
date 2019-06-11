<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
$this->need('header.php');
require_once 'functions.php';
$this->widget('Widget_Contents_Page_List')->to($pages);
global $pages_note, $pages_say;
while ($pages->next()):
    switch ($pages->slug) {
        case 'note':
            $pages_note = $pages->permalink;
            break;
        case 'saying':
            $pages_say = $pages->permalink;
            break;
        default:
            break;
    }
endwhile;
?>


<main class="is-article">
    <nav class="navigation">
        <a href="<?php echo $pages_note; ?>" class="active">日记</a>
        <?php if ($this->options->blog_url): ?> <a href="<?php $this->options->blog_url(); ?>" target="_blank">
                博文</a><?php endif; ?>
        <a href="<?php echo $pages_say; ?>">语录</a>
    </nav>
    <article>
        <h1 style="position: relative"><?php echo $this->date('Y-m-d'); ?>
            <small>(<?php echo $this->date('l'); ?>)</small>
            <div style="font-weight: 400;position: absolute;top: 0;left: 0;right: 0;bottom: 0;text-align: center"><?php $this->title() ?></div>
        </h1>
        <div class="paul-note" id="<?php $this->cid() ?>">
            <div class="note-content">
                <?php $this->content(); ?>
            </div>
            <?php if ($this->options->author_text): ?>
                <div class="note-content">
                    <?php $this->options->author_text(); ?>
                </div>
            <?php endif; ?>
            <div class="note-inform">
                <span class="user"><?php $this->author(); ?></span>
                <span class="views" title="阅读次数"><i class="fa fa-leaf" aria-hidden="true"></i> <?php echo $this->views ?></span>
            </div>
            <div class="note-action">
                    <span class="comment" data-cid="<?php $this->cid(); ?>" data-year="<?php $this->year(); ?>"
                          title="参与评论">评论</span>
                <!--                    TODO 点赞实现 line 191 263 86 -->
                <!--                    <span class="like" data-cid="-->
                <?php //$this->cid(); ?><!--" title="已有 0 人点赞">0</span>-->
            </div>
        </div>
    </article>
    <?php $this->need('comments.php') ?>
    <script src="<?php $this->options->themeUrl('src/index.js') ?>"></script>
</main>

<?php $this->footer(); ?>
<?php $this->need('footer.php'); ?>

