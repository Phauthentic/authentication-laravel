<?php
declare(strict_types=1);
/**
 * Copyright (c) Phauthentic (https://github.com/Phauthentic)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Phauthentic (https://github.com/Phauthentic)
 * @link          https://github.com/Phauthentic
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace Phauthentic\Authentication\Authenticator\Storage;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Laravel Cookie Storage
 *
 * @link https://laravel.com/docs/5.7/requests#accessing-the-request
 */
class LaravelCookieStorage implements StorageInterface
{
    /**
     * Cookie Name
     *
     * @var string
     */
    protected $cookieName = 'Auth';

    /**
     * Cookie life time in minutes
     *
     * @var int
     */
    protected $cookieLifeTime = 525600;

    /**
     * Sets the cookie name
     *
     * @param string $name Session key name
     * @return $this
     */
    public function setCookieName(string $name): self
    {
        $this->cookieName = $name;

        return $this;
    }

    /**
     * Sets the cookie life time
     *
     * @param string $name Session key name
     * @return $this
     */
    public function setCookieLifeTime(int $minutes): self
    {
        $this->cookieLifeTime = $minutes;

        return $this;
    }

    /**
     * Reads the data from the storage.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request The request object.
     * @return null|mixed
     */
    public function read(ServerRequestInterface $request)
    {
        return $request->cookie($this->cookieName);
    }

    /**
     * Persists data in the storage.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request The request object.
     * @param \Psr\Http\Message\ResponseInterface $response The response object.
     * @param mixed $data Data to persist.
     * @return ResponseInterface Returns the modified response object
     */
    public function write(ServerRequestInterface $request, ResponseInterface $response, $data): ResponseInterface
    {
        return $response->cookie(
            $this->cookieName, $data, 3800
        );
    }

    /**
     * Clears the data form a storage.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request The request object.
     * @param \Psr\Http\Message\ResponseInterface $response The response object.
     * @return ResponseInterface Returns the modified response object
     */
    public function clear(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $response->cookie(
            $this->cookieName, null, 0
        );
    }
}
