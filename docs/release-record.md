---
schema: kumwe-package-release-record/v1
artifact_kind: "framework_php"
migration_id: "KUMWE-MIG-2026-037"
change_set: "KUMWE-CS-2026-034"
source:
  app:
    repository: "https://github.com/kumwe/app"
    baseline_commit: null
    examined_paths: []
    old_namespace_roots:
      - "Kumwe\\Extension\\Spi\\Portal\\Contribution\\"
    capability_index_sha256: null
  semantic_inputs:
    - owner: "https://github.com/kumwe/extension-sdk"
      version_or_commit: "e8ec23f155c5836c6bd083f154a8efb6e50aec66"
      manifest_or_corpus: "src/Spi/Portal/Contribution/PortalNavigationDefinition.php"
      sha256: "098e6d41a25254566729de1a807b2131ac3bc90f0dd92d3f636eea2fe3a23012"
    - owner: "https://github.com/kumwe/extension-sdk"
      version_or_commit: "e8ec23f155c5836c6bd083f154a8efb6e50aec66"
      manifest_or_corpus: "src/Spi/Portal/Contribution/PortalRouteDefinition.php"
      sha256: "1b037cedcb1e0be3b99383dcc797569b0e5e83e7979824ac3e297503d96ebed3"
    - owner: "https://github.com/kumwe/extension-sdk"
      version_or_commit: "e8ec23f155c5836c6bd083f154a8efb6e50aec66"
      manifest_or_corpus: "src/Spi/Portal/Contribution/PortalTemplateDefinition.php"
      sha256: "3c8a1b8d559666844676b90b4a3c0f25ec97dbbf0f056a05e2cb7041e94cec17"
    - owner: "https://github.com/kumwe/extension-sdk"
      version_or_commit: "e8ec23f155c5836c6bd083f154a8efb6e50aec66"
      manifest_or_corpus: "src/Spi/Portal/Contribution/PortalWorkspaceDefinition.php"
      sha256: "42c37396f476673d7fe58c21e44f77054d352e2b8f0233753b79e022e789a6e1"
  examined_dependencies:
    - "php ^8.5"
    - "ext-mbstring *"
    - "kumwe/access-control 0.1.2"
    - "kumwe/contribution 0.1.1"
target:
  repository: "https://github.com/kumwe/portal-contract"
  artifact_identity: "kumwe/portal-contract"
  canonical_namespace_or_abi: "Kumwe\\Portal\\Contract\\"
ownership:
  responsibility: "Explicitly admitted portal contribution declarations and bounded presentation contracts."
  non_responsibilities:
    - "authorization"
    - "transactions"
    - "persistence adapters"
    - "active registries"
    - "trust and lifecycle"
    - "HTTP and rendering"
  allowed_dependency_ceiling:
    - "php"
    - "ext-mbstring"
    - "kumwe/access-control"
    - "kumwe/contribution"
  implementation_owner: "kumwe/portal-contract"
  next_consumer: "kumwe/app"
  public_manifests:
    - path: "resources/public-api/v1.json"
      sha256: "b99190ab6d5b2fc8bad4eb0b869fb3a3f3d80ea12a08b6d0bb8e68e1e5030ee4"
    - path: "resources/capabilities/v1.json"
      sha256: "d6c1a21b0c186cc6409bb3f13bd6a63b84614eea0339f371a1fdf429681c97bb"
    - path: "resources/service-map/v1.json"
      sha256: "5a16c05e97fba8b836d6743cdf2e4d953b627b63829d210b304852380170598e"
    - path: "resources/public-api/signature-details-v1.json"
      sha256: "68ea42629f95a8dc29c0488e74a1cd210346a34a90c8e47272829fd1f70bda3c"
  intentionally_excluded:
    - "SDK HTTP bindings and renderers remain host-owned"
