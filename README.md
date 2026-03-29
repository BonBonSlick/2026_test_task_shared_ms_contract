Shared code between micro services.

This code might create tight coupling and another possible solution is GRPC with protobuf.
Because in case of updates to this package all micro services must be updated and redeployed.
Also, not every microservice need mapped super class
