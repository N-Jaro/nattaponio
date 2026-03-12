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
    <div class="absolute inset-0 topo-bg opacity-30 pointer-events-none"></div>
    <div class="max-w-6xl mx-auto relative z-10">
        
        <div class="flex flex-col items-center text-center space-y-8">
            <div class="inline-block py-1 px-3 rounded-full bg-slate-800/80 border border-slate-700 text-sm font-medium text-emerald-400 mb-6 font-mono group-hover:border-emerald-500/50 transition-colors">
                <span class="w-2 h-2 rounded-full inline-block bg-emerald-500 mr-2 animate-pulse"></span>
                <?php echo esc_html(nattaponio_get_theme_option('nattaponio_hero_availability', 'Available for Collaboration')); ?>
            </div>
            
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight whitespace-pre-line"><?php echo esc_html(nattaponio_get_theme_option('nattaponio_hero_greeting', 'Hello, I\'m')); ?> <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-cyan-400"><?php echo esc_html(nattaponio_get_theme_option('nattaponio_hero_name', 'Nattapon')); ?></span><span class="text-emerald-400 animate-pulse">_</span></h1>
            
            <p class="text-lg md:text-xl text-slate-300 mb-10 max-w-2xl leading-relaxed whitespace-pre-line">
                <?php echo esc_html(nattaponio_get_theme_option('nattaponio_hero_description', 'Bridging the gap between geography and artificial intelligence. Specializing in GeoAI, Machine Learning, and RAG systems.')); ?>
            </p>
            
            <div class="flex flex-wrap gap-4">
                <a href="<?php echo esc_url(nattaponio_get_theme_option('nattaponio_hero_btn1_url', '#')); ?>" class="px-8 py-3 rounded-full bg-primary hover:bg-emerald-400 text-slate-900 font-bold transition-all hover:scale-105 active:scale-95 text-center flex items-center group">
                    <?php echo esc_html(nattaponio_get_theme_option('nattaponio_hero_btn1_text', 'View Portfolio')); ?>
                    <span class="material-symbols-outlined ml-2 group-hover:translate-x-1 transition-transform text-[20px]">arrow_forward</span>
                </a>
                <a href="<?php echo esc_url(nattaponio_get_theme_option('nattaponio_hero_btn2_url', '#')); ?>" class="px-8 py-3 rounded-full bg-slate-800/80 hover:bg-slate-700 text-white font-medium border border-slate-700 transition-all hover:border-slate-500 text-center flex items-center">
                    <span class="material-symbols-outlined mr-2 text-emerald-400 text-[20px]">code</span> <?php echo esc_html(nattaponio_get_theme_option('nattaponio_hero_btn2_text', 'Read Blog')); ?>
                </a>
            </div>
        </div>

        <!-- Features Grid / CV Module -->
        <section class="mt-32 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Academic -->
            <div class="glass-card hover:bg-[#0f172a] p-8 rounded-3xl border border-primary/20 hover:border-primary/50 transition-all group col-span-1 md:col-span-2 lg:col-span-1">
                <div class="w-14 h-14 bg-gradient-to-br from-indigo-500/20 to-purple-500/20 rounded-2xl flex items-center justify-center mb-6 border border-indigo-500/20 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-2xl text-indigo-400">school</span>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4"><?php echo esc_html(nattaponio_get_theme_option('nattaponio_academic_title', 'Academic Background')); ?></h3>
                <p class="text-slate-400 mb-6 leading-relaxed"><?php echo esc_html(nattaponio_get_theme_option('nattaponio_academic_desc', 'Higher Education & Research focused on spatial data science and computational geography.')); ?></p>
                <ul class="space-y-3">
                    <?php
$academic_items = explode("\n", nattaponio_get_theme_option('nattaponio_academic_list', "PhD in Spatial Informatics\nResearch Lead at GeoLab"));
foreach ($academic_items as $item):
    if (trim($item)):
?>
                    <li class="flex items-start text-sm text-slate-300">
                        <span class="material-symbols-outlined text-primary mt-1 mr-3 text-base">check_circle</span> <?php echo esc_html(trim($item)); ?>
                    </li>
                    <?php
    endif;
