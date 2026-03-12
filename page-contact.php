<?php
/**
 * Template Name: Contact Page
 *
 * @package nattaponio
 */

get_header();

// Fetch options
$contact_badge = nattaponio_get_theme_option('nattaponio_contact_badge', 'COLLABORATION');
$heading_white = nattaponio_get_theme_option('nattaponio_contact_heading_white', "Let's build something");
$heading_green = nattaponio_get_theme_option('nattaponio_contact_heading_green', 'together.');
$description = nattaponio_get_theme_option('nattaponio_contact_description', "Whether it's research collaboration, technical inquiries, or just a coffee chat about AI and systems, I'm always reachable.");
$quote_text = nattaponio_get_theme_option('nattaponio_contact_quote', '"The best way to predict the future is to invent it."');
$quote_author = nattaponio_get_theme_option('nattaponio_contact_quote_author', 'Alan Kay');
$display_email = nattaponio_get_theme_option('nattaponio_profile_email', '');
$scholar = nattaponio_get_theme_option('nattaponio_cv_scholar', '');
$linkedin = nattaponio_get_theme_option('nattaponio_cv_linkedin', '');
$github = nattaponio_get_theme_option('nattaponio_cv_github', '');
$recipient_email = nattaponio_get_theme_option('nattaponio_contact_recipient', get_option('admin_email'));

// Form state
$form_success = isset($_GET['contact']) && $_GET['contact'] === 'success';
$form_error = isset($_GET['contact']) && $_GET['contact'] === 'error';
?>

<main class="flex-grow pt-32 pb-20 px-6 relative">
    <div class="absolute inset-0 topo-bg opacity-30 pointer-events-none"></div>

    <div class="max-w-6xl mx-auto relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

            <!-- ===== LEFT COLUMN ===== -->
            <div class="flex flex-col gap-8">

                <!-- Badge -->
                <div class="inline-block">
                    <span class="text-xs font-black tracking-[0.25em] uppercase text-primary">
                        <?php echo esc_html($contact_badge); ?>
                    </span>
                </div>

                <!-- Heading -->
                <h1 class="font-inter text-5xl md:text-6xl font-bold leading-tight">
                    <?php echo esc_html($heading_white); ?><br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-cyan-400"><?php echo esc_html($heading_green); ?></span>
                </h1>

                <!-- Description -->
                <p class="text-slate-400 text-lg leading-relaxed max-w-md">
                    <?php echo esc_html($description); ?>
                </p>

                <!-- Email info row -->
                <?php if ($display_email): ?>
                <div class="flex items-center gap-4">
                    <div class="size-12 rounded-full bg-primary flex items-center justify-center shrink-0 shadow-lg shadow-primary/30">
                        <span class="material-symbols-outlined text-[#020617] text-xl">mail</span>
                    </div>
                    <div>
                        <div class="text-xs font-black tracking-widest uppercase text-slate-500 mb-0.5">Email</div>
                        <a href="mailto:<?php echo antispambot(sanitize_email($display_email)); ?>"
                           class="text-slate-200 font-semibold hover:text-primary transition-colors">
                            <?php echo antispambot(esc_html($display_email)); ?>
                        </a>
                    </div>
                </div>
                <?php
endif; ?>

                <!-- Social icon row -->
                <div class="flex gap-3">
                    <!-- Share button (hybrid) -->
                    <div class="relative" id="contact-share-wrapper">
                        <button id="contact-share-btn" type="button"
                            class="size-11 glass-card rounded-full flex items-center justify-center hover:text-primary transition-colors"
                            aria-label="Share this page">
                            <span class="material-symbols-outlined text-[20px]">share</span>
                        </button>
                        <div id="contact-share-dropdown"
                             class="absolute left-0 bottom-13 w-48 glass-card border border-primary/20 rounded-2xl shadow-xl p-2 flex flex-col gap-1 hidden"
                             role="menu">
                            <button id="contact-copy-link" type="button"
                                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-200 hover:bg-primary/10 hover:text-primary transition-colors w-full text-left"
                                role="menuitem">
                                <span class="material-symbols-outlined text-[18px]">link</span>
                                <span id="contact-copy-label">Copy Link</span>
                            </button>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo rawurlencode(get_permalink()); ?>&text=<?php echo rawurlencode(get_bloginfo('name') . ' – Contact'); ?>"
                               target="_blank" rel="noopener noreferrer"
                               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-200 hover:bg-primary/10 hover:text-primary transition-colors"
                               role="menuitem">
                                <svg class="w-[18px] h-[18px] shrink-0 fill-current" viewBox="0 0 24 24" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.74l7.73-8.835L1.254 2.25H8.08l4.253 5.622 5.91-5.622Zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                Share on X
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo rawurlencode(get_permalink()); ?>"
                               target="_blank" rel="noopener noreferrer"
                               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-200 hover:bg-primary/10 hover:text-primary transition-colors"
                               role="menuitem">
                                <svg class="w-[18px] h-[18px] shrink-0 fill-current" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                Share on LinkedIn
                            </a>
                        </div>
                    </div>

                    <?php if ($github): ?>
                    <a href="<?php echo esc_url($github); ?>" target="_blank" rel="noopener noreferrer"
                       class="size-11 glass-card rounded-full flex items-center justify-center hover:text-primary transition-colors"
                       aria-label="GitHub">
                        <span class="material-symbols-outlined text-[20px]">code</span>
                    </a>
                    <?php
