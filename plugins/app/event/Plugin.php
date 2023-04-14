<?php namespace App\Event;

use Backend;
use System\Classes\PluginBase;

/**
 * Event Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Event',
            'description' => 'No description provided yet...',
            'author'      => 'App',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        \App\Arrival\Models\Arrival::extend(function ($arrival)
        {
            $arrival->bindEvent('model.afterCreate', function() use ($arrival)
                {
                    \Log::info("{$arrival->name} was written to the list at {$arrival->arrival}");
                });
        }); 
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'App\Event\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'app.event.some_permission' => [
                'tab' => 'Event',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'event' => [
                'label'       => 'Event',
                'url'         => Backend::url('app/event/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['app.event.*'],
                'order'       => 500,
            ],
        ];
    }
}
