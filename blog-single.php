<?php
require_once "./config/db.php";
require_once "./components/blog-helpers.php";

$slug = isset($_GET['slug']) ? trim((string)$_GET['slug']) : '';
$post = $slug !== '' ? blog_get_post_by_slug($pdo, $slug) : null;

if (!$post) {
    http_response_code(404);
    $page_title = 'Post not found — Brit Properties Blog';
    include "./components/head.php";
    include "./components/navbar.php";
    ?>
    <div class="page-header bg-section parallaxie" style="background-image: url('./assets/images/blogBG.jpg');background-position: center center;">
        <div class="container"><div class="row"><div class="col-lg-12"><div class="page-header-box">
            <h1 class="text-anime-style-2" data-cursor="-opaque">Post not found</h1>
            <nav class="wow fadeInUp"><ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item"><a href="blog">Blog</a></li>
            </ol></nav>
        </div></div></div></div>
    </div>
    <div class="page-single-post"><div class="container"><div class="row"><div class="col-lg-12" style="text-align:center;padding:60px 0;">
        <p>The article you are looking for does not exist or has been moved.</p>
        <a href="blog" class="btn-default">Back to the blog</a>
    </div></div></div></div>
    <?php
    include "./components/footer.php";
    exit;
}

$postId   = (int)$post['post_id'];
$tags     = blog_get_tags_for_post($pdo, $postId);
$related  = blog_get_related($pdo, $postId, 3);
$heroImg  = !empty($post['featured_image']) ? $post['featured_image'] : './assets/images/blogBG.jpg';

// Previous / next by publish date
$prevStmt = $pdo->prepare("SELECT slug, title FROM blog_posts WHERE status='Published' AND published_at < :d ORDER BY published_at DESC LIMIT 1");
$prevStmt->execute([':d' => $post['published_at']]);
$prev = $prevStmt->fetch(PDO::FETCH_ASSOC) ?: null;
$nextStmt = $pdo->prepare("SELECT slug, title FROM blog_posts WHERE status='Published' AND published_at > :d AND published_at <= NOW() ORDER BY published_at ASC LIMIT 1");
$nextStmt->execute([':d' => $post['published_at']]);
$next = $nextStmt->fetch(PDO::FETCH_ASSOC) ?: null;

// ── SEO ──────────────────────────────────────────────────────────────────────
$site_url        = 'https://www.britproperties.ng';
$postUrl         = $site_url . '/blog-single?slug=' . rawurlencode($post['slug']);
$page_title      = ($post['meta_title'] ?: $post['title']) . ' | Brit Properties';
$page_description = $post['meta_description'] ?: blog_excerpt($post, 30);
$page_keywords   = implode(', ', array_map(fn($t) => $t['name'], $tags));
$canonical       = $postUrl;
if (!empty($post['featured_image'])) {
    $og_image = $site_url . '/' . ltrim(str_replace('./', '', $post['featured_image']), '/');
}

include "./components/head.php";
include "./components/navbar.php";

