<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package concrete
 */

?>

	<footer id="colophon" class="footer">
		<div class="container">
			<div class="newsletter-container">
				<div class="newsletter-content">
					<div class="newsletter-text">
						<strong>Subscribe to our Newsletter</strong>
					</div>
					<div class="newsletter-form">
						<input type="email" placeholder="Enter Your Email..." />
						<button>Subscribe</button>
					</div>
				</div>
			</div>

			<div class="ft_menu">
				<div class="ft-col">
					<h2 class="ft_logo"><?php the_custom_logo(); ?></h2>
					<p>
						Business Consulting is optimize standing manufactured products and installation synergy. Professionally predominat why professional business
					</p>
					</div>
					
				<div class="ft-col">
					<h4>Company</h4>
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">Services</a></li>
						<li><a href="#">Our Team</a></li>
					</ul>
				</div>
					
				<div class="ft-col">
					<h4>Services</h4>
					<ul>
						<li><a href="#">Strategy Planing</a></li>
						<li><a href="#">Consumer Market</a></li>
						<li><a href="#">Data Analysis</a></li>
						<li><a href="#">Corporate Finance</a></li>
						<li><a href="#">Market Research</a></li>
					</ul>
				</div>
					
				<div class="ft-col">
					<h4>Contact Us</h4>
					<p>102/B New Elephant Rd, Uttara<br>Dhaka – 1212, Bangladesh</p>
					<p><strong>FOLLOW US :</strong></p>
					<div class="social-icons">
						<a href="#"><img src="facebook.svg" alt="Facebook" /></a>
						<a href="#"><img src="x.svg" alt="X/Twitter" /></a>
						<a href="#"><img src="linkedin.svg" alt="LinkedIn" /></a>
						<a href="#"><img src="pinterest.svg" alt="Pinterest" /></a>
					</div>
				</div>
			</div>

			<div class="site-info">
				<p>©Concrete Corp</p>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
