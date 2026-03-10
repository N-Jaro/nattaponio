<?php
/**
 * The template for displaying the footer
 *
 * @package nattaponio
 */
?>
        <!-- Footer -->
        <footer class="border-t border-primary/10 py-12 px-6 mt-auto">
            <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="flex flex-col gap-2">
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 rounded flex items-center justify-center overflow-hidden">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/favicon/favicon-32x32.png'); ?>" alt="nattapon.io logo" class="w-full h-full object-contain">
                        </div>
                        <span class="font-semibold tracking-tight">nattapon.io</span>
                    </div>
                    <p class="text-xs text-slate-500">© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
                </div>
                <div class="flex gap-8 text-sm font-medium text-slate-500">
                    <a class="hover:text-primary transition-colors" href="#">Privacy</a>
                    <a class="hover:text-primary transition-colors" href="#">Twitter</a>
                    <a class="hover:text-primary transition-colors" href="#">LinkedIn</a>
                    <a class="hover:text-primary transition-colors" href="#">GitHub</a>
                </div>
            </div>
        </footer>
    </div>
<?php wp_footer(); ?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        
        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                const icon = btn.querySelector('span');
                icon.textContent = menu.classList.contains('hidden') ? 'menu' : 'close';
            });
        }

        // Interactive Plus Matrix Canvas Animation
        const canvas = document.getElementById('interactive-plus-bg');
        if (canvas) {
            const ctx = canvas.getContext('2d');
            let width, height;
            let points = [];
            const spacing = 40; // 40px grid spacing matching original design
            const plusSize = 10; // 10px plus signs
            const mouse = { x: -1000, y: -1000, radius: 150 };

            function resize() {
                width = canvas.width = window.innerWidth;
                height = canvas.height = window.innerHeight;
                initPoints();
            }

            function initPoints() {
                points = [];
                const cols = Math.ceil(width / spacing) + 1;
                const rows = Math.ceil(height / spacing) + 1;
                
                for (let i = 0; i < cols; i++) {
                    for (let j = 0; j < rows; j++) {
                        const baseX = i * spacing;
                        const baseY = j * spacing;
                        points.push({
                            baseX: baseX,
                            baseY: baseY,
                            x: baseX,
                            y: baseY
                        });
                    }
                }
            }

            window.addEventListener('resize', resize);
            window.addEventListener('mousemove', (e) => {
                mouse.x = e.clientX;
                mouse.y = e.clientY;
            });
            window.addEventListener('mouseleave', () => {
                mouse.x = -1000;
                mouse.y = -1000;
            });

            function draw() {
                ctx.clearRect(0, 0, width, height);

                // Setup stroke style matching primary color
                ctx.strokeStyle = 'rgba(212, 175, 53, 0.15)'; // Much more transparent
                ctx.lineWidth = 1.5;
                ctx.lineCap = 'round';

                ctx.beginPath();

                for (let i = 0; i < points.length; i++) {
                    const p = points[i];
                    
                    const dx = p.x - mouse.x;
                    const dy = p.y - mouse.y;
                    const distance = Math.sqrt(dx * dx + dy * dy);

                    // If within mouse radius, push away
                    if (distance < mouse.radius) {
                        const force = (mouse.radius - distance) / mouse.radius;
                        const angle = Math.atan2(dy, dx);
                        const pushDist = 40; // max displacement
                        const targetX = p.baseX + Math.cos(angle) * force * pushDist;
                        const targetY = p.baseY + Math.sin(angle) * force * pushDist;
                        
                        p.x += (targetX - p.x) * 0.15; // Ease towards target
                        p.y += (targetY - p.y) * 0.15;
                    } else {
                        // Spring back to home position
                        p.x += (p.baseX - p.x) * 0.1;
                        p.y += (p.baseY - p.y) * 0.1;
                    }

                    // Draw the plus sign
                    const half = plusSize / 2;
                    ctx.moveTo(p.x - half, p.y);
                    ctx.lineTo(p.x + half, p.y);
                    ctx.moveTo(p.x, p.y - half);
                    ctx.lineTo(p.x, p.y + half);
                }
                ctx.stroke();
                requestAnimationFrame(draw);
            }

            resize();
            draw();
        }
    });
</script>

</body>
</html>
