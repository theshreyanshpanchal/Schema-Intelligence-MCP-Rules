# Schema Intelligence MCP — Important Guide

## Overview {#overview}

This project uses:

* Laravel as the database source of truth
* DBML as the schema documentation format
* Cursor for AI-assisted development
* dbdiagram.io for schema visualization
* DBDocs for schema documentation publishing

The objective is to maintain a single DBML file that accurately reflects the Laravel database structure and can be used by both dbdiagram.io and DBDocs.

---

## Schema Intelligence MCP Rule — Roadmap {#roadmap}

Use this roadmap to navigate the [Schema Intelligence MCP Rule](rule:top). Click a topic to jump to that section in the rule document.

| Topic | Subtopic | Description |
|-------|----------|-------------|
| [Purpose](rule:purpose) | — | Defines why Laravel is the schema source of truth and what DBML sync must achieve. |
| [Operating Mode](rule:operating-mode) | Incremental Synchronization | Default mode updates only affected DBML sections instead of full regeneration. |
| [Operating Mode](rule:default-behavior) | Default Behavior | Lists constraints: reuse definitions, preserve relationships, and minimize token usage. |
| [Source of Truth](rule:source-of-truth) | Priority Order | Ranks migration changes, live schema, existing DBML, and Eloquent relationships. |
| [Scope](rule:scope) | — | Limits analysis to migrations, models, keys, pivots, polymorphic relations, indexes, and constraints. |
| [Synchronization](rule:synchronization-trigger-conditions) | Trigger Conditions | Lists every schema change that requires DBML synchronization. |
| [Synchronization](rule:incremental-synchronization) | Incremental Updates | Requires patching only affected tables, columns, indexes, and relationships. |
| [Analysis](rule:analysis-priority) | Priority Order | Defines what to read first: current migration, history, DBML, then related models. |
| [Relationships](rule:relationship-detection) | Detection Rules | Documents how to detect relationships from migrations and Eloquent methods. |
| [Validation](rule:validation-requirements) | Requirements | Checklist to verify tables, columns, keys, indexes, and relationships before finishing. |
| [Schema Changes](rule:rename-handling) | Rename Handling | Treat renames as updates: preserve links and remove obsolete references. |
| [Schema Changes](rule:deletion-handling) | Deletion Handling | Mark removals for approval instead of deleting DBML entities automatically. |
| [Governance](rule:approval-first-policy) | Approval First Policy | Summarize proposed DBML changes and wait for approval before editing. |
| [Governance](rule:large-change-protection) | Large Change Protection | Pause and request approval when more than 10 tables are affected. |
| [Documentation](rule:documentation-reuse) | Reuse | Reuse existing DBML sections, notes, grouping, and formatting when possible. |
| [Performance](rule:performance-rules) | Rules | Minimize scanning, file edits, relationship analysis, and token usage. |
| [Safety](rule:stop-conditions) | Stop Conditions | Stop and report when intent is unclear or sources conflict—never guess. |
| [Completion](rule:completion-criteria) | Criteria | Task is done only when DBML, relationships, and validation all pass. |
| [Workflow](rule:predictable-execution-principle) | Predictable Execution | Single path: analyze → propose → approve → update → validate → summarize. |

---

## Project Structure {#project-structure}

Create the following structure:

```text
project-root/
│
├── app/
│   └── Docs/
│       ├── schema-intelligence-mcp-important.md
│       └── schema-intelligence-mcp-rule.mdc
├── database/
├── docs/
│   └── database-schema.dbml
│
└── .cursor/
    └── rules/
        └── schema-intelligence-mcp-rule.mdc
```

---

## Files {#files}

### Schema File {#schema-file}

Location:

```text
docs/database-schema.dbml
```

Purpose:

* Database source of truth for AI
* Imported into dbdiagram.io
* Imported into DBDocs
* Reviewed through Git pull requests

---

### Cursor Rule {#cursor-rule}

