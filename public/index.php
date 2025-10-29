<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

// ✅ Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// ✅ Set up Twig
$loader = new FilesystemLoader(__DIR__ . '/../src/templates');
$twig = new Environment($loader, [
    'cache' => __DIR__ . '/../cache/twig',
    'auto_reload' => true,
]);

// ✅ Get Supabase env values
$supabaseUrl = $_ENV['SUPABASE_URL'] ?? '';
$supabaseKey = $_ENV['SUPABASE_ANON_KEY'] ?? '';

// Simple router
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($path) {
    case '/':
    case '/home':
        echo $twig->render('landing.twig', [
            'title' => "Landing Page - Ticketi",
            'supabase_url' => $supabaseUrl,
            'supabase_key' => $supabaseKey,
        ]);
        break;

    case '/dashboard':
        echo $twig->render('dashboard.twig', [
            'title' => "Dashboard - Ticketi",
            'supabase_url' => $supabaseUrl,
            'supabase_key' => $supabaseKey,
        ]);
        break;

    case '/tickets':
        echo $twig->render('tickets.twig', [
            'title' => "Dashboard - Ticketi",
            'supabase_url' => $supabaseUrl,
            'supabase_key' => $supabaseKey,
        ]);
        break;

    case '/auth/login':
        echo $twig->render('login.twig', [
            'title' => "Login - Ticketi",
            'supabase_url' => $supabaseUrl,
            'supabase_key' => $supabaseKey,
        ]);
        break;
  
        case '/auth/signup':
        echo $twig->render('signup.twig', [
            'title' => "Login - Ticketi",
            'supabase_url' => $supabaseUrl,
            'supabase_key' => $supabaseKey,
        ]);
        break;

    default:
        echo $twig->render('404.twig', [
            'title' => "404 Not Found - Ticketi",
            'supabase_url' => $supabaseUrl,
            'supabase_key' => $supabaseKey,
        ]);
};
