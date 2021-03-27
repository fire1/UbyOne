<?php


namespace UbyOne\Common;
/**
 * Class Bootstrapping
 * @package UbyOne\Common
 */
class Bootstrapping
{
    /**
     * Container common configs
     */
    private $commonConfigs;

    /**
     *
     */
    public function __construct( array $commongConfigs )
    {
        if (empty($commongConfigs)) throw new \InvalidArgumentException("Given common configs are empty");
        $this->commonConfigs = $commongConfigs;
    }

    /**
     * @param $section
     * @param $name
     * @return mixed
     */
    public function getCommonConf( $section, $name )
    {
        if (!isset($this->commonConfigs[ $section ][ $name ])) throw new \InvalidArgumentException(sprintf("Configs for key %s are missing ", $name));
        return $this->commonConfigs[ $section ][ $name ];
    }

    /**
     * @return array
     */
    public function getCommonConfigs()
    {
        return $this->commonConfigs;
    }


}