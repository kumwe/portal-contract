# Public API

All values enforce the documented constructor invariants. Domain methods perform no I/O, own no transaction and make no authorization decisions. Immutable values are safe to share; host inputs and lookup ports must remain generation-stable for the duration of an operation. Exceptions and parameter detail appear below verbatim from the source contract.

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

### identifier

/** @return string Stable owner-scoped item identifier. @since 0.2.0 */

### toArray

/** @return array<string, int|string> Canonical declaration. @since 0.2.0 */

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

### identifier

/**
     * Return the claimed template identifier.
     *
     * @return  string  Dotted name.
     *
     * @since   0.1.0
     */

### toArray

/**
     * Export the manifest-comparison shape.
     *
     * @return  array{name: string, template: string}  Template declaration.
     *
     * @since   0.1.0
     */

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

### identifier

/**
     * Return the route's claimed identifier.
     *
     * @return  string  Dotted route name.
     *
     * @since   0.1.0
     */

### toArray

/**
     * Export the normalized route declaration.
     *
     * @return  array{name: string, path: string, methods: non-empty-list<string>, capability: string, template: string}
     *          Stable declaration shape.
     *
     * @since   0.1.0
     */

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

### identifier

/**
     * Return the claimed identifier.
     *
     * @return  string  Dotted workspace identifier.
     *
     * @since   0.1.0
     */

### toArray

/**
     * Export a deterministic manifest-comparison shape.
     *
     * @return  array{id: string, label: string, description: string, priority: int}  Declaration fields.
     *
     * @since   0.1.0
     */

