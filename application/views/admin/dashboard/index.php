<h2>Recently modified blogs</h2>

<?php if(count($recent_articles)): ?>
<ul>
<?php foreach($recent_articles as $article): ?>
<li><?php echo anchor('admin/article/edit/' . $article->id, e($article->title)); ?> - <?php echo date('Y-m-d', strtotime(e($article->modified))); ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<div class='row'></div>

<h2>Site Analytics</h2>

<h3>Website Analytics Will Go Here!</h3>
