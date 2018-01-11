How install widget?
---------
Add flowing line into your `composer.json` files.

```js
"aminkt/yii2-input-tag-widget" : "@dev"
```




How use widget?
---------
Add flowing lines into your view file.

```php
<?= $form->field($model, 'tags')->widget(\aminkt\widgets\inputTag\InputTag::className(), [
    'options'=>[
        'maxlength' => true,
        'class'=>'form-control maxlength-handler'
    ]
]) ?>
```