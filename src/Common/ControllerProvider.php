<?php
/*
* Copyright (C) 2015 Angel Zaprianov <me@fire1.eu>
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
* Project: UbyOne
*
* Date: 3/27/2021
* Time: 13:45
*
* @author Angel Zaprianov <me@fire1.eu>
*/

namespace UbyOne\Common;

/**
 * Class ControllerProvider
 * @package UbyOne\Common
 */
abstract class ControllerProvider
{
    /**
     * @var array
     */
    private $routes;
    /**
     * @var string
     */
    private $theme;

    /**
     * ControllerProvider constructor.
     * @param Bootstrapping $bootstrapping
     */
    public function __construct( Bootstrapping $bootstrapping )
    {
        $this->theme = $bootstrapping->getCommonConf('ui', 'theme');
        $this->routes = $this->routes();
    }


    abstract protected function routes(): array;

    /**
     * @param string $template
     * @param array  $params
     * @return string
     */
    protected function render( string $template, array $params = [] ): string
    {
        extract($params);
        return include $template;
    }

    public function __toString()
    {
        return $this->routes[ $_SERVER[ 'REQUEST_URI' ] ]();
    }
}