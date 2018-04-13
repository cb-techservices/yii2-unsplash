<?php

// namespace frontend\modules\unsplash;
namespace cbtech\unsplash;

/**
 * unsplash module definition class
 */
class UnsplashImagePickerModule extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
//     public $controllerNamespace = 'frontend\modules\unsplash\controllers';
	public $controllerNamespace = 'cbtech\unsplash\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        \Crew\Unsplash\HttpClient::init([
			'applicationId'	=> $this->params['applicationId'], //Access Key in UnSplash App info.
			'utmSource' => $this->params['utmSource'],
		]);
    }
}
