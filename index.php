<?php
/**
 * The main template file
 *
 * @package nattaponio
 */

get_header();
?>

<?php
/**
 * The main template file
 *
 * @package nattaponio
 */

get_header();
?>

<!-- Hero Section -->
<main class="flex-grow pt-32 pb-20 px-6 relative">
    <div class="absolute inset-0 hero-gradient pointer-events-none"></div>
    <div class="max-w-6xl mx-auto relative z-10">
        
        <div class="flex flex-col items-center text-center space-y-8">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#0f172a] border border-[#1e293b] text-primary text-xs font-semibold uppercase tracking-widest">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                </span>
                <?php echo esc_html(get_option('nattaponio_hero_availability', 'Available for Collaboration')); ?>
            </div>
            
            <h1 class="text-6xl md:text-8xl font-black tracking-tight leading-none text-slate-900 dark:text-slate-100">
                <?php echo esc_html(get_option('nattaponio_hero_greeting', "Hello, I'm")); ?> <span class="text-primary italic"><?php echo esc_html(get_option('nattaponio_hero_name', 'Nattapon')); ?></span>
            </h1>
            
            <p class="max-w-2xl text-lg md:text-xl text-slate-600 dark:text-slate-400 font-medium whitespace-pre-line">
                <?php echo esc_html(get_option('nattaponio_hero_description', 'Bridging the gap between geography and artificial intelligence. Specializing in GeoAI, Machine Learning, and RAG systems.')); ?>
            </p>
            
            <div class="flex flex-wrap justify-center gap-4 pt-4">
                <a href="<?php echo esc_url(get_option('nattaponio_hero_btn1_url', '#')); ?>" class="bg-primary hover:bg-primary/90 text-[#020617] px-8 py-4 rounded-xl text-lg font-semibold transition-colors flex items-center gap-2">
                    <?php echo esc_html(get_option('nattaponio_hero_btn1_text', 'View Portfolio')); ?> <span class="material-symbols-outlined">arrow_forward</span>
                </a>
                <a href="<?php echo esc_url(get_option('nattaponio_hero_btn2_url', '#')); ?>" class="bg-[#0f172a] border border-[#1e293b] text-slate-100 px-8 py-4 rounded-xl text-lg font-semibold hover:bg-[#1e293b] transition-colors inline-block">
                    <?php echo esc_html(get_option('nattaponio_hero_btn2_text', 'Read Blog')); ?>
                </a>
            </div>
        </div>

        <!-- Features Grid / CV Module -->
        <section class="mt-32 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Academic -->
            <div class="glass-card p-8 rounded-2xl flex flex-col h-full border-l-4 border-l-primary/40">
                <div class="size-14 rounded-2xl bg-[#0f172a] border border-[#1e293b] flex items-center justify-center text-primary mb-6">
                    <span class="material-symbols-outlined text-2xl">school</span>
                </div>
                <h3 class="text-2xl font-semibold mb-4"><?php echo esc_html(get_option('nattaponio_academic_title', 'Academic Background')); ?></h3>
                <p class="text-slate-600 dark:text-slate-400 mb-6 flex-grow">
                    <?php echo esc_html(get_option('nattaponio_academic_desc', 'Higher Education & Research focused on spatial data science and computational geography.')); ?>
                </p>
                <div class="p-5 flex flex-col gap-3 mt-auto">
                    <?php
$academic_list = get_option('nattaponio_academic_list', "PhD in Spatial Informatics\nResearch Lead at GeoLab");
$academic_items = explode("\n", str_replace("\r", "", $academic_list));
foreach ($academic_items as $item):
	if (trim($item)):
?>
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary text-base">check_circle</span>
                        <span class="text-sm font-semibold"><?php echo esc_html(trim($item)); ?></span>
                    </div>
                    <?php
	endif;
endforeach;
?>
                </div>
            </div>

            <!-- Technical Skills -->
            <div class="glass-card p-8 rounded-2xl flex flex-col h-full border-l-4 border-l-primary/40">
                <div class="size-14 rounded-2xl bg-[#0f172a] border border-[#1e293b] flex items-center justify-center text-primary mb-6">
                    <span class="material-symbols-outlined text-2xl">terminal</span>
                </div>
                <h3 class="text-2xl font-semibold mb-4"><?php echo esc_html(get_option('nattaponio_technical_title', 'Technical Proficiency')); ?></h3>
                <p class="text-slate-600 dark:text-slate-400 mb-6 flex-grow">
                    <?php echo esc_html(get_option('nattaponio_technical_desc', 'Advanced implementation of GeoAI models and Retrieval-Augmented Generation (RAG).')); ?>
                </p>
                <div class="p-5 flex flex-wrap gap-2 mt-auto">
                    <?php
$technical_skills = get_option('nattaponio_technical_skills', 'GeoAI, PyTorch, RAG, PostGIS, LLMs');
$skills = explode(',', $technical_skills);
foreach ($skills as $skill):
	if (trim($skill)):