// Share URLs
$shareUrl  = rawurlencode($postUrl);
$shareText = rawurlencode($post['title']);
?>

    <style>
        .page-single-post .post-image img{width:100%;height:auto;border-radius:8px;}
        .post-entry h2{margin:26px 0 14px;}
        .post-entry p, .post-entry li{line-height:1.8;}
        .post-entry blockquote{border-left:4px solid #ed1c24;padding:6px 0 6px 22px;margin:24px 0;font-style:italic;color:#333;}
        .post-single-meta .breadcrumb{display:flex;gap:22px;flex-wrap:wrap;}
        .post-single-meta .breadcrumb li{color:#fff;}
        .related-posts{margin-top:70px;}
        .related-posts .post-item-content h3{font-size:18px;margin:14px 0 0;}
        .post-nav{display:flex;justify-content:space-between;gap:20px;margin-top:40px;border-top:1px solid #eee;padding-top:24px;flex-wrap:wrap;}
        .post-nav a{max-width:46%;color:#222;}
        .post-nav a span{display:block;font-size:12px;color:#999;margin-bottom:4px;text-transform:uppercase;letter-spacing:.5px;}
        .post-nav a.next{text-align:right;margin-left:auto;}
    </style>

    <!-- Page Header Section Start -->
    <div class="page-header bg-section parallaxie" style="background-image: url('<?php echo htmlspecialchars($heroImg); ?>');background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque"><?php echo htmlspecialchars($post['title']); ?></h1>
                        <div class="post-single-meta wow fadeInUp">
                            <ol class="breadcrumb">
                                <li><i class="fa-regular fa-user"></i> <?php echo htmlspecialchars($post['author']); ?></li>
                                <li><i class="fa-regular fa-clock"></i> <?php echo blog_date($post['published_at']); ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Section End -->

    <!-- Page Single Post Start -->
    <div class="page-single-post">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="post-image">
                        <figure class="image-anime reveal">
                            <img loading="lazy" src="<?php echo htmlspecialchars($heroImg); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>">
                        </figure>
                    </div>

                    <div class="post-content">
                        <div class="post-entry">
                            <?php echo $post['content']; // admin-authored HTML ?>
                        </div>

                        <!-- Tags + sharing -->
                        <div class="post-tag-links">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <?php if ($tags): ?>
                                    <div class="post-tags wow fadeInUp" data-wow-delay="0.5s">
                                        <span class="tag-links">
                                            Tags:
                                            <?php foreach ($tags as $t): ?><a href="<?php echo blog_tag_url($t['slug']); ?>"><?php echo htmlspecialchars($t['name']); ?></a><?php endforeach; ?>
                                        </span>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-4">
                                    <div class="post-social-sharing wow fadeInUp" data-wow-delay="0.5s">
                                        <ul>
                                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $shareUrl; ?>" target="_blank" rel="noopener" aria-label="Share on Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
                                            <li><a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $shareUrl; ?>" target="_blank" rel="noopener" aria-label="Share on LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                            <li><a href="https://wa.me/?text=<?php echo $shareText . '%20' . $shareUrl; ?>" target="_blank" rel="noopener" aria-label="Share on WhatsApp"><i class="fa-brands fa-whatsapp"></i></a></li>
                                            <li><a href="https://twitter.com/intent/tweet?url=<?php echo $shareUrl; ?>&text=<?php echo $shareText; ?>" target="_blank" rel="noopener" aria-label="Share on X"><i class="fa-brands fa-x-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Prev / next -->
                        <?php if ($prev || $next): ?>
                        <div class="post-nav">
                            <?php if ($prev): ?><a class="prev" href="<?php echo blog_url($prev['slug']); ?>"><span>&larr; Previous</span><?php echo htmlspecialchars($prev['title']); ?></a><?php endif; ?>
                            <?php if ($next): ?><a class="next" href="<?php echo blog_url($next['slug']); ?>"><span>Next &rarr;</span><?php echo htmlspecialchars($next['title']); ?></a><?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Related posts -->
                    <?php if ($related): ?>
                    <div class="related-posts">
                        <div class="section-title"><h2 class="text-anime-style-2" data-cursor="-opaque">Related Articles</h2></div>
                        <div class="row">
                            <?php foreach ($related as $r):
                                $rimg = !empty($r['featured_image']) ? $r['featured_image'] : './assets/images/blogBG.jpg'; ?>
                            <div class="col-xl-4 col-md-6">
                                <div class="post-item wow fadeInUp">
                                    <div class="post-featured-image">
                                        <a href="<?php echo blog_url($r['slug']); ?>" data-cursor-text="View">
                                            <figure class="image-anime"><img loading="lazy" src="<?php echo htmlspecialchars($rimg); ?>" alt="<?php echo htmlspecialchars($r['title']); ?>"></figure>
                                        </a>
                                    </div>
                                    <div class="post-item-body">
                                        <div class="post-item-content">
                                            <h3><a href="<?php echo blog_url($r['slug']); ?>"><?php echo htmlspecialchars($r['title']); ?></a></h3>
                                        </div>
                                        <div class="post-item-btn"><a href="<?php echo blog_url($r['slug']); ?>" class="readmore-btn">read more</a></div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Single Post End -->

    <script type="application/ld+json">
    <?php echo json_encode([
        '@context' => 'https://schema.org',
        '@type'    => 'BlogPosting',
        'headline' => $post['title'],
        'description' => $page_description,
        'image'    => $og_image ?? ($site_url . '/assets/images/blogBG.jpg'),
        'datePublished' => date('c', strtotime($post['published_at'])),
        'dateModified'  => date('c', strtotime($post['updated_at'] ?? $post['published_at'])),
        'author'   => ['@type' => 'Organization', 'name' => $post['author']],
        'publisher' => [
            '@type' => 'Organization',
            'name'  => 'Brit Properties Nigeria Ltd',
            'logo'  => ['@type' => 'ImageObject', 'url' => 'https://res.cloudinary.com/dhowyyjht/image/upload/v1775808044/brit-logo_wxccdp.png'],
        ],
        'keywords'   => $page_keywords,
        'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => $postUrl],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
    </script>

<?php include "./components/footer.php"; ?>
