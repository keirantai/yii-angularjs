<?php
/**
 * This behavior is used for injecting angular js in Yii project.
 * To enable the behavior, add the following line to main.php config file.
 *
 * 'behaviors' => array('ext.behaviors.AngularJSConfigBehavior.php'),
 *
 * User: keiran
 * Date: 16/2/13
 * Time: 10:56 PM
 */
class AngularJSConfigBehavior extends CBehavior
{
    const DIRECTORY = 'yii-angularjs';

    public function events() {
        return array_merge(parent::events(), array(
            'onBeginRequest'=>'beginRequest',
        ));
    }

    protected function beginRequest() {
        // import components to a project
        Yii::import('ext.'.self::DIRECTORY.'.helpers.*');

    }

}
