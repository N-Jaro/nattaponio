<?php
/**
 * Template Name: CV Page
 *
 * @package nattaponio
 */

get_header();

// Fetch Global CV Options via CMB2 Theme Options
$name = nattaponio_get_theme_option('nattaponio_cv_name', 'Nattapon, Ph.D.');
$job = nattaponio_get_theme_option('nattaponio_cv_job', 'Senior Research Scientist | GeoAI & Machine Learning');
$location = nattaponio_get_theme_option('nattaponio_cv_location', 'Bangkok, Thailand');
$orcid = nattaponio_get_theme_option('nattaponio_cv_orcid', 'orcid.org/0000-0001-2345-6789');
$scholar = nattaponio_get_theme_option('nattaponio_cv_scholar');
$linkedin = nattaponio_get_theme_option('nattaponio_cv_linkedin');
$github = nattaponio_get_theme_option('nattaponio_cv_github');

// Fetch Group Arrays Options via CMB2
$interests = nattaponio_get_theme_option('nattaponio_cv_research_interests', array());
$teaching = nattaponio_get_theme_option('nattaponio_cv_teaching', array());
$service = nattaponio_get_theme_option('nattaponio_cv_service', array());
$awards = nattaponio_get_theme_option('nattaponio_cv_awards', array());

// Default Fallbacks for initial visual reference
if (empty($teaching)) {
    $teaching = array(
            array('icon' => 'cast_for_education', 'title' => 'CS544: Advanced Spatial ML', 'desc' => 'Graduate Course, 2022-2023'),
            array('icon' => 'group', 'title' => 'Graduate Advising', 'desc' => "Advising 3 Ph.D. students and 2 Master's students in GeoAI."),
    );
}

if (empty($service)) {
    $service = array(
            array('role' => 'Program Committee', 'orgs' => 'ICML 2023, NeurIPS 2022, AAAI 2022.'),
            array('role' => 'Journal Reviewer', 'orgs' => 'Nature Machine Intelligence, IEEE T-NNLS.'),
    );
}

if (empty($awards)) {
    $awards = array(
            array('icon' => 'emoji_events', 'title' => 'Best Dissertation Award', 'desc' => 'NUS Faculty of Computing, 2021'),
            array('icon' => 'workspace_premium', 'title' => 'Young Scientist Fellowship', 'desc' => 'Science Academy Asia, 2022'),
    );
}
?>

<main class="flex-grow pt-32 pb-20 px-6 relative">
    <div class="absolute inset-0 topo-bg opacity-30 pointer-events-none"></div>
    
    <div class="max-w-6xl mx-auto relative z-10">
        
        <!-- Header Profile -->
        <div class="flex flex-col md:flex-row items-start gap-8 mb-16 px-4 md:px-0">
            <div class="relative w-32 h-32 shrink-0">
                <?php
$profile_img = get_option('nattaponio_profile_image');
if (!$profile_img) {
    $profile_img = 'https://lh3.googleusercontent.com/aida-public/AB6AXuCcaFsgC68JFJinpAkGylmtXpmvna05vr5Ter_IRjOy-UzrZmW7rhzlq0NTToywch5GbuzlVQPTIHCDkmDUUSToiFWRwQBUPin0huVrK71huT7YrMC1rJj5ekcEpu2q8EjMwRMqAfgGYbLzcMXdXEAtIJpwvpXhPpn1nn7E97Y-EC746kRs0LFV81t2XidIodbdkUU30zmOqJE7DzThtcuvvr5f_l-LvGTR1G5iHRy58wkV8uf7RbhLFUH3PZJ86O76tL-TG4LqHHi9';
}
?>
                <img src="<?php echo esc_url($profile_img); ?>" alt="Profile" class="w-full h-full object-cover rounded-[2rem] border-4 border-[#0f172a] shadow-xl">
                <div class="absolute bottom-[-10px] right-[-10px] size-10 bg-primary rounded-full border-4 border-[#020617] flex items-center justify-center text-[#020617]">
                    <span class="material-symbols-outlined text-lg font-bold">verified</span>
                </div>
            </div>
            <div class="flex-grow">
                <h1 class="font-inter text-4xl md:text-5xl font-bold text-whitetracking-tight mb-2"><?php echo esc_html($name); ?></h1>
                <h2 class="text-xl font-medium text-primary mb-4"><span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-cyan-400"><?php echo esc_html($job); ?></span></h2>
                <div class="flex flex-wrap items-center gap-4 text-sm text-slate-400 mb-6 font-medium">
                    <span class="flex items-center gap-1.5"><span class="material-symbols-outlined text-[18px]">location_on</span> <?php echo esc_html($location); ?></span>
                    <?php
