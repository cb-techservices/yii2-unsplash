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

Once the extension is installed, simply use it in your code by  :

```php
<?= \cbtech\unsplash\UnsplashImagePicker::widget(); ?>```