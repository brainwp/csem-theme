<?php
	/**
	 * Carrega o ultimo post de cada rede social (instagram, facebook e youtube)
	 *
	 * @author   Matheus Gimenez Petroni <contato@matheusgimenez.com.br>
	 */
	class Load_Last_Post_Social_Networks {
		/**
		 * Instance of this class.
		 *
		 * @var object
		 */
		protected static $instance = null;

		/**
		 * Imagem do ultimo post de cada rede
		 *
		 * @var string
		 */
		private $image = '';

		/**
		 * Initialize the plugin
		 */
		public function __construct() {
			// Adiciona as chamadas AJAX
			add_action( 'wp_ajax_csem_get_last_socials', array( $this, 'do_ajax') );
			add_action( 'wp_ajax_nopriv_csem_get_last_socials', array( $this, 'do_ajax') );
		}
		public function do_ajax() {
			if ( ! isset( $_REQUEST[ 'network'] ) ) {
				wp_die( 'Falta o parametro "network"');
			}
			if ( 'facebook' === $_REQUEST[ 'network' ] ) {
				$this->get_facebook_feed();
			}
		}
		private function get_facebook_feed() {
			/* Getting a JSON Facebook Feed

			1. Sign in as a developer at https://developers.facebook.com/
			2. Click "Create New App" at https://developers.facebook.com/apps
			3. Under Apps Settings, find the App ID and App Secret*/
			$appID = '851152828309465';
			$appSecret = 'aaaa0da4805e1940527bab6ed9ca77ed';
			/* Configuring a JSON Facebook Feed
			==========================================================================
			1. Find the desired feed ID at http://findmyfacebookid.com/
			2. Set the maximum number of stories to retrieve
			3. Set the seconds to wait between caching the response */
			$feed = coletivo_get_theme_mod( 'coletivo_ultimos_sociais_fb' );
			if ( ! $feed ) {
				ẁp_die( 'Preencha o ID da página nas configurações' );
			}
			$maximum = 1;

			$authentication = file_get_contents("https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id={$appID}&client_secret={$appSecret}");
			//var_dump( $authentication );
			$authentication = json_decode( $authentication );
			$authentication = http_build_query( $authentication );
			//var_dump( $authentication );
			$response = file_get_contents("https://graph.facebook.com/{$feed}/photos/uploaded/?{$authentication}&limit={$maximum}&fields=images,link");
			$response = json_decode( $response );
			var_dump( $response->data[0]->images[6] );
			//var_dump("https://graph.facebook.com/{$feed}/photos/uploaded/?{$authentication}&limit={$maximum}&fields=images,link");
			wp_die();
		}
		/**
		 * Return an instance of this class.
		 *
		 * @return object A single instance of this class.
		 */
		public static function get_instance() {
			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}



	} // end class Load_Last_Post_Social_Networks();
	new Load_Last_Post_Social_Networks();