$orcid_url = (strpos($orcid, 'http') === 0) ? $orcid : 'https://' . $orcid;
?>
                    <a href="<?php echo esc_url($orcid_url); ?>" target="_blank" rel="noopener noreferrer" class="flex items-center gap-1.5 hover:text-primary transition-colors"><span class="material-symbols-outlined text-[18px]">link</span> <?php echo esc_html($orcid); ?></a>
                </div>
                <div class="flex flex-wrap gap-3">
                    <?php if ($scholar): ?>
                    <a href="<?php echo esc_url($scholar); ?>" target="_blank" class="glass-card hover:bg-[#0f172a] hover:border-primary/50 text-slate-200 text-xs font-semibold px-4 py-2.5 rounded-xl transition-all flex items-center gap-2 border border-primary/20">
                        <span class="material-symbols-outlined text-[18px]">school</span> Google Scholar
                    </a>
                    <?php
endif; ?>
                    <?php if ($linkedin): ?>
                    <a href="<?php echo esc_url($linkedin); ?>" target="_blank" class="glass-card hover:bg-[#0f172a] hover:border-primary/50 text-slate-200 text-xs font-semibold px-4 py-2.5 rounded-xl transition-all flex items-center gap-2 border border-primary/20">
                        <span class="material-symbols-outlined text-[18px]">work</span> LinkedIn
                    </a>
                    <?php
endif; ?>
                    <?php if ($github): ?>
                    <a href="<?php echo esc_url($github); ?>" target="_blank" class="glass-card hover:bg-[#0f172a] hover:border-primary/50 text-slate-200 text-xs font-semibold px-4 py-2.5 rounded-xl transition-all flex items-center gap-2 border border-primary/20">
                        <span class="material-symbols-outlined text-[18px]">code</span> GitHub
                    </a>
                    <?php
endif; ?>
                    <?php $cv_url = nattaponio_get_theme_option('nattaponio_profile_cv_url'); ?>
                    <?php if ($cv_url): ?>
                    <a href="<?php echo esc_url($cv_url); ?>" class="bg-primary hover:bg-primary/90 text-[#020617] text-xs font-bold px-4 py-2.5 rounded-xl transition-all flex items-center gap-2 shadow-lg shadow-primary/20">
                        <span class="material-symbols-outlined text-[18px]">download</span> Download CV
                    </a>
                    <?php
endif; ?>
                </div>
            </div>
        </div>

        <!-- Research Interests -->
        <?php if (!empty($interests)): ?>
        <section class="mb-16">
            <div class="flex items-center gap-4 mb-8">
                <h3 class="font-inter text-2xl font-bold text-slate-100">Research Interests</h3>
                <div class="h-px bg-primary/20 flex-grow mt-2"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php foreach ($interests as $int): ?>
                <div class="glass-card hover:bg-primary/5 p-6 rounded-2xl border border-primary/20 hover:border-primary/50 transition-all flex flex-col group">
                    <span class="material-symbols-outlined text-primary mb-4 group-hover:scale-110 transition-transform origin-left"><?php echo esc_html(isset($int['icon']) ? $int['icon'] : 'public'); ?></span>
                    <h4 class="font-bold text-slate-100 mb-2"><?php echo esc_html(isset($int['title']) ? $int['title'] : ''); ?></h4>
                    <p class="text-sm text-slate-400 leading-relaxed font-medium"><?php echo esc_html(isset($int['desc']) ? $int['desc'] : ''); ?></p>
                </div>
                <?php
    endforeach; ?>
            </div>
        </section>
        <?php
