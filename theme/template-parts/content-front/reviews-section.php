<section class="reviews-section">
	<div class="reviews-header">
		<button class="reviews-btn-connected">Restez connectés</button>
		<h2 class="reviews-title">Suivez @localbox<br>pour en savoir plus</h2>
		<ul class="reviews-social">
			<li>
				<a href="#" class="social-link">
					<svg class="social-icon" viewBox="0 0 24 24"><use href="#instagram-icon"/></svg>
					<span>Instagram</span>
				</a>
			</li>
			<li>
				<a href="#" class="social-link">
					<svg class="social-icon" viewBox="0 0 24 24"><use href="#facebook-icon"/></svg>
					<span>Facebook</span>
				</a>
			</li>
			<li>
				<a href="#" class="social-link">
					<svg class="social-icon" viewBox="0 0 24 24"><use href="#tiktok-icon"/></svg>
					<span>TikTok</span>
				</a>
			</li>
		</ul>
	</div>

	<div class="reviews-grid">
		<!-- Review 1 -->
		<div class="review-card">
			<div class="review-avatar">
				<img src="https://i.pinimg.com/736x/19/b4/c7/19b4c75b26e7b418ebccc2a3d2d48575.jpg" alt="Eloise A." class="avatar-image">
			</div>
			<div class="review-content">
				<div class="review-stars">
					<?php for ($i = 1; $i <= 5; $i++): ?>
						<span class="star">★</span>
					<?php endfor; ?>
				</div>
				<p class="review-text">J'ai commandé une box de Nouvelle Aquitaine et j'en suis ravie!! Les produits sont de très bonne qualité, bien présentés et typiques de la région. La livraison a été soignée, une belle découverte que je recommande sans hésiter.</p>
				<p class="review-author">Eloise A.</p>
			</div>
		</div>

		<!-- Review 2 -->
		<div class="review-card">
			<div class="review-avatar">
				<img src="https://i.pinimg.com/736x/4a/f8/57/4af857cee671091e9c3eaaa7763edc3f.jpg" alt="Marie B." class="avatar-image">
			</div>
			<div class="review-content">
				<div class="review-stars">
					<?php for ($i = 1; $i <= 4; $i++): ?>
						<span class="star">★</span>
					<?php endfor; ?>
				</div>
				<p class="review-text">J'ai kiffé la box Provence, les saveurs étaient ensoleillées, des produits artisanaux et une présentation impeccable. La livraison est un peu longue mais c'était superbe!</p>
				<p class="review-author">Marie B.</p>
			</div>
		</div>

		<!-- Review 3 -->
		<div class="review-card">
			<div class="review-avatar">
				<img src="https://i.pinimg.com/736x/0f/8c/be/0f8cbeee6c1322e3251b4cb7d74095d5.jpg" alt="Jack D." class="avatar-image">
			</div>
			<div class="review-content">
				<div class="review-stars">
					<?php for ($i = 1; $i <= 5; $i++): ?>
						<span class="star">★</span>
					<?php endfor; ?>
				</div>
				<p class="review-text">Bonjour, nous avons aimé la box de Bretagne, les produits étaient excellents surtout les spécialités sucrées. Tout était bien emballé, on sent le soin apporté à la sélection. Bravo !</p>
				<p class="review-author">Jack D.</p>
			</div>
		</div>

		<!-- Review 4 -->
		<div class="review-card">
			<div class="review-avatar">
				<img src="https://i.pinimg.com/1200x/59/87/b7/5987b7ca013b21cd7ccfe9f528966967.jpg" alt="Alex A." class="avatar-image">
			</div>
			<div class="review-content">
				<div class="review-stars">
					<?php for ($i = 1; $i <= 5; $i++): ?>
						<span class="star">★</span>
					<?php endfor; ?>
				</div>
				<p class="review-text">Très content de ma box Alsace. Les produits étaient authentiques et gourmands, parfaits pour découvrir la région, le service client est réactif. Rien à redire.</p>
				<p class="review-author">Alex A.</p>
			</div>
		</div>
	</div>

</section>

<!-- Vague orange en bas -->
<div class="w-full overflow-hidden" style="line-height:0;">
	<svg width="1920" height="418" viewBox="0 0 1920 418" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto -mt-40 ">
		<path d="M534.409 402.817C66.9658 466.559 -38.0924 303.957 -32.191 214.688L693.764 0H1694.17C1788.6 41.3145 1981.45 152.273 1997.38 265.593C2017.3 407.243 1687.53 460.362 1466.2 367.404C1244.87 274.446 1118.71 323.139 534.409 402.817Z" fill="#FF4901"/>
	</svg>
</div>

<style>
.reviews-section {
	background: #FF4901;
	padding: 80px 40px;
	width: 100vw;
	margin-left: calc(-50vw + 50%);
	position: relative;
}

.reviews-header {
	max-width: 1200px;
	margin: 0 auto 60px;
	text-align: center;
}

.reviews-btn-connected {
	background-color: rgba(139, 69, 19, 0.7);
	color: white;
	border: none;
	padding: 8px 24px;
	border-radius: 50px;
	font-weight: 700;
	text-transform: uppercase;
	font-size: 12px;
	letter-spacing: 1px;
	cursor: pointer;
	margin-bottom: 30px;
	transition: background-color 0.3s;
}

.reviews-btn-connected:hover {
	background-color: rgba(139, 69, 19, 0.9);
}

.reviews-title {
	font-size: 56px;
	font-weight: 900;
	color: white;
	text-transform: uppercase;
	margin: 0 0 40px;
	line-height: 1.2;
	letter-spacing: 1px;
}

.reviews-social {
	list-style: none;
	padding: 0;
	margin: 0;
	display: flex;
	justify-content: center;
	gap: 30px;
	flex-wrap: wrap;
}

.social-link {
	display: flex;
	align-items: center;
	gap: 8px;
	color: white;
	text-decoration: none;
	font-weight: 600;
	font-size: 14px;
	text-transform: capitalize;
	transition: opacity 0.3s;
}

.social-link:hover {
	opacity: 0.8;
}

.social-icon {
	width: 24px;
	height: 24px;
	fill: white;
}

.reviews-grid {
	max-width: 1200px;
	margin: 0 auto;
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	gap: 30px;
}

.review-card {
	background: white;
	border-radius: 16px;
	padding: 30px;
	box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
	transition: transform 0.3s, box-shadow 0.3s;
	display: flex;
	gap: 20px;
	align-items: flex-start;
}

.review-card:hover {
	transform: translateY(-5px);
	box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
}

.review-avatar {
	width: 120px;
	height: 120px;
	border-radius: 12px;
	overflow: hidden;
	flex-shrink: 0;
}

.avatar-image {
	width: 100%;
	height: 100%;
	object-fit: cover;
	display: block;
}

.review-content {
	display: flex;
	flex-direction: column;
	flex: 1;
}

.review-stars {
	display: flex;
	gap: 4px;
	margin-bottom: 15px;
	font-size: 18px;
}

.star {
	color: #FF6B35;
}

.review-text {
	font-size: 14px;
	line-height: 1.6;
	color: #333;
	margin: 0 0 15px 0;
	flex-grow: 1;
}

.review-author {
	font-weight: 700;
	color: #FF6B35;
	margin: 0;
	font-size: 14px;
}

@media (max-width: 768px) {
	.reviews-section {
		padding: 50px 20px;
	}

	.reviews-title {
		font-size: 36px;
	}

	.reviews-grid {
		grid-template-columns: 1fr;
		gap: 20px;
	}

	.review-card {
		padding: 20px;
	}
}
</style>
