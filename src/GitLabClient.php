<?php

namespace yiiauth\gitlab;

use yii\authclient\OAuth2;

/**
 * GitLab allows authentication via GitLab OAuth.
 *
 * In order to use GitLab OAuth you must register your application at <https://gitlab.com/profile/applications>.
 *
 * Example application configuration:
 *
 * ```php
 * 'components' => [
 *     'authClientCollection' => [
 *         'class' => yii\authclient\Collection::class,
 *         'clients' => [
 *             'gitlab' => [
 *                 'class' => \yiiauth\gitlab\GitLabClient::class,
 *                 'domain'  => 'https://gitlab.com'
 *                 'clientId' => 'gitlab_client_id',
 *                 'clientSecret' => 'gitlab_client_secret',
 *             ],
 *         ],
 *     ]
 *     // ...
 * ]
 * ```
 *
 * @see    https://docs.gitlab.com/ee/api/oauth2.html
 * @see    https://gitlab.com/profile/applications
 *
 * @author Dmitriy Kuts <me@exileed.com>
 * @since  0.1
 */
class GitLabClient extends OAuth2
{
    /**
     * {@inheritdoc}
     */
    public $authUrl = '%domain%/oauth/authorize';
    /**
     * {@inheritdoc}
     */
    public $tokenUrl = '%domain%/oauth/token';
    /**
     * {@inheritdoc}
     */
    public $apiBaseUrl = '%domain%/api/v4/';

    /**
     * Domain instance gitlab
     * @var string
     */
    public $domain = 'https://gitlab.com';


    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        $this->authUrl    = str_replace('%domain%', $this->domain, $this->authUrl);
        $this->tokenUrl   = str_replace('%domain%', $this->domain, $this->tokenUrl);
        $this->apiBaseUrl = str_replace('%domain%', $this->domain, $this->apiBaseUrl);
    }

    /**
     * {@inheritdoc}
     */
    protected function initUserAttributes()
    {
        return $this->api('user', 'GET');
    }

    /**
     * {@inheritdoc}
     */
    protected function defaultName()
    {
        return 'gitlab';
    }

    /**
     * {@inheritdoc}
     */
    protected function defaultTitle()
    {
        return 'GitLab';
    }
}
