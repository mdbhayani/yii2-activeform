# yii2 Activeform Extension (1.0.0)


A simple Yii2 extended ActiveForm widget.
<br />
<br />
Requirements
------------
- Yii2
- PHP 5.4+

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

```bash
php composer.phar require mdbhayani/yii2-activeform "*"
```

This widget has the following methods.
<br />
<br />
<br />
### singleDateInput
This is a single date picker input field. For datepicker configuration, please see [bootstrap daterangepicker](http://www.daterangepicker.com/)
```php
echo $form->field($model, "singleDateField")->singleDateInput();
```
<br />
<br />

### dateRangeInput
This is a date range picker input field. For datepicker configuration, please see [bootstrap daterangepicker](http://www.daterangepicker.com/)
```php
echo $form->field($model, "dateRangeField")->dateRangeInput();
```
<br />
<br />

### dropDownList
This is the yii2 active field method. We have added select2 on the dropDownList. For details on select2 configuration, please see [select2](https://select2.org/)
```php
echo $form->field($model, "dropDownField")->dropDownList();
```
<br />
<br />

### wysiwyg
Often we need text editors for entering content with html. We have used summernote editor. For details on summernote configuration, please see [summernote](https://summernote.org/)
```php
echo $form->field($model, "wysiwygField")->wysiwyg();
```
