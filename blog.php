<?php
require_once "./config/db.php";
require_once "./components/blog-helpers.php";

// ── Filters & pagination ─────────────────────────────────────────────────────
$perPage = 6;
$page    = max(1, (int)($_GET['page'] ?? 1));
$tag     = isset($_GET['tag']) ? trim((string)$_GET['tag']) : null;
$search  = isset($_GET['q']) ? trim((string)$_GET['q']) : null;
if ($tag === '') $tag = null;
if ($search === '') $search = null;

$total   = blog_count_posts($pdo, $tag, $search);
$pages   = max(1, (int)ceil($total / $perPage));
$page    = min($page, $pages);
$offset  = ($page - 1) * $perPage;

$posts   = blog_get_posts($pdo, $perPage, $offset, $tag, $search);
$tagName = $tag ? blog_tag_name($pdo, $tag) : null;

// Helper to build a page URL preserving the active filters.
function blog_page_url(int $p): string {
    $q = ['page' => $p];
    if (!empty($_GET['tag'])) $q['tag'] = $_GET['tag'];
    if (!empty($_GET['q']))   $q['q']   = $_GET['q'];
    return 'blog?' . http_build_query($q);
}

// ── SEO ──────────────────────────────────────────────────────────────────────
if ($tagName) {
    $page_title = $tagName . ' — Brit Properties Blog';
    $page_description = 'Articles tagged ' . $tagName . ' from the Brit Properties blog — insights on land, property and real estate in Nigeria.';
} elseif ($search) {
    $page_title = 'Search: ' . $search . ' — Brit Properties Blog';
    $page_description = 'Search results from the Brit Properties blog.';
} else {
    $page_title = 'Blog — Land & Real Estate Insights | Brit Properties';
    $page_description = 'Guides, tips and insights on buying land, property documentation, investment and real estate across Nigeria from Brit Properties.';
}

include "./components/head.php";
include "./components/navbar.php";
?>

    <style>
        .blog-toolbar{margin-bottom:40px;}
        .blog-search{display:flex;gap:10px;max-width:420px;}
        .blog-search input{flex:1;height:48px;border:1px solid #e1e1e1;border-radius:6px;padding:0 16px;font-size:15px;}
        .blog-search button{border:none;background:#ed1c24;color:#fff;border-radius:6px;padding:0 20px;font-weight:500;cursor:pointer;}
        .post-item-content .post-meta{font-size:13px;color:#999;margin-bottom:10px;}
        .post-item-content .post-excerpt{font-size:15px;color:#666;margin:12px 0 0;}
        .post-card-tags{margin-top:14px;display:flex;flex-wrap:wrap;gap:8px;}
        .post-card-tags a{font-size:12px;color:#ed1c24;text-transform:capitalize;}
        .blog-empty{padding:60px 0;text-align:center;color:#666;}
    </style>

    <div class="page-header bg-section parallaxie" style="background-image: url('./assets/images/blogBG.jpg');background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque"><?php echo $tagName ? htmlspecialchars($tagName) : 'Our Blog'; ?></h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./">Home</a></li>
                                <li class="breadcrumb-item"><a href="blog">Blog</a></li>
                                <?php if ($tagName): ?><li class="breadcrumb-item"><?php echo htmlspecialchars($tagName); ?></li><?php endif; ?>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Blog Start -->
    <div class="page-blog">
        <div class="container">

            <!-- Toolbar: search -->
            <div class="row blog-toolbar">
                <div class="col-lg-6">
                    <form class="blog-search" action="blog" method="GET" role="search">
                        <input type="text" name="q" value="<?php echo htmlspecialchars((string)$search, ENT_QUOTES); ?>" placeholder="Search articles…" aria-label="Search articles">
                        <button type="submit">Search</button>
                    </form>
                </div>
            </div>

            <?php if (empty($posts)): ?>
                <div class="row"><div class="col-lg-12"><div class="blog-empty">
                    <p>No articles found<?php echo $search ? ' for “' . htmlspecialchars($search) . '”' : ''; ?>.</p>
                    <a href="blog" class="btn-default">Back to all posts</a>
                </div></div></div>
            <?php else: ?>
            <div class="row">
                <?php foreach ($posts as $i => $post):
                    $tags = blog_get_tags_for_post($pdo, (int)$post['post_id']);
                    $img  = !empty($post['featured_image']) ? $post['featured_image'] : './assets/images/blogBG.jpg';
                    $url  = blog_url($post['slug']);
                ?>
                <div class="col-xl-4 col-md-6">
                    <div class="post-item wow fadeInUp" data-wow-delay="<?php echo number_format($i * 0.15, 2); ?>s">
                        <div class="post-featured-image">
                            <a href="<?php echo $url; ?>" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>">
                                </figure>
                            </a>
                        </div>
                        <div class="post-item-body">
                            <div class="post-item-content">
                                <div class="post-meta"><i class="fa-regular fa-clock"></i> <?php echo blog_date($post['published_at']); ?> &nbsp;·&nbsp; <?php echo htmlspecialchars($post['author']); ?></div>
                                <h2><a href="<?php echo $url; ?>"><?php echo htmlspecialchars($post['title']); ?></a></h2>
                                <p class="post-excerpt"><?php echo htmlspecialchars(blog_excerpt($post)); ?></p>
                                <?php if ($tags): ?>
                                <div class="post-card-tags">
                                    <?php foreach ($tags as $t): ?><a href="<?php echo blog_tag_url($t['slug']); ?>">#<?php echo htmlspecialchars($t['name']); ?></a><?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="post-item-btn">
                                <a href="<?php echo $url; ?>" class="readmore-btn">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <?php if ($pages > 1): ?>
                <div class="col-lg-12">
                    <div class="page-pagination wow fadeInUp" data-wow-delay="0.4s">
                        <ul class="pagination">
                            <li class="<?php echo $page <= 1 ? 'disabled' : ''; ?>">
                                <a href="<?php echo $page <= 1 ? '#' : blog_page_url($page - 1); ?>"><i class="fa-solid fa-angle-left"></i></a>
                            </li>
                            <?php for ($p = 1; $p <= $pages; $p++): ?>
                                <li class="<?php echo $p === $page ? 'active' : ''; ?>"><a href="<?php echo blog_page_url($p); ?>"><?php echo $p; ?></a></li>
                            <?php endfor; ?>
                            <li class="<?php echo $page >= $pages ? 'disabled' : ''; ?>">
                                <a href="<?php echo $page >= $pages ? '#' : blog_page_url($page + 1); ?>"><i class="fa-solid fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>

<?php include "./components/footer.php"; ?>
