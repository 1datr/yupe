<?php
    $this->breadcrumbs = array(
        Yii::app()->getModule('feedback')->getCategory() => array(),
        Yii::t('feedback', 'Сообщения с сайта') => array('/feedback/default/index'),
        $model->theme,
    );

    $this->pageTitle = Yii::t('feedback', 'Сообщения с сайта - просмотр');

    $this->menu = array(
        array('icon' => 'list-alt', 'label' => Yii::t('feedback', 'Управление сообщениями с сайта'), 'url' => array('/feedback/default/index')),
        array('icon' => 'plus-sign', 'label' => Yii::t('feedback', 'Добавить сообщение с сайта'), 'url' => array('/feedback/default/create')),
        array('label' => Yii::t('dictionary', 'Значение справочника') . ' «' . mb_substr($model->theme, 0, 32) . '»'),
        array('icon' => 'pencil', 'label' => Yii::t('feedback', 'Редактирование сообщения с сайта'), 'url' => array(
            '/feedback/default/update',
            'id' => $model->id
        )),
        array('icon' => 'eye-open', 'label' => Yii::t('feedback', 'Просмотреть сообщение с сайта'), 'url' => array(
            '/feedback/default/view',
            'id' => $model->id
        )),
        array('icon' => 'envelope', 'label' => Yii::t('feedback', 'Ответить на сообщение с сайта'), 'url' => array(
            '/feedback/default/answer',
            'id' => $model->id
        )),
        array('icon' => 'trash', 'label' => Yii::t('feedback', 'Удалить сообщение с сайта'), 'url' => '#', 'linkOptions' => array(
            'submit'  => array('/feedback/default/delete', 'id' => $model->id),
            'confirm' => Yii::t('feedback', 'Вы уверены, что хотите удалить сообщение с сайта?'),
        )),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('feedback', 'Просмотр сообщения с сайта'); ?><br />
        <small>&laquo;<?php echo $model->name; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'       => $model,
    'attributes' => array(
        'id',
        array(
            'name'  => 'creation_date',
            'value' => Yii::app()->getDateFormatter()->formatDateTime($model->creation_date, "short", "short"),
        ),
        array(
            'name'  => 'change_date',
            'value' => Yii::app()->getDateFormatter()->formatDateTime($model->change_date, "short", "short"),
        ),
        'name',
        'email',
        'phone',
        'theme',
         array(
            'name' => 'text',
            'type' => 'raw'
        ),
        array(
            'name'  => 'type',
            'value' => $model->getType(),
        ),
        array(
            'name'  => 'status',
            'value' => $model->getStatus(),
        ),
        array(
            'name' => 'answer',
            'type' => 'raw'
        ),
        array(
            'name'  => 'answer_user',
            'value' => $model->getAnsweredUser(),
        ),
        array(
            'name'  => 'answer_date',
            'value' => ($model->answer_date != "0000-00-00 00:00:00")
                ? Yii::app()->dateFormatter->formatDateTime($model->answer_date, 'short')
                : "—",
        ),
        array(
            'name'  => 'is_faq',
            'value' => $model->getIsFaq(),
        ),
        'ip',
    ),
)); ?>