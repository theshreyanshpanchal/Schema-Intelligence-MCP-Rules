<p align="center">
  <img src="banner_1.png" alt="Schema Intelligence MCP" width="100%">
</p>

## Laravel → Schema Intelligence MCP Rules Roadmap

Use this roadmap to navigate the [Schema Intelligence MCP Rule](app/Docs/schema-intelligence-mcp-rule.mdc). Click a topic to jump to that section in the rule document.

| Topic | Subtopic | Description |
|-------|----------|-------------|
| [Purpose](app/Docs/schema-intelligence-mcp-rule.mdc#purpose) | — | Defines why Laravel is the schema source of truth and what DBML sync must achieve. |
| [Operating Mode](app/Docs/schema-intelligence-mcp-rule.mdc#operating-mode) | Incremental Synchronization | Default mode updates only affected DBML sections instead of full regeneration. |
| [Operating Mode](app/Docs/schema-intelligence-mcp-rule.mdc#operating-mode) | Default Behavior | Lists constraints: reuse definitions, preserve relationships, and minimize token usage. |
| [Source of Truth](app/Docs/schema-intelligence-mcp-rule.mdc#source-of-truth) | Priority Order | Ranks migration changes, live schema, existing DBML, and Eloquent relationships. |
| [Scope](app/Docs/schema-intelligence-mcp-rule.mdc#scope) | — | Limits analysis to migrations, models, keys, pivots, polymorphic relations, indexes, and constraints. |
| [Synchronization](app/Docs/schema-intelligence-mcp-rule.mdc#synchronization-trigger-conditions) | Trigger Conditions | Lists every schema change that requires DBML synchronization. |
| [Synchronization](app/Docs/schema-intelligence-mcp-rule.mdc#incremental-synchronization) | Incremental Updates | Requires patching only affected tables, columns, indexes, and relationships. |
| [Analysis](app/Docs/schema-intelligence-mcp-rule.mdc#analysis-priority) | Priority Order | Defines what to read first: current migration, history, DBML, then related models. |
| [Relationships](app/Docs/schema-intelligence-mcp-rule.mdc#relationship-detection) | Detection Rules | Documents how to detect relationships from migrations and Eloquent methods. |
| [Validation](app/Docs/schema-intelligence-mcp-rule.mdc#validation-requirements) | Requirements | Checklist to verify tables, columns, keys, indexes, and relationships before finishing. |
| [Schema Changes](app/Docs/schema-intelligence-mcp-rule.mdc#rename-handling) | Rename Handling | Treat renames as updates: preserve links and remove obsolete references. |
| [Schema Changes](app/Docs/schema-intelligence-mcp-rule.mdc#deletion-handling) | Deletion Handling | Mark removals for approval instead of deleting DBML entities automatically. |
| [Governance](app/Docs/schema-intelligence-mcp-rule.mdc#approval-first-policy) | Approval First Policy | Summarize proposed DBML changes and wait for approval before editing. |
| [Governance](app/Docs/schema-intelligence-mcp-rule.mdc#large-change-protection) | Large Change Protection | Pause and request approval when more than 10 tables are affected. |
| [Documentation](app/Docs/schema-intelligence-mcp-rule.mdc#documentation-reuse) | Reuse | Reuse existing DBML sections, notes, grouping, and formatting when possible. |
| [Performance](app/Docs/schema-intelligence-mcp-rule.mdc#performance-rules) | Rules | Minimize scanning, file edits, relationship analysis, and token usage. |
| [Safety](app/Docs/schema-intelligence-mcp-rule.mdc#stop-conditions) | Stop Conditions | Stop and report when intent is unclear or sources conflict—never guess. |
| [Completion](app/Docs/schema-intelligence-mcp-rule.mdc#completion-criteria) | Criteria | Task is done only when DBML, relationships, and validation all pass. |
| [Workflow](app/Docs/schema-intelligence-mcp-rule.mdc#predictable-execution-principle) | Predictable Execution | Single path: analyze → propose → approve → update → validate → summarize. |
