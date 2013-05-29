<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title; ?></title>
    <meta name="description" content="<?= $description; ?>">
    <meta name="keywords" content="<?= $keywords; ?>">

	<!--[if lt IE 9]>
	<script src="/<?= STATIC_DIR.'/js'; ?>/html5shiv.js"></script>
	<![endif]-->

    <link rel="stylesheet" type="text/css" href="<?= Versioning::auto(STATIC_DIR.'/css/styles.css'); ?>" />
    <link rel="shortcut icon" href="/<?= STATIC_DIR; ?>/images/fav.ico" />

</head>
<body>