Location:

```text
app/Docs/schema-intelligence-mcp-rule.mdc
```

Purpose:

* Forces schema synchronization
* Prevents stale DBML
* Prevents AI from inventing relationships
* Enforces incremental updates

---

## Synchronization Workflow {#synchronization-workflow}

Whenever database changes occur:

Examples:

* New migration
* New table
* New column
* Column rename
* Table rename
* New relationship
* Pivot table update

Workflow:

```text
Laravel Migration
        ↓
Database Change
        ↓
Update database-schema.dbml
        ↓
Commit Changes
        ↓
Import into dbdiagram.io
        ↓
Import into DBDocs
```

---

## How Cursor Uses It {#how-cursor-uses-it}

Whenever Cursor performs database-related work:

1. Read `database-schema.dbml`
2. Read affected migration
3. Determine schema changes
4. Update affected DBML sections
5. Preserve unrelated schema definitions

Cursor should never regenerate the entire schema unless explicitly requested.

---

## How The DBML File Is Generated {#how-dbml-is-generated}

Recommended approach:

Maintain the file incrementally.

Example:

Create migration:

```bash
php artisan make:migration create_posts_table
```

Implement migration.

Then update:

```text
docs/database-schema.dbml
```

Example:

```dbml
Table posts {
  id bigint [pk]
  user_id bigint
  title varchar
}

Ref: posts.user_id > users.id
```

Commit both migration and DBML changes together.

---

## Viewing Diagrams Using dbdiagram.io {#dbdiagram}

Website:

https://dbdiagram.io/

### Initial Setup {#dbdiagram-initial-setup}

1. Create an account.
2. Create a new diagram.
3. Select DBML.
4. Paste contents of `docs/database-schema.dbml`.
5. Save the diagram.

dbdiagram.io automatically renders:

* Tables
* Relationships
* Foreign keys
* References

---

## Updating Existing Diagrams {#updating-diagrams}

Whenever `docs/database-schema.dbml` changes:

1. Open dbdiagram.io.
2. Open existing diagram.
3. Replace contents with latest DBML.
4. Save.

The diagram automatically refreshes.

---

## Recommended Workflow {#recommended-workflow}

Treat `docs/database-schema.dbml` as the source of truth.

Treat dbdiagram.io as a visualization layer.

Never edit diagrams directly and then forget to update the repository.

---

## Using DBDocs {#dbdocs}

Website:

https://dbdocs.io/

DBDocs supports DBML directly.

The same file can be used:

```text
docs/database-schema.dbml
```

No conversion is required.

---

## Creating a DBDocs Workspace {#dbdocs-workspace}

1. Create an account.
2. Create a new project.
3. Import DBML.
4. Upload `docs/database-schema.dbml`.
5. Publish documentation.

DBDocs automatically generates:

* Schema documentation
* Relationship documentation
* Table documentation
* Column documentation

---

## Updating DBDocs {#updating-dbdocs}

Whenever `docs/database-schema.dbml` changes:

1. Open DBDocs project.
2. Replace existing DBML.
3. Publish updated documentation.

---

## Recommended Ownership Model {#ownership-model}

Source of Truth:

```text
Laravel Migrations
```

Documentation:

```text
docs/database-schema.dbml
```

Visualization:

```text
dbdiagram.io
```

Published Documentation:

```text
DBDocs
```

Workflow:

```text
Laravel
    ↓
database-schema.dbml
    ↓
dbdiagram.io
    ↓
DBDocs
```

---

## Development Rules {#development-rules}

Always:

* Update DBML when schema changes.
* Commit DBML with migrations.
* Preserve existing relationships.
* Use incremental updates.
* Keep DBML synchronized.

Never:

* Leave DBML outdated.
* Regenerate entire schema unnecessarily.
* Invent relationships.
* Modify unrelated schema definitions.
* Treat diagrams as the source of truth.

The DBML file is the authoritative schema documentation artifact.