endif; ?>

        <!-- Education -->
        <section class="mb-16">
            <div class="flex items-center gap-4 mb-8">
                <h3 class="font-inter text-2xl font-bold text-slate-100">Education</h3>
                <div class="h-px bg-primary/20 flex-grow mt-2"></div>
            </div>
            
            <div class="border-l-2 border-primary/20 ml-3 space-y-10 pb-4">
                <?php
$edu_query = new WP_Query(array(
    'post_type' => 'cv_education',
    'posts_per_page' => -1
));
if ($edu_query->have_posts()):
    while ($edu_query->have_posts()):
        $edu_query->the_post();
        $uni = get_post_meta(get_the_ID(), '_cv_edu_university', true);
        $dates = get_post_meta(get_the_ID(), '_cv_edu_dates', true);
        $diss = get_post_meta(get_the_ID(), '_cv_edu_dissertation', true);
?>
                <div class="relative pl-8 group">
                    <div class="absolute w-4 h-4 bg-primary rounded-full -left-[9px] top-1 shadow-[0_0_0_4px_#020617] group-hover:scale-125 transition-transform"></div>
                    <div class="text-xs font-bold text-primary mb-1.5 uppercase tracking-wider bg-primary/10 inline-block px-2 py-0.5 rounded"><?php echo esc_html($dates); ?></div>
                    <h4 class="text-xl font-bold text-slate-100 mb-1 group-hover:text-primary transition-colors"><?php the_title(); ?></h4>
                    <div class="text-sm font-medium text-slate-400 mb-1.5 flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px]">school</span> <?php echo esc_html($uni); ?>
                    </div>
                    <?php if ($diss): ?>
                    <div class="text-sm italic text-slate-500 mt-2 bg-[#0f172a] py-2 px-3 rounded-lg border border-primary/10"><?php echo esc_html($diss); ?></div>
                    <?php
        endif; ?>
                </div>
                <?php
    endwhile;
    wp_reset_postdata();
endif;
?>
            </div>
        </section>

        <!-- Selected Publications -->
        <section class="mb-16">
            <div class="flex items-center gap-4 mb-8">
                <h3 class="font-inter text-2xl font-bold text-slate-100">Selected Publications</h3>
                <div class="h-px bg-primary/20 flex-grow mt-2"></div>
            </div>

            <?php
$pub_types = array('journal' => 'Journals', 'conference' => 'Conferences');
foreach ($pub_types as $type_slug => $type_name):
    $pubs = new WP_Query(array(
        'post_type' => 'cv_publication',
        'posts_per_page' => -1,
        'meta_query' => array(
                array('key' => '_cv_pub_type', 'value' => $type_slug, 'compare' => '=')
        )
    ));
    if ($pubs->have_posts()):
?>
            <h4 class="text-xs font-bold text-primary uppercase tracking-widest mb-4 mt-8 ml-1 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-primary/50"></span> <?php echo esc_html($type_name); ?>
            </h4>
            <div class="flex flex-col gap-4 mb-6">
                <?php
        while ($pubs->have_posts()):
            $pubs->the_post();
            $citation = get_post_meta(get_the_ID(), '_cv_pub_citation', true);
            $doi = get_post_meta(get_the_ID(), '_cv_pub_doi', true);
            $pdf = get_post_meta(get_the_ID(), '_cv_pub_pdf', true);
            $code = get_post_meta(get_the_ID(), '_cv_pub_code', true);
            $data = get_post_meta(get_the_ID(), '_cv_pub_data', true);