endforeach;
?>
                </ul>
            </div>

            <!-- Technical Skills -->
            <div class="glass-card hover:bg-[#0f172a] p-8 rounded-3xl border border-primary/20 hover:border-primary/50 transition-all group lg:col-span-2 xl:col-span-1">
                <div class="w-14 h-14 bg-gradient-to-br from-emerald-500/20 to-teal-500/20 rounded-2xl flex items-center justify-center mb-6 border border-emerald-500/20 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-2xl text-emerald-400">terminal</span>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4"><?php echo esc_html(nattaponio_get_theme_option('nattaponio_technical_title', 'Technical Proficiency')); ?></h3>
                <p class="text-slate-400 mb-6 leading-relaxed"><?php echo esc_html(nattaponio_get_theme_option('nattaponio_technical_desc', 'Advanced implementation of GeoAI models and Retrieval-Augmented Generation (RAG).')); ?></p>
                
                <div class="flex flex-wrap gap-2">
                    <?php
$skills = explode(',', nattaponio_get_theme_option('nattaponio_technical_skills', 'GeoAI, PyTorch, RAG, PostGIS, LLMs'));
foreach ($skills as $skill):
    if (trim($skill)):
?>
                    <span class="px-3 py-1 bg-slate-800/50 border border-slate-700/50 rounded-full text-xs text-emerald-300 font-mono"><?php echo esc_html(trim($skill)); ?></span>
                    <?php
    endif;
endforeach;
?>
                </div>
            </div>

            <!-- Interactive Hub (Knowledge Sharing) -->
            <div class="glass-card bg-gradient-to-br from-slate-800/80 to-slate-900/80 hover:bg-[#0f172a] p-8 rounded-3xl border border-primary/30 hover:border-primary transition-all group relative overflow-hidden xl:col-span-1">
                <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 bg-primary/10 rounded-full blur-2xl group-hover:bg-primary/20 transition-all"></div>
                
                <div class="w-14 h-14 bg-gradient-to-br from-cyan-500/20 to-blue-500/20 rounded-2xl flex items-center justify-center mb-6 border border-cyan-500/20 group-hover:scale-110 transition-transform relative z-10">
                    <span class="material-symbols-outlined text-2xl text-cyan-400">hub</span>
                </div>
                
                <h3 class="text-2xl font-bold text-white mb-4 relative z-10"><?php echo esc_html(nattaponio_get_theme_option('nattaponio_hub_title', 'Knowledge Sharing')); ?></h3>
                <p class="text-slate-300 mb-8 leading-relaxed relative z-10"><?php echo esc_html(nattaponio_get_theme_option('nattaponio_hub_desc', 'เป็นแหล่งรวมความรู้และเทคนิคเชิงลึก เพื่อให้นักวิจัยและผู้ที่สนใจก้าวทันโลก GeoAI และเทคโนโลยี GIS สมัยใหม่')); ?></p>
                
                <div class="space-y-3 relative z-10">
                    <?php for ($i = 1; $i <= 3; $i++):
    $text = nattaponio_get_theme_option("nattaponio_hub_link{$i}_text");
    $url = nattaponio_get_theme_option("nattaponio_hub_link{$i}_url", '#');
    if ($text):
?>
                    <a href="<?php echo esc_url($url); ?>" class="block w-full p-4 rounded-xl bg-slate-900/50 border border-slate-700/50 hover:border-primary/50 hover:bg-slate-800 transition-all text-sm font-medium text-slate-200 hover:text-primary flex justify-between items-center group/link">
                        <?php echo esc_html($text); ?>
                        <span class="material-symbols-outlined opacity-0 group-hover/link:opacity-100 group-hover/link:-translate-x-1 transition-all text-[20px]">arrow_forward</span>
                    </a>
                    <?php
    endif;
