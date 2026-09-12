# Package manifest schemas

The capability and service-map schema snapshots come from kumwe/app commit
`24ecf956423c18933e824b43cea1bfb9127a79a9`, under `docs/architecture/governance/schemas`.
They are development validation inputs; runtime code has no Core dependency. The manifest gate executes the
supported schema keyword set and rejects unsupported additions. Public API reflection and governed JSON generation
are checked separately by `tools/public-api.php`.

The maintained release record follows the Extension SDK's `kumwe-package-release-record/v1` schema. The manifest
gate checks its ordered contract sections and exact checksums for all three governed manifests plus signature details.
Core consumption validates the complete record with its actual parser and authoritative schema.
