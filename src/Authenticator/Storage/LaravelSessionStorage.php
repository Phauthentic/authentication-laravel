<?php
declare(strict_types=1);

namespace Authentication\Authenticator\Storage;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * LaravelSessionStorage
 */
class LaravelSessionStorage implements StorageInterface
{
    /**
     * Reads the data from the storage.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request The request object.
     * @return null|mixed
     */
    public function read(ServerRequestInterface $request)
    {
        // TODO: Implement read() method.
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
        // TODO: Implement write() method.
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
        // TODO: Implement clear() method.
    }
}