?>
                    <span class="bg-[#0f172a] border border-[#1e293b] text-primary text-xs font-semibold px-3 py-1.5 rounded-md"><?php echo esc_html(trim($skill)); ?></span>
                    <?php
	endif;
endforeach;
?>
                </div>
            </div>

            <!-- Professional -->
            <div class="glass-card p-8 rounded-2xl flex flex-col h-full border-l-4 border-l-primary/40">
                <div class="size-14 rounded-2xl bg-[#0f172a] border border-[#1e293b] flex items-center justify-center text-primary mb-6">
                    <span class="material-symbols-outlined text-2xl">work_history</span>
                </div>
                <h3 class="text-2xl font-semibold mb-4"><?php echo esc_html(get_option('nattaponio_professional_title', 'Professional Projects')); ?></h3>
                <p class="text-slate-600 dark:text-slate-400 mb-6 flex-grow">
                    <?php echo esc_html(get_option('nattaponio_professional_desc', 'Deploying enterprise-grade machine learning solutions for industry-leading spatial platforms.')); ?>
                </p>
                <div class="relative overflow-hidden rounded-lg aspect-[4/3] mb-2 mt-auto">
                    <?php
$prof_image = get_option('nattaponio_professional_image');
if (!$prof_image) {
	$prof_image = 'https://lh3.googleusercontent.com/aida-public/AB6AXuBM4iXt3NsKmzunmsGL2lWR1EhJeiUleZ4IQyvPSP8-FsNkI4ZFrKAsL53Ecp4n0ViAHqAeL50wjaZRNwntVGGfP1kqfQy3jA3Rft3TI8nJdyGX8uo_t_HVxc5aslSSCKnzTEXyNWZ9i3xfYRpurQoLLzCqsFW4CyWuoHDcPHrLh8T7H2hWuGJUW60z43WRtRQnkpLuZQxaHABQ3_7l6zF4gua_SEbRya16Oz7-NJVj0QmueTglBfORJ4hLFX93V3w_O9PObTdXDVcE';
}
?>
                    <img alt="<?php echo esc_attr(get_option('nattaponio_professional_title', 'Professional Projects')); ?>" class="w-full h-full object-cover grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-500" src="<?php echo esc_url($prof_image); ?>" />
                </div>
            </div>
        </section>

        <!-- Status Section -->
        <section class="mt-20">
            <div class="glass-card rounded-2xl p-8 flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="flex items-center gap-6">
                    <div class="size-20 rounded-full bg-primary/30 border-2 border-primary overflow-hidden">
                        <?php
$profile_image = get_option('nattaponio_profile_image');
if (!$profile_image) {
	$profile_image = 'https://lh3.googleusercontent.com/aida-public/AB6AXuCcaFsgC68JFJinpAkGylmtXpmvna05vr5Ter_IRjOy-UzrZmW7rhzlq0NTToywch5GbuzlVQPTIHCDkmDUUSToiFWRwQBUPin0huVrK71huT7YrMC1rJj5ekcEpu2q8EjMwRMqAfgGYbLzcMXdXEAtIJpwvpXhPpn1nn7E97Y-EC746kRs0LFV81t2XidIodbdkUU30zmOqJE7DzThtcuvvr5f_l-LvGTR1G5iHRy58wkV8uf7RbhLFUH3PZJ86O76tL-TG4LqHHi9';
}
?>
                        <img alt="<?php echo esc_attr(get_option('nattaponio_profile_name', 'Nattapon S.')); ?>" class="w-full h-full object-cover" src="<?php echo esc_url($profile_image); ?>" />
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold"><?php echo esc_html(get_option('nattaponio_profile_name', 'Nattapon S.')); ?></h4>
                        <p class="text-slate-600 dark:text-slate-400 italic"><?php echo esc_html(get_option('nattaponio_profile_job', 'Senior Research Scientist')); ?></p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <a class="size-12 glass-card rounded-full flex items-center justify-center hover:text-primary transition-colors" href="#">
                        <span class="material-symbols-outlined">share</span>
                    </a>
                    <a class="size-12 glass-card rounded-full flex items-center justify-center hover:text-primary transition-colors" href="#">
                        <span class="material-symbols-outlined">mail</span>
                    </a>
                    <a href="<?php echo esc_url(get_option('nattaponio_profile_cv_url', '#')); ?>" class="bg-primary text-background-dark px-6 py-3 rounded-xl font-semibold shadow-[0_4px_0_0_rgba(16,185,129,1)] hover:shadow-none hover:translate-y-[2px] active:shadow-none active:translate-y-[2px] transition-all inline-flex items-center justify-center">
                        Download CV
                    </a>
                </div>
            </div>
        </section>

    </div>
</main>

<?php
get_footer();
