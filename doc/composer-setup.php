{"_type":"export","__export_format":4,"__export_date":"2024-04-18T21:49:51.140Z","__export_source":"insomnia.desktop.app:v8.0.0","resources":[{"_id":"req_0ea0e7b4d373486fbf6aab71425e4814","parentId":"fld_a3d27919a3fd457c9cb924afce6a8bb6","modified":1713310437395,"created":1713310425892,"url":"{{ _.BASE_URL }}/school","name":"GetAll","description":"","method":"GET","body":{},"parameters":[],"headers":[{"name":"User-Agent","value":"insomnia/8.0.0","id":"pair_18e2a7f98ed34f89a2a7b3cd2f997046"},{"id":"pair_7344f9d7611b44a6ac9b1d1942f132d7","name":"Accept","value":"application/json","description":""}],"authentication":{},"metaSortKey":-1713309205204,"isPrivate":false,"settingStoreCookies":true,"settingSendCookies":true,"settingDisableRenderRequestBody":false,"settingEncodeUrl":true,"settingRebuildPath":true,"settingFollowRedirects":"global","_type":"request"},{"_id":"fld_a3d27919a3fd457c9cb924afce6a8bb6","parentId":"wrk_61f35a6ebdf54a51b36771cde61a2e95","modified":1713309193957,"created":1713309193957,"name":"School","description":"","environment":{},"environmentPropertyOrder":null,"metaSortKey":-1713309193957,"_type":"request_group"},{"_id":"wrk_61f35a6ebdf54a51b36771cde61a2e95","parentId":null,"modified":1713309167061,"created":1713309167061,"name":"PiTesla","description":"","scope":"design","_type":"workspace"},{"_id":"req_748afb51fabc40c9882f3cfe6dd4b232","parentId":"fld_a3d27919a3fd457c9cb924afce6a8bb6","modified":1713476718818,"created":1713309205104,"url":"{{ _.BASE_URL }}/school","name":"Create","description":"","method":"POST","body":{"mimeType":"application/json","text":"{\n\t\"name\": \"Facens\"\n}"},"parameters":[],"headers":[{"name":"Content-Type","value":"application/json","id":"pair_ef2ff64e1d2e429bbef4556253f20909"},{"name":"User-Agent","value":"insomnia/8.0.0","id":"pair_18e2a7f98ed34f89a2a7b3cd2f997046"},{"id":"pair_7344f9d7611b44a6ac9b1d1942f132d7","name":"Accept","value":"application/json","description":""}],"authentication":{},"metaSortKey":-1713309205104,"isPrivate":false,"settingStoreCookies":true,"settingSendCookies":true,"settingDisableRenderRequestBody":false,"settingEncodeUrl":true,"settingRebuildPath":true,"settingFollowRedirects":"global","_type":"request"},{"_id":"env_6d1636cff93a8d3d9cfe157ba453955de79fe6c9","parentId":"wrk_61f35a6ebdf54a51b36771cde61a2e95","modified":1713309637432,"created":1713309167082,"name":"Base Environment","data":{"BASE_URL":"http://localhost:8000/api"},"dataPropertyOrder":{"&":["BASE_URL"]},"color":null,"isPrivate":false,"metaSortKey":1713309167082,"_type":"environment"},{"_id":"jar_6d1636cff93a8d3d9cfe157ba453955de79fe6c9","parentId":"wrk_61f35a6ebdf54a51b36771cde61a2e95","modified":1713310056473,"created":1713309167086,"name":"Default Jar","cookies":[{"key":"XSRF-TOKEN","value":"eyJpdiI6IkVYeC9PcmlGWWRPanErcGE4aVJhbFE9PSIsInZhbHVlIjoiSVdoZ2Z5WDlodmxrdnFuRXNpYWJ2Nm1WVndXMUwwZzI2SzN6eEo5dWs3WkpBMkgwWWVYNW9JUHFnN1d4UEZLWkFxRkxIcGRJQ1VMUjNCQVFsZmQzdVU5UG1GRldZLzZiakhISERXREVCVytvMCtpVTFKbVc1Ukg4U04zTWk2K1ciLCJtYWMiOiIxYzA1NTA1N2I1NWJjODNhODI2NWY1Y2EzZDBkMWRlMDkwMzlkNGJlNzkxYjFjYTNmN2U0ZmUyNzU2OTZjYTMxIiwidGFnIjoiIn0%3D","expires":"2024-04-17T01:27:36.000Z","maxAge":7200,"domain":"localhost","path":"/","hostOnly":true,"creation":"2024-04-16T23:26:01.434Z","lastAccessed":"2024-04-16T23:27:36.472Z","sameSite":"lax","id":"5335985716088194"},{"key":"laravel_session","value":"eyJpdiI6Ii9uWStaU01LT1hyK2ZzNkVHcW82Tmc9PSIsInZhbHVlIjoiaHpFS005TDlyTVdxOTFUT1Y0U0NPdlVFVFRpZXJxc1o5N3ZJcE1WaFNVWDdCUW8yNVhCM0lhUmc2a0d5dVBtd1ZYclZsTTZMcW92RUdEczUwcjlJQXU1MlhDMzBLZmN1UEEzbXd6TDRjWmErZkt2b2cvTFpnNmJUYjlUalVZOGkiLCJtYWMiOiI1ZGVlMGNiY2NmYjQwYTE1ZjcwMWFkODdhZmY2OGJjZGYxZmMwNDg1NTU3ODg3NDcxNTBhNWUyNWFhMjg4MjczIiwidGFnIjoiIn0%3D","expires":"2024-04-17T01:27:36.000Z","maxAge":7200,"domain":"localhost","path":"/","httpOnly":true,"hostOnly":true,"creation":"2024-04-16T23:26:01.436Z","lastAccessed":"2024-04-16T23:27:36.472Z","sameSite":"lax","id":"22803147142165825"}],"_type":"cookie_jar"},{"_id":"spc_d6ed273b68bb42bda0e12a03ebec3785","parentId":"wrk_61f35a6ebdf54a51b36771cde61a2e95","modified":1713357767216,"created":1713309167067,"fileName":"PiTesla","contents":"","contentType":"yaml","_type":"api_spec"}]}