?>
                <div class="glass-card hover:bg-[#0f172a] p-5 md:p-6 rounded-2xl border border-primary/20 hover:border-primary/50 transition-all group">
                    <p class="text-sm md:text-base text-slate-300 leading-relaxed font-medium mb-4">
                        <?php echo esc_html($citation); ?> 
                        <?php if ($doi):
                $doi_text = str_replace(array('http://doi.org/', 'https://doi.org/', 'http://dx.doi.org/', 'https://dx.doi.org/'), '', $doi);
?>
                        <a href="<?php echo esc_url($doi); ?>" target="_blank" class="text-primary hover:text-emerald-400 underline decoration-primary/30 underline-offset-4 transition-colors ml-1"><?php echo esc_html($doi_text); ?></a>
                        <?php
            endif; ?>
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <?php if ($pdf): ?>
                        <a href="<?php echo esc_url($pdf); ?>" class="flex items-center gap-1.5 text-xs font-bold text-primary hover:text-white transition-colors"><span class="material-symbols-outlined text-[16px]">picture_as_pdf</span> PDF</a>
                        <?php
            endif; ?>
                        <?php if ($code): ?>
                        <a href="<?php echo esc_url($code); ?>" class="flex items-center gap-1.5 text-xs font-medium text-slate-400 hover:text-slate-200 transition-colors"><span class="material-symbols-outlined text-[16px]">code</span> Code</a>
                        <?php
            endif; ?>
                        <?php if ($data): ?>
                        <a href="<?php echo esc_url($data); ?>" class="flex items-center gap-1.5 text-xs font-medium text-slate-400 hover:text-slate-200 transition-colors"><span class="material-symbols-outlined text-[16px]">database</span> Data</a>
                        <?php
            endif; ?>
                    </div>
                </div>
                <?php
        endwhile;
        wp_reset_postdata(); ?>
            </div>
            <?php
    endif;
endforeach; ?>
        </section>

        <!-- Professional Experience -->
        <section class="mb-16">
            <div class="flex items-center gap-4 mb-8">
                <h3 class="font-inter text-2xl font-bold text-slate-100">Professional Experience</h3>
                <div class="h-px bg-primary/20 flex-grow mt-2"></div>
            </div>

            <div class="flex flex-col gap-10">
                <?php
$exp_query = new WP_Query(array(
    'post_type' => 'cv_experience',
    'posts_per_page' => -1
));
if ($exp_query->have_posts()):
    while ($exp_query->have_posts()):
        $exp_query->the_post();
        $company = get_post_meta(get_the_ID(), '_cv_exp_company', true);
        $dates = get_post_meta(get_the_ID(), '_cv_exp_dates', true);
?>
                <div class="flex flex-col md:flex-row gap-6 relative group">
                    <div class="md:w-16 shrink-0 hidden md:flex justify-center">
                        <div class="w-14 h-14 bg-[#0f172a] border border-[#1e293b] rounded-2xl flex items-center justify-center text-primary group-hover:scale-110 group-hover:border-primary/50 transition-all shadow-lg">
                            <span class="material-symbols-outlined">business_center</span>
                        </div>
                    </div>
                    <div class="flex-grow">
                        <div class="flex flex-col md:flex-row md:items-start justify-between mb-3">
                            <div>
                                <h4 class="text-xl font-bold text-slate-100 group-hover:text-primary transition-colors"><?php the_title(); ?></h4>
                                <div class="text-primary font-semibold text-sm mt-0.5"><?php echo esc_html($company); ?></div>
                            </div>
                            <div class="text-xs font-bold text-slate-400 mt-2 md:mt-2 text-right tracking-wider uppercase bg-primary/10 px-2.5 py-1 rounded inline-block self-start"><?php echo esc_html($dates); ?></div>
                        </div>
                        <div class="text-sm text-slate-300 font-medium prose prose-invert prose-sm prose-p:mb-2 [&>ul]:list-outside [&>ul]:list-disc [&>ul]:ml-5 [&>ul>li]:mb-1 marker:text-primary prose-a:text-primary hover:prose-a:text-white max-w-none">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <?php
    endwhile;
    wp_reset_postdata();
