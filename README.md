# yiiauth/gitlab

This extension adds GitLab OAuth2 supporting for [yii2-authclient](https://github.com/yiisoft/yii2-authclient).

[![Latest Stable Version](https://poser.pugx.org/yiiauth/gitlab/v/stable)](https://packagist.org/packages/yiiauth/vk)
[![Total Downloads](https://poser.pugx.org/yiiauth/gitlab/downloads)](https://packagist.org/packages/yiiauth/gitlab)
[![Monthly Downloads](https://poser.pugx.org/yiiauth/gitlab/d/monthly)](https://packagist.org/packages/yiiauth/gitlab)
[![License](https://poser.pugx.org/yiiauth/gitlab/license)](https://packagist.org/packages/yiiauth/gitlab)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require yiiauth/gitlab
```

or add

```json
"yiiauth/gitlab": "~0.1"
```

to the `require` section of your composer.json.

## Usage

You must read the yii2-authclient [docs](https://github.com/yiisoft/yii2/blob/master/docs/guide/security-auth-clients.md)

Register your application [in GitLab](https://gitlab.com/profile/applications)

and add the GitLab client to your auth clients.

```php
'components' => [
    'authClientCollection' => [
        'class' => yii\authclient\Collection::class,
        'clients' => [
               'gitlab' => [
                   'class' => \yiiauth\gitlab\GitLabClient::class,
                   'domain'  => 'https://gitlab.com'
                   'clientId' => 'gitlab_client_id',
                   'clientSecret' => 'gitlab_client_secret',
               ],
            // other clients
        ],
    ],
    // ...
 ]
 ```