framework_php:
  composer_package: "kumwe/portal-contract"
  canonical_namespace: "Kumwe\\Portal\\Contract\\"
  public_api_manifest: "resources/public-api/v1.json"
  capability_manifest: "resources/capabilities/v1.json"
  service_map: "resources/service-map/v1.json"
  extracted_symbols:
    - old_fqcn: "Kumwe\\Extension\\Spi\\Portal\\Contribution\\PortalNavigationDefinition"
      new_fqcn: "Kumwe\\Portal\\Contract\\PortalNavigationDefinition"
      source_path: "src/Spi/Portal/Contribution/PortalNavigationDefinition.php"
      target_path: "src/PortalNavigationDefinition.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "identifier"
        - "toArray"
      public_properties:
        - "capability"
        - "id"
        - "workspace"
        - "label"
        - "description"
        - "path"
        - "icon"
        - "priority"
        - "keywords"
        - "surface"
      public_constants: []
      compatibility: "Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md for exact signatures."
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "Public toArray shape is documented in docs/public-api.md and covered by package-owned tests."
    - old_fqcn: "Kumwe\\Extension\\Spi\\Portal\\Contribution\\PortalRouteDefinition"
      new_fqcn: "Kumwe\\Portal\\Contract\\PortalRouteDefinition"
      source_path: "src/Spi/Portal/Contribution/PortalRouteDefinition.php"
      target_path: "src/PortalRouteDefinition.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "identifier"
        - "toArray"
      public_properties:
        - "methods"
        - "capability"
        - "name"
        - "path"
        - "template"
      public_constants: []
      compatibility: "Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md for exact signatures."
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "Public toArray shape is documented in docs/public-api.md and covered by package-owned tests."
    - old_fqcn: "Kumwe\\Extension\\Spi\\Portal\\Contribution\\PortalTemplateDefinition"
      new_fqcn: "Kumwe\\Portal\\Contract\\PortalTemplateDefinition"
      source_path: "src/Spi/Portal/Contribution/PortalTemplateDefinition.php"
      target_path: "src/PortalTemplateDefinition.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "identifier"
        - "toArray"
      public_properties:
        - "name"
        - "template"
      public_constants: []
      compatibility: "Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md for exact signatures."
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "Public toArray shape is documented in docs/public-api.md and covered by package-owned tests."
    - old_fqcn: "Kumwe\\Extension\\Spi\\Portal\\Contribution\\PortalWorkspaceDefinition"
      new_fqcn: "Kumwe\\Portal\\Contract\\PortalWorkspaceDefinition"
      source_path: "src/Spi/Portal/Contribution/PortalWorkspaceDefinition.php"
      target_path: "src/PortalWorkspaceDefinition.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "assertIdentifier"
        - "identifier"
        - "toArray"
      public_properties:
        - "id"
        - "label"
        - "description"
        - "priority"
      public_constants: []
      compatibility: "Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md for exact signatures."
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "Public toArray shape is documented in docs/public-api.md and covered by package-owned tests."
  consumers:
    app_code:
      - "src/Extension/Contribution/CoreContributionRegistrar.php"
      - "src/Extension/Contribution/CoreExtensionContributions.php"
      - "src/Portal/Contribution/PortalNavigationRegistry.php"
      - "src/Portal/Contribution/PortalRouteRegistry.php"
      - "src/Portal/Contribution/PortalTemplateRegistry.php"
      - "src/Portal/Contribution/PortalWorkspaceRegistry.php"
    configuration_and_di: []
    reflection_and_string_references: []
    fixtures_and_examples: []
    external:
      - "SDK retains executable delivery bindings and uses canonical portal declarations after verified integration"
  dependency_injection:
    mode: "direct"
    provider: null
    factories: []
    aliases: []
    service_lifetimes: []
    configuration_keys: []
    provider_absence_reason: "Values, ports and deterministic stateless algorithms capture no collaborator or ambient state."
native_cpp: null
php_extension: null
tests:
  moved_or_added:
    - "tests/AdmissionBoundaryTest.php"
    - "tests/ContributionContractTest.php"
  remain_in_app_or_consumer:
    - "tests/Unit/InterfaceStandard/SurfaceIdentifierParityTest.php"
    - "tests/Unit/Portal/Contribution/PortalContributionRegistryTest.php"
    - "tests/Unit/Portal/Http/PortalDashboardPreferencesHandlerTest.php"
    - "tests/Unit/Portal/Http/PortalHomeHandlerTest.php"
    - "tests/Unit/Portal/Presentation/PortalContributionRendererTest.php"
  split_tests: []
  prohibited_duplicates: []
  corpora:
    - "tests/AdmissionBoundaryTest.php"
    - "tests/ContributionContractTest.php"
documentation:
  charter: "CHARTER.md"
  readme: "README.md"
  public_api: "docs/public-api.md"
  architecture: "docs/architecture.md"
  integration_or_consumer: "docs/integration.md"
  examples:
    - "examples/standalone.php"
  changelog_record: "CHANGELOG.md ## 0.2.1"
release_expectations:
  version_policy: "SemVer; exact pre-1.0 consumer pins and independent source/archive verification."
  expected_artifact_types:
    - "Composer ZIP"
  required_checks:
    - "@composer:validate"
    - "@lint"
    - "@api"
    - "@architecture"
    - "@analyse"
    - "@cs"
    - "@test"
    - "@examples"
    - "@security"
    - "@clean-consumer"
    - "@manifests"
  required_registry_or_installer: "Composer"
  required_external_attestation: true
governance:
  completion_claim: false
decisions:
  - "Canonical namespace move; no aliases or dual production ownership after adoption"
  - "See docs/dependency-decision.md for the published stable dependency coordinates"
  - "Full original source digests remain in docs/source-map.json; governed source-symbol inventory uses the exact v2 schema."
  - "Owner package contracts are implemented; Core retains authority, executable delivery and integration validation."
