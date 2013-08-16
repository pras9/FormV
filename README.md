FormV Package README
======================================
This is basically an form validation and data setter automation programme which has following features within it so far:
    1. PHP server side form validation from a given rule array
    2. Client side(Using native javaScript) form validation generated from the same php array of rules
    3. Client side(Using native javaScript) form field data setter from either $_POST(default) or from a given php array of form field data

Usage of the package is given in demo.php as a demo. Please go through it, and then if you have any further query you can directly mail it to me at pras.svo@gmail.com



Validation rules to be given in php array rules key for each field:

Rule 				Parameter 	Details
-----------------------------------------------------------------------------------------------------------------------------
required 			No 			Returns FALSE if the form element is empty.
matches 			Yes 		Returns FALSE if the form element does not match the one in the parameter; e.g. matches[form_item]
min_length 			Yes 		Returns FALSE if the form element is shorter then the parameter value. e.g. min_length[6]
max_length 			Yes 		Returns FALSE if the form element is longer then the parameter value. e.g. max_length[12]
exact_length 		Yes 		Returns FALSE if the form element is not exactly the parameter value. e.g. exact_length[8]
greater_than 		Yes 		Returns FALSE if the form element is less than the parameter value or not numeric. e.g. greater_than[8]
less_than 			Yes 		Returns FALSE if the form element is greater than the parameter value or not numeric. e.g. less_than[8]
alpha 				No 			Returns FALSE if the form element contains anything other than alphabetical characters.
alpha_numeric 		No 			Returns FALSE if the form element contains anything other than alpha-numeric characters. 
alpha_dash 			No 			Returns FALSE if the form element contains anything other than alpha-numeric characters, underscores or dashes. 
numeric 			No 			Returns FALSE if the form element contains anything other than numeric characters. 
integer 			No 			Returns FALSE if the form element contains anything other than an integer. 
decimal 			Yes 		Returns FALSE if the form element is not exactly the parameter value.
is_natural 			No 			Returns FALSE if the form element contains anything other than a natural number: 0, 1, 2, 3, etc. 
is_natural_no_zero 	No 			Returns FALSE if the form element contains anything other than a natural number, but not zero: 1, 2, 3, etc. 
valid_email 		No 			Returns FALSE if the form element does not contain a valid email address.
valid_emails 		No 			Returns FALSE if any value provided in a comma separated list is not a valid email. 
valid_ip 			No 			Returns FALSE if the supplied IP is not valid. Accepts an optional parameter of "IPv4" or "IPv6" to specify an IP format. 
valid_base64 		No 			Returns FALSE if the supplied string contains anything other than valid Base64 characters.