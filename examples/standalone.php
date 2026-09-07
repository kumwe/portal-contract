<?php
declare(strict_types=1);
if (!class_exists(Composer\Autoload\ClassLoader::class, false)) {
    require dirname(__DIR__) . '/vendor/autoload.php';
}
use Kumwe\Portal\Contract\PortalRouteDefinition;
use Kumwe\Portal\Contract\PortalTemplateDefinition;
$view = new PortalTemplateDefinition('acme.editor.index', 'editor/index.twig');
$route = new PortalRouteDefinition('acme.editor.route', '/editor', ['GET', 'GET'], 'acme.editor.read', $view->identifier());
if ($route->methods !== ['GET']) { throw new RuntimeException('Route normalization failed.'); }
echo "Contract declaration example passed.\n";
