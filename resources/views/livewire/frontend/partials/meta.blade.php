<title>{{ $meta['title'] ?? 'Default School Title' }}</title>
<meta name="description" content="{{ $meta['description'] ?? 'This is the default description of our school.' }}">
<meta name="keywords" content="{{ $meta['keywords'] ?? 'education, school, learning' }}">
<meta name="author" content="{{ $meta['author'] ?? 'School CMS' }}">
<meta name="robots" content="{{ $meta['robots'] ?? 'index, follow' }}">
<link rel="canonical" href="{{ $meta['canonical'] ?? url()->current() }}">