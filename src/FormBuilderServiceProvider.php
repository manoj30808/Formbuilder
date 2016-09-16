<?php namespace SonLabs\FormBuilder;

use Illuminate\Support\ServiceProvider;

class FormBuilderServiceProvider extends ServiceProvider {


	//protected $defer = false;

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('Formbuilder', function($app){
			//$config = $app['config']['formbuilder'] ? : $app['config']['formbuilder:config'];
			$config = $app['config']['formbuilder'];
			return new Formbuilder($config);
        });
	}

	 /**
     * Create aliases for the dependency.
     */
    protected function registerAliases()
    {
        if (class_exists('Illuminate\Foundation\AliasLoader')) {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Formbuilder', \SonLabs\FormBuilder\Facades\Formbuilder::class);
        }
    }
    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return ['formbuilder'];
    }
}
