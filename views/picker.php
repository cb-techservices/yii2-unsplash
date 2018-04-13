<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;

?>
<?php 
Modal::begin([
	'header' => '',
	'id'=>'unsplashModal',
	'size'=>Modal::SIZE_LARGE,
    'toggleButton' => ['label' => $button_text,'class'=>'btn btn-success','style'=>'']
]);
?>
<div class="row">
	<div class="col-xs-6">
		<div class="input-group">
			<input id="UnsplashSearchTerm" type="text" class="form-control" value="<?= $search; ?>" placeholder="Search for..."/>
			<span class="input-group-btn">
				<button id="UnsplashSearchButton" class="btn btn-primary" type="button">Search</button>
			</span>
		</div><!-- /input-group -->
	</div>
	<div class="col-xs-6">
	<?= Html::dropDownList("UnsplashOrientation", $orientation, ["landscape"=>"Landscape","portrait"=>"Portrait"],['class'=>'form-control','id'=>'UnsplashOrientation'])?>
	</div>
</div>
<div id="unsplash-results" style="width:100%;margin-top:20px;">
<?= $this->render('_images',[
		'pageResult'=>$pageResult,
		'search'=>$search,
		'page'=>$page,
		'per_page'=>$per_page,
		'orientation'=>$orientation,
		'utm_source'=>\Yii::$app->modules["unsplash"]['params']['utmSource']
]); ?>
</div>
<div style="text-align:right;">
	Powered by <a target="_blank" href="https://unsplash.com/?utm_source=<?= \Yii::$app->modules["unsplash"]['params']['utmSource']; ?>&utm_medium=referral">Unsplash</a>
</div>
<?php 
Modal::end();
?>

<script type="text/javascript">
function searchPhotos(search, page, per_page, orientation){
	$.ajax({
		"method":"GET",
		"url":"/unsplash/ajax/search",
		"data": {search: search, page: page, per_page: per_page, orientation: orientation}
	}).done(function(response){
		console.log(response);
		$("#unsplash-results").empty().html(response.data.html);
	});
}

function downloadImage(id){
	$.ajax({
		"method":"GET",
		"url":"/unsplash/ajax/download-image",
		"data": {id: id}
	}).done(function(response){
// 		console.log(response);
		$("#unsplashModal").modal('hide');
		$("#unsplash-results").trigger("unsplashDownload",[response.data]);
	});
}

$(document).ready(function(){
	$(document).on('change',"#UnsplashSearchTerm", function(){
		searchPhotos($("#UnsplashSearchTerm").val(), 1, <?= $per_page; ?>, $("#UnsplashOrientation").val());
	});

	$(document).on('click',"#UnsplashSearchButton", function(){
		searchPhotos($("#UnsplashSearchTerm").val(), 1, <?= $per_page; ?>, $("#UnsplashOrientation").val());
	});

	$(document).on('change',"#UnsplashOrientation", function(){
		searchPhotos($("#UnsplashSearchTerm").val(), 1, <?= $per_page; ?>, $("#UnsplashOrientation").val());
	});
	
	$(document).on({
	    mouseenter: function () {
	    	$(this).children(".unsplashAttribution").show();
	    },
	    mouseleave: function () {
	    	$(this).children(".unsplashAttribution").hide();
	    }
	}, '.unsplashImage');
});
</script>