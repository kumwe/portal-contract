# Public API

All values enforce the documented constructor invariants. Domain methods perform no I/O, own no transaction and make no authorization decisions. Immutable values are safe to share; host inputs and lookup ports must remain generation-stable for the duration of an operation. Exceptions and parameter detail appear below verbatim from the source contract.

## Kumwe\Portal\Contract\PortalContributionAdmission

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

### __construct

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

```php
public function __construct(Kumwe\Contribution\ContributionOwner $owner, Kumwe\Portal\Contract\PortalWorkspaceDefinition|Kumwe\Portal\Contract\PortalNavigationDefinition|Kumwe\Portal\Contract\PortalRouteDefinition|Kumwe\Portal\Contract\PortalTemplateDefinition $definition, Kumwe\Access\Capability $requiredCapability, bool $exposed = false);
```

### identifier

/**
     * Return the unchanged identifier for the canonical Contribution registry.
     *
     * @return string Owner-scoped declaration identifier.
     * @since 0.2.0
     */

```php
public function identifier(): string;
```

### toArray

/**
     * Export an ordered, versioned declaration; serialization performs no policy check.
     *
     * @return array<string, mixed> Schema, owner, required capability, opt-in and declaration.
     * @since 0.2.0
     */

```php
public function toArray(): array;
```

### Public properties

- `readonly Kumwe\Contribution\ContributionOwner $owner`
- `readonly Kumwe\Portal\Contract\PortalWorkspaceDefinition|Kumwe\Portal\Contract\PortalNavigationDefinition|Kumwe\Portal\Contract\PortalRouteDefinition|Kumwe\Portal\Contract\PortalTemplateDefinition $definition`
- `readonly Kumwe\Access\Capability $requiredCapability`
- `readonly bool $exposed`

## Kumwe\Portal\Contract\PortalNavigationDefinition

/**
 * Capability-gated entry in a portal workspace.
 *
 * @since 0.2.0
 */

### __construct

/**
     * @param string  $id           Owner-scoped item identifier.
     * @param string  $workspace    Declared workspace identifier.
     * @param string  $label        Visible label, at most 80 characters.
     * @param string  $description  Accessible description, at most 255 characters.
     * @param string  $path         Safe absolute path relative to the extension mount.
     * @param string  $icon         Portable lowercase icon token.
     * @param string  $capability   Required declared capability.
     * @param int     $priority     Sort weight from 0 through 100000.
     * @param string  $keywords     Optional search text, at most 500 characters.
     * @param ?string $surface      Optional owner-scoped KIS surface identifier.
     *
     * @throws InvalidArgumentException When any value is malformed or unbounded.
     *
     * @since 0.2.0
     */

```php
public function __construct(string $id, string $workspace, string $label, string $description, string $path, string $icon, string $capability, int $priority, string $keywords = '', ?string $surface = NULL);
```

### identifier

/** @return string Stable owner-scoped item identifier. @since 0.2.0 */

```php
public function identifier(): string;
```

### toArray

/** @return array<string, int|string> Canonical declaration. @since 0.2.0 */

```php
public function toArray(): array;
```

### Public properties

- `readonly string $capability`
- `readonly string $id`
- `readonly string $workspace`
- `readonly string $label`
- `readonly string $description`
- `readonly string $path`
- `readonly string $icon`
- `readonly int $priority`
- `readonly string $keywords`
- `readonly ?string $surface`

## Kumwe\Portal\Contract\PortalRouteDefinition

/**
 * Validated portal route declaration with explicit capability and template ownership.
 *
 * @since  0.1.0
 */

### __construct

/**
     * Validate one explicit portal route.
     *
     * @param   string        $name        Owner-scoped dotted route name.
     * @param   string        $path        Safe absolute path, relative to an extension mount.
     * @param   array<mixed>  $methods     One through eight supported verbs.
     * @param   string        $capability  Required owned capability.
     * @param   string        $template    Required owned template identifier.
     *
     * @throws  InvalidArgumentException  When values are unsafe or safe and mutating verbs are mixed.
     *
     * @since   0.1.0
     */

```php
public function __construct(string $name, string $path, array $methods, string $capability, string $template);
```

### identifier

/**
     * Return the route's claimed identifier.
     *
     * @return  string  Dotted route name.
     *
     * @since   0.1.0
     */

```php
public function identifier(): string;
```

### toArray

/**
     * Export the normalized route declaration.
     *
     * @return  array{name: string, path: string, methods: non-empty-list<string>, capability: string, template: string}
     *          Stable declaration shape.
     *
     * @since   0.1.0
     */

```php
public function toArray(): array;
```

### Public properties

- `readonly array $methods`
- `readonly string $capability`
- `readonly string $name`
- `readonly string $path`
- `readonly string $template`

## Kumwe\Portal\Contract\PortalTemplateDefinition

/**
 * Explicit portal template declaration confined to its owner's isolated Twig namespace.
 *
 * @since  0.1.0
 */

### __construct

/**
     * Validate a dotted template name and safe relative Twig path.
     *
     * @param   string  $name      Owner-scoped template identifier.
     * @param   string  $template  Relative `.twig` path without traversal.
     *
     * @throws  InvalidArgumentException  When either value is unsafe.
     *
     * @since   0.1.0
     */

```php
public function __construct(string $name, string $template);
```

### identifier

/**
     * Return the claimed template identifier.
     *
     * @return  string  Dotted name.
     *
     * @since   0.1.0
     */

```php
public function identifier(): string;
```

### toArray

/**
     * Export the manifest-comparison shape.
     *
     * @return  array{name: string, template: string}  Template declaration.
     *
     * @since   0.1.0
     */

```php
public function toArray(): array;
```

### Public properties

- `readonly string $name`
- `readonly string $template`

## Kumwe\Portal\Contract\PortalWorkspaceDefinition

/**
 * Bounded declaration of one navigation group in the ordinary-user portal shell.
 *
 * @since  0.1.0
 */

### __construct

/**
     * Validate a portal workspace declaration.
     *
     * @param   string  $id           Dotted owner-scoped identifier.
     * @param   string  $label        Visible heading, 1 through 80 characters.
     * @param   string  $description  Accessible explanation, 1 through 255 characters.
     * @param   int     $priority     Stable sort weight from 0 through 100000.
     *
     * @throws  InvalidArgumentException  When any value falls outside its bound.
     *
     * @since   0.1.0
     */

```php
public function __construct(string $id, string $label, string $description, int $priority);
```

### assertIdentifier

/**
     * Enforce the bounded extension-compatible contribution grammar, including established internal dots.
     *
     * @param   string  $identifier  Candidate dotted identifier.
     * @param   string  $kind        Contribution kind named in a rejection.
     *
     * @return  void
     *
     * @throws  InvalidArgumentException  When malformed.
     *
     * @since   0.1.0
     */

```php
public static function assertIdentifier(string $identifier, string $kind): void;
```

### identifier

/**
     * Return the claimed identifier.
     *
     * @return  string  Dotted workspace identifier.
     *
     * @since   0.1.0
     */

```php
public function identifier(): string;
```

### toArray

/**
     * Export a deterministic manifest-comparison shape.
     *
     * @return  array{id: string, label: string, description: string, priority: int}  Declaration fields.
     *
     * @since   0.1.0
     */

```php
public function toArray(): array;
```

### Public properties

- `readonly string $id`
- `readonly string $label`
- `readonly string $description`
- `readonly int $priority`

