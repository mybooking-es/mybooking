<?php
/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

 /**
  * Mybooking Tweaks
  *
  * - Changed col echo values on line 71 to avoid Bootstrap conflicts
	*	- Changed textdomain to match theme and add context
	*
	* 	@version: 0.0.2
	*   @package WordPress
	*   @subpackage Mybooking WordPress Theme
	*   @since Mybooking WordPress Theme 0.9.9
	*/

defined( 'ABSPATH' ) || exit;

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing'  => _x( 'Billing address', 'woocommerce_mybooking', 'mybooking' ),
			'shipping' => _x( 'Shipping address', 'woocommerce_mybooking', 'mybooking' ),
		),
		$customer_id
	);
} else {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing' => _x( 'Billing address', 'woocommerce_mybooking', 'mybooking' ),
		),
		$customer_id
	);
}

$oldcol = 1;
$col    = 1;
?>

<p>
	<?php echo apply_filters( 'woocommerce_my_account_my_address_description', esc_html_x( 'The following addresses will be used on the checkout page by default.', 'woocommerce_mybooking', 'mybooking' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</p>

<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) : ?>
	<div class="u-columns woocommerce-Addresses col2-set addresses">
<?php endif; ?>

<?php foreach ( $get_addresses as $name => $address_title ) : ?>
	<?php
		$address = wc_get_account_formatted_address( $name );
		$col     = $col * -1;
		$oldcol  = $oldcol * -1;
	?>

	<div class="u-column<?php echo $col < 0 ? 1 : 2; ?> col-<?php echo $oldcol < 0 ? 12 : 12; ?> woocommerce-Address">
		<header class="woocommerce-Address-title title">
			<h3><?php echo esc_html( $address_title ); ?></h3>
			<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', $name ) ); ?>" class="edit"><?php echo $address ? esc_html_x( 'Edit', 'woocommerce_mybooking', 'mybooking' ) : esc_html_x( 'Add', 'woocommerce_mybooking', 'mybooking' ); ?></a>
		</header>
		<address>
			<?php
				echo $address ? wp_kses_post( $address ) : esc_html_x( 'You have not set up this type of address yet.', 'woocommerce_mybooking', 'mybooking' );
			?>
		</address>
	</div>

<?php endforeach; ?>

<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) : ?>
	</div>
	<?php
endif;
