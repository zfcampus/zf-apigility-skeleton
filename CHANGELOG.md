CHANGELOG
=========

v0.8.0 (20 Dec 2013)
--------------------

Adds content validation support.

- **Ups minimum supported PHP version to 5.4.8**.
- New module, zf-content-validation, which allows associating ZF2 input filters
  with named controller services, as well as creation of named input filters via
  a ZF2 abstract service factory. For requests with content, if the matched
  controller has an associated input filter, the data is passed to the input
  filter, and an error is returned on validation failure.
  - 422 responses are returned when validation fails.
  - 400 responses are returned when the content contains unrecognized data.
- Admin UI now adds an "Inputs" tab to each service, allowing the user to create
  and edit inputs for the service, as well as associate validators.
- Hydrators are now specified via a dropdown, populated from a list of known
  hydrator services in the application.
  - The ArraySerializable hydrator is now specified as the default hydrator for
    REST entity objects.
- The AbstractResourceListener now correctly pulls any whitelisted query string
  variables and passes them to the `fetchAll()` method.
- You may now specify the default version to use when no version is specified
  (previously, hard-coded to use version 1 as the default version).
- The Admin API will now report an error if you attempt to create a new API and
  a matching module name already exists.
- All Apigility modules now use "next significant release" notation in their
  composer.json files to ensure the latest stable version **or** development
  version will be selected (vs only the latest development version).
- All Apigility modules have been updated to ensure they are compatible with
  Cross Origin Resource Sharing (CORS) requests.
- Tables used with DB-Connected REST resources can now contain underscores in
  their names.
- Content negotiation now detects JSON decoding errors and raises an exception
  when detected.
- Composed ZF\Hal\Link\Link properties in objects rendered as HAl will be
  rendered as relational links.
- The collection name of a HAL collection can now be specified in HAL metadata
  configuration.
- OAuth2 support has been improved to allow better integration between ZF2 and
  oauth2-server-php request objects, and to allow the password grant type.

v0.7.0 (15 Nov 2013)
--------------------

Adds Authentication and Authorization support:

- New module, zf-mvc-auth, supporting HTTP Basic and Digest authentication,
  OAuth2 authentication, and authorization via Access Control Lists.
- Admin UI now allows adding, editing, and deleting authentication details for
  an application, and authorization details for each API.
- The Admin UI now provides flash messages for most operations.

v0.6.0 (7 Oct 2013)
-------------------

Initial public release. Includes:

- Ability to create new APIs.
- Ability to version APIs.
- Ability to create, edit, and delete RPC and REST services.
  - Edit and delete capabilities are limited to the latest API version.
- Ability to add, edit, and delete connection details for database adapters.
- Ability to create "DB-Connected" REST services by specifying a database
  adapter and table within the database.
- Content negotiation.
- HTTP OPTIONS handling.
- Error handling, using the Problem API format.
- Hypermedia Application Language support for REST services.
