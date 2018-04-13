Yii2 UnSplash API Widget
========================
Easily display an image picker with UnSplash images API.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist carlb0329/yii2-unsplash "*"
```

or add

```
"carlb0329/yii2-unsplash": "*"
```

to the require section of your `composer.json` file.

Configuration
------------
Add the following to your main.php config file in your Yii project.

```
'modules' => [
	'unsplash' => [
        'class' => 'cbtech\unsplash\UnsplashImagePickerModule',
        // ... other configurations for the module ...
        'params'=>[
        	'applicationId'	=> '{ACCESS_KEY}',
			'utmSource' => '{UTM_SOURCE}',		
        ]
    ],	
],
```
Usage
-----

Once the extension AND module are installed, simply use it in your code by  :

```php
<?= \cbtech\unsplash\UnsplashImagePicker::widget(); ?>```

Use Javascript and jQuery to listen for the 'unsplashDownload' event.

```javascript
<script type="text/javascript">
$(document).bind('unsplashDownload',"#unsplash-results",function(event, data){
	console.log("Download Url = = " + data.downloadUrl);
	console.log("Thumnail Url = = " + data.thumbnailUrl);

	$.ajax({
		"method":"POST",
		"url":"/project/save-user-project-media-url-ajax",
		"data":{downloadUrl: data.downloadUrl}
	}).done(function(response){
		$(".file-default-preview").empty().html("<img src='" + response.data.media.url + "' style='width:200px;height:200px;object-fit:cover;'/>");
	});
});
</script>
```
 