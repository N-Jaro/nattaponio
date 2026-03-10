<?php
/**
 * The template for displaying the blog index (latest posts)
 *
 * @package nattaponio
 */

get_header();
?>

<main class="flex-grow pt-32 pb-20 px-6 relative">
    <div class="absolute inset-0 topo-bg opacity-30 pointer-events-none"></div>
    <div class="absolute inset-0 hero-gradient pointer-events-none"></div>
    
    <div class="max-w-6xl mx-auto relative z-10">
        <!-- Header Section -->
        <div class="mb-16">
            <h1 class="font-inter text-6xl md:text-8xl font-black tracking-tight leading-none text-slate-900 dark:text-slate-100 mb-6">
                <?php echo esc_html(get_option('nattaponio_blog_title_white', 'Blog &')); ?> <span class="text-primary inline-block"><?php echo esc_html(get_option('nattaponio_blog_title_green', 'Learning Notes')); ?></span>
            </h1>
            <p class="max-w-2xl text-lg md:text-xl text-slate-600 dark:text-slate-400 font-medium whitespace-pre-line">
                <?php echo esc_html(get_option('nattaponio_blog_description', 'A curated repository of technical deep-dives, workspace aesthetics, and the pursuit of the perfect brew.')); ?>
            </p>
        </div>

        <!-- Filter Categories -->
        <div class="flex flex-wrap gap-3 mb-12">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="bg-primary hover:bg-primary/90 text-[#020617] font-semibold px-6 py-2.5 rounded-full text-sm transition-colors">All Stories</a>
            <?php
$categories = get_categories(array('exclude' => array(1))); // Exclude default 'Uncategorized' if desired
$icon_map = [
    'tech' => 'code',
    'keyboards' => 'keyboard',
    'cafe' => 'local_cafe',
    'nature' => 'nature',
    'learning' => 'menu_book'
];
foreach ($categories as $cat):
    $icon = isset($icon_map[$cat->slug]) ? $icon_map[$cat->slug] : 'article';
?>
            <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="glass-card text-slate-300 font-medium px-5 py-2.5 rounded-full text-sm hover:bg-primary/10 hover:text-primary transition-colors flex items-center gap-2">
                <span class="material-symbols-outlined text-sm"><?php echo esc_html($icon); ?></span> <?php echo esc_html($cat->name); ?>
            </a>
            <?php
endforeach; ?>
        </div>

        <!-- Blog Posts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (have_posts()): ?>
                <?php while (have_posts()):
        the_post(); ?>
                    <article class="glass-card p-4 rounded-2xl flex flex-col h-full border-t border-t-primary/20 group cursor-pointer hover:border-primary/40 transition-colors" onclick="window.location='<?php echo esc_url(get_permalink()); ?>';">
                        <div class="relative aspect-[4/3] rounded-xl overflow-hidden mb-6 bg-black/20">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500']); ?>
                            <?php
        else: ?>
                                <div class="w-full h-full bg-[#0f172a] flex items-center justify-center">
                                    <span class="material-symbols-outlined text-4xl text-primary/20">image</span>
                                </div>
                            <?php
        endif; ?>
                        </div>
                        
                        <div class="flex items-center gap-3 mb-4">
                            <?php
        $post_categories = get_the_category();
        if (!empty($post_categories)):
            $first_cat = $post_categories[0];
?>
                            <span class="text-[10px] font-black tracking-widest uppercase text-primary bg-primary/10 px-2 py-1 rounded">
                                <?php echo esc_html($first_cat->name); ?>
                            </span>
                            <?php
        endif; ?>
                            
                            <?php
        // Estimate reading time
        $content = get_post_field('post_content', get_the_ID());
        $word_count = str_word_count(strip_tags($content));
        $reading_time = ceil($word_count / 200); // 200 words per min
        if ($reading_time < 1)
            $reading_time = 1;
?>
                            <span class="text-xs text-slate-500 font-medium"><?php echo $reading_time; ?> min read</span>
                        </div>
                        
                        <h2 class="text-xl md:text-2xl font-semibold mb-3 text-slate-100 group-hover:text-primary transition-colors">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        
                        <p class="text-slate-400 text-sm mb-6 flex-grow line-clamp-3">
                            <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                        </p>
                        
                        <div class="flex items-center justify-between mt-auto pt-4 border-t border-primary/10">
                            <span class="text-xs text-slate-500 font-medium"><?php echo get_the_date('M j, Y'); ?></span>
                            <span class="material-symbols-outlined text-primary text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </div>
                    </article>
                <?php
    endwhile; ?>
            <?php
else: ?>
                <div class="col-span-full py-12 text-center text-slate-500">
                    <div class="size-16 mx-auto rounded-2xl bg-[#0f172a] border border-[#1e293b] flex items-center justify-center text-primary mb-4">
                        <span class="material-symbols-outlined text-3xl">article</span>
                    </div>
                    <p class="text-lg">No posts found yet.</p>
                </div>
            <?php
endif; ?>
        </div>
        
        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <?php
the_posts_pagination(array(
    'prev_text' => '<span class="material-symbols-outlined text-sm align-middle">arrow_back</span> Prev',
    'next_text' => 'Next <span class="material-symbols-outlined text-sm align-middle">arrow_forward</span>',
    'class' => 'pagination-links flex gap-2',
    'before_page_number' => '<span class="sr-only">Page </span>',
));
?>
        </div>

        <!-- Recent Snippets Section (Static placeholder or custom query if needed in the future) -->
        <section class="mt-32">
            <div class="flex items-end justify-between mb-8 border-b border-primary/10 pb-4">
                <h2 class="text-2xl md:text-3xl font-semibold">Recent Snippets</h2>
                <a href="#" class="text-primary text-sm font-semibold flex items-center gap-1 hover:underline group">View all <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">open_in_new</span></a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Hardcoded Snippets for Demo -->
                <a href="#" class="glass-card p-6 rounded-2xl flex items-start gap-4 hover:border-primary/30 transition-colors group border-l-4 border-l-transparent hover:border-l-primary">
                    <div class="size-12 rounded-xl bg-[#0f172a] border border-[#1e293b] text-primary flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-xl">data_object</span>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-100 mb-1 group-hover:text-primary transition-colors">Tailwind Custom Config for Dark Mode</h3>
                        <p class="text-xs text-slate-500">Updated 2 days ago &bull; CSS</p>
                    </div>
                </a>
                
                <a href="#" class="glass-card p-6 rounded-2xl flex items-start gap-4 hover:border-primary/30 transition-colors group border-l-4 border-l-transparent hover:border-l-primary">
                    <div class="size-12 rounded-xl bg-[#0f172a] border border-[#1e293b] text-primary flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-xl">api</span>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-100 mb-1 group-hover:text-primary transition-colors">Fetch Wrapper with Error Handling</h3>
                        <p class="text-xs text-slate-500">Updated 5 days ago &bull; TypeScript</p>
                    </div>
                </a>
            </div>
        </section>

    </div>
</main>

<?php
get_footer();
