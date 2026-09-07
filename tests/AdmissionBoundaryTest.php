<?php

declare(strict_types=1);

namespace Kumwe\Portal\Contract\Tests;

use InvalidArgumentException;
use Kumwe\Portal\Contract\PortalContributionAdmission;
use Kumwe\Portal\Contract\PortalRouteDefinition;
use Kumwe\Portal\Contract\PortalNavigationDefinition;
use Kumwe\Portal\Contract\PortalTemplateDefinition;
use Kumwe\Portal\Contract\PortalWorkspaceDefinition;
use Kumwe\Access\Capability;
use Kumwe\Contribution\ContributionOwner;
use Kumwe\Contribution\ContributionRejected;
use PHPUnit\Framework\TestCase;

final class AdmissionBoundaryTest extends TestCase
{
    public function testOwnedViewRequiresExplicitCapabilityWithoutChangingDeclaration(): void
    {
        $definition = new PortalTemplateDefinition('acme.editor.index', 'editor/index.twig');
        $admission = new PortalContributionAdmission(
            ContributionOwner::extension('acme/editor'),
            $definition,
            Capability::fromString('acme.editor.read'),
        );
        self::assertSame($definition->identifier(), $admission->identifier());
        self::assertSame($definition->toArray(), $admission->toArray()['definition']);
        self::assertSame('acme/editor', $admission->toArray()['owner']);
        self::assertSame('acme.editor.read', $admission->toArray()['required_capability']);
        self::assertFalse($admission->exposed);
        self::assertFalse($admission->toArray()['exposed']);
        $optedIn = new PortalContributionAdmission($admission->owner, $definition, $admission->requiredCapability, exposed: true);
        self::assertTrue($optedIn->exposed);
    }

    public function testForeignReferencesAreRejectedEvenWhenRouteOwnerMatches(): void
    {
        $this->expectException(ContributionRejected::class);
        new PortalContributionAdmission(
            ContributionOwner::extension('acme/editor'),
            new PortalRouteDefinition('acme.editor.list', '/list', ['GET'], 'acme.editor.read', 'other.package.view'),
            Capability::fromString('acme.editor.read'),
        );
    }

    public function testAdmissionCannotReplaceDeclaredCapability(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new PortalContributionAdmission(
            ContributionOwner::extension('acme/editor'),
            new PortalRouteDefinition('acme.editor.list', '/list', ['GET'], 'acme.editor.read', 'acme.editor.view'),
            Capability::fromString('public.read'),
        );
    }

    public function testForeignDefinitionIsRejected(): void
    {
        $this->expectException(ContributionRejected::class);
        new PortalContributionAdmission(
            ContributionOwner::extension('acme/editor'),
            new PortalTemplateDefinition('other.package.view', 'index.twig'),
            Capability::fromString('acme.editor.read'),
        );
    }

    public function testPathAndTemplateBudgetsRejectOversizedSafeSyntax(): void
    {
        foreach ([
            static fn () => new PortalRouteDefinition('acme.editor.list', '/' . str_repeat('x', 2048), ['GET'], 'acme.editor.read', 'acme.editor.view'),
            static fn () => new PortalTemplateDefinition('acme.editor.view', str_repeat('x', 251) . '.twig'),
            static fn () => new PortalNavigationDefinition('acme.editor.nav', 'acme.editor.work', 'Title', 'Description', '/' . str_repeat('x', 2048), 'home', 'acme.editor.read', 1),
            static fn () => new PortalWorkspaceDefinition('acme.editor.work', "\xFF", 'Description', 1),
        ] as $construct) {
            try {
                $construct();
                self::fail('Unbounded or non-UTF8 declaration was admitted.');
            } catch (InvalidArgumentException) {
                self::assertTrue(true);
            }
        }
    }

    public function testBoundarySizedPathAndTemplateRemainAccepted(): void
    {
        $route = new PortalRouteDefinition('acme.editor.list', '/' . str_repeat('x', 2047), ['GET'], 'acme.editor.read', 'acme.editor.view');
        self::assertSame(2048, strlen($route->path));
        $view = new PortalTemplateDefinition('acme.editor.view', str_repeat('x', 250) . '.twig');
        self::assertSame(255, strlen($view->template));
    }
}

