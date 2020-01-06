<?php
include __DIR__ . '/../functions.php';
$routes = [
  '/' => '../functions/homepage.php',
  '/register' => '../functions/register.php',
  '/register/validation' => '../functions/validation/register.php',
  '/login' => '../functions/login.php',
  '/login/validation' => '../functions/validation/login.php',
  '/logout' => '../functions/log_out.php',
  '/create' => '../functions/create.php',
  '/profile' => '../functions/profile.php',
  '/profile/validation' => '../functions/validation/profile.php',
  '/profile/password/validation' => '../functions/validation/password.php',
  '/admin' => '../functions/admin.php',
  '/admin/allow' => '../functions/allow.php',
  '/admin/ban' => '../functions/ban.php',
  '/admin/delete' => '../functions/delete.php'
];
$route = $_SERVER['REQUEST_URI'];

if (array_key_exists($route, $routes)) {
  include $routes[$route];exit;
} else {
  dd(404);
}
