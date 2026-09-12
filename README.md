# Kumwe Portal Contract

[![Packagist version][version-badge]][package]
[![Package CI][ci-badge]][ci]
[![PHP requirement][php-badge]][package]
[![License][license-badge]](LICENSE)

[version-badge]: https://img.shields.io/packagist/v/kumwe/portal-contract
[package]: https://packagist.org/packages/kumwe/portal-contract
[ci-badge]: https://github.com/kumwe/portal-contract/actions/workflows/ci.yml/badge.svg?branch=main
[ci]: https://github.com/kumwe/portal-contract/actions/workflows/ci.yml
[php-badge]: https://img.shields.io/packagist/dependency-v/kumwe/portal-contract/php
[license-badge]: https://img.shields.io/packagist/l/kumwe/portal-contract

Explicitly admitted portal contribution declarations and bounded presentation contracts under
`Kumwe\Portal\Contract\`. Requires PHP 8.5 with mbstring, exact Access Control 0.1.2 and Contribution 0.1.1.

## Installation and use

Install the published Composer package with an exact pre-1.0 pin:

```sh
composer require kumwe/portal-contract:0.2.1
```

```php
<?php

require 'vendor/autoload.php';

use Kumwe\Access\Capability;
use Kumwe\Contribution\ContributionOwner;
use Kumwe\Portal\Contract\PortalContributionAdmission;
use Kumwe\Portal\Contract\PortalTemplateDefinition;

$template = new PortalTemplateDefinition('acme.editor.index', 'editor/index.twig');
$admission = new PortalContributionAdmission(
    ContributionOwner::extension('acme/editor'),
    $template,
    Capability::fromString('acme.editor.read'),
);
assert($admission->exposed === false);
```

Admission binds a declaration to its owner and required capability. Exposure defaults to false and requires explicit
opt-in. This declaration does not grant authority: Core checks current trust, lifecycle and capability before use.
The [standalone example](examples/standalone.php) also demonstrates route normalization and explicit exposure.

## Core and SDK integration

Five immutable values define workspace, navigation, route, template and admission contracts. No ConfigProvider,
factory or shared context is registered. Values are constructed directly. Core and SDK retain HTTP handlers,
renderers, active registries, authentication, authorization, transactions, persistence and delivery.

The [Core contract](docs/core-contract.md), [integration guide](docs/integration.md),
[public API](docs/public-api.md) and [architecture](docs/architecture.md) define ownership and required host checks.
[Dependency guidance](docs/dependency-decision.md) and the [release record](docs/release-record.md) retain exact
compatibility and source evidence. Published versions and source CI status are linked above; Core integration is
validated in the consuming repository.

## Development and releases

```sh
composer install
composer check
composer examples
```

CI validates behavior, hostile inputs, full API/signature/documentation agreement, manifest digests and a real
no-dev authoritative archive consumer. [Release guidance](docs/releasing.md) describes publication and independent
verification. Licensed under [Apache-2.0](LICENSE); see the [charter](CHARTER.md) for package responsibility.
