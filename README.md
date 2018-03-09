# yii2 Activeform Extension (1.0.0)


A simple Yii2 extended ActiveForm widget.
<br />
<br />

Features
------------
- Bootstrap daterange picker for date picker fields [daterangepicker](http://www.daterangepicker.com/)
- Select2 for dropDownList [select2](http://www.select2.com/)
- Summernote for text editor [summernote](http://www.summernote.com/)

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

After the extension is installed, use it in your code wherever you need activeform.

Following is the example of a single date input field. It uses jquery daterangepicker for the input field.
```php
echo $form->field($model, "formFieldName")->singleDateInput();
```

Following is the example of a date range input field. It uses jquery daterangepicker for the input field.
```php
echo $form->field($model, "formFieldName")->dateRangeInput();
```

Following is the example of a drop down field. It uses jquery select2 for the input field.
```php
echo $form->field($model, "formFieldName")->dropDownList();
```

Following is the example of a text editor field. It uses summernote for the textarea field.
```php
echo $form->field($model, "formFieldName")->wysiwyg();
```
