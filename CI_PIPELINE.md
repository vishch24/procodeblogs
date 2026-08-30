# CI Pipeline Documentation

## Overview
This document describes the DevSecOps CI/CD pipeline built for the procodeblogs Laravel application.

## Architecture

### Workflow Structure
The CI pipeline consists of four modular, reusable workflows orchestrated by a main `ci.yml`:

1. **code-quality.yml** — PHP linting and code standards (Pint)
2. **secret-scanning.yml** — Credential and secrets detection (Gitleaks)
3. **dependency-checks.yml** — Vulnerability scanning (Composer Audit)
4. **code-tests.yml** — Application testing (PHPUnit)

All workflows are triggered on `push: main` via the main `ci.yml` orchestrator.

## Workflows

### 1. Code Quality (code-quality.yml)
- **Tool**: Laravel Pint
- **Matrix**: PHP 8.2, 8.3, 8.4
- **Purpose**: Enforce Laravel code standards; catch style issues early

### 2. Secret Scanning (secret-scanning.yml)
- **Tool**: Gitleaks
- **Purpose**: Detect hardcoded credentials and API keys in every commit

### 3. Dependency Checks (dependency-checks.yml)
- **Tool**: Composer Audit
- **Purpose**: Scan dependencies for known security vulnerabilities
- **Status**: ✓ Zero CVEs detected

### 4. Code Tests (code-tests.yml)
- **Tool**: PHPUnit
- **Matrix**: PHP 8.2, 8.3, 8.4
- **Database**: SQLite (isolated, fast testing environment)
- **Purpose**: Validate application functionality across PHP versions

## Key Decisions

### PHP 8.3 + Laravel 12
- Upgraded to patch all security vulnerabilities
- Framework CVEs fixed: CRLF injection, path confusion in signed URLs
- All dev dependencies now run on supported, patched versions

### Matrix Strategy
- Tests run in parallel on PHP 8.2, 8.3 and 8.4
- Catches version-specific issues immediately
- Applied to code-quality and code-tests

## Security Posture

✓ Zero production vulnerabilities (patched via Laravel 12 + PHP 8.3)    
✓ Secrets scanned on every push    
✓ Dependencies audited continuously     
✓ Code standards enforced     
✓ Tests validate functionality across PHP versions     

---

**Pipeline Status**: All workflows passing     
**Maintained By**: Vishakha Chavan | **Last Verified**: 30th Auguest, 2026