endif; ?>

                    <?php if ($display_email): ?>
                    <a href="mailto:<?php echo antispambot(sanitize_email($display_email)); ?>"
                       class="size-11 glass-card rounded-full flex items-center justify-center hover:text-primary transition-colors"
                       aria-label="Email">
                        <span class="material-symbols-outlined text-[20px]">alternate_email</span>
                    </a>
                    <?php
endif; ?>

                    <?php if ($scholar): ?>
                    <a href="<?php echo esc_url($scholar); ?>" target="_blank" rel="noopener noreferrer"
                       class="size-11 glass-card rounded-full flex items-center justify-center hover:text-primary transition-colors"
                       aria-label="Google Scholar">
                        <span class="material-symbols-outlined text-[20px]">public</span>
                    </a>
                    <?php
endif; ?>

                    <?php if ($linkedin): ?>
                    <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer"
                       class="size-11 glass-card rounded-full flex items-center justify-center hover:text-primary transition-colors"
                       aria-label="LinkedIn">
                        <span class="material-symbols-outlined text-[20px]">work</span>
                    </a>
                    <?php
endif; ?>
                </div>

                <!-- Quote block -->
                <?php if ($quote_text): ?>
                <div class="relative glass-card rounded-2xl p-6 border-l-4 border-primary mt-4 overflow-hidden">
                    <span class="absolute -bottom-4 -right-2 text-8xl font-serif text-primary/10 leading-none select-none" aria-hidden="true">"</span>
                    <p class="text-slate-300 italic text-sm leading-relaxed relative z-10">
                        <?php echo esc_html($quote_text); ?>
                    </p>
                    <?php if ($quote_author): ?>
                    <p class="text-primary font-semibold text-xs mt-3 relative z-10">— <?php echo esc_html($quote_author); ?></p>
                    <?php
    endif; ?>
                </div>
                <?php
endif; ?>

            </div><!-- /left column -->

            <!-- ===== RIGHT COLUMN — CONTACT FORM ===== -->
            <div>
                <div class="glass-card rounded-3xl p-8 md:p-10 border border-primary/20">

                    <!-- Success / Error alerts -->
                    <?php if ($form_success): ?>
                    <div id="contact-alert"
                         class="flex items-center gap-3 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-xl px-4 py-3 mb-6 text-sm font-medium">
                        <span class="material-symbols-outlined text-[20px]">check_circle</span>
                        Message sent! I'll get back to you soon.
                    </div>
                    <?php
elseif ($form_error): ?>
                    <div id="contact-alert"
                         class="flex items-center gap-3 bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl px-4 py-3 mb-6 text-sm font-medium">
                        <span class="material-symbols-outlined text-[20px]">error</span>
                        Something went wrong. Please try again or email me directly.
                    </div>
                    <?php
endif; ?>

                    <form id="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" class="flex flex-col gap-6" novalidate>
                        <?php wp_nonce_field('nattaponio_contact_nonce', 'contact_nonce'); ?>
                        <input type="hidden" name="action" value="nattaponio_contact">
                        <input type="hidden" name="redirect_to" value="<?php echo esc_url(get_permalink()); ?>">

                        <!-- Full Name -->
                        <div>
                            <label for="contact_name" class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2">Full Name</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-500 text-[20px]">person</span>
                                <input
                                    type="text"
                                    id="contact_name"
                                    name="contact_name"
                                    placeholder="John Doe"
                                    required
                                    class="w-full bg-[#0f172a] border border-[#1e293b] focus:border-primary/60 focus:ring-1 focus:ring-primary/30 rounded-xl px-4 py-3 pl-11 text-slate-200 placeholder-slate-600 text-sm outline-none transition-all"
                                >
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div>
                            <label for="contact_email" class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2">Email Address</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-500 text-[20px]">alternate_email</span>
                                <input
                                    type="email"
                                    id="contact_email"
                                    name="contact_email"
                                    placeholder="john@example.com"
                                    required
                                    class="w-full bg-[#0f172a] border border-[#1e293b] focus:border-primary/60 focus:ring-1 focus:ring-primary/30 rounded-xl px-4 py-3 pl-11 text-slate-200 placeholder-slate-600 text-sm outline-none transition-all"
                                >
                            </div>
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="contact_message" class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2">Your Message</label>
                            <textarea
                                id="contact_message"
                                name="contact_message"
                                placeholder="What's on your mind?"
                                required
                                rows="6"
                                class="w-full bg-[#0f172a] border border-[#1e293b] focus:border-primary/60 focus:ring-1 focus:ring-primary/30 rounded-xl px-4 py-3 text-slate-200 placeholder-slate-600 text-sm outline-none transition-all resize-none"
                            ></textarea>
                        </div>

                        <!-- Submit -->
                        <button
                            type="submit"
                            id="contact-submit"
                            class="w-full bg-primary hover:bg-emerald-400 text-[#020617] font-bold py-4 rounded-xl transition-all hover:scale-[1.02] active:scale-[0.98] shadow-lg shadow-primary/20 flex items-center justify-center gap-2 text-base"
                        >
                            <span id="contact-submit-label">Send Message</span>
                            <span class="material-symbols-outlined text-[20px]">send</span>
                        </button>
                    </form>
                </div>
            </div><!-- /right column -->

        </div>
    </div>
