# Migration handoff

```yaml
schema: kumwe-migration-handoff/v2
artifact_kind: framework_php
migration_id: KUMWE-MIG-2026-037
change_set: KUMWE-CS-2026-034
state: draft_pr_open
source:
  app:
    repository: https://github.com/kumwe/app
    baseline_commit: null
    examined_paths: []
    old_namespace_roots:
    - Kumwe\Extension\Spi\Portal\Contribution
    capability_index_sha256: null
  semantic_inputs:
  - owner: https://github.com/kumwe/extension-sdk
    version_or_commit: e8ec23f155c5836c6bd083f154a8efb6e50aec66
    manifest_or_corpus: src/Spi/Portal/Contribution/PortalNavigationDefinition.php
    sha256: 098e6d41a25254566729de1a807b2131ac3bc90f0dd92d3f636eea2fe3a23012
  - owner: https://github.com/kumwe/extension-sdk
    version_or_commit: e8ec23f155c5836c6bd083f154a8efb6e50aec66
    manifest_or_corpus: src/Spi/Portal/Contribution/PortalRouteDefinition.php
    sha256: 1b037cedcb1e0be3b99383dcc797569b0e5e83e7979824ac3e297503d96ebed3
  - owner: https://github.com/kumwe/extension-sdk
    version_or_commit: e8ec23f155c5836c6bd083f154a8efb6e50aec66
    manifest_or_corpus: src/Spi/Portal/Contribution/PortalTemplateDefinition.php
    sha256: 3c8a1b8d559666844676b90b4a3c0f25ec97dbbf0f056a05e2cb7041e94cec17
  - owner: https://github.com/kumwe/extension-sdk
    version_or_commit: e8ec23f155c5836c6bd083f154a8efb6e50aec66
    manifest_or_corpus: src/Spi/Portal/Contribution/PortalWorkspaceDefinition.php
    sha256: 42c37396f476673d7fe58c21e44f77054d352e2b8f0233753b79e022e789a6e1
  examined_dependencies:
    php: ^8.5
    ext-mbstring: '*'
    kumwe/access-control: dev-main
    kumwe/contribution: 0.1.0
  active_related_pull_requests:
  - https://github.com/kumwe/access-control/pull/4
target:
  repository: https://github.com/kumwe/portal-contract
  artifact_identity: kumwe/portal-contract
  canonical_namespace_or_abi: Kumwe\Portal\Contract\
  branch: agent/extract-portal-contract-runtime-v2
  pull_request: https://github.com/kumwe/portal-contract/pull/2
ownership:
  responsibility: Explicitly admitted portal contribution declarations and bounded
    presentation contracts.
  non_responsibilities:
  - authorization
  - transactions
  - persistence adapters
  - active registries
  - trust and lifecycle
  - HTTP and rendering
  allowed_dependency_ceiling:
  - php
  - ext-mbstring
  - kumwe/access-control
  - kumwe/contribution
  implementation_owner: kumwe/portal-contract
  next_consumer: kumwe/app
  public_manifests:
  - path: resources/public-api/v1.json
    sha256: da23b2a76ccf8a898d10a6a094283743f2a0bab8722c3bd12f978b2ec7eaeb1e
  - path: resources/capabilities/v1.json
    sha256: 717a9208e02547365a7dbbfd24fb9b0d5803935dca6ece736deca7b800106af1
  - path: resources/service-map/v1.json
    sha256: cfc5df6bc518e2a7cfafdb7b78263db4874226d115296883672adf4d7ac100ac
  intentionally_excluded:
  - SDK HTTP bindings and renderers remain host-owned
framework_php:
  composer_package: kumwe/portal-contract
  canonical_namespace: Kumwe\Portal\Contract\
  public_api_manifest: resources/public-api/v1.json
  capability_manifest: resources/capabilities/v1.json
  service_map: resources/service-map/v1.json
  extracted_symbols:
  - repository: https://github.com/kumwe/extension-sdk
    old_fqcn: Kumwe\Extension\Spi\Portal\Contribution\PortalNavigationDefinition
    new_fqcn: Kumwe\Portal\Contract\PortalNavigationDefinition
    source_path: src/Spi/Portal/Contribution/PortalNavigationDefinition.php
    target_path: src/PortalNavigationDefinition.php
    source_commit: e8ec23f155c5836c6bd083f154a8efb6e50aec66
    source_sha256: 098e6d41a25254566729de1a807b2131ac3bc90f0dd92d3f636eea2fe3a23012
    kind: class
    public_methods:
    - __construct
    - identifier
    - toArray
    public_properties:
    - capability
    - id
    - workspace
    - label
    - description
    - path
    - icon
    - priority
    - keywords
    - surface
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/extension-sdk
    old_fqcn: Kumwe\Extension\Spi\Portal\Contribution\PortalRouteDefinition
    new_fqcn: Kumwe\Portal\Contract\PortalRouteDefinition
    source_path: src/Spi/Portal/Contribution/PortalRouteDefinition.php
    target_path: src/PortalRouteDefinition.php
    source_commit: e8ec23f155c5836c6bd083f154a8efb6e50aec66
    source_sha256: 1b037cedcb1e0be3b99383dcc797569b0e5e83e7979824ac3e297503d96ebed3
    kind: class
    public_methods:
    - __construct
    - identifier
    - toArray
    public_properties:
    - methods
    - capability
    - name
    - path
    - template
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/extension-sdk
    old_fqcn: Kumwe\Extension\Spi\Portal\Contribution\PortalTemplateDefinition
    new_fqcn: Kumwe\Portal\Contract\PortalTemplateDefinition
    source_path: src/Spi/Portal/Contribution/PortalTemplateDefinition.php
    target_path: src/PortalTemplateDefinition.php
    source_commit: e8ec23f155c5836c6bd083f154a8efb6e50aec66
    source_sha256: 3c8a1b8d559666844676b90b4a3c0f25ec97dbbf0f056a05e2cb7041e94cec17
    kind: class
    public_methods:
    - __construct
    - identifier
    - toArray
    public_properties:
    - name
    - template
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/extension-sdk
    old_fqcn: Kumwe\Extension\Spi\Portal\Contribution\PortalWorkspaceDefinition
    new_fqcn: Kumwe\Portal\Contract\PortalWorkspaceDefinition
    source_path: src/Spi/Portal/Contribution/PortalWorkspaceDefinition.php
    target_path: src/PortalWorkspaceDefinition.php
    source_commit: e8ec23f155c5836c6bd083f154a8efb6e50aec66
    source_sha256: 42c37396f476673d7fe58c21e44f77054d352e2b8f0233753b79e022e789a6e1
    kind: class
    public_methods:
    - __construct
    - assertIdentifier
    - identifier
    - toArray
    public_properties:
    - id
    - label
    - description
    - priority
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  consumers:
    app_code:
    - src/Extension/Contribution/CoreContributionRegistrar.php
    - src/Extension/Contribution/CoreExtensionContributions.php
    - src/Portal/Contribution/PortalNavigationRegistry.php
    - src/Portal/Contribution/PortalRouteRegistry.php
    - src/Portal/Contribution/PortalTemplateRegistry.php
    - src/Portal/Contribution/PortalWorkspaceRegistry.php
    configuration_and_di: []
    reflection_and_string_references: []
    fixtures_and_examples: []
    external:
    - kumwe/extension-sdk successor deletes moved SDK declarations
  dependency_injection:
    mode: direct
    provider: null
    factories: []
    aliases: []
    service_lifetimes: []
    configuration_keys: []
    provider_absence_reason: Values, ports and deterministic stateless algorithms
      capture no collaborator or ambient state.
native_cpp: null
php_extension: null
tests:
  moved_or_added:
  - tests/ContributionContractTest.php
  remain_in_app_or_consumer:
  - tests/Unit/InterfaceStandard/SurfaceIdentifierParityTest.php
  - tests/Unit/Portal/Contribution/PortalContributionRegistryTest.php
  - tests/Unit/Portal/Http/PortalDashboardPreferencesHandlerTest.php
  - tests/Unit/Portal/Http/PortalHomeHandlerTest.php
  - tests/Unit/Portal/Presentation/PortalContributionRendererTest.php
  split_tests: []
  prohibited_duplicates: &id001 []
  corpora:
  - path: tests/ContributionContractTest.php
    sha256: 199b4f57da4a6d83e439d3ee652cf4ed8cd876805852a73783db24af343f6c3e
documentation:
  charter: CHARTER.md
  readme: README.md
  public_api: docs/public-api.md
  architecture: docs/architecture.md
  integration_or_consumer: docs/integration.md
  examples:
  - examples/standalone.php
  changelog_record: CHANGELOG.md / 0.1.0
release_expectations:
  version_policy: SemVer; initial version 0.1.0 recorded for human merge; exact pre-1.0
    consumer pin after independent verification
  expected_artifact_types:
  - Composer ZIP
  required_checks:
  - '@composer:validate'
  - '@lint'
  - '@api'
  - '@architecture'
  - '@analyse'
  - '@cs'
  - '@test'
  - '@examples'
  - '@security'
  - '@clean-consumer'
  required_registry_or_installer: Composer
  required_external_attestation: false
next_task:
  phase_name: Independent release verification, followed by separately authorized
    App Phase 2
  permitted_only_when:
  - Human review and merge
  - All dependencies and this release independently attested
  - Current App drift reconciled upstream
  consumer_repository: https://github.com/kumwe/app
  dependency_or_native_change: Exact-pin independently verified immutable package;
    no adoption of development branches
  namespace_or_api_replacements:
  - old: Kumwe\Extension\Spi\Portal\Contribution\PortalNavigationDefinition
    new: Kumwe\Portal\Contract\PortalNavigationDefinition
  - old: Kumwe\Extension\Spi\Portal\Contribution\PortalRouteDefinition
    new: Kumwe\Portal\Contract\PortalRouteDefinition
  - old: Kumwe\Extension\Spi\Portal\Contribution\PortalTemplateDefinition
    new: Kumwe\Portal\Contract\PortalTemplateDefinition
  - old: Kumwe\Extension\Spi\Portal\Contribution\PortalWorkspaceDefinition
    new: Kumwe\Portal\Contract\PortalWorkspaceDefinition
  files_to_update:
  - src/Extension/Contribution/CoreContributionRegistrar.php
  - src/Extension/Contribution/CoreExtensionContributions.php
  - src/Portal/Contribution/PortalNavigationRegistry.php
  - src/Portal/Contribution/PortalRouteRegistry.php
  - src/Portal/Contribution/PortalTemplateRegistry.php
  - src/Portal/Contribution/PortalWorkspaceRegistry.php
  - tests/Unit/InterfaceStandard/SurfaceIdentifierParityTest.php
  - tests/Unit/Portal/Contribution/PortalContributionRegistryTest.php
  - tests/Unit/Portal/Http/PortalDashboardPreferencesHandlerTest.php
  - tests/Unit/Portal/Http/PortalHomeHandlerTest.php
  - tests/Unit/Portal/Presentation/PortalContributionRendererTest.php
  - composer.json
  - composer.lock
  files_to_remove: []
  tests_to_remove: *id001
  tests_to_retain_or_add:
  - tests/Unit/InterfaceStandard/SurfaceIdentifierParityTest.php
  - tests/Unit/Portal/Contribution/PortalContributionRegistryTest.php
  - tests/Unit/Portal/Http/PortalDashboardPreferencesHandlerTest.php
  - tests/Unit/Portal/Http/PortalHomeHandlerTest.php
  - tests/Unit/Portal/Presentation/PortalContributionRendererTest.php
  di_or_provisioning_changes:
  - No provider or factories; retain host services and bind host persistence ports
    explicitly.
  capability_index_changes:
  - Replace implementation owner with exact verified package manifest
  changelog_and_evidence_changes:
  - Record enabling-refactor; completion_claim false
  verification_commands:
  - composer validate --strict
  - composer check
  - Applicable App integration, database, authority and delivery tests
concurrency:
  likely_conflict_files:
  - composer.json
  - composer.lock
  related_migrations:
  - access-context
  - access-control
  - contribution
  - localization
  ownership_conflicts:
  - SDK successor must remove old definitions in coordination
  integration_train: null
  resolution_rule: semantic-preservation
governance:
  roadmap_source_sha256: a202155ef1a65f5ab293d4f8397ebf4ac430db7f1e877c776bbe7851e6fe18d8
  roadmap_refs: []
  non_roadmap_refs:
  - NRM-2026-037
  completion_claim: false
decisions:
- Canonical namespace move; no aliases or dual production ownership after adoption
- See docs/dependency-decision.md for the published stable dependency coordinates
blockers:
- Human review and merge of the 0.1.0 release record; automatic publication follows the package gate
- Independent artifact verification and App adoption remain separate follow-up work
```
