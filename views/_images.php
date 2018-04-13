<?php foreach($pageResult->getResults() as $photo){ ?>
<div class="unsplashImage" style="display:inline-block;position:relative;cursor:pointer;">
	<img class="img-thumbnail img-responsive" alt="" src="<?= $photo['urls']['thumb']; ?>" onclick="downloadImage('<?= $photo['id']; ?>');">
	<div class="unsplashAttribution" style="position:absolute;bottom:4px;right:4px;color:#ffffff;background-color:#bfbfbf;font-size:10px;display:none;">
		Photo by <a target="_blank" href="https://unsplash.com/@<?= $photo["user"]["username"]; ?>?utm_source=<?= $utm_source; ?>&utm_medium=referral"><?= $photo["user"]["name"]; ?></a>
	</div>
</div>
<?php } ?>
<nav aria-label="Page navigation" class="text-center">
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php 
    $i = 1;
    while($i <= $pageResult->getTotalPages() && $i != 11){
    ?>
    <li class="<?= ($i == $page) ? "active": ""; ?>"><a href="#" onclick="searchPhotos('<?= $search; ?>',<?= $i; ?>, <?= $per_page; ?>, '<?= $orientation; ?>' );"><?= $i; ?></a></li>
    <?php $i++; } ?>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>