# Summary
3 endpoints have been added to the api. If any methods should be changed/altered please clarify.

# Convert into roman numeral
- overview: Converts and arabic numeral passed in as an integer and converts it to a roman numeral represented as a string.
- method: POST  
- Route: /api/roman-numeral-conversions/covert
- parameters: [integer | type int, range from 1 to 3999, required]
- 200 output example: {"data":{"arabic_numeral":"1","roman_numeral":"I","number_of_times_converted":null,"date_time_last_converted":"2021-11-01T07:31:51.000000Z"}}
  
# Get recent conversions
- overview: Returns all conversions that were requested within a set number of hours with a default of 1.
- method: GET  
- Route: /api/roman-numeral-conversions/frequent
- parameters: [time_span_in_hours (default = 1) | type int, range from 1 to 168, optional]
- 200 output example: {"data":[{"arabic_numeral":1,"roman_numeral":"I","number_of_times_converted":1,"date_time_last_converted":"2021-11-01T07:31:51.000000Z"}],"time_range_in_hours":1,"total_unique_conversions_returned":1}

# Get most frequent conversions
- overview: Returns the most frequently requested with a limit on how many conversions are returned with a default of 10. 
- method: POST  
- Route: /api/roman-numeral-conversions/covert
- parameters: [limit (default = 10) | type int, range from 1 to 3999, optional]
- 200 output example: {"data":[{"arabic_numeral":1,"roman_numeral":"I","number_of_times_converted":1,"date_time_last_converted":"2021-11-01T07:31:51.000000Z"}],"limit":10,"total_unique_conversions_returned":1}




# ----- ORIGINAL BRIEF BELOW -----


# Roman Numerals API Task
This development task is based on the Roman Numeral code kata which may have already been completed during this recruitment process. This task requires you to build a JSON API and so any HTML, CSS or JavaScript that is submitted will not be reviewed.

## Brief
Our client (Numeral McNumberFace) requires a simple RESTful API which will convert an integer to its roman numeral counterpart. After our discussions with the client, we have discovered that the solution will contain three API endpoints, and will only support integers ranging from 1 to 3999. The client wishes to keep track of conversions so they can determine which is the most frequently converted integer, and the last time this was converted.

### Endpoints Required
 1. Accepts an integer, converts it to a roman numeral, stores it in the database and returns the response.
 2. Lists all the recently converted integers.
 3. Lists the top 10 converted integers.
 
## What we are looking for
 - Use of MVC components (View in this instance can be, for example, a Laravel Resource).
 - Use of [Fractal](https://fractal.thephpleague.com/) or [Laravel Resources](https://laravel.com/docs/8.x/eloquent-resources)
 - Use of Laravel features such as Eloquent, Requests, Validation and Routes.
 - An implementation of the supplied interface.
 - The supplied PHPUnit test passing.
 - Clean code, following PSR-12 standards.
 - Use of PHP 7.4 features where appropriate.
 
## Submission Instructions
Please create a [git bundle](https://git-scm.com/docs/git-bundle/) and send the file across:
```
git bundle create <yourname>.bundle --all --branches
```