blockers: []
consumer_contract:
  permitted_only_when:
    - "The selected release and dependencies pass independent source/archive verification."
    - "Current Core and SDK source is reconciled against the recorded baselines."
  consumer_repository: "https://github.com/kumwe/app"
  dependency_or_native_change: "Exact-pin compatible verified Portal Contract, Access Control and Contribution releases and regenerate the consumer lockfile."
  namespace_or_api_replacements:
    - "Kumwe\\Extension\\Spi\\Portal\\Contribution\\PortalNavigationDefinition -> Kumwe\\Portal\\Contract\\PortalNavigationDefinition"
    - "Kumwe\\Extension\\Spi\\Portal\\Contribution\\PortalRouteDefinition -> Kumwe\\Portal\\Contract\\PortalRouteDefinition"
    - "Kumwe\\Extension\\Spi\\Portal\\Contribution\\PortalTemplateDefinition -> Kumwe\\Portal\\Contract\\PortalTemplateDefinition"
    - "Kumwe\\Extension\\Spi\\Portal\\Contribution\\PortalWorkspaceDefinition -> Kumwe\\Portal\\Contract\\PortalWorkspaceDefinition"
  files_to_update:
    - "src/Extension/Contribution/CoreContributionRegistrar.php"
    - "src/Extension/Contribution/CoreExtensionContributions.php"
    - "src/Portal/Contribution/PortalNavigationRegistry.php"
    - "src/Portal/Contribution/PortalRouteRegistry.php"
    - "src/Portal/Contribution/PortalTemplateRegistry.php"
    - "src/Portal/Contribution/PortalWorkspaceRegistry.php"
    - "tests/Unit/InterfaceStandard/SurfaceIdentifierParityTest.php"
    - "tests/Unit/Portal/Contribution/PortalContributionRegistryTest.php"
    - "tests/Unit/Portal/Http/PortalDashboardPreferencesHandlerTest.php"
    - "tests/Unit/Portal/Http/PortalHomeHandlerTest.php"
    - "tests/Unit/Portal/Presentation/PortalContributionRendererTest.php"
    - "composer.json"
    - "composer.lock"
  files_to_remove: []
  tests_to_remove: []
  tests_to_retain_or_add:
    - "tests/Unit/InterfaceStandard/SurfaceIdentifierParityTest.php"
    - "tests/Unit/Portal/Contribution/PortalContributionRegistryTest.php"
    - "tests/Unit/Portal/Http/PortalDashboardPreferencesHandlerTest.php"
    - "tests/Unit/Portal/Http/PortalHomeHandlerTest.php"
    - "tests/Unit/Portal/Presentation/PortalContributionRendererTest.php"
  di_or_provisioning_changes:
    - "No provider or factories; retain host services and bind host persistence ports explicitly."
  capability_index_changes:
    - "Replace implementation owner with exact verified package manifest"
  changelog_and_evidence_changes:
    - "Record exact package ownership, source/archive identity and retained Core/SDK integration results."
  verification_commands:
    - "composer validate --strict"
    - "composer check"
    - "Applicable App integration, database, authority and delivery tests"
---

# Portal Contract release record

## Package contract

Five immutable portal declaration types provide route, navigation, workspace, template and owned admission contracts.

## Public API and responsibility

[Public API](public-api.md) and the governed manifests preserve exact signatures, defaults and constant values.
[Core contract](core-contract.md) defines host authority, trust, registry activation and executable delivery ownership.

## Dependencies and semantic inputs

Access Control 0.1.2 owns Capability; Contribution 0.1.1 owns contributor identity and identifier policy.
Source and semantic digests above retain exact SDK provenance without introducing an SDK runtime dependency.

## Consumer contract

Core and SDK consume neutral declarations while retaining HTTP bindings, template rendering, active registries,
authorization and infrastructure. Reconcile [source mappings](source-map.json) and the recorded consumer paths
against current source before namespace changes or removal of duplicate declarations.

## Test ownership

The package owns declaration bounds, owner/reference/capability admission, serialization and explicit opt-in tests.
Core retains authority, lifecycle, persistence, portal rendering, browser and delivery integration tests.

## Consumer verification

Use independently verified exact package versions. Core must enforce both exposure and the required capability
against current trust, lifecycle and execution context before activating or dispatching a declaration.

## Compatibility and drift

API JSON, signature details and Markdown are generated from source reflection and checked for byte drift.
The three governed manifests and detailed signature inventory retain exact checksums; published archives stay intact.

## Validation

Run `composer check`, examples and release automation regressions. The archive consumer verifies installed public
contracts and real registry dependency resolution; source CI alone does not establish Core integration.