endfor; ?>
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
                        <img alt="<?php echo esc_attr(get_option('nattaponio_profile_name', 'Nattapon J.')); ?>" class="w-full h-full object-cover" src="<?php echo esc_url($profile_image); ?>" />
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold"><?php echo esc_html(get_option('nattaponio_profile_name', 'Nattapon S.')); ?></h4>
                        <p class="text-slate-600 dark:text-slate-400 italic"><?php echo esc_html(get_option('nattaponio_profile_job', 'Senior Research Scientist')); ?></p>
                    </div>
                </div>
                <div class="flex gap-4 items-center">

                    <!-- Share Button (hybrid: Web Share API + dropdown fallback) -->
                    <div class="relative" id="share-btn-wrapper">
                        <button
                            id="share-btn"
                            type="button"
                            class="size-12 glass-card rounded-full flex items-center justify-center hover:text-primary transition-colors"
                            aria-label="Share this page"
                        >
                            <span class="material-symbols-outlined">share</span>
                        </button>

                        <!-- Fallback dropdown (hidden by default) -->
                        <div
                            id="share-dropdown"
                            class="absolute right-0 bottom-14 w-48 glass-card border border-primary/20 rounded-2xl shadow-xl p-2 flex flex-col gap-1 hidden"
                            role="menu"
                        >
                            <button
                                id="share-copy-link"
                                type="button"
                                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-200 hover:bg-primary/10 hover:text-primary transition-colors w-full text-left"
                                role="menuitem"
                            >
                                <span class="material-symbols-outlined text-[18px]">link</span>
                                <span id="share-copy-label">Copy Link</span>
                            </button>
                            <a
                                href="https://twitter.com/intent/tweet?url=<?php echo rawurlencode(home_url('/')); ?>&text=<?php echo rawurlencode(get_bloginfo('name') . ' — ' . get_bloginfo('description')); ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-200 hover:bg-primary/10 hover:text-primary transition-colors"
                                role="menuitem"
                            >
                                <svg class="w-[18px] h-[18px] shrink-0 fill-current" viewBox="0 0 24 24" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.74l7.73-8.835L1.254 2.25H8.08l4.253 5.622 5.91-5.622Zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                Share on X
                            </a>
                            <a
                                href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo rawurlencode(home_url('/')); ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-200 hover:bg-primary/10 hover:text-primary transition-colors"
                                role="menuitem"
                            >
                                <svg class="w-[18px] h-[18px] shrink-0 fill-current" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                Share on LinkedIn
                            </a>
                        </div>
                    </div>

                    <?php $email = nattaponio_get_theme_option('nattaponio_profile_email', ''); ?>
                    <a class="size-12 glass-card rounded-full flex items-center justify-center hover:text-primary transition-colors" href="<?php echo $email ? 'mailto:' . antispambot(sanitize_email($email)) : '#'; ?>">
                        <span class="material-symbols-outlined">mail</span>
                    </a>

                    <a href="<?php echo esc_url(nattaponio_get_theme_option('nattaponio_profile_cv_url', '#')); ?>" class="bg-primary text-background-dark px-6 py-3 rounded-xl font-semibold shadow-[0_4px_0_0_rgba(16,185,129,0.5)] hover:shadow-none hover:translate-y-[2px] active:shadow-none active:translate-y-[2px] transition-all inline-flex items-center justify-center">
                        Download CV
                    </a>
                </div>

                <script>
                (function () {
                    const btn       = document.getElementById('share-btn');
                    const wrapper   = document.getElementById('share-btn-wrapper');
                    const dropdown  = document.getElementById('share-dropdown');
                    const copyBtn   = document.getElementById('share-copy-link');
                    const copyLabel = document.getElementById('share-copy-label');

                    const shareData = {
                        title: <?php echo json_encode(get_bloginfo('name')); ?>,
                        text:  <?php echo json_encode(get_bloginfo('description')); ?>,
                        url:   <?php echo json_encode(home_url('/')); ?>,
                    };

                    btn.addEventListener('click', async function (e) {
                        e.stopPropagation();
                        // Try native Web Share API first (great on mobile)
                        if (navigator.share) {
                            try {
                                await navigator.share(shareData);
                            } catch (err) {
                                // User cancelled — do nothing
                            }
                        } else {
                            // Desktop fallback: toggle dropdown
                            dropdown.classList.toggle('hidden');
                        }
                    });

                    // Copy link
                    copyBtn.addEventListener('click', function () {
                        navigator.clipboard.writeText(shareData.url).then(function () {
                            copyLabel.textContent = 'Copied!';
                            setTimeout(function () {
                                copyLabel.textContent = 'Copy Link';
                                dropdown.classList.add('hidden');
                            }, 1800);
                        });
                    });

                    // Close dropdown when clicking outside
                    document.addEventListener('click', function (e) {
                        if (!wrapper.contains(e.target)) {
                            dropdown.classList.add('hidden');
                        }
                    });
                })();
                </script>
            </div>
        </section>

    </div>
</main>

<?php
get_footer();
