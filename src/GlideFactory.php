<?php

namespace GlideModule;

class GlideFactory
{
    /**
     * @var array
     */
    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @return \League\Glide\Server
     */
    public function create()
    {
        return \League\Glide\ServerFactory::create($this->config);
    }
}
