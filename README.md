 **Please be aware that the services were run on AWS, but have been taken off. You can still run the webservice locally using vagrant, see "To View this project" below for instructions**
 
 This project was about hosting a webapp on AWS. The webapp we developed was a simple "Spending tracker" where users could add items they had purchased and could view these items at a later date as well as seeing their spending habits on a graph. 
 
 This webapp was hosted on our AWS EC2 instance and would read/write data to an RDS database. These files that were hosted on AWS can be found in the file "AWS Version".
 
 Anything not in "AWS Version" was used for local development and testing via a VM using vagrant.
 
# NOTE ABOUT VAGRANT FILE
 The vagrant file was used to test and locally develop our webapp while the instances for AWS were being setup. This vagant file is not used to setup anything to do with AWS.
 
 NOTE: Please be aware the copyright on the webpage isn't enforced.
 
 # To view this project
 Since the AWS version has been taken down you will need to use Vagrant to view the webapp. 
 To view this project and run our webapp, simply download the whole directory and then in a terminal run 'vagrant up' from the root of this directory. 
