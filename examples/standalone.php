<?php
declare(strict_types=1);
if (!class_exists(Composer\Autoload\ClassLoader::class, false)) {
    require dirname(__DIR__) . '/vendor/autoload.php';
}
use Kumwe\Portal\Contract\PortalRouteDefinition;
use Kumwe\Portal\Contract\PortalTemplateDefinition;
use Kumwe\Portal\Contract\PortalContributionAdmission;
use Kumwe\Contribution\ContributionOwner;
use Kumwe\Access\Capability;
$view = new PortalTemplateDefinition('acme.editor.index', 'editor/index.twig');
$route = new PortalRouteDefinition('acme.editor.route', '/editor', ['GET', 'GET'], 'acme.editor.read', $view->identifier());
if ($route->methods !== ['GET']) { throw new RuntimeException('Route normalization failed.'); }
$hidden = new PortalContributionAdmission(
    ContributionOwner::extension('acme/editor'), $route, Capability::fromString('acme.editor.read'),
);
if ($hidden->exposed) { throw new RuntimeException('Portal exposure must default to false.'); }
$optedIn = new PortalContributionAdmission($hidden->owner, $route, $hidden->requiredCapability, exposed: true);
if (!$optedIn->exposed) { throw new RuntimeException('Explicit portal opt-in was not retained.'); }
echo "Contract declaration example passed.\n";
