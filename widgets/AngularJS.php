<?php
/**
 * AngularJS widget is used for injecting js script files to the <head> of the HTML.
 * User: keiran
 * Date: 16/2/13
 * Time: 11:40 PM
 */
class AngularJS extends CWidget
{
    public $jsFiles = array('angular.min.js', 'angular-resource.min.js');
    public $googleApiUrl = '//ajax.googleapis.com/ajax/libs/angularjs/1.0.4/';
    public $useGoogle = false;

    public function init() {
        if ($this->useGoogle) {
            $this->injectFromGoogleApi();
        } else {
            $this->injectFromAssetManager();
        }
    }

    /**
     * Register script files from Google API
     */
    protected function injectFromGoogleApi() {
        $cs = Yii::app()->clientScript;
        foreach ($this->jsFiles as $jf) {
            $cs->registerScriptFile($this->googleApiUrl . $jf, CClientScript::POS_HEAD);
        }
    }

    /**
     * Register script files from local 'js' folder and published by asset manager.
     */
    protected function injectFromAssetManager() {
        $asset = dirname(__FILE__) .'/js/';
        $passet = Yii::app()->assetManager->publish($asset);
        $cs = Yii::app()->clientScript;
        foreach ($this->jsFiles as $jf) {
            $cs->registerScriptFile($passet . '/' . $jf, CClientScript::POS_HEAD);
        }
    }

    public function run() {

    }

}
