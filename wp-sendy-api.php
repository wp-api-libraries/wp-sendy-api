<?php
/**
 * WP Sendy API
 *
 * @package WP-Sendy-API
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) { exit; }


if ( ! class_exists( 'SendyAPI' ) ) {

	/**
	 * Seny API Class.
	 */
	class SendyAPI {

		/**
		 * Sendy Install Url.
		 *
		 * @var string
		 */
		static private $install_url;

		/**
		 * API Key.
		 *
		 * @var string
		 */
		static private $api_key;


		/**
		 * __construct function.
		 *
		 * @access public
		 * @param mixed $install_url Install Url for Sendy.
		 * @param mixed $api_key API Key.
		 * @return void
		 */
		public function __construct( $install_url, $api_key ) {

			static::$install_url = $install_url;
			static::$api_key = $api_key;

		}

		/**
		 * Fetch the request from the API.
		 *
		 * @access private
		 * @param mixed $request Request URL.
		 * @return $body Body.
		 */
		private function fetch( $request ) {

			$response = wp_remote_get( $request );
			$code = wp_remote_retrieve_response_code( $response );

			if ( 200 !== $code ) {
				return new WP_Error( 'response-error', sprintf( __( 'Server response code: %d', 'text-domain' ), $code ) );
			}

			$body = wp_remote_retrieve_body( $response );

			return json_decode( $body );

		}

		/**
		 * subscribe function.
		 *
		 * @access public
		 * @param string $name (default: '')
		 * @param mixed $email
		 * @param mixed $list
		 * @param mixed $boolean
		 * @return void
		 */
		public function subscribe( $name = '', $email, $list, $boolean ) {

		}

		/**
		 * unsubscribe function.
		 *
		 * @access public
		 * @param mixed $email
		 * @param mixed $list
		 * @param mixed $boolean
		 * @return void
		 */
		public function unsubscribe( $email, $list, $boolean ) {

		}


		/**
		 * delete_subscriber function.
		 *
		 * @access public
		 * @param mixed $list_id
		 * @param mixed $email
		 * @return void
		 */
		public function delete_subscriber( $list_id, $email ) {

		}

		/**
		 * get_subscription_status function.
		 *
		 * @access public
		 * @param mixed $email
		 * @param mixed $list_id
		 * @return void
		 */
		public function get_subscription_status( $email, $list_id ) {

		}

		/**
		 * get_subscriber_count function.
		 *
		 * @access public
		 * @param mixed $list_id
		 * @return void
		 */
		public function get_subscriber_count( $list_id ) {

		}

		/**
		 * create_campaign function.
		 *
		 * @access public
		 * @param mixed $from_name
		 * @param mixed $from_email
		 * @param mixed $reply_to
		 * @param mixed $subject
		 * @param mixed $plain_text
		 * @param mixed $html_text
		 * @param mixed $list_ids
		 * @param mixed $brand_id
		 * @param mixed $query_string
		 * @param string $send_campaign (default: '0')
		 * @return void
		 */
		public function create_campaign( $from_name, $from_email, $reply_to, $subject, $plain_text, $html_text, $list_ids, $brand_id, $query_string, $send_campaign = '0' ) {

		}

	}
}