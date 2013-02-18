<?php
/**
 * This behavior is used for injecting angular js in Yii project.
 * To enable the behavior, add the following line to main.php config file.
 *
 * 'behaviors' => array('ext.yii-angularjs.behaviors.AngularJSConfigBehavior'),
 *
 * User: keiran
 * Date: 16/2/13
 * Time: 10:56 PM
 */
class AngularJSConfigBehavior extends CBehavior
{
    const DIRECTORY = 'ext.yii-angularjs';

    public function events() {
        return array_merge(parent::events(), array(
            'onBeginRequest'=>'beginRequest',
        ));
    }

    public function beginRequest() {
        // import components to a project
        Yii::import(self::DIRECTORY .'.helpers.*');
        Yii::import(self::DIRECTORY .'.widgets.*');
        // enable AngularJS custom theme in the extension
        $this->enableTheme();
    }

    /**
     * Enable AngularJS theme in the project
     */
    public function enableTheme() {
        $themePath = dirname(__FILE__) .'/../themes';
        $themeUrl = Yii::app()->assetManager->publish($themePath);
        $themeManager = new CThemeManager();
        $themeManager->setBasePath($themePath);
        $themeManager->setBaseUrl($themeUrl);
        $themeManager->init();
        Yii::app()->setComponent('themeManager', $themeManager);
        Yii::app()->setTheme('angularjs');
    }

}
