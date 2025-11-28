const menuBtn = document.getElementById('menuBtn');
const sidebarCloseBtn = document.getElementById('sidebarCloseBtn');
const headerBoxIcon = document.getElementById('headerBoxIcon');
const sidebarBoxIcon = document.getElementById('sidebarBoxIcon');
const closeIconSidebar = document.getElementById('closeIconSidebar');
const sidebar = document.getElementById('sidebar');
const burgerIcon = document.getElementById('burgerIcon');
const closeIcon = document.getElementById('closeIcon');
const adminBar = document.getElementById('wpadminbar');

// Définir la hauteur de l'admin bar
const setAdminBarHeight = () => {
	const adminBar = document.getElementById('wpadminbar');
	const height = adminBar ? adminBar.offsetHeight : 0;
	document.documentElement.style.setProperty(
		'--admin-bar-height',
		height + 'px'
	);
};

setAdminBarHeight();
window.addEventListener('resize', setAdminBarHeight);

const toggleMenu = () => {
	sidebar.classList.toggle('translate-x-full');

	const isOpen = !sidebar.classList.contains('translate-x-full');

	burgerIcon.classList.toggle('opacity-0', isOpen);
	burgerIcon.classList.toggle('pointer-events-none', isOpen);

	closeIcon.classList.toggle('opacity-0', !isOpen);
	closeIcon.classList.toggle('pointer-events-none', !isOpen);

	if (headerBoxIcon) {
		headerBoxIcon.classList.toggle('opacity-0', isOpen);
		headerBoxIcon.classList.toggle('pointer-events-none', isOpen);
	}

	if (sidebarBoxIcon) {
		sidebarBoxIcon.classList.toggle('opacity-0', !isOpen);
		sidebarBoxIcon.classList.toggle('pointer-events-none', !isOpen);
	}

	if (closeIconSidebar) {
		closeIconSidebar.classList.toggle('opacity-0', !isOpen);
		closeIconSidebar.classList.toggle('pointer-events-none', !isOpen);
	}

	menuBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
};

if (menuBtn && sidebar && burgerIcon && closeIcon) {
	menuBtn.addEventListener('click', toggleMenu);
}

if (sidebarCloseBtn) {
	sidebarCloseBtn.addEventListener('click', toggleMenu);
}
