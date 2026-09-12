# Dependency contract

The runtime uses the following exact published Kumwe dependencies through Packagist:

| Package | Exact version | Responsibility |
| --- | --- | --- |
| `kumwe/access-control` | `0.1.2` | Canonical capability values and grammar |
| `kumwe/contribution` | `0.1.1` | Contributor ownership, identifier policy and definition contract |

Composer metadata is authoritative. The dependency-readiness gate keeps evidence coordinates aligned with those
exact requirements. Publication verifies selected stable version tags against Composer source and dist identities.
The clean archive consumer resolves these same registry dependencies without VCS repository overrides.

Select compatible exact versions together with transitive constraints and commit the consumer lockfile. A package
version or successful source test run does not supply an independent release attestation or prove Core integration.
Existing published tags and archives remain unchanged; [release guidance](releasing.md) defines verification.
