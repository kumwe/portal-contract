# Core and SDK contract

Portal Contract owns five immutable declaration types: PortalWorkspaceDefinition, PortalNavigationDefinition,
PortalRouteDefinition, PortalTemplateDefinition and PortalContributionAdmission. Core owns trusted admission,
authorization, active registry composition, HTTP dispatch, template rendering, persistence and operational lifecycle.

## Admission and authority

Every declaration kind is carried by PortalContributionAdmission with a canonical ContributionOwner, Capability
and explicit exposure setting. Exposure defaults to false. Core checks both exposure and the required capability
against current trust, lifecycle and execution context before activation, rendering or dispatch. Neither the owner
value nor the exposed flag authenticates or authorizes a user or extension.

The envelope validates the declaration identifier and its workspace, template and optional surface references
against the same owner. Route/navigation capability requirements must agree exactly with the envelope's requirement;
they cannot be weakened through wrapping. Core identifiers use Contribution's explicit built-in owner policy.
Serialization returns the versioned `kumwe-portal-admission/v1` shape without evaluating authority.

Paths are bounded to 2,048 bytes and template references to 255 bytes. Labels, descriptions and keywords preserve
their documented character limits and require valid UTF-8. Existing definition constructor and serialization shapes
remain documented in the [public API](public-api.md) and detailed signature manifest.

## Composition and dependency ownership

Construct values directly. The package supplies no ConfigProvider, factories, aliases, active registry or ambient
actor/site/request context. Access Control 0.1.2 owns canonical Capability; Contribution 0.1.1 owns contributor identity,
identifier policy and shared definition contracts. Those exact dependencies resolve through Packagist.

SDK and Core retain executable renderer/factory bindings involving HTTP requests and handlers. Those delivery
interfaces do not move into this neutral package. Core owns transaction, optimistic-concurrency, database, trust,
request handling, rendering, deployment and recovery responsibilities.

## Compatibility and test ownership

The [release record](release-record.md) and [source map](source-map.json) retain exact SDK provenance, symbol and
consumer mappings. Reconcile current Core/SDK imports, configuration, reflection and fixtures against these baselines
before replacing declarations or removing duplicate implementation tests. Use exact independently verified compatible
pre-1.0 versions and preserve consumer lockfiles; no historical aliases or dual canonical owners are provided.

The package owns bounds, owner/reference/capability admission, serialization, opt-in and public API tests. Core retains
portal registry composition, surface identifier parity, dashboard/home delivery, rendering, browser, authority,
trust/lifecycle, persistence, recovery and acceptance tests. Package CI does not establish host acceptance.

Archive validation retains the Core contract, release record, governed manifests, signature details and standalone
example and checks their exact bytes. Independent verification binds the published artifact; rollback restores the
consumer's previously tested dependency and composition tuple.
