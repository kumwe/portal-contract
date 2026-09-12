# Architecture

The package provides immutable portal workspace, navigation, route, template and admission declarations.
Source provenance is recorded in [source-map.json](source-map.json). There is no Core or Extension SDK production
dependency. Values perform deterministic validation and serialization without I/O, ambient state or DI registration.

Contribution owns contributor identity and identifier/registry policy; Access Control owns Capability grammar.
PortalContributionAdmission composes those contracts to require same-owner declarations/references, exact retained
capability requirements and explicit exposure opt-in. It does not establish trust, authority or runtime activation.

Core and SDK retain executable HTTP bindings, renderers, active registries, authentication, persistence and delivery.
The [Core contract](core-contract.md) and [integration guide](integration.md) define these boundaries and test ownership.
