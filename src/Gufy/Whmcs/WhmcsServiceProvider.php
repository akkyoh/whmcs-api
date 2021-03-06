<?php namespace Gufy\Whmcs;

use Illuminate\Support\ServiceProvider;

class WhmcsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		// $this->package('gufy/whmcs');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

		$this->app->singleton('Whmcs', function() 
        {
            return new Whmcs();
        });

		$this->app->booting(function() {

		  $loader = \Illuminate\Foundation\AliasLoader::getInstance();

		  $loader->alias('Whmcs', 'Gufy\Whmcs\Facades\Whmcs');

		});
		$this->publishes([
			dirname(__FILE__).'/../../config/config.php'=>config_path('whmcs.php'),
		]);

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('Whmcs');
	}

}
