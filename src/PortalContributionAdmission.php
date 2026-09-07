<?php

declare(strict_types=1);

namespace Kumwe\Portal\Contract;

use InvalidArgumentException;
use Kumwe\Portal\Contract\PortalWorkspaceDefinition as WorkspaceDefinition;
use Kumwe\Portal\Contract\PortalNavigationDefinition as NavigationDefinition;
use Kumwe\Portal\Contract\PortalRouteDefinition as RouteDefinition;
use Kumwe\Portal\Contract\PortalTemplateDefinition as TemplateDefinition;
use Kumwe\Access\Capability;
use Kumwe\Contribution\ContributionDefinition;
use Kumwe\Contribution\ContributionOwner;
use Kumwe\Contribution\ContributionRejected;
use Kumwe\Contribution\SurfaceIdentifierPolicy;

/**
 * Versioned, owned declaration with an explicit access requirement and opt-in.
 *
 * This immutable value validates declaration admission only. It does not authenticate,
 * authorize, activate, dispatch or render anything. The host must independently check
 * trust, lifecycle and the required capability in the current execution context.
 * Existing definition constructors remain serialization-compatible.
 *
 * @since 0.2.0
 */
final readonly class PortalContributionAdmission implements ContributionDefinition
{
    /**
     * Couple a declaration to its exact owner and enforceable access requirement.
     *
     * All workspace, view/template and optional surface references must be owned by
     * the same contributor. Route/navigation capabilities cannot be replaced by a
     * weaker requirement. Core identifiers use the explicit built-in owner policy.
     *
     * @param ContributionOwner $owner Canonical declared owner; does not establish trust.
     * @param WorkspaceDefinition|NavigationDefinition|RouteDefinition|TemplateDefinition $definition Declaration.
     * @param Capability $requiredCapability Capability the host must enforce before exposure.
     * @param bool $exposed Explicit portal opt-in; absence keeps the declaration hidden.
     * @throws ContributionRejected When a declaration or reference belongs to another owner.
     * @throws InvalidArgumentException When a route/navigation requirement disagrees.
     * @since 0.2.0
     */
    public function __construct(
        public ContributionOwner $owner,
        public WorkspaceDefinition|NavigationDefinition|RouteDefinition|TemplateDefinition $definition,
        public Capability $requiredCapability,
        public bool $exposed = false,
    ) {
        $policy = SurfaceIdentifierPolicy::dotted('portal', unnamespacedCore: true);
        $owner->assertOwns($definition->identifier(), $policy);
        if ($definition instanceof NavigationDefinition) {
            $owner->assertOwns($definition->workspace, $policy);
            if ($definition->surface !== null) {
                $owner->assertOwns($definition->surface, $policy);
            }
        }
        if ($definition instanceof RouteDefinition) {
            $owner->assertOwns($definition->template, $policy);
        }
        if (
            ($definition instanceof NavigationDefinition || $definition instanceof RouteDefinition)
            && $definition->capability !== $requiredCapability->value()
        ) {
            throw new InvalidArgumentException('An admission must preserve its declared capability requirement.');
        }
    }

    /**
     * Return the unchanged identifier for the canonical Contribution registry.
     *
     * @return string Owner-scoped declaration identifier.
     * @since 0.2.0
     */
    public function identifier(): string
    {
        return $this->definition->identifier();
    }

    /**
     * Export an ordered, versioned declaration; serialization performs no policy check.
     *
     * @return array<string, mixed> Schema, owner, required capability, opt-in and declaration.
     * @since 0.2.0
     */
    public function toArray(): array
    {
        return [
            'schema' => 'kumwe-portal-admission/v1',
            'owner' => $this->owner->identifier(),
            'required_capability' => $this->requiredCapability->value(),
            'exposed' => $this->exposed,
            'definition' => $this->definition->toArray(),
        ];
    }
}
