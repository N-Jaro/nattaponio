<?php
/**
 * The header for our theme
 *
 * @package nattaponio
 */
?>
<!doctype html>
<html class="dark" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/site.webmanifest">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon.ico">

	<?php wp_head(); ?>
</head>

<body <?php body_class("bg-background-light dark:bg-background-dark font-sans text-slate-900 dark:text-slate-100 selection:bg-primary selection:text-background-dark transition-colors duration-300"); ?>>
<?php wp_body_open(); ?>

<!-- Interactive Geospatial Background -->
<canvas id="interactive-plus-bg" class="fixed inset-0 z-0 pointer-events-none opacity-60"></canvas>

<!-- Global Gradient Background -->
<div class="fixed inset-0 hero-gradient pointer-events-none z-[-1]"></div>

<div class="relative z-10 min-h-screen flex flex-col overflow-x-hidden">

	<header class="fixed top-0 w-full z-50 px-6 py-6">
        <nav class="max-w-6xl mx-auto flex items-center justify-between glass-card px-6 py-3 rounded-xl">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3">
                <div class="w-8 h-8 rounded flex items-center justify-center overflow-hidden">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/favicon/favicon-32x32.png'); ?>" alt="nattapon.io logo" class="w-full h-full object-contain">
                </div>
                <span class="text-xl font-medium tracking-tighter uppercase"><?php #bloginfo('name'); ?>Nattapon | ภูมิสารสนเทศอัจฉริยะ</span>
            </a>
            
            <?php
if (has_nav_menu('menu-1')) {
    wp_nav_menu(
        array(
        'theme_location' => 'menu-1',
        'menu_id' => 'primary-menu',
        'container' => false,
        'menu_class' => 'hidden md:flex items-center gap-6 list-none m-0 p-0',
    )
    );
}
else {
?>
                <ul class="hidden md:flex items-center gap-6 list-none m-0 p-0">
                    <li><a class="text-sm font-semibold text-slate-100 bg-[#0f172a] px-5 py-2 rounded-full border border-[#1e293b] hover:border-primary/50 transition-colors inline-block" href="#">Home</a></li>
                    <li><a class="text-sm font-semibold text-slate-300 hover:text-primary transition-colors inline-block" href="#">CV</a></li>
                    <li><a class="text-sm font-semibold text-slate-300 hover:text-primary transition-colors inline-block" href="#">Blog</a></li>
                    <li><a class="text-sm font-semibold text-slate-300 hover:text-primary transition-colors inline-block" href="#">Class Portal</a></li>
                </ul>
            <?php
}?>
            
        <!-- Right side - Desktop Button -->
        <div class="hidden md:flex items-center space-x-6">
            <?php
$contact_url = nattaponio_get_theme_option('nattaponio_profile_contact_href', '#');
?>
            <a href="<?php echo esc_url($contact_url); ?>" class="bg-primary text-background-dark px-6 py-2.5 rounded-xl font-semibold shadow-[0_4px_0_0_rgba(16,185,129,0.5)] hover:shadow-none hover:translate-y-[2px] active:shadow-none active:translate-y-[2px] transition-all inline-flex items-center justify-center">
                Contact
            </a>
        </div>
            <!-- Mobile Menu Toggle Button -->
            <button id="mobile-menu-btn" class="md:hidden text-primary p-2 flex items-center justify-center ml-auto transition-transform">
                <span class="material-symbols-outlined text-3xl">menu</span>
            </button>

            <!-- Mobile Menu Dropdown -->
            <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full mt-2 origin-top">
                <div class="glass-card rounded-xl p-6 flex flex-col gap-5 shadow-2xl border border-primary/20 bg-background-dark/95 backdrop-blur-xl">
                    <?php
if (has_nav_menu('menu-1')) {
    wp_nav_menu(
        array(
        'theme_location' => 'menu-1',
        'menu_id' => 'primary-menu-mobile',
        'container' => false,
        'menu_class' => 'flex flex-col gap-5 list-none m-0 p-0 w-full',
    )
    );
}
else {
?>
                        <ul class="flex flex-col gap-5 list-none m-0 p-0 w-full">
                            <li><a class="text-base font-medium text-primary border-b border-primary/10 pb-2 block" href="#">Home</a></li>
                            <li><a class="text-base font-medium hover:text-primary transition-colors border-b border-primary/10 pb-2 block" href="#">CV</a></li>
                            <li><a class="text-base font-medium hover:text-primary transition-colors border-b border-primary/10 pb-2 block" href="#">Blog</a></li>
                            <li><a class="text-base font-medium hover:text-primary transition-colors pb-2 block" href="#">Class Portal</a></li>
                        </ul>
                    <?php
}?>
                    <button class="bg-primary text-background-dark px-5 py-3 rounded-xl shadow-[0_4px_0_0_rgba(16,185,129,0.5)] hover:shadow-none hover:translate-y-[2px] active:shadow-none active:translate-y-[2px] text-base font-semibold w-full transition-all mt-2">
                        Contact
                    </button>
                </div>
            </div>
        </nav>
	</header>
