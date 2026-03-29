Overview
This bundle serves as the Single Source of Truth for the Product and Order microservices. It contains shared logic, data
structures, and messaging configurations to ensure both services speak the same language.

⚠️ Architectural Note: Tight Coupling
This bundle creates a compile-time dependency between services.

The Risk: If you change a DTO or a Mapped Superclass here, you must update and redeploy both the Product and Order
services to prevent runtime errors.

Alternative: For high-scale systems, we would consider gRPC with Protocol Buffers to allow for independent versioning
and language agnostic communication. Or separate and group bundles for different microservices and purposes e.g. models
and DTOs can be different bundles.

What’s Inside?

1. Data Transfer Objects (DTOs)
   These are "Contracts." We use them to ensure that when the Product Service sends a message, the Order Service knows
   exactly how to read it and otherwise.

DTO: Defines the structure for RabbitMQ messages (UUID, Name, Price, Quantity etc).

Validation: Includes Symfony constraints so data is validated before it leaves or enters a service.

2. Mapped Superclasses (Doctrine)
   To avoid rewriting the same database fields in every service, we use a MappedSuperclass.

AbstractProduct: Contains the core fields for a Product.

Usage: Each microservice creates its own Product entity that extends this class. This allows the Order Service to have
a "local copy" of product data without duplicating the mapping logic.

3. RabbitMQ configurations are moved outside inside microservices orchestration project and dedicated microservice. This
   prevents "typos" in queue names from breaking the entire communication pipeline for orchestration and
   we keep flexibility by configuring every microservice which DTOs to use and how.

In case of this bundle Updates

- Modify the code in this bundle.
- Tag a new version (e.g., v1.1.0).
- Update the composer.json in both the Product and Order services.
- Redeploy both services simultaneously to ensure compatibility.
