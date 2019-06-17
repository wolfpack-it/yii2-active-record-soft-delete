# Soft delete extension for Yii2

This extension provides Soft delete integration for the Active Record of Yii2 Framework.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ composer require wolfpack-it/yii2-active-record-soft-delete
```

or add

```
"wolfpack-it/yii2-active-record-soft-delete": "^<latest version>"
```

to the `require` section of your `composer.json` file.

## Configuration

In a Active Record:

```php
class ActiveRecordClass extends \yii\db\ActiveRecord {
    use \WolfpackIT\softDelete\traits\SoftDelete;
}
```

## TODO
- Add tests 

## Credits
- [Joey Claessen](https://github.com/joester89)
- [Evgeni Govedarov](https://github.com/egovedarov)
- [Wolfpack IT](https://github.com/wolfpack-it)

## License

The MIT License (MIT). Please see [LICENSE](https://github.com/wolfpack-it/yii2-active-record-soft-delete/blob/master/LICENSE) for more information.