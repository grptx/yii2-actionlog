<?php

namespace cakebake\actionlog\behaviors;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Behavior;
use cakebake\actionlog\model\ActionLog;

/**
 * To use ActionLogBehavior, simply insert the following code to your ActiveRecord class:
 *
 * ```php
 * public function behaviors()
 * {
 *     return [
 *          'actionlog' => [
 *              'class' => 'cakebake\actionlog\behaviors\ActionLogBehavior',
 *          ],
 *     ];
 * }
 * ```
 */

class ActionLogBehavior extends Behavior
{
    /**
    * @var string The message of current action
    */
    public $message = null;

    /**
     * @inheritdoc
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
            ActiveRecord::EVENT_BEFORE_DELETE => 'beforeDelete',
        ];
    }

    public function beforeInsert($event)
    {
        $model = new ActionLog();
        $model->user_id = $this->owner->getPrimaryKey();
        $model->action = Yii::$app->requestedAction->id;
        $model->user_remote = $_SERVER['REMOTE_ADDR'];
        $model->category = Yii::$app->requestedAction->controller->id;
        $model->message = $this->message !== null ? $this->message : __METHOD__;
        $model->save();
    }

    public function beforeUpdate($event)
    {
        $model = new ActionLog();
        $model->user_id = $this->owner->getPrimaryKey();
        $model->action = Yii::$app->requestedAction->id;
        $model->user_remote = $_SERVER['REMOTE_ADDR'];
        $model->category = Yii::$app->requestedAction->controller->id;
        $model->message = $this->message !== null ? $this->message : __METHOD__;
        $model->save();
    }

    public function beforeDelete($event)
    {
        $model = new ActionLog();
        $model->user_id = $this->owner->getPrimaryKey();
        $model->action = Yii::$app->requestedAction->id;
        $model->user_remote = $_SERVER['REMOTE_ADDR'];
        $model->category = Yii::$app->requestedAction->controller->id;
        $model->message = $this->message !== null ? $this->message : __METHOD__;
        $model->save();
    }
}
