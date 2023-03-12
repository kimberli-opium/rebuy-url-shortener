# Make-It-Short
Make-It-Short is a small web application that creates short URLs that are 4 characters long for Rebuy products. 
This app uses the Slim framework and Guzzle frameworks to handle the incoming requests and generate the short URLs. 
Slim provides the routing and middleware capabilities that are used to handle the incoming requests, while Guzzle is used to send HTTP requests to t.ly API to create the short URLs

## Requirements
To use this app, you will need to have Docker installed on your system.

## Initial Setup

To build and create the PHP container for the app, run the following command:
`make vendor`

To run the app on port 8080, run the following command:
`make run`

After running the above command, you can access the app in your web browser at the following URL:

`http://localhost:8080/make-it-short`

## Usage
To use the app, enter a valid URL for a Rebuy product. 
The app will create a short URL that is 4 characters long. If there is an error, the app will handle the response accordingly.

## Conclusion
That's it! You should now be able to use Make-It-Short to create short URLs for Rebuy products. If you have any questions or issues, please don't hesitate to reach me out.



