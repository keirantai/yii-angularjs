<?php
/**
 * This is a helper class extending CHTML class
 * User: keiran
 * Date: 16/2/13
 * Time: 12:02 AM
 */
class AHTML extends CHTML
{
    /**
     * Use to create HTML element with ng-app attribute. "html" element is the default element.
     * @param string $appName
     * @param string $tag
     * @param array $htmlOptions
     * @param bool $content
     * @param bool $closeTag
     * @return mixed
     */
    public static function ngApp($appName='', $tag='html', $htmlOptions=array(), $content=false, $closeTag=true) {
        // add ng-app tag to the element
        $htmlOptions = array_merge(array('ng-app'=>$appName), $htmlOptions);
        return self::tag($tag, $htmlOptions, $content, $closeTag);
    }

    /**
     * Create an element as an ng-controller. By default, the element is div.
     * @param string $controllerName Controller name which uses to refer AngularJS controller in javascript
     * @param string $tag Name of the HTML element with controller setup
     * @param array $htmlOptions
     * @param bool $content
     * @param bool $closeTag
     * @return mixed
     */
    public static function ngController($controllerName='DefaultCtrl', $tag='div', $htmlOptions=array(), $content=false, $closeTag=true) {
        $htmlOptions = array_merge(array('ng-controller'=>$controllerName), $htmlOptions);
        return self::tag($tag, $htmlOptions, $content, $closeTag);
    }

    /**
     * Create an element with ng-repeat set. By default, the element is li.
     * @param string $repeatCondition The condition of the repeat element. e.g. friend in friendlist
     * @param string $tag The element which is used to multiple contents from the model according to the repeat condition
     * @param array $htmlOptions
     * @param bool $content
     * @param bool $closeTag
     * @return mixed
     */
    public static function ngRepeat($repeatCondition='', $tag='li', $htmlOptions=array(), $content=false, $closeTag=true) {
        $htmlOptions = array_merge(array('ng-repeat'=>$repeatCondition), $htmlOptions);
        return self::tag($tag, $htmlOptions, $content, $closeTag);
    }

    /**
     * Create an element which binds with a model. By default, it's a <input> element.
     * @param $model
     * @param string $tag
     * @param array $htmlOptions
     * @param bool $content
     * @param bool $closeTag
     * @return mixed
     */
    public static function ngModel($model, $tag='input', $htmlOptions=array(), $content=false, $closeTag=true) {
        $htmlOptions = array_merge(array('ng-model'=>$model), $htmlOptions);
        return self::tag($tag, $htmlOptions, $content, $closeTag);
    }

    /**
     * Create a <form> element binds with ng-submit event handler.
     * @param $action
     * @param array $htmlOptions
     * @param bool $content
     * @param bool $closeTag
     * @return mixed
     */
    public static function ngSubmit($action, $htmlOptions=array(), $content=false, $closeTag=true) {
        $htmlOptions = array_merge(array('ng-submit'=>$action), $htmlOptions);
        return self::tag('form', $htmlOptions, $content, $closeTag);
    }

    /**
     * Create a HTML element with an ng-view.
     * @param string $tag The HTML element tag which is used to host the dynamic view contents
     * @param array $htmlOptions
     * @param bool $closeTag
     * @return mixed
     */
    public static function ngView($tag='div', $htmlOptions=array(), $closeTag=true) {
        $htmlOptions = array_merge(array('ng-view'=>''), $htmlOptions);
        return self::tag($tag, $htmlOptions, false, $closeTag);
    }

    /**
     * Create an element with ng-click event handler. By default, the element is an anchor (a.k.a. <a>).
     * @param $action
     * @param string $tag
     * @param array $htmlOptions
     * @param bool $content
     * @param bool $closeTag
     * @return mixed
     */
    public static function ngClick($action, $tag='a', $htmlOptions=array(), $content=false, $closeTag=true) {
        $htmlOptions = array_merge(array('ng-click'=>$action), $htmlOptions);
        return self::tag($tag, $htmlOptions, $content, $closeTag);
    }

    /**
     * Create an <img> element with ng-src as a replacement of 'src' attribute.
     * @param $src The variable stores the source URL of the image.
     * @param array $htmlOptions
     * @return mixed
     */
    public static function ngImage($src, $htmlOptions=array()) {
        $htmlOptions = array_merge(array('ng-src'=>$src), $htmlOptions);
        return self::tag('img', $htmlOptions, false, true);
    }

    /**
     * Create an input text field binding with a model.
     * @param $model The name of the model to be bound.
     * @param array $htmlOptions
     * @return mixed
     */
    public static function ngTextField($model, $htmlOptions=array()) {
        $htmlOptions = array_merge(array('type'=>'text'), $htmlOptions);
        return self::ngModel($model, 'input', $htmlOptions, false, true);
    }

    /**
     * Create a textarea binding with a model.
     * @param $model
     * @param array $htmlOptions
     * @param bool $content
     * @return mixed
     */
    public static function ngTextArea($model, $htmlOptions=array(), $content=false) {
        return self::ngModel($model, 'textarea', $htmlOptions, $content, true);
    }

    /**
     * Create a HTML button with ng-action.
     * @param string $label Label of the button
     * @param string $action The action will be triggered when click
     * @param array $htmlOptions
     * @return mixed
     */
    public static function ngButton($label='button', $action='', $htmlOptions=array()) {
        $htmlOptions = array_merge(array(
            'name'=>self::ID_PREFIX.self::$count++,
            'type'=>'button',
        ), $htmlOptions);
        return self::ngClick($action, 'button', $htmlOptions, $label, true);
    }

    /**
     * Create an email input field with action.
     * @param $model
     * @param array $htmlOptions
     * @return mixed
     */
    public static function ngEmailField($model, $htmlOptions=array()) {
        $htmlOptions = array_merge(array('type'=>'email'), $htmlOptions);
        return self::ngModel($model, 'input', $htmlOptions, false, true);
    }

}
