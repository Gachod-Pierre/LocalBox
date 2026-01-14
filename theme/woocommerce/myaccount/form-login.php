<?php

/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.9.0
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form');

$enable_registration = 'yes' === get_option('woocommerce_enable_myaccount_registration');
?>

<div class="customer_login" id="customer_login">

	<?php if ($enable_registration) : ?>
		<!-- Tabs -->
		<div class="login-register-tabs">
			<button type="button" class="tab-btn active" data-tab="login">
				<?php esc_html_e('Connectez-vous', 'woocommerce'); ?>
			</button>
			<button type="button" class="tab-btn" data-tab="register">
				<?php esc_html_e('Créez un compte', 'woocommerce'); ?>
			</button>
		</div>
	<?php endif; ?>

	<!-- Login Form -->
	<div class="login-register-wrapper">
		<div class="login-register-content active" id="login-tab">
			<h3><?php esc_html_e('Connectez-vous', 'woocommerce'); ?></h3>
			<p class="subtitle"><?php esc_html_e('Entrez ici vos informations de connexion', 'woocommerce'); ?></p>

			<form class="woocommerce-form woocommerce-form-login login" method="post" novalidate>

				<?php do_action('woocommerce_login_form_start'); ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="username"><?php esc_html_e('Email or username', 'woocommerce'); ?>&nbsp;<span class="required" aria-hidden="true">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" placeholder="<?php esc_html_e('Adresse Email', 'woocommerce'); ?>" value="<?php echo (! empty($_POST['username']) && is_string($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine 
																																																																																																				?>
				</p>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required" aria-hidden="true">*</span></label>
					<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" placeholder="<?php esc_html_e('Mot de passe', 'woocommerce'); ?>" required aria-required="true" />
				</p>

				<?php do_action('woocommerce_login_form'); ?>

				<p class="form-row">
					<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
						<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
						<span><?php esc_html_e('Se souvenir de mes informations pour les 30 prochains jours', 'woocommerce'); ?></span>
					</label>
					<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
				</p>

				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e('Connexion', 'woocommerce'); ?>"><?php esc_html_e('Connexion', 'woocommerce'); ?></button>

				<!-- Google Login Placeholder -->
				<button type="button" class="google-login-btn" disabled title="Google login coming soon">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4" />
						<path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853" />
						<path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05" />
						<path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335" />
					</svg>
					<?php esc_html_e('Connexion avec Google', 'woocommerce'); ?>
				</button>

				<p class="woocommerce-LostPassword lost_password">
					<a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
				</p>

				<?php if ($enable_registration) : ?>
					<p class="create-account-link">
						<?php esc_html_e('Aucun compte enregistré ?', 'woocommerce'); ?>
						<a href="#" class="switch-tab" data-tab="register"><?php esc_html_e('Créez un ici', 'woocommerce'); ?></a>
					</p>
				<?php endif; ?>

				<?php do_action('woocommerce_login_form_end'); ?>

			</form>
		</div>

		<?php if ($enable_registration) : ?>
			<!-- Register Form -->
			<div class="login-register-content" id="register-tab">
				<h3><?php esc_html_e('Créez un compte', 'woocommerce'); ?></h3>
				<p class="subtitle"><?php esc_html_e('Rejoignez-nous et créez votre compte', 'woocommerce'); ?></p>

				<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

					<?php do_action('woocommerce_register_form_start'); ?>

					<?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>
						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required" aria-hidden="true">*</span></label>
							<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" placeholder="<?php esc_html_e('Nom d\'utilisateur', 'woocommerce'); ?>" value="<?php echo (! empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine 
																																																																																																?>
						</p>
					<?php endif; ?>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required" aria-hidden="true">*</span></label>
						<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" placeholder="<?php esc_html_e('Adresse Email', 'woocommerce'); ?>" value="<?php echo (! empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine 
																																																																																										?>
					</p>

					<?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>
						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required" aria-hidden="true">*</span></label>
							<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" placeholder="<?php esc_html_e('Mot de passe', 'woocommerce'); ?>" required aria-required="true" />
						</p>
					<?php else : ?>
						<p><?php esc_html_e('A link to set a new password will be sent to your email address.', 'woocommerce'); ?></p>
					<?php endif; ?>

					<?php do_action('woocommerce_register_form'); ?>

					<p class="woocommerce-form-row form-row">
						<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
						<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Créer un compte', 'woocommerce'); ?></button>
					</p>

					<p class="create-account-link">
						<?php esc_html_e('Vous avez déjà un compte ?', 'woocommerce'); ?>
						<a href="#" class="switch-tab" data-tab="login"><?php esc_html_e('Connectez-vous', 'woocommerce'); ?></a>
					</p>

					<?php do_action('woocommerce_register_form_end'); ?>

				</form>
			</div>
		<?php endif; ?>

	</div>

</div>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const tabButtons = document.querySelectorAll('.login-register-tabs .tab-btn');
		const switchLinks = document.querySelectorAll('.switch-tab');
		const tabContents = document.querySelectorAll('.login-register-content');

		function switchTab(tabName) {
			// Hide all tabs
			tabContents.forEach(tab => tab.classList.remove('active'));
			tabButtons.forEach(btn => btn.classList.remove('active'));

			// Show selected tab
			const selectedTab = document.getElementById(tabName + '-tab');
			if (selectedTab) {
				selectedTab.classList.add('active');
			}

			// Mark button as active
			const activeBtn = document.querySelector(`[data-tab="${tabName}"]`);
			if (activeBtn) {
				activeBtn.classList.add('active');
			}
		}

		// Tab button click handlers
		tabButtons.forEach(btn => {
			btn.addEventListener('click', function() {
				switchTab(this.dataset.tab);
			});
		});

		// Switch link click handlers
		switchLinks.forEach(link => {
			link.addEventListener('click', function(e) {
				e.preventDefault();
				switchTab(this.dataset.tab);
			});
		});
	});
</script>

<?php do_action('woocommerce_after_customer_login_form'); ?>