endif;
?>
            </div>
        </section>

        <!-- Bottom Grid: Teaching & Service -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 border-t border-primary/20 pt-12">
            
            <!-- Teaching -->
            <?php if (!empty($teaching)): ?>
            <div>
                <h3 class="font-inter text-xl font-bold text-slate-100 mb-6 flex items-center gap-2"><span class="material-symbols-outlined">menu_book</span> Teaching</h3>
                <div class="flex flex-col gap-6">
                    <?php foreach ($teaching as $t): ?>
                    <div class="flex items-start gap-4 glass-card p-4 rounded-xl border border-primary/10">
                        <span class="material-symbols-outlined text-primary text-xl shrink-0 mt-0.5"><?php echo esc_html(isset($t['icon']) ? $t['icon'] : 'school'); ?></span>
                        <div>
                            <h5 class="text-sm font-bold text-slate-200"><?php echo esc_html(isset($t['title']) ? $t['title'] : ''); ?></h5>
                            <p class="text-xs text-slate-400 mt-1.5 font-medium leading-relaxed"><?php echo esc_html(isset($t['desc']) ? $t['desc'] : ''); ?></p>
                        </div>
                    </div>
                    <?php
    endforeach; ?>
                </div>
            </div>
            <?php
endif; ?>

            <!-- Service -->
            <?php if (!empty($service)): ?>
            <div>
                <h3 class="font-inter text-xl font-bold text-slate-100 mb-6 flex items-center gap-2"><span class="material-symbols-outlined">groups</span> Service</h3>
                <ul class="text-sm text-slate-300 space-y-4">
                    <?php foreach ($service as $s): ?>
                    <li class="pl-5 relative font-medium">
                        <div class="absolute w-2 h-2 bg-primary/70 rounded-full left-0 top-1.5 shadow-[0_0_8px_rgba(52,211,153,0.5)]"></div>
                        <span class="font-bold text-slate-100"><?php echo esc_html(isset($s['role']) ? $s['role'] : ''); ?>:</span> 
                        <span class="text-slate-400"><?php echo esc_html(isset($s['orgs']) ? $s['orgs'] : ''); ?></span>
                    </li>
                    <?php
    endforeach; ?>
                </ul>
            </div>
            <?php
endif; ?>

        </div>

        <!-- Awards -->
        <?php if (!empty($awards)): ?>
        <section class="mt-16 pt-12 border-t border-primary/20">
            <h3 class="font-inter text-xl font-bold text-slate-100 mb-8 flex items-center gap-2"><span class="material-symbols-outlined">workspace_premium</span> Awards & Honors</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 flex-wrap">
                <?php foreach ($awards as $a): ?>
                <div class="glass-card hover:bg-[#0f172a] p-4 rounded-xl border border-primary/20 hover:border-primary/50 flex items-center gap-4 transition-colors">
                    <div class="w-12 h-12 bg-[#020617]/50 rounded-full flex items-center justify-center shrink-0 text-primary border border-primary/10">
                        <span class="material-symbols-outlined text-xl"><?php echo esc_html(isset($a['icon']) ? $a['icon'] : 'emoji_events'); ?></span>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-100"><?php echo esc_html(isset($a['title']) ? $a['title'] : ''); ?></h4>
                        <div class="text-xs text-slate-400 font-medium mt-1"><?php echo esc_html(isset($a['desc']) ? $a['desc'] : ''); ?></div>
                    </div>
                </div>
                <?php
    endforeach; ?>
            </div>
        </section>
        <?php
endif; ?>

    </div>
</main>

<?php get_footer(); ?>