</main>

<script>
(function () {
    // ---- Share button (reusing same pattern as homepage) ----
    const shareBtn     = document.getElementById('contact-share-btn');
    const shareWrapper = document.getElementById('contact-share-wrapper');
    const shareDropdown = document.getElementById('contact-share-dropdown');
    const copyBtn      = document.getElementById('contact-copy-link');
    const copyLabel    = document.getElementById('contact-copy-label');

    if (shareBtn) {
        const shareData = {
            title: <?php echo json_encode(get_bloginfo('name') . ' – Contact'); ?>,
            text:  <?php echo json_encode(nattaponio_get_theme_option('nattaponio_contact_description', '')); ?>,
            url:   <?php echo json_encode(get_permalink()); ?>,
        };

        shareBtn.addEventListener('click', async function (e) {
            e.stopPropagation();
            if (navigator.share) {
                try { await navigator.share(shareData); } catch (err) { /* cancelled */ }
            } else {
                shareDropdown.classList.toggle('hidden');
            }
        });

        copyBtn.addEventListener('click', function () {
            navigator.clipboard.writeText(shareData.url).then(function () {
                copyLabel.textContent = 'Copied!';
                setTimeout(function () {
                    copyLabel.textContent = 'Copy Link';
                    shareDropdown.classList.add('hidden');
                }, 1800);
            });
        });

        document.addEventListener('click', function (e) {
            if (!shareWrapper.contains(e.target)) {
                shareDropdown.classList.add('hidden');
            }
        });
    }

    // ---- AJAX form submission ----
    const form       = document.getElementById('contact-form');
    const submitBtn  = document.getElementById('contact-submit');
    const submitLabel = document.getElementById('contact-submit-label');

    if (form) {
        form.addEventListener('submit', async function (e) {
            e.preventDefault();

            // Basic client-side validation
            const name    = form.contact_name.value.trim();
            const email   = form.contact_email.value.trim();
            const message = form.contact_message.value.trim();

            if (!name || !email || !message) {
                showAlert('error', 'Please fill in all fields.');
                return;
            }

            // Disable button + show loading state
            submitBtn.disabled = true;
            submitLabel.textContent = 'Sending…';

            try {
                const body = new FormData(form);
                body.set('is_ajax', '1');

                // Use getAttribute to avoid the hidden input[name="action"] shadowing form.action
                const actionUrl = form.getAttribute('action');
                const resp = await fetch(actionUrl, { method: 'POST', body });
                const text = await resp.text();

                let data;
                try {
                    data = JSON.parse(text);
                } catch (parseErr) {
                    // Response wasn't JSON — likely a PHP error or redirect page.
                    // Log to console to help debug, show friendly message to user.
                    console.error('Contact form: unexpected server response:', text);
                    showAlert('error', 'Server error. Please try again or email me directly.');
                    return;
                }

                if (data.success) {
                    showAlert('success', data.message || 'Message sent! I\'ll get back to you soon.');
                    form.reset();
                } else {
                    showAlert('error', data.message || 'Something went wrong. Please try again.');
                }
            } catch (err) {
                showAlert('error', 'Could not reach the server. Please check your connection.');
            } finally {
                submitBtn.disabled = false;
                submitLabel.textContent = 'Send Message';
            }
        });
    }

    function showAlert(type, message) {
        // Remove any existing alert
        const old = document.getElementById('contact-alert');
        if (old) old.remove();

        const isSuccess = type === 'success';
        const div = document.createElement('div');
        div.id = 'contact-alert';
        div.className = [
            'flex items-center gap-3 rounded-xl px-4 py-3 mb-6 text-sm font-medium transition-all',
            isSuccess
                ? 'bg-emerald-500/10 border border-emerald-500/30 text-emerald-400'
                : 'bg-red-500/10 border border-red-500/30 text-red-400',
        ].join(' ');
        div.innerHTML = `<span class="material-symbols-outlined text-[20px]">${isSuccess ? 'check_circle' : 'error'}</span>${message}`;
        form.insertAdjacentElement('beforebegin', div);

        // Auto-dismiss success after 6s
        if (isSuccess) {
            setTimeout(function () { div.style.opacity = '0'; setTimeout(function () { div.remove(); }, 400); }, 6000);
        }
    }
})();
</script>

<?php get_footer(); ?>
