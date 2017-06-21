<?php
/**
 * WP Sendy API
 *
 * @package WP-Sendy-API
 */
 
/*
* Plugin Name: WP Sendy API
* Plugin URI: https://github.com/wp-api-libraries/wp-sendy-api
* Description: Perform API requests to Sendy in WordPress.
* Author: WP API Libraries
* Version: 1.0.0
* Author URI: https://wp-api-libraries.com
* GitHub Plugin URI: https://github.com/wp-api-libraries/wp-sendy-api
* GitHub Branch: master
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
		 * Subscribe function.
		 *
		 * @access public
		 * @param string $name (default: '') Name.
		 * @param mixed $email Email.
		 * @param mixed $list List.
		 * @param mixed $boolean Boolean.
		 * @return void
		 */
		public function subscribe( $name = '', $email, $list, $boolean ) {
			
			//TODO: Support Custom Fields
			$request = wp_remote_post( static::$install_url . '/subscribe', array(
				'body' => array( 
				'api_key' => static::$api_key, 
				'name' => $name,
				'email' => $email,
				'list' => $list,
				'boolean' => $boolean // set this to "true" so that you'll get a plain text response
				) )
			);
			
			$body = wp_remote_retrieve_body( $request );

			return json_decode( $body );

		}

		/**
		 * Unsubscribe function.
		 *
		 * @access public
		 * @param mixed $email Email.
		 * @param mixed $list List.
		 * @param mixed $boolean Boolean.
		 * @return void
		 */
		public function unsubscribe( $email, $list, $boolean ) {
			
			$request = wp_remote_post( static::$install_url . '/unsubscribe', array(
				'body' => array( 
				'api_key' => static::$api_key, 
				'email' => $email,
				'list' => $list,
				'boolean' => $boolean // set this to "true" so that you'll get a plain text response
				) )
			);
			
			$body = wp_remote_retrieve_body( $request );

			return json_decode( $body );

		}


		/**
		 * Delete Subscriber
		 *
		 * @access public
		 * @param mixed $list_id List ID.
		 * @param mixed $email Email.
		 * @return void
		 */
		public function delete_subscriber( $list_id, $email ) {
			
			$request = wp_remote_post( static::$install_url . '/api/subscribers/delete.php', array(
				'body' => array( 
				'api_key' => static::$api_key, 
				'email' => $email,
				'list_id' => $list_id 
				) )
			);
			
			$body = wp_remote_retrieve_body( $request );

			return json_decode( $body );

		}

		/**
		 * Get_subscription_status function.
		 *
		 * @access public
		 * @param mixed $email Email.
		 * @param mixed $list_id List ID.
		 * @return void
		 */
		public function get_subscription_status( $email, $list_id ) {
						
			$request = wp_remote_post( static::$install_url . '/api/subscribers/subscription-status.php', array(
				'body' => array( 
				'api_key' => static::$api_key, 
				'email' => $email,
				'list_id' => $list_id 
				) )
			);
			
			$body = wp_remote_retrieve_body( $request );
			
			return $body;

		}

		/**
		 * Get Subscriber Count.
		 *
		 * @access public
		 * @param mixed $list_id List ID.
		 * @return void
		 */
		public function get_subscriber_count( $list_id ) {
			
			$request = wp_remote_post( static::$install_url . '/api/subscribers/active-subscriber-count.php', array(
				'body' => array( 
				'api_key' => static::$api_key, 
				'list_id' => $list_id ) )
		 );
			
			$body = wp_remote_retrieve_body( $request );

			return json_decode( $body );
		}

		/**
		 * Create Campaign.
		 *
		 * @access public
		 * @param mixed $from_name From Name.
		 * @param mixed $from_email From Email.
		 * @param mixed $reply_to Reply To.
		 * @param mixed $subject Subject.
		 * @param mixed $plain_text Plain text.
		 * @param mixed $html_text HTML text.
		 * @param mixed $list_ids List IDs.
		 * @param mixed $brand_id Brand ID.
		 * @param mixed $query_string Query String.
		 * @param string $send_campaign (default: '0') Send Campaign.
		 * @return void
		 */
		public function create_campaign( $from_name, $from_email, $reply_to, $subject, $plain_text, $html_text, $list_ids, $brand_id, $query_string, $send_campaign = '0' ) {
			
			$request = wp_remote_post( static::$install_url . '/api/campaigns/create.php', array(
				'body' => array( 
				'api_key' => static::$api_key, 
				'from_name' => $from_name,
				'from_email' => $from_email,
				'reply_to' => $reply_to,
				'title' => $title,
				'subject' => $subject,
				'plain_text' => $plain_text,
				'html_text' => $html_text,
				'list_ids' => $list_ids,
				'brand_id' => $brand_id,
				'query_string' => $query_string,
				'send_campaign' => $send_campaign,
			) )
			);
			
			$body = wp_remote_retrieve_body( $request );

			return json_decode( $body );

		}
		
		

	}
}