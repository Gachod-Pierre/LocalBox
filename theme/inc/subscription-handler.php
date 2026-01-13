<?php
/**
 * Subscription Handler Functions
 *
 * @package _tw
 */

/**
 * Handle subscription form submission via AJAX
 */
function handle_subscription_form() {
	// Verify nonce
	if ( ! isset( $_POST['subscribe_nonce'] ) || ! wp_verify_nonce( $_POST['subscribe_nonce'], 'subscribe_nonce' ) ) {
		wp_send_json_error( array(
			'message' => __( 'Erreur de sécurité. Veuillez réessayer.', '_tw' ),
		) );
		wp_die();
	}

	// Sanitize and validate input
	$name = isset( $_POST['subscriber_name'] ) ? sanitize_text_field( $_POST['subscriber_name'] ) : '';
	$email = isset( $_POST['subscriber_email'] ) ? sanitize_email( $_POST['subscriber_email'] ) : '';
	$phone = isset( $_POST['subscriber_phone'] ) ? sanitize_text_field( $_POST['subscriber_phone'] ) : '';
	$plan = isset( $_POST['subscriber_plan'] ) ? sanitize_text_field( $_POST['subscriber_plan'] ) : '';

	// Validate required fields
	if ( empty( $name ) || empty( $email ) || empty( $plan ) ) {
		wp_send_json_error( array(
			'message' => __( 'Veuillez remplir tous les champs obligatoires.', '_tw' ),
		) );
		wp_die();
	}

	// Validate email
	if ( ! is_email( $email ) ) {
		wp_send_json_error( array(
			'message' => __( 'Veuillez entrer une adresse email valide.', '_tw' ),
		) );
		wp_die();
	}

	// Validate plan
	$valid_plans = array( 'basic', 'pro', 'premium' );
	if ( ! in_array( $plan, $valid_plans, true ) ) {
		wp_send_json_error( array(
			'message' => __( 'Plan d\'abonnement invalide.', '_tw' ),
		) );
		wp_die();
	}

	// Check if email already exists
	if ( email_exists( $email ) ) {
		wp_send_json_error( array(
			'message' => __( 'Cette adresse email est déjà inscrite.', '_tw' ),
		) );
		wp_die();
	}

	// Create subscription record
	$subscription = array(
		'name'       => $name,
		'email'      => $email,
		'phone'      => $phone,
		'plan'       => $plan,
		'date'       => current_time( 'mysql' ),
		'ip_address' => isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( $_SERVER['REMOTE_ADDR'] ) : '',
		'status'     => 'active',
	);

	// Save subscription to database
	$table = $GLOBALS['wpdb']->prefix . 'subscriptions';
	$result = $GLOBALS['wpdb']->insert( $table, $subscription );

	if ( $result ) {
		// Send confirmation email
		send_subscription_confirmation_email( $name, $email, $plan );

		// Send admin notification
		send_admin_subscription_notification( $subscription );

		wp_send_json_success( array(
			'message' => __( 'Votre abonnement a été créé avec succès!', '_tw' ),
		) );
	} else {
		wp_send_json_error( array(
			'message' => __( 'Une erreur est survenue. Veuillez contacter le support.', '_tw' ),
		) );
	}

	wp_die();
}

add_action( 'wp_ajax_handle_subscription', 'handle_subscription_form' );
add_action( 'wp_ajax_nopriv_handle_subscription', 'handle_subscription_form' );

/**
 * Send subscription confirmation email to subscriber
 *
 * @param string $name      Subscriber name.
 * @param string $email     Subscriber email.
 * @param string $plan      Subscription plan.
 */
function send_subscription_confirmation_email( $name, $email, $plan ) {
	$subject = __( 'Bienvenue à votre abonnement!', '_tw' );

	$plan_names = array(
		'basic'   => __( 'Plan Basique', '_tw' ),
		'pro'     => __( 'Plan Pro', '_tw' ),
		'premium' => __( 'Plan Premium', '_tw' ),
	);

	$message = sprintf(
		__( 'Bonjour %s,<br><br>Merci de votre abonnement!<br>Vous avez souscrit au %s.<br><br>Vous pouvez gérer votre abonnement depuis votre compte.<br><br>Cordialement,<br>%s', '_tw' ),
		esc_html( $name ),
		esc_html( isset( $plan_names[ $plan ] ) ? $plan_names[ $plan ] : $plan ),
		get_bloginfo( 'name' )
	);

	$headers = array( 'Content-Type: text/html; charset=UTF-8' );

	wp_mail( $email, $subject, $message, $headers );
}

/**
 * Send subscription notification to admin
 *
 * @param array $subscription Subscription data.
 */
function send_admin_subscription_notification( $subscription ) {
	$admin_email = get_option( 'admin_email' );
	$subject = __( 'Nouvel abonnement - ', '_tw' ) . $subscription['name'];

	$message = sprintf(
		__( 'Nouvel abonnement reçu:<br><br>Nom: %s<br>Email: %s<br>Téléphone: %s<br>Plan: %s<br>Date: %s<br>IP: %s', '_tw' ),
		esc_html( $subscription['name'] ),
		esc_html( $subscription['email'] ),
		esc_html( $subscription['phone'] ),
		esc_html( $subscription['plan'] ),
		esc_html( $subscription['date'] ),
		esc_html( $subscription['ip_address'] )
	);

	$headers = array( 'Content-Type: text/html; charset=UTF-8' );

	wp_mail( $admin_email, $subject, $message, $headers );
}

/**
 * Create subscriptions table on theme activation
 */
function create_subscriptions_table() {
	global $wpdb;

	$table = $wpdb->prefix . 'subscriptions';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE IF NOT EXISTS $table (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name tinytext NOT NULL,
		email varchar(100) NOT NULL UNIQUE,
		phone varchar(20),
		plan varchar(50) NOT NULL,
		date datetime DEFAULT CURRENT_TIMESTAMP,
		ip_address varchar(45),
		status varchar(20) DEFAULT 'active',
		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta( $sql );
}

// Create table on theme load
create_subscriptions_table();
