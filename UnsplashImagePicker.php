<?php 

namespace cbtech\unsplash;

use yii\base\Widget;
use yii\helpers\Html;

class UnsplashImagePicker extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Hello World';
        }
        
        \Crew\Unsplash\HttpClient::init([
			'applicationId'	=> '24527',
			'secret'		=> '98c356d5d1609d3748b098a4b9ff8ee2b6a5408b3018cf297c0f06c299b0486a',
			'callbackUrl'	=> 'https://your-application.com/oauth/callback-MAKEONE',
			'utmSource' => 'LeP Photo Extension'
		]);
    }

    public function run()
    {
    	\Yii::error(print_r($this->search()));
        return Html::encode($this->message);
    }
    
    public function search($search = 'forest', $page = 3, $per_page = 15, $orientation = 'landscape'){
		
		return \Crew\Unsplash\Search::photos($search, $page, $per_page, $orientation);
    }
}