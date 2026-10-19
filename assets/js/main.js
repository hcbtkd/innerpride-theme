/**
 * Inner Pride Taekwondo Theme - Interactive JavaScript
 * Lightweight, Vanilla JS, Zero dependencies.
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Mobile Menu Drawer & Overlay Toggle
    const menuToggleBtn = document.getElementById('menu-toggle-btn');
    const drawerCloseBtn = document.getElementById('drawer-close-btn');
    const siteNav = document.getElementById('site-nav');
    const navOverlay = document.getElementById('nav-overlay');

    function openMobileNav() {
        if (!siteNav) return;
        siteNav.classList.add('is-open');
        if (navOverlay) navOverlay.classList.add('is-active');
        if (menuToggleBtn) menuToggleBtn.setAttribute('aria-expanded', 'true');
        document.body.classList.add('nav-drawer-open');
        document.body.style.overflow = 'hidden';
    }

    function closeMobileNav() {
        if (!siteNav) return;
        siteNav.classList.remove('is-open');
        if (navOverlay) navOverlay.classList.remove('is-active');
        if (menuToggleBtn) menuToggleBtn.setAttribute('aria-expanded', 'false');
        document.body.classList.remove('nav-drawer-open');
        document.body.style.overflow = '';
    }

    if (menuToggleBtn) {
        const toggleHandler = (e) => {
            if (e) {
                e.preventDefault();
                e.stopPropagation();
            }
            if (siteNav && siteNav.classList.contains('is-open')) {
                closeMobileNav();
            } else {
                openMobileNav();
            }
        };
        menuToggleBtn.addEventListener('click', toggleHandler);
        menuToggleBtn.addEventListener('touchend', toggleHandler);
    }

    if (drawerCloseBtn) {
        const closeHandler = (e) => {
            if (e) {
                e.preventDefault();
                e.stopPropagation();
            }
            closeMobileNav();
        };
        drawerCloseBtn.addEventListener('click', closeHandler);
        drawerCloseBtn.addEventListener('touchend', closeHandler);
    }

    if (navOverlay) {
        const overlayHandler = (e) => {
            if (e) {
                e.preventDefault();
                e.stopPropagation();
            }
            closeMobileNav();
        };
        navOverlay.addEventListener('click', overlayHandler);
        navOverlay.addEventListener('touchend', overlayHandler);
    }

    // Close menu when clicking any nav link
    if (siteNav) {
        siteNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                closeMobileNav();
            });
        });
    }

    // Close on Escape key press
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && siteNav && siteNav.classList.contains('is-open')) {
            closeMobileNav();
        }
    });

    // 2. Privacy Policy Tabs Switcher
    const tabButtons = document.querySelectorAll('.legal-tab-btn');
    const policyBlocks = document.querySelectorAll('.policy-block');

    function activateTab(targetId) {
        if (!targetId) return;

        tabButtons.forEach(btn => {
            if (btn.getAttribute('data-tab') === targetId) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });

        policyBlocks.forEach(block => {
            if (block.id === targetId) {
                block.classList.add('active');
            } else {
                block.classList.remove('active');
            }
        });
    }

    if (tabButtons.length > 0) {
        tabButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const targetId = btn.getAttribute('data-tab');
                activateTab(targetId);
                // Update URL hash without jumping
                if (history.pushState) {
                    history.pushState(null, null, '#' + targetId);
                }
            });
        });

        // Check if there is an anchor hash in the URL on load
        if (window.location.hash) {
            const hash = window.location.hash.substring(1);
            if (document.getElementById(hash)) {
                activateTab(hash);
            }
        }
    }

    // 3. Smooth scrolling for internal anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#' || targetId === '') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // 4. FAQ Accordion Toggle
    const faqItems = document.querySelectorAll('.faq-item');
    if (faqItems.length > 0) {
        faqItems.forEach(item => {
            const btn = item.querySelector('.faq-question-btn');
            if (btn) {
                btn.addEventListener('click', () => {
                    const isOpen = item.classList.contains('is-open');
                    // Close other open accordion items
                    faqItems.forEach(other => {
                        if (other !== item) {
                            other.classList.remove('is-open');
                            const otherBtn = other.querySelector('.faq-question-btn');
                            if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
                        }
                    });
                    if (isOpen) {
                        item.classList.remove('is-open');
                        btn.setAttribute('aria-expanded', 'false');
                    } else {
                        item.classList.add('is-open');
                        btn.setAttribute('aria-expanded', 'true');
                    }
                });
            }
        });
    }

    // 5. Taekwondo Belt Progression Journey Track & Stepper
    const beltTrack = document.getElementById('beltJourneyTrack');
    const beltPrevBtn = document.getElementById('beltPrevBtn');
    const beltNextBtn = document.getElementById('beltNextBtn');

    if (beltTrack) {
        if (beltPrevBtn) {
            beltPrevBtn.addEventListener('click', () => {
                beltTrack.scrollBy({ left: -280, behavior: 'smooth' });
            });
        }
        if (beltNextBtn) {
            beltNextBtn.addEventListener('click', () => {
                beltTrack.scrollBy({ left: 280, behavior: 'smooth' });
            });
        }
    }

    window.scrollToBelt = function(beltIndex) {
        const targetCard = document.getElementById('belt-card-' + beltIndex);
        if (targetCard && beltTrack) {
            const cardLeft = targetCard.offsetLeft;
            const trackPadding = 20;
            beltTrack.scrollTo({
                left: cardLeft - trackPadding,
                behavior: 'smooth'
            });
        }
    };

    // 6. Filterable & Auto-Scrolling Photo Gallery Slider
    const galleryTrack = document.getElementById('galleryCarouselTrack');
    const galleryPrevBtn = document.getElementById('galleryTrackPrev');
    const galleryNextBtn = document.getElementById('galleryTrackNext');
    const galleryAutoplayToggle = document.getElementById('galleryAutoplayToggle');
    const galleryCounterPill = document.getElementById('galleryCounterPill');
    const galleryFilterBtns = document.querySelectorAll('.gallery-filter-btn');
    const galleryViewSliderBtn = document.getElementById('galleryViewSliderBtn');
    const galleryViewGridBtn = document.getElementById('galleryViewGridBtn');
    const galleryItems = document.querySelectorAll('.gallery-item-card');

    let isAutoplayActive = true;
    let autoplayTimer = null;
    let isHovered = false;

    function getCardScrollStep() {
        if (!galleryTrack) return 340;
        const visibleCard = galleryTrack.querySelector('.gallery-item-card:not([style*="display: none"])');
        return visibleCard ? (visibleCard.offsetWidth + 20) : 340;
    }

    function scrollNextGalleryCard() {
        if (!galleryTrack || galleryTrack.classList.contains('is-grid-mode') || isHovered) return;
        const step = getCardScrollStep();
        const maxScroll = galleryTrack.scrollWidth - galleryTrack.clientWidth;
        if (galleryTrack.scrollLeft >= maxScroll - 15) {
            galleryTrack.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
            galleryTrack.scrollBy({ left: step, behavior: 'smooth' });
        }
    }

    function scrollPrevGalleryCard() {
        if (!galleryTrack) return;
        const step = getCardScrollStep();
        if (galleryTrack.scrollLeft <= 15) {
            galleryTrack.scrollTo({ left: galleryTrack.scrollWidth, behavior: 'smooth' });
        } else {
            galleryTrack.scrollBy({ left: -step, behavior: 'smooth' });
        }
    }

    function startAutoplay() {
        stopAutoplay();
        if (!isAutoplayActive) return;
        autoplayTimer = setInterval(scrollNextGalleryCard, 3500);
        if (galleryAutoplayToggle) {
            galleryAutoplayToggle.classList.remove('is-paused');
            const text = galleryAutoplayToggle.querySelector('.autoplay-text');
            if (text) text.textContent = 'Auto-Scroll ON';
        }
    }

    function stopAutoplay() {
        if (autoplayTimer) {
            clearInterval(autoplayTimer);
            autoplayTimer = null;
        }
    }

    function toggleAutoplay() {
        isAutoplayActive = !isAutoplayActive;
        if (isAutoplayActive) {
            startAutoplay();
        } else {
            stopAutoplay();
            if (galleryAutoplayToggle) {
                galleryAutoplayToggle.classList.add('is-paused');
                const text = galleryAutoplayToggle.querySelector('.autoplay-text');
                if (text) text.textContent = 'Auto-Scroll PAUSED';
            }
        }
    }

    function resetAutoplayTimer() {
        if (isAutoplayActive) {
            stopAutoplay();
            autoplayTimer = setInterval(scrollNextGalleryCard, 4500);
        }
    }

    if (galleryNextBtn) {
        galleryNextBtn.addEventListener('click', () => {
            scrollNextGalleryCard();
            resetAutoplayTimer();
        });
    }

    if (galleryPrevBtn) {
        galleryPrevBtn.addEventListener('click', () => {
            scrollPrevGalleryCard();
            resetAutoplayTimer();
        });
    }

    if (galleryAutoplayToggle) {
        galleryAutoplayToggle.addEventListener('click', toggleAutoplay);
    }

    if (galleryTrack) {
        galleryTrack.addEventListener('mouseenter', () => { isHovered = true; });
        galleryTrack.addEventListener('mouseleave', () => { isHovered = false; });
        galleryTrack.addEventListener('touchstart', () => { isHovered = true; }, { passive: true });
        galleryTrack.addEventListener('touchend', () => {
            setTimeout(() => { isHovered = false; }, 2000);
        }, { passive: true });

        galleryTrack.addEventListener('scroll', () => {
            updateGalleryCounter();
        }, { passive: true });
    }

    function updateGalleryCounter() {
        if (!galleryTrack || !galleryCounterPill) return;
        const visibleCards = Array.from(galleryItems).filter(item => item.style.display !== 'none');
        if (visibleCards.length === 0) return;

        const scrollLeft = galleryTrack.scrollLeft;
        const step = getCardScrollStep();
        const currentIndex = Math.min(Math.round(scrollLeft / step) + 1, visibleCards.length);
        const padIndex = String(Math.max(1, currentIndex)).padStart(2, '0');
        const padTotal = String(visibleCards.length).padStart(2, '0');
        galleryCounterPill.textContent = `${padIndex} / ${padTotal}`;
    }

    // View Switcher (Auto-Scroll Slider vs Grid)
    if (galleryViewSliderBtn && galleryViewGridBtn && galleryTrack) {
        galleryViewSliderBtn.addEventListener('click', () => {
            galleryViewSliderBtn.classList.add('active');
            galleryViewGridBtn.classList.remove('active');
            galleryTrack.classList.remove('is-grid-mode');
            if (galleryPrevBtn) galleryPrevBtn.style.display = '';
            if (galleryNextBtn) galleryNextBtn.style.display = '';
            const footer = document.querySelector('.gallery-track-footer');
            if (footer) footer.style.display = '';
            startAutoplay();
        });

        galleryViewGridBtn.addEventListener('click', () => {
            galleryViewGridBtn.classList.add('active');
            galleryViewSliderBtn.classList.remove('active');
            galleryTrack.classList.add('is-grid-mode');
            if (galleryPrevBtn) galleryPrevBtn.style.display = 'none';
            if (galleryNextBtn) galleryNextBtn.style.display = 'none';
            const footer = document.querySelector('.gallery-track-footer');
            if (footer) footer.style.display = 'none';
            stopAutoplay();
        });
    }

    // Category Filter Buttons
    if (galleryFilterBtns.length > 0 && galleryItems.length > 0) {
        galleryFilterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                galleryFilterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const filter = btn.getAttribute('data-filter');
                galleryItems.forEach(item => {
                    const category = item.getAttribute('data-category');
                    if (filter === 'all' || category === filter) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });

                if (galleryTrack) {
                    galleryTrack.scrollTo({ left: 0, behavior: 'smooth' });
                }
                updateGalleryCounter();
                resetAutoplayTimer();
            });
        });
    }

    // Start auto-scroll on load
    startAutoplay();

    // 7. Gallery Lightbox Modal
    const lightboxModal = document.getElementById('galleryLightboxModal');
    const lightboxImg = document.getElementById('lightboxImg');
    const lightboxCaption = document.getElementById('lightboxCaption');
    const lightboxCounter = document.getElementById('lightboxCounter');
    const lightboxCloseBtn = document.getElementById('lightboxCloseBtn');
    const lightboxPrevBtn = document.getElementById('lightboxPrevBtn');
    const lightboxNextBtn = document.getElementById('lightboxNextBtn');

    let currentLightboxIndex = 0;
    const galleryData = [];

    galleryItems.forEach((card, index) => {
        const img = card.querySelector('.gallery-item-img');
        const caption = card.querySelector('.gallery-item-caption');
        if (img) {
            galleryData.push({
                src: img.src,
                caption: caption ? caption.textContent.trim() : ''
            });
        }

        card.addEventListener('click', () => {
            openLightbox(index);
        });
    });

    function openLightbox(index) {
        if (!lightboxModal || !galleryData[index]) return;
        currentLightboxIndex = index;
        updateLightboxContent();
        lightboxModal.classList.add('is-open');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        if (!lightboxModal) return;
        lightboxModal.classList.remove('is-open');
        document.body.style.overflow = '';
    }

    function updateLightboxContent() {
        const item = galleryData[currentLightboxIndex];
        if (!item) return;
        if (lightboxImg) lightboxImg.src = item.src;
        if (lightboxCaption) lightboxCaption.textContent = item.caption;
        if (lightboxCounter) lightboxCounter.textContent = `${currentLightboxIndex + 1} / ${galleryData.length}`;
    }

    function prevLightboxImage() {
        currentLightboxIndex = (currentLightboxIndex - 1 + galleryData.length) % galleryData.length;
        updateLightboxContent();
    }

    function nextLightboxImage() {
        currentLightboxIndex = (currentLightboxIndex + 1) % galleryData.length;
        updateLightboxContent();
    }

    if (lightboxCloseBtn) lightboxCloseBtn.addEventListener('click', closeLightbox);
    if (lightboxPrevBtn) lightboxPrevBtn.addEventListener('click', (e) => { e.stopPropagation(); prevLightboxImage(); });
    if (lightboxNextBtn) lightboxNextBtn.addEventListener('click', (e) => { e.stopPropagation(); nextLightboxImage(); });
    if (lightboxModal) {
        lightboxModal.addEventListener('click', (e) => {
            if (e.target === lightboxModal) closeLightbox();
        });
    }

    document.addEventListener('keydown', (e) => {
        if (lightboxModal && lightboxModal.classList.contains('is-open')) {
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowLeft') prevLightboxImage();
            if (e.key === 'ArrowRight') nextLightboxImage();
        }
    });

    // 8. Interactive Trial Booking Modal
    const trialModal = document.getElementById('trialBookingModal');
    const trialCloseBtn = document.getElementById('trialModalCloseBtn');
    const trialForm = document.getElementById('trialBookingForm');
    const trialOpenTriggers = document.querySelectorAll('.open-trial-modal');

    function openTrialModal() {
        if (!trialModal) return;
        trialModal.classList.add('is-open');
        document.body.style.overflow = 'hidden';
    }

    function closeTrialModal() {
        if (!trialModal) return;
        trialModal.classList.remove('is-open');
        document.body.style.overflow = '';
    }

    trialOpenTriggers.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            openTrialModal();
        });
    });

    if (trialCloseBtn) trialCloseBtn.addEventListener('click', closeTrialModal);
    if (trialModal) {
        trialModal.addEventListener('click', (e) => {
            if (e.target === trialModal) closeTrialModal();
        });
    }

    if (trialForm) {
        trialForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const parentName = document.getElementById('trialParentName')?.value.trim() || 'Parent';
            const studentName = document.getElementById('trialStudentName')?.value.trim() || 'Student';
            const studentAge = document.getElementById('trialStudentAge')?.value.trim() || '';
            const batch = document.getElementById('trialBatch')?.value.trim() || 'Junior Batch (4-12 Yrs)';
            const phone = document.getElementById('trialPhone')?.value.trim() || '';

            const message = `Hello Coach Haseeb Ahmad, I would like to book a Free Trial Class at Inner Pride Taekwondo Academy:\n\n• Parent Name: ${parentName}\n• Student Name: ${studentName}\n• Age: ${studentAge} Years\n• Preferred Batch: ${batch}\n• Contact: ${phone}\n\nPlease confirm our trial session slot.`;

            const whatsappUrl = `https://api.whatsapp.com/send?phone=917309595831&text=${encodeURIComponent(message)}`;
            window.open(whatsappUrl, '_blank');
            closeTrialModal();
        });
    }

    // 9. Mobile Auto-Scrolling Testimonial Carousel
    const reviewsTrack = document.getElementById('reviewsCarouselTrack');
    const reviewDots = document.querySelectorAll('.review-dot');
    let reviewsAutoplayTimer = null;
    let isReviewsInteracting = false;
    let reviewsResumeTimeout = null;

    function getReviewStep() {
        if (!reviewsTrack) return 320;
        const firstCard = reviewsTrack.querySelector('.review-card');
        return firstCard ? (firstCard.offsetWidth + 20) : 320;
    }

    function isReviewsSliderActive() {
        if (!reviewsTrack) return false;
        return (reviewsTrack.scrollWidth > reviewsTrack.clientWidth + 15);
    }

    function scrollNextReview() {
        if (!reviewsTrack || !isReviewsSliderActive() || isReviewsInteracting) return;
        const step = getReviewStep();
        const maxScroll = reviewsTrack.scrollWidth - reviewsTrack.clientWidth;
        
        if (reviewsTrack.scrollLeft >= maxScroll - 20) {
            reviewsTrack.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
            reviewsTrack.scrollBy({ left: step, behavior: 'smooth' });
        }
    }

    function updateActiveReviewDot() {
        if (!reviewsTrack || !reviewDots.length) return;
        const step = getReviewStep();
        const currentIndex = Math.min(
            reviewDots.length - 1,
            Math.max(0, Math.round(reviewsTrack.scrollLeft / step))
        );

        reviewDots.forEach((dot, idx) => {
            if (idx === currentIndex) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });

        const cards = reviewsTrack.querySelectorAll('.review-card');
        cards.forEach((card, idx) => {
            if (idx === currentIndex) {
                card.classList.add('is-active-review');
            } else {
                card.classList.remove('is-active-review');
            }
        });
    }

    function startReviewsAutoplay() {
        stopReviewsAutoplay();
        if (!isReviewsSliderActive()) return;
        reviewsAutoplayTimer = setInterval(scrollNextReview, 3800);
    }

    function stopReviewsAutoplay() {
        if (reviewsAutoplayTimer) {
            clearInterval(reviewsAutoplayTimer);
            reviewsAutoplayTimer = null;
        }
    }

    function pauseReviewsOnUserTouch() {
        isReviewsInteracting = true;
        stopReviewsAutoplay();
        if (reviewsResumeTimeout) clearTimeout(reviewsResumeTimeout);
        reviewsResumeTimeout = setTimeout(() => {
            isReviewsInteracting = false;
            startReviewsAutoplay();
        }, 4000);
    }

    if (reviewsTrack) {
        reviewDots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                pauseReviewsOnUserTouch();
                const step = getReviewStep();
                reviewsTrack.scrollTo({ left: index * step, behavior: 'smooth' });
            });
        });

        reviewsTrack.addEventListener('touchstart', () => {
            isReviewsInteracting = true;
            stopReviewsAutoplay();
        }, { passive: true });

        reviewsTrack.addEventListener('touchend', () => {
            pauseReviewsOnUserTouch();
        }, { passive: true });

        reviewsTrack.addEventListener('mouseenter', () => {
            isReviewsInteracting = true;
            stopReviewsAutoplay();
        });

        reviewsTrack.addEventListener('mouseleave', () => {
            isReviewsInteracting = false;
            startReviewsAutoplay();
        });

        reviewsTrack.addEventListener('scroll', () => {
            updateActiveReviewDot();
        }, { passive: true });

        // Kick off auto-scroll if slider is active
        startReviewsAutoplay();

        window.addEventListener('resize', () => {
            if (isReviewsSliderActive()) {
                if (!reviewsAutoplayTimer) startReviewsAutoplay();
            } else {
                stopReviewsAutoplay();
            }
        });
    }

    // Global Escape Key Listener for Modals
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            if (lightboxModal && lightboxModal.classList.contains('is-open')) closeLightbox();
            if (trialModal && trialModal.classList.contains('is-open')) closeTrialModal();
        } else if (lightboxModal && lightboxModal.classList.contains('is-open')) {
            if (e.key === 'ArrowLeft') prevLightboxImage();
            if (e.key === 'ArrowRight') nextLightboxImage();
        }
    });
});

