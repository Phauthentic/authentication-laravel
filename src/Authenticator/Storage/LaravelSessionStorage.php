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
 * Laravel Session Storage
 *
 * @link https://laravel.com/docs/5.7/session
 */
class LaravelSessionStorage implements StorageInterface
{
    /**
     * Session Key
     *
     * @var string
     */
    protected $sessionKey = 'Auth';

    /**
     * Sets the session key
     *
     * @param string $name Session key name
     * @return $this
     */
    public function setSessionKey(string $name): self
    {
        $this->sessionKey = $name;

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
        return $request->session()->get($this->sessionKey);
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
        return $request->session()->put($this->sessionKey, $data);
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
        return $request->session()->forget($this->sessionKey);
    }
}
