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
```
'modules' => [
	'unsplash' => [
        'class' => 'frontend\modules\unsplash\UnsplashImagePickerModule',
        // ... other configurations for the module ...
        'params'=>[
        	'applicationId'	=> '8aec781867c8b5eed30a15f649aadbec2004efb1daeb555515b7b5c056c7ad56',
			'utmSource' => 'LeP Photo Extension',		
        ]
    ],	
],
```
Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \cbtech\unsplash\UnsplashImagePicker::widget(); ?>```