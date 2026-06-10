<?php
/**
 * Blog helper functions — shared by blog.php and blog-single.php.
 * Expects a $pdo (from config/db.php) to be available.
 */

if (!function_exists('blog_url')) {
    /** Public URL for a single post. */
    function blog_url(string $slug): string {
        return 'blog-single?slug=' . urlencode($slug);
    }
}

if (!function_exists('blog_tag_url')) {
    /** Public URL for a tag archive on the listing page. */
    function blog_tag_url(string $slug): string {
        return 'blog?tag=' . urlencode($slug);
    }
}

if (!function_exists('blog_excerpt')) {
    /** Excerpt for cards: prefer the stored excerpt, else trim the content. */
    function blog_excerpt(array $post, int $words = 28): string {
        $text = trim((string)($post['excerpt'] ?? ''));
        if ($text === '') {
            $text = trim(strip_tags((string)($post['content'] ?? '')));
        }
        $parts = preg_split('/\s+/', $text);
        if (count($parts) > $words) {
            return implode(' ', array_slice($parts, 0, $words)) . '…';
        }
        return $text;
    }
}

if (!function_exists('blog_date')) {
    function blog_date(?string $datetime): string {
        if (!$datetime) return '';
        $ts = strtotime($datetime);
        return $ts ? date('d M, Y', $ts) : '';
    }
}

if (!function_exists('blog_count_posts')) {
    /** Count published posts, optionally filtered by tag slug and/or search term. */
    function blog_count_posts(PDO $pdo, ?string $tag = null, ?string $search = null): int {
        $where = ["p.status = 'Published'", 'p.published_at <= NOW()'];
        $params = [];
        $join = '';
        if ($tag) {
            $join = 'JOIN blog_post_tags pt ON pt.post_id = p.post_id
                     JOIN blog_tags t ON t.tag_id = pt.tag_id';
            $where[] = 't.slug = :tag';
            $params[':tag'] = $tag;
        }
        if ($search) {
            $where[] = '(p.title LIKE :q1 OR p.excerpt LIKE :q2 OR p.content LIKE :q3)';
            $like = '%' . $search . '%';
            $params[':q1'] = $like;
            $params[':q2'] = $like;
            $params[':q3'] = $like;
        }
        $sql = "SELECT COUNT(DISTINCT p.post_id) FROM blog_posts p $join WHERE " . implode(' AND ', $where);
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return (int)$stmt->fetchColumn();
    }
}

if (!function_exists('blog_get_posts')) {
    /** Published posts (newest first), paginated, optionally filtered. */
    function blog_get_posts(PDO $pdo, int $limit, int $offset, ?string $tag = null, ?string $search = null): array {
        $where = ["p.status = 'Published'", 'p.published_at <= NOW()'];
        $params = [];
        $join = '';
        if ($tag) {
            $join = 'JOIN blog_post_tags pt ON pt.post_id = p.post_id
                     JOIN blog_tags t ON t.tag_id = pt.tag_id';
            $where[] = 't.slug = :tag';
            $params[':tag'] = $tag;
        }
        if ($search) {
            $where[] = '(p.title LIKE :q1 OR p.excerpt LIKE :q2 OR p.content LIKE :q3)';
            $like = '%' . $search . '%';
            $params[':q1'] = $like;
            $params[':q2'] = $like;
            $params[':q3'] = $like;
        }
        $sql = "SELECT DISTINCT p.* FROM blog_posts p $join
                WHERE " . implode(' AND ', $where) . "
                ORDER BY p.published_at DESC
                LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($sql);
        foreach ($params as $k => $v) { $stmt->bindValue($k, $v); }
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

if (!function_exists('blog_get_post_by_slug')) {
    function blog_get_post_by_slug(PDO $pdo, string $slug): ?array {
        $stmt = $pdo->prepare(
            "SELECT * FROM blog_posts
             WHERE slug = :slug AND status = 'Published' AND published_at <= NOW()
             LIMIT 1"
        );
        $stmt->execute([':slug' => $slug]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }
}

if (!function_exists('blog_get_tags_for_post')) {
    function blog_get_tags_for_post(PDO $pdo, int $postId): array {
        $stmt = $pdo->prepare(
            "SELECT t.name, t.slug FROM blog_tags t
             JOIN blog_post_tags pt ON pt.tag_id = t.tag_id
             WHERE pt.post_id = :id ORDER BY t.name"
        );
        $stmt->execute([':id' => $postId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

if (!function_exists('blog_get_all_tags')) {
    /** All tags that have at least one published post (with post counts). */
    function blog_get_all_tags(PDO $pdo): array {
        $stmt = $pdo->query(
            "SELECT t.name, t.slug, COUNT(p.post_id) AS post_count
             FROM blog_tags t
             JOIN blog_post_tags pt ON pt.tag_id = t.tag_id
             JOIN blog_posts p ON p.post_id = pt.post_id
                 AND p.status = 'Published' AND p.published_at <= NOW()
             GROUP BY t.tag_id ORDER BY t.name"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

if (!function_exists('blog_get_related')) {
    /** Posts that share at least one tag with the given post. */
    function blog_get_related(PDO $pdo, int $postId, int $limit = 3): array {
        $stmt = $pdo->prepare(
            "SELECT DISTINCT p.* FROM blog_posts p
             JOIN blog_post_tags pt ON pt.post_id = p.post_id
             WHERE pt.tag_id IN (SELECT tag_id FROM blog_post_tags WHERE post_id = :id)
               AND p.post_id <> :id2
               AND p.status = 'Published' AND p.published_at <= NOW()
             ORDER BY p.published_at DESC
             LIMIT :limit"
        );
        $stmt->bindValue(':id', $postId, PDO::PARAM_INT);
        $stmt->bindValue(':id2', $postId, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

if (!function_exists('blog_tag_name')) {
    function blog_tag_name(PDO $pdo, string $slug): ?string {
        $stmt = $pdo->prepare("SELECT name FROM blog_tags WHERE slug = :s LIMIT 1");
        $stmt->execute([':s' => $slug]);
        $n = $stmt->fetchColumn();
        return $n !== false ? $n : null;
    }
}
