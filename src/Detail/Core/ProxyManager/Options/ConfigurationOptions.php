<?php

namespace Detail\Core\ProxyManager\Options;

use Detail\Core\Options\AbstractOptions;

class ConfigurationOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $proxiesNamespace;

    /**
     * @var string
     */
    protected $proxiesTargetDir;

    /**
     * @var boolean
     */
    protected $writeProxyFiles = false;

    /**
     * @return string
     */
    public function getProxiesNamespace()
    {
        return $this->proxiesNamespace;
    }

    /**
     * @param string $proxiesNamespace
     */
    public function setProxiesNamespace($proxiesNamespace)
    {
        $this->proxiesNamespace = $proxiesNamespace;
    }

    /**
     * @return string
     */
    public function getProxiesTargetDir()
    {
        return $this->proxiesTargetDir;
    }

    /**
     * @param string $proxiesTargetDir
     */
    public function setProxiesTargetDir($proxiesTargetDir)
    {
        $this->proxiesTargetDir = $proxiesTargetDir;
    }

    /**
     * @return boolean
     */
    public function getWriteProxyFiles()
    {
        return $this->writeProxyFiles;
    }

    /**
     * @param boolean $writeProxyFiles
     */
    public function setWriteProxyFiles($writeProxyFiles)
    {
        $this->writeProxyFiles = $writeProxyFiles;
    }
}
