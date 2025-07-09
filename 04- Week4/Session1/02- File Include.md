# File Include

- There are four functions used to include and execute external files, but they differ in their behavior when files are missing or already included.

## require vs include
- **require**: 
  - Produces a fatal error and stops script execution if the file can't be found or included.
- **include**:
  - Produces only a warning and continues script execution if the file can't be found.

## require_once vs include_once
- **require_once**:
  - Same as `require`, but only includes the file once.
  - If the file has already been included, it won't include it again.
- **include_once**:
  - Same as `include`, but only includes the file once.
  - If the file has already been included, it won't include it again.

## When to Use Each?
- **require**:
  - Use for essential files that your script can't function without (database connections, core configuration files, critical functions).
- **include**:
  - Use for optional files like headers, footers, or supplementary content that won't break your application if missing.
- **require_once**:
  - Use for class definitions, function libraries, or configuration files that should be loaded once and are essential to your application.
- **include_once**:
  - Use for optional files that should be included once, like optional utility functions or template parts.

## Performance Considerations
- The `_once` variants are slightly slower because PHP needs to check whether the file has already benn included.
- Use them when you need to prevent duplicate inclusions, but use the regular versions when you're certain about inclusion behavior and need maximum performance.
