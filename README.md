# yii2 Activeform Extension (1.0.0)


A simple Yii2 extended ActiveForm widget.
<br />
<br />

Features
------------
- [Bootstrap daterangepicker](http://www.daterangepicker.com/) for date picker fields
- [Select2](http://www.select2.com/) for dropDownList
- [Summernote](http://www.summernote.com/) for text editor

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

<br />
After the extension is installed, use it in your code wherever you need activeform.

Following is the example of a single date input field. It uses jquery daterangepicker for the input field.
```php
echo $form->field($model, "formFieldName")->singleDateInput();
```

<br />
Following is the example of a date range input field. It uses jquery daterangepicker for the input field.

```php
echo $form->field($model, "formFieldName")->dateRangeInput();
```

<br />
Following is the example of a drop down field. It uses jquery select2 for the input field.

```php
echo $form->field($model, "formFieldName")->dropDownList();
```

<br />
Following is the example of a text editor field. It uses summernote for the textarea field.

```php
echo $form->field($model, "formFieldName")->wysiwyg();
```
