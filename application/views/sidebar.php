<?php $recent_news = $this->data['recent_news'] = $this->article_m->get_recent(); ?>
<?php echo anchor($news_archive_link, '+ Blog Archives'); ?>
<?php echo article_links($recent_news); ?>