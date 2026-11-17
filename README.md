# PizzAdmin — Pizza Shop Administration System

A historical PHP/MySQL academic project for managing operational data for a pizza shop. The repository contains a PHP application, entity/DAO classes and a SQL schema/data dump.

> **Status:** Legacy academic project from 2014. It uses the removed `mysql_*` PHP extension and an old PHP/MySQL stack. It is preserved for historical reference and is not suitable for public deployment or production use.

## Application scope

The application is named **PizzAdmin** and its navigation and database model indicate workflows for:

- Customer records and contact details.
- Products, flavours, sizes and product types.
- Orders and order-related information.
- Recipes, prices and stock movements.
- Supporting address/location data such as municipalities and neighbourhoods.
- Login-protected administrative pages and reports.

## Technology and architecture

- PHP (the original environment references PHP 5.4)
- MySQL (the SQL dump was generated against MySQL 5.5)
- Server-rendered HTML, CSS and JavaScript
- jQuery and client-side form validation/masking
- A basic separation between controllers/DAOs, model classes and view templates

## Repository layout

```text
ctrl/
  *DAO.php
  conexao.php
  login.php
  inserir.php
  editar.php
  remover.php
model/
  *.php
  pizzadmin.sql
view/
  corpo/
  css/
  js/
index.php
```

The `model/pizzadmin.sql` file contains the original database schema and sample records.

## Running the historical project

The original code expects a local MySQL database named `pizzadmin` and a PHP runtime compatible with the legacy `mysql_*` extension. That extension was removed from modern PHP, so the application needs a database-layer migration (for example, to PDO or MySQLi) before it can run on a supported PHP version.

The repository's connection file assumes a local database account. Do not reuse that configuration for a real deployment.

## Security and maintenance caveats

This code is intentionally documented as a legacy reference. Several DAO operations build SQL statements by concatenating user-controlled values, and the old `mysql_*` API does not provide a safe modern database abstraction. Before any reuse, migrate to PDO/MySQLi prepared statements, add CSRF protection and server-side validation, escape output, introduce password hashing and session protections, and replace sample data with synthetic fixtures.

No security audit, current-runtime build or production-readiness claim is made.
