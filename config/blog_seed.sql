-- Brit Properties — blog seed data (sample posts + tags)
-- Apply after schema.sql:  mysql -u <user> <db> < config/blog_seed.sql

INSERT IGNORE INTO `blog_tags` (`name`, `slug`) VALUES
  ('Land Buying', 'land-buying'),
  ('Due Diligence', 'due-diligence'),
  ('Documentation', 'documentation'),
  ('Land Titles', 'land-titles'),
  ('Locations', 'locations'),
  ('Investment', 'investment'),
  ('Payment Plans', 'payment-plans'),
  ('Community', 'community');

INSERT IGNORE INTO `blog_posts`
  (`slug`, `title`, `excerpt`, `content`, `featured_image`, `author`, `meta_description`, `status`, `published_at`)
VALUES
(
  'verify-land-before-you-buy-in-nigeria',
  'How to Verify Land Before You Buy in Nigeria',
  'Most land disputes in Nigeria are completely avoidable. Here is a practical, step-by-step checklist to confirm a property is genuine before you part with a single naira.',
  '<p>Buying land in Nigeria can be one of the smartest financial decisions you ever make — but only if you buy right. Every year, families lose hard-earned money to disputed titles, community (omo-onile) harassment, and land that was never the seller''s to sell. The good news is that almost all of these problems are avoidable with proper verification.</p>
<h2>1. Confirm the title document</h2>
<p>Ask for the title document and verify it at the relevant land registry. A genuine Certificate of Occupancy, Governor''s Consent, or registered deed of assignment tells you the land has a traceable, legal owner.</p>
<h2>2. Conduct a search at the land registry</h2>
<p>A formal search confirms whether the land is free of encumbrances such as government acquisition, pending court cases, or existing mortgages. This single step prevents the vast majority of land scams.</p>
<h2>3. Inspect the land physically</h2>
<p>Visit the site, confirm the survey beacons, and speak with the community. What you see on paper must match what exists on the ground.</p>
<ul>
<li>Verify the seller''s identity and legal right to sell.</li>
<li>Confirm the land is not under government acquisition.</li>
<li>Engage a licensed surveyor to confirm the coordinates.</li>
<li>Use a lawyer to review every document before payment.</li>
</ul>
<blockquote><p>If a deal feels rushed or the paperwork is vague, walk away. Genuine sellers welcome scrutiny.</p></blockquote>
<p>At Brit Properties, every parcel we sell is verified, surveyed, and documented before it ever reaches you — so you can invest with confidence.</p>',
  './assets/images/hme_abt.jpg',
  'Brit Properties',
  'A practical step-by-step checklist to verify land in Nigeria before buying — title documents, registry searches, surveys and legal review.',
  'Published',
  '2026-05-12 09:00:00'
),
(
  'understanding-land-titles-c-of-o-governors-consent-survey',
  'Understanding Land Titles: C of O, Governor''s Consent and Survey',
  'C of O, Governor''s Consent, Deed of Assignment, Survey Plan — what do they actually mean, and which ones do you need? A plain-English guide.',
  '<p>Land documentation in Nigeria can feel like alphabet soup. Yet understanding a handful of key documents is the difference between a secure investment and a costly mistake. Here is what each one means.</p>
<h2>Certificate of Occupancy (C of O)</h2>
<p>The C of O is issued by the state government and grants you the right to occupy and use the land for a defined term (usually 99 years). It is one of the strongest forms of land title in Nigeria.</p>
<h2>Governor''s Consent</h2>
<p>When titled land changes hands, the law requires the Governor''s Consent to make the transfer valid. Buying land with a C of O without obtaining consent on the subsequent transfer can weaken your claim.</p>
<h2>Deed of Assignment</h2>
<p>This is the document that actually transfers ownership from the seller to you. It should be properly executed, stamped, and registered.</p>
<h2>Survey Plan</h2>
<p>A registered survey plan fixes the exact coordinates and size of your land, protecting you from boundary disputes and double allocation.</p>
<ul>
<li>Always confirm which title a property carries before buying.</li>
<li>Budget for Governor''s Consent and registration as part of your costs.</li>
<li>Keep certified copies of every document safe.</li>
</ul>
<p>Our team guides every client through documentation from enquiry to final allocation, so nothing is left to chance.</p>',
  './assets/images/abt-img1.jpg',
  'Brit Properties',
  'A plain-English guide to Nigerian land titles: Certificate of Occupancy, Governor''s Consent, Deed of Assignment and Survey Plans.',
  'Published',
  '2026-05-20 10:00:00'
),
(
  'ibadan-oyo-next-real-estate-hotspot',
  'Why Ibadan and Oyo Are Nigeria''s Next Real Estate Hotspots',
  'Affordable entry prices, improving infrastructure and steady demand are turning Ibadan and the wider Oyo State into one of the smartest places to own land today.',
  '<p>For years, the Nigerian property conversation was dominated by Lagos and Abuja. But savvy investors are increasingly looking south-west to Ibadan and the wider Oyo State — and for good reason.</p>
<h2>Affordable entry, strong upside</h2>
<p>Land in well-located parts of Ibadan still trades at a fraction of comparable Lagos plots, while appreciating steadily as the city expands. That combination of low entry price and real growth is exactly what long-term investors look for.</p>
<h2>Infrastructure is catching up</h2>
<p>Road upgrades, improved power, and the Lagos–Ibadan corridor have shortened the distance — physically and economically — between Ibadan and Nigeria''s commercial capital.</p>
<h2>Genuine, growing demand</h2>
<p>A large student population, returning diaspora buyers, and businesses seeking cheaper operating bases are all driving demand for housing and serviced plots.</p>
<ul>
<li>Lower cost of entry than Lagos or Abuja.</li>
<li>Consistent appreciation as the city grows outward.</li>
<li>Strong rental and resale demand.</li>
</ul>
<p>Brit Properties offers verified, well-located estates across high-growth corridors — positioning you ahead of the curve.</p>',
  './assets/images/location.jpg',
  'Brit Properties',
  'Why Ibadan and Oyo State are emerging as one of Nigeria''s smartest real estate investment destinations — affordability, infrastructure and demand.',
  'Published',
  '2026-05-28 11:00:00'
),
(
  'flexible-payment-plans-own-land-without-breaking-the-bank',
  'Flexible Payment Plans: Own Land Without Breaking the Bank',
  'You do not need the full amount upfront to start owning land. Here is how structured, flexible payment plans make property ownership achievable.',
  '<p>One of the biggest myths about land ownership is that you need millions in cash to begin. In reality, structured payment plans have made owning verified land more achievable than ever.</p>
<h2>Spread the cost over time</h2>
<p>Instead of one large payment, flexible plans let you spread the cost over several months — turning a daunting lump sum into manageable instalments that fit your income.</p>
<h2>Lock in today''s price</h2>
<p>Land appreciates. By starting a plan now, you secure today''s price while the value of the property continues to rise during your payment period.</p>
<h2>Build an asset, not just savings</h2>
<p>Every instalment moves you closer to owning a real, appreciating asset — far more productive than money sitting idle.</p>
<ul>
<li>Low initial deposit to get started.</li>
<li>Clear, transparent instalment schedule.</li>
<li>Price locked in from day one.</li>
</ul>
<p>Talk to our team about a plan that matches your budget and goals — and start building wealth one instalment at a time.</p>',
  './assets/images/properties-bg.jpg',
  'Brit Properties',
  'How flexible, structured payment plans make owning verified land in Nigeria achievable without paying the full amount upfront.',
  'Published',
  '2026-06-03 09:30:00'
),
(
  'brit-spelling-bee-celebrating-young-minds',
  'The Brit Spelling Bee: Celebrating Young Minds',
  'Beyond real estate, Brit Properties is investing in the next generation. Here is a look at the Brit Spelling Bee Competition and why it matters.',
  '<p>At Brit Properties, building communities means more than selling land — it means investing in the people who will shape them. That belief is at the heart of the Brit Spelling Bee Competition.</p>
<h2>More than a competition</h2>
<p>The Spelling Bee brings together bright young learners aged 8 to 12 to celebrate literacy, confidence, and the joy of learning. For many children, it is a first taste of the stage and the thrill of healthy competition.</p>
<h2>Why it matters</h2>
<p>Education is the strongest foundation any community can have. By supporting young minds early, we help nurture the confident, capable leaders of tomorrow.</p>
<p>Registration is open to schools and families. If you have a young speller at home, we would love to see them take part.</p>
<p><a href="spelling-bee">Register for the Brit Spelling Bee &rarr;</a></p>',
  './assets/images/spelling-bee/53.jpeg',
  'Brit Properties',
  'A look at the Brit Spelling Bee Competition — celebrating literacy and young minds aged 8 to 12 across Nigeria.',
  'Published',
  '2026-06-08 12:00:00'
);

-- Map posts to tags
INSERT IGNORE INTO `blog_post_tags` (`post_id`, `tag_id`)
SELECT p.post_id, t.tag_id
FROM `blog_posts` p
JOIN `blog_tags` t
WHERE (p.slug = 'verify-land-before-you-buy-in-nigeria' AND t.slug IN ('land-buying','due-diligence','documentation'))
   OR (p.slug = 'understanding-land-titles-c-of-o-governors-consent-survey' AND t.slug IN ('documentation','land-titles'))
   OR (p.slug = 'ibadan-oyo-next-real-estate-hotspot' AND t.slug IN ('locations','investment'))
   OR (p.slug = 'flexible-payment-plans-own-land-without-breaking-the-bank' AND t.slug IN ('payment-plans','investment'))
   OR (p.slug = 'brit-spelling-bee-celebrating-young-minds' AND t.slug IN ('community'));
