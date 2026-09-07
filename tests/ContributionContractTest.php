<?php

declare(strict_types=1);

namespace Kumwe\Portal\Contract\Tests;

use InvalidArgumentException;
use Kumwe\Portal\Contract\PortalRouteDefinition;
use Kumwe\Portal\Contract\PortalTemplateDefinition;
use Kumwe\Portal\Contract\PortalWorkspaceDefinition;
use Kumwe\Portal\Contract\PortalNavigationDefinition;
use PHPUnit\Framework\TestCase;

final class ContributionContractTest extends TestCase
{
    public function testDeclarationsNormalizeAndSerializeWithoutHost(): void
    {
        $workspace = new PortalWorkspaceDefinition('acme.editor', 'Editor', 'Edit records', 10);
        $view = new PortalTemplateDefinition('acme.editor.index', 'editor/index.twig');
        $route = new PortalRouteDefinition('acme.editor.save', '/editor', ['POST', 'PATCH', 'POST'], 'acme.editor.write', $view->identifier());
        $navigation = new PortalNavigationDefinition('acme.editor.home', $workspace->identifier(), 'Editor', 'Edit records', '/editor', 'edit', 'acme.editor.read', 10);
        self::assertSame(['PATCH', 'POST'], $route->methods);
        self::assertSame('acme.editor.write', $route->toArray()['capability']);
        self::assertSame('acme.editor', $navigation->toArray()['workspace']);
        self::assertArrayNotHasKey('surface', $navigation->toArray());
        self::assertSame(['name' => 'acme.editor.index', 'template' => 'editor/index.twig'], $view->toArray());
    }

    public function testRouteRejectsMixedSafeAndMutatingVerbs(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new PortalRouteDefinition('acme.editor.route', '/editor', ['GET', 'POST'], 'acme.editor.read', 'acme.editor.view');
    }

    public function testUnownedAndUnboundedIdentifiersAreRejected(): void
    {
        foreach (['unowned', '', str_repeat('a', 192), 'acme.editor/unsafe', "acme.editor\0bad"] as $identifier) {
            try {
                PortalWorkspaceDefinition::assertIdentifier($identifier, 'workspace');
                self::fail('Invalid identifier was admitted.');
            } catch (InvalidArgumentException) {
                self::assertTrue(true);
            }
        }
    }

    public function testEstablishedOwnerDotsRemainRepresentable(): void
    {
        $workspace = new PortalWorkspaceDefinition('acme..editor.index', 'Éditeur', 'Edit records', 0);
        self::assertSame('acme..editor.index', $workspace->identifier());
    }

    public function testTemplateTraversalIsRejected(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new PortalTemplateDefinition('acme.editor.index', '../private.twig');
    }

    public function testMissingAccessIsRejected(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new PortalRouteDefinition('acme.editor.route', '/editor', ['GET'], '', 'acme.editor.view');
    }

    public function testWorkspaceLabelLimitIsEnforced(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new PortalWorkspaceDefinition('acme.editor', str_repeat('a', 81), 'Edit records', 1);
